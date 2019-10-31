<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Http\Request;

class ManyToManyController extends Controller
{
    public function manyToMamy()
    {
        $city = City::with('companies')
            ->where('name', 'São Paulo')->first();
        echo $city->name . '<br>';

        $companies = $city->companies;

        foreach ($companies as $company) {
            echo $company->name . '<br>';
        }

    }

    public function manyToMamyInverse()
    {
        $company = Company::with('cities')
            ->where('name', 'Especializa TI')->first();
        echo $company->name . '<br>';

        $cities = $company->cities;

        foreach ($cities as $city) {
            echo $city->name . '<br>';
        }
    }

    public function manyToMamyInsert()
    {
         $dataForm = [3,  4];

        $company = Company::find(1);
        echo $company->name . '<br>';

       // $company->cities()->attach($dataForm); //sempre inclui
        $company->cities()->detach();
        $company->cities()->attach($dataForm);

        //$company->cities()->sync($dataForm); //só insere se não existir

        //$company->cities()->detach(); //remove todos os registros
       // $company->cities()->detach([4]); //remove os registros das cidades informadas

        $cities = $company->cities;

        foreach ($cities as $city) {
            echo $city->name . '<br>';
        }


    }
}
