<?php

namespace App\Http\Controllers;
use App\Models\Todos;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Auth;

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
        $todos = Todos::with('user')->where('id_usario', Auth::user()->id )
        ->get();
        $categorias = Categoria::all();
        return view('home', ['todos' => $todos, 'categorias' => $categorias]);
    }

    public function prueba(){
        return view('prueba');
    }
}
