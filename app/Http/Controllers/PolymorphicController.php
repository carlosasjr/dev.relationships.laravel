<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class PolymorphicController extends Controller
{
    public function polymorphic()
    {
        //listar comentários da cidade
        $city = City::with('comments')
                    ->where('name', 'Guarulho')->first();

        echo $city->name . '<br>';

        foreach ($city->comments as $comment) {
            echo $comment->description . '<br>';
        }

        echo '<hr>';

        //listar comentários de um pais
        $state = State::with('comments')
                 ->where('name', 'São Paulo')->first();

        echo $state->name . '<br>';

        foreach ($state->comments as $comment) {
            echo $comment->description . '<br>';
        }

        echo '<hr>';

        //listar comentários de um pais
        $country = Country::with('comments')
            ->where('name', 'Brasil')->first();

        echo $country->name . '<br>';

        foreach ($country->comments as $comment) {
            echo $comment->description . '<br>';
        }

    }

    public function polymorphicInsert()
    {
      //Inserindo comentarios na tabela de comentário, referenciando diferentes tabelas.

       /* $city = City::where('name', 'Guarulho')->first();
        echo $city->name . '<br>';

        $comment = $city->comments()->create([
            'description' => "New Comment {$city->name} " . date('YmdHis')
        ]);*/


      /*  $state = State::where('name', 'São Paulo')->first();
        echo $state->name . '<br>';

        $comment = $state->comments()->create([
            'description' => "New Comment {$state->name} " . date('YmdHis')
        ]);
        */

        $country = Country::where('name', 'Brasil')->first();
        echo $country->name . '<br>';

        $comment = $country->comments()->create([
            'description' => "New Comment {$country->name} " . date('YmdHis')
        ]);


    }
}
