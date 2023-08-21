<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\User;
use App\Models\Hotel;
use App\Models\HotelAdmin;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * Display login of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        $title = "Login";
        $description = "Some description for the page";
        return view('auth.login', compact('title', 'description'));
    }

    /**
     * Display register of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function register()
    {
        $title = "Register";
        $description = "Some description for the page";
        return view('auth.register', compact('title', 'description'));
    }

    public function registerHotel()
    {
        $title = "Register Hotel";
        $description = "Some description for the page";
        return view('auth.register-hotel', compact('title', 'description'));
    }

    /**
     * Display forget password of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function forgetPassword()
    {
        $title = "Forget Password";
        $description = "Some description for the page";
        return view('auth.forget_password', compact('title', 'description'));
    }

    /**
     * make the user able to register
     *
     * @return 
     */
    public function signup(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        if ($validators->fails()) {
            return redirect()->route('register')->withErrors($validators)->withInput();
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            auth()->login($user);
            return redirect()->route('index')->with('message', 'Successfully Registered !');
        }
    }

    public function signupHotel(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required',
            'hotel-name' => 'required',
            'hotel-address' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        if ($validators->fails()) {
            return redirect()->route('register-hotel')->withErrors($validators)->withInput();
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            // create hotel
            $hotel = new Hotel();
            $hotel->name = $request->input('hotel-name');
            $hotel->address = $request->input('hotel-address');
            $hotel->state_id = 1;
            $hotel->country = 'NGA';
            $hotel->rating = 4.0;
            $hotel->min_price = 0;
            $hotel->max_price = 7400;
            $hotel->phone = '08012345678';
            $hotel->email = $request->email;
            $hotel->website = 'https://www.google.com';
            $hotel->images = ['https://via.placeholder.com/150'];
            $hotel->logo = 'https://via.placeholder.com/150';
            $hotel->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.';
            $hotel->status = 'active';
            $hotel->city = 'Lagos';
            $hotel->save();

            // create hotel admin
            $hotelAdmin = new HotelAdmin();
            $hotelAdmin->user_id = $user->id;
            $hotelAdmin->hotel_id = $hotel->id;
            $hotelAdmin->role = 'admin';
            $hotelAdmin->save();

            auth()->login($user);
            return redirect()->route('index')->with('message', 'Successfully Registered !');
        }
    }

    /**
     * make the user able to login
     *
     * @return 
     */
    public function authenticate(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validators->fails()) {
            return redirect()->route('login')->withErrors($validators)->withInput();
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('/')->with('message', 'Welcome back !');
            } else {
                return redirect()->route('login')->with('message', 'Login failed !Email/Password is incorrect !');
            }
        }
    }

    /**
     * make the user able to logout
     *
     * @return 
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('message', 'Successfully Logged out !');
    }
}
