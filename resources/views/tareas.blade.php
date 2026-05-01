@extends('layouts.app')

@section('title', 'Mis tareas')

@section('content')

<h1 class="text-center mb-4">Mis tareas</h1>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <form method="POST" action="/tareas" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-5">
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nueva tarea">
            </div>
            <div class="col-md-4">
                <input type="date" name="fecha" class="form-control">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary w-100">Guardar</button>
            </div>
        </div>
    </form>

    <ul class="list-group">
        @foreach($tareas as $t)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $t->name }}</strong><br>
                    <small>{{ \Carbon\Carbon::parse($t->fecha)->format('d/m/Y') }}</small>
                </div>

                <div>
                    <a href="/editar/{{ $t->id }}" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/eliminar/{{ $t->id }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar tarea?')">Eliminar</a>
                </div>
            </li>
        @endforeach
    </ul>

</div>

@endsection