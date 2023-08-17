<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class FlutterwaveController extends Controller
{
    /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize(Request $request, Room $room)
    {
        $request->validate([
            'date-range-from' => 'required|date',
            'date-range-to' => 'required|date',
        ]);

        // calculate the number of days
        $checkIn = \Carbon\Carbon::parse($request->input('date-range-from'));
        $checkOut = \Carbon\Carbon::parse($request->input('date-range-to'));
        $days = $checkIn->diffInDays($checkOut);

        //This generates a payment reference
        $reference = Flutterwave::generateReference();

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => $room->price * $days,
            'email' => auth()->user()->email,
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route("pay.callback", $room->id),
            'customer' => [
                'email' => auth()->user()->email,
                "phone_number" => auth()->user()->email,
                "name" => auth()->user()->name,
            ],
            "customizations" => [
                "title" => 'Payment for ' . $room->number,
                "description" => "Payment for " . $room->number,
            ],
            "meta" => [
                "check_in" => $request->input('date-range-from'),
                "check_out" => $request->input('date-range-to'),
            ],
        ];

        $payment = Flutterwave::initializePayment($data);


        if ($payment['status'] !== 'success') {
        }

        // create a transaction
        Transaction::create([
            'user_id' => auth()->user()->id,
            'room_id' => $room->id,
            'amount' => $room->price * $days,
            'currency' => 'NGN',
            'payment_reference' => $reference,
            'flw_ref' => $reference
        ]);

        return redirect($payment['data']['link']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {

        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {
            DB::beginTransaction();
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);
            // check if the ref is used already
            $tx = Transaction::where('payment_reference', $data['data']['tx_ref'])->first();
            if ($tx->status) {
                return redirect()->route('index')->with('success', 'Payment successful');
            }

            // confirm the amount is correct
            if ($tx->amount != $data['data']['amount']) {
                return redirect()->route('index')->with('error', 'Invalid amount');
            }
            // create a booking for the user
            $booking = Booking::create([
                'user_id' => auth()->user()->id,
                'room_id' => $tx->room_id,
                'hotel_id' => $tx->room->hotel->id,
                'check_in' => $data['data']['meta']['check_in'],
                'check_out' => $data['data']['meta']['check_out'],
                'total_price' => $tx->amount,
            ]);
            // update the transaction

            Transaction::where('payment_reference', $data['data']['tx_ref'])
                ->update([
                    'status' => true,
                    'flw_transaction_id' => $transactionID,
                    'booking_id' => $booking->id,
                ]);

            DB::commit();
            // redirect to invoice page
            return redirect()->route('invoice', $booking->id);
        } elseif ($status ==  'cancelled') {
            return redirect()->route('index')->with('success', 'Payment unsuccessful');
        } else {
            return redirect()->route('index')->with('success', 'Payment unsuccessful');
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your success page else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purposes)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }
}
