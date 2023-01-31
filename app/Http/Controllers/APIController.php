<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class APIController extends Controller
{

    public Function cep() {

        $search = request('search');
        $response = Http::get('https://brasilapi.com.br/api/cep/v2/' . $search);

   //     dd($response);

        $data = json_decode($response); // convert JSON into objects 

     //   dd($data);
  return view('API.CEP/index', ['search' => $search, 'data' =>$data]);

          //dd($search);

  }
    public Function cnpj() {

        $search = request('search');
        $response = Http::get('https://brasilapi.com.br/api/cnpj/v1/' . $search);

   //     dd($response);

        $data = json_decode($response); // convert JSON into objects 

     //   dd($data);
  return view('API.CNPJ/index', ['search' => $search, 'data' =>$data]);

          //dd($search);

  }
}
