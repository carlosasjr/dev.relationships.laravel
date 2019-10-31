<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class OnToManyController extends Controller
{
    public function onToMany()
    {
        //$country = Country::with('states')
       //                    ->where('name', 'Brasil')->first();
       // echo $country->name;
        //echo '<hr>';

        //$states = $country->states; //chamando como propriedade
        //$states = $country->states()->where('initials', 'SP')->first(); //chamando como método com where retornando um resultado

        $keySearch = 'a';
        $countries = Country::with('states')
                             ->where('name', 'LIKE', "%{$keySearch}%")
                             ->get();

        foreach ($countries as $country) {
             echo '<b>' . $country->name . '</b><br>';

            foreach ($country->states as $state) {
                echo "**{$state->initials} - {$state->name} <br>";
                }
            }
            echo '<hr>';
    }

    public function onToManyTwo()
    {
        $keySearch = 'a';
        $countries = Country::with(['states.cities'])
            ->where('name', 'LIKE', "%{$keySearch}%")
            ->get();

        foreach ($countries as $country) {
            echo '<b>' . $country->name . '</b><br>';

            foreach ($country->states as $state) {
                echo "**{$state->initials} - {$state->name} <br>";

                foreach ($state->cities as $city) {
                    echo " ******** {$city->name}<br>";
                }
            }
            echo '<hr>';
        }
    }

    public function manyToOne()
    {
        $stateName = 'Changai';
        $state = State::with('country')
                        ->where('name', $stateName)->first();
        echo $state->name;

        echo '<br>';

        $country = $state->country;
        echo 'Pais: ' . $country->name;
    }
}
