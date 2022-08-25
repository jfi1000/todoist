<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria', ['categorias' => $categorias]);

        // $categorias = Categoria::all();
        // return view('categorias.index', ['categorias' => $categorias]);
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
            'categoria' => 'required|min:3',
            'color_code' => 'required|min:3'
        ]);
        // $new_categoria = $request->get('categoria');
        if($request->get('id_categoria') != null){
            //buscamos el todo a editar
            $categoria_edit = Categoria::find($request->get('id_categoria'));
            $categoria_edit->name = $request->categoria;
            $categoria_edit->color =$request->color_code;
            $categoria_edit->save();  //guardamos el todo
            return redirect()->route('categoria.index')->with('success','Categoria Editada Correctamente');
        }else{
        $categoria = new Categoria;
        $categoria->name =  $request->categoria;
        $categoria->color =$request->color_code;
       // dd($request);
        // $todo->id_usario = Auth::user()->id;
        $categoria->save();
        
            return redirect()->route('categoria.index')->with('success','Categoria Añadida Correctamente');
        }
    }


    public function show( $id)
    {
        $categoria= Categoria::find($id);
        // dd($categoria);

  
        return $categoria;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

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
        $categoria = Categoria::find($id);
        $categoria->delete();

       return "Categoria Eliminada Correctamente";

    }
}
