@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Añade o edita una Categoria</div>
                    <div class="card-body">
                        <form action="{{ route('categoria.store') }}" method="post">
                                @csrf
                                @if (session('success'))
                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                                @endif
                                @error('homework2')
                                <h6 class="alert alert-danger">{{ $message }}</h6>
                                @enderror
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-8">
                                            <label for="exampleInputPassword1">Categoria</label>
                                            <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria a editar">
                                            <input type="text" id="id_categoria" name="id_categoria" value="" hidden >
                                        </div>
                                        <div class="col-4">    
                                            <label for="exampleInputPassword1">Selecciona un color</label>
                                            <input type="color">
                                        </div>
                                    </div>
                                </div>
                                <div id="buttom_submit">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <div id="button_edit"  style="display: none;" >
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </div>
                        </form>
                        <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">Categoria</th>
                            <th scope="col"> </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categorias as $categoria)
                                <tr>
                                <th scope="row">{{ $categoria->id }}</th>
                                <td>{{ $categoria->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" onclick="edit({{$categoria->id}})">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="deleted({{$categoria->id}})">Delete</button>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script>
function edit(id) {
async function fetchMoviesBadStatus() {
  const response = await fetch('categorias/'+id);
  if (!response.ok) {
    const message = `An error has occured: ${response.status}`;
    throw new Error(message);
  }
  const data = await response.json();
    //  $('#categoria').append("<option selected>"+data[0]['categoria']['name']+"</option>")  
    //   document.getElementById('categoria').value = data[0]['homework'];
      document.getElementById('categoria').value = data['name'];
      document.getElementById('id_categoria').value = data[0]['id'];
      var buttom_edit = document.getElementById("button_edit");
      var buttom_submit = document.getElementById("buttom_submit");
      
      
      buttom_submit.style.display = "none";
      buttom_edit.style.display = "block";


  return data;
}
fetchMoviesBadStatus().catch(error => {
  error.message; // 'An error has occurred: 404'
});

    }



    function deleted(id) {   
        async function fetchMoviesBadStatus() {
        const response = await fetch('categoria/'+id);
        if (!response.ok) {
        const message = `An error has occured: ${response.status}`;
        throw new Error(message);
        } 
        if (response.ok) {
            location.reload();
        }
         const data = await response.json();
       
        
        }
        
        fetchMoviesBadStatus().catch(error => {
        error.message; // 'An error has occurred: 404'
        });

    }
    


</script>
