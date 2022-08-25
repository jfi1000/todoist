@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Añadir Tarea</div>
                    <div class="card-body">
                        <form action="{{ route('todos') }}" method="post">
                                @csrf
                                @if (session('success'))
                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                                @endif
                                @error('homework2')
                                <h6 class="alert alert-danger">{{ $message }}</h6>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">CATEGORIA</label>
                                    <select class="form-control" id="categoria" name="categoria">
                                        @foreach ($categorias as $categoria)
                                        <option id="{{ $categoria->id }}" value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">TAREA</label>
                                    <input type="text" class="form-control" id="homework1" name="homework2" placeholder="Tarea a registrar">
                                    <input type="text" id="id_todo" name="id_todo" value="" hidden >
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
                            <th scope="col">Tarea</th>
                            <th scope="col">Creado Por</th>
                            <th scope="col"> </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($todos as $todo)
                                <tr>
                                <th scope="row">{{ $todo->id }}</th>
                                <td>{{ $todo->homework }}</td>
                                <td>{{ $todo->user->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" onclick="edit({{$todo->id}})">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="deleted({{$todo->id}})">Delete</button>
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
  const response = await fetch('todoss/'+id);
  if (!response.ok) {
    const message = `An error has occured: ${response.status}`;
    throw new Error(message);
  }
  const data = await response.json();
    //  $('#categoria').append("<option selected>"+data[0]['categoria']['name']+"</option>")  
      document.getElementById(data[0]['categoria']['id']).selected = true;
      document.getElementById('homework1').value = data[0]['homework'];
      document.getElementById('id_todo').value = data[0]['id'];
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
        const response = await fetch('todosss/'+id);
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
