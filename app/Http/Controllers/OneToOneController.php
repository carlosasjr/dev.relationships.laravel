<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OneToOneController extends Controller
{
    public function oneToOne()
    {
        //$country = Country::find(1);
        $country = Country::where('name', 'Brasil')->first();

        echo $country->name;

        echo '<hr>';
        $location = $country->location; //ou
        //$location = $country->location()->first();


        echo 'Latitude: ' . $location->latitude . '<br>';
        echo 'Longitude: ' . $location->longitude . '<br>';
    }

    public function oneToOneInverse()
    {
        $latitude = 123;
        $longitude = 321;

        $location = Location::with('country')
            ->where('latitude', $latitude)
            ->where('longitude', $longitude)->first();

        echo $location->id;

        echo '<hr>';

        $country = $location->country;
        echo $country->name;
    }

    public function oneToOneInsert()
    {
        $dataForm = [
            'name' => 'Sultão',
            'latitude' => 222223,
            'longitude' => 9877
        ];

        DB::beginTransaction();
        try {
            //criar um pais e uma nova localização
            $country = Country::create($dataForm);
            $location = $country->location()->create($dataForm);


            //localizar um pais e cria  ou atualiza a localização
            $country = Country::find('1');

            // unset($dataForm['name']);
            // $location = $country->location()->create($dataForm); se existir um item em location, vai dar erro de integridade
            $location = $country->location()->updateOrCreate(['country_id' => $country->id], $dataForm);

            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            dd($e);
        }

    }
}
