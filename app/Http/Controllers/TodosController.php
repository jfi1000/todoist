<?php

namespace App\Http\Controllers;
use App\Models\Todos;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Auth;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos= Todos::all();
   
        return $todos;

        // $todos = Todos::all();
        // $categorias = Categoria::all();
        // return view('home', ['todos' => $todos, 'categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'homework2' => 'required|min:5'
        ]);
        $new_todo = $request->get('todo');
        if($request->get('id_todo') != null){
            //buscamos el todo a editar
            // $todo_full = show($request->get('id_todo'));
            $todo_full = Todos::find($request->get('id_todo'));
            $todo_full->homework = $request->homework2;
            $todo_full->save();  //guardamos el todo
            return redirect()->route('home')->with('success','Tarea Editada Correctamente');
        }else{
        $todo = new Todos;
        $todo->homework =  $request->homework2;
        $todo->categoria =$request->categoria;
       // dd($request);
        $todo->id_usario = Auth::user()->id;
        $todo->save();
        
            return redirect()->route('home')->with('success','Tarea Creada Correctamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
     {
         $todos= Todos::with('categoria')->where('id', $id)
         ->get();

   
         return $todos;
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $todo = Todos::find($id);
         $todo->delete();

        return "Tarea Eliminada Correctamente";
    }
}
