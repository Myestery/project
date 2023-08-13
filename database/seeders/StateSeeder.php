<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $states = [
            "abia",
            "adamawa",
            "akwa ibom",
            "anambra",
            "bauchi",
            "bayelsa",
            "benue",
            "borno",
            "cross river",
            "delta",
            "ebonyi",
            "edo",
            "ekiti",
            "enugu",
            "gombe",
            "imo",
            "jigawa",
            "kaduna",
            "kano",
            "katsina",
            "kebbi",
            "kogi",
            "kwara",
            "lagos",
            "nasarawa",
            "niger",
            "ogun",
            "ondo",
            "osun",
            "oyo",
            "plateau",
            "rivers",
            "sokoto",
            "taraba",
            "yobe",
            "zamfara"
        ];

        State::withoutEvents(function () use ($states) {
            foreach ($states as $state) {
                State::create([
                    "name" => $state
                ]);
            }
        });
    }
}
