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
                                    <label for="exampleFormControlSelect1">Example select</label>
                                    <select class="form-control" id="categoria">
                                        @foreach ($categorias as $categoria)
                                        <option>{{ $categoria->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">Categoria</label>
                                    <input type="text" class="form-control" id="categoria" aria-describedby="categoria" placeholder="Ingresa una categoria">
                                    <small id="emailHelp" class="form-text text-muted">Cargar select ...</small>
                                </div> -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tarea</label>
                                    <input type="text" class="form-control" id="homework1" name="homework2" placeholder="Tarea a registrar">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                            @foreach($todos as $todo)
                                <h6>{{ $todo->homework }}</h6>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
