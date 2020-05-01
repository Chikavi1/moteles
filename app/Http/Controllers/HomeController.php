<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bussiness;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function busqueda(Request $request){
       $moteles = bussiness::all();
       $place = $request->get('place');
       return view('busqueda')->with(compact('place','moteles'));

    }
}
