<?php

namespace App\Http\Controllers;

use App\Models\ConfigUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = ConfigUser::where('user_id', Auth::id())->get();
        if($data->count()!=0){
            return view('layouts.dashboard');
        }
        else{
            return 'Redirigir al usuario para elegir el ciclo prederteminado';
        }
        //return view('layouts.dashboard');
    }
}
