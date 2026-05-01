<h1>Editar tarea</h1>

<form method="POST" action="/actualizar/{{ $tarea->id }}">
    @csrf

    <input type="text" name="name" value="{{ $tarea->name }}">
    <input type="date" name="fecha" value="{{ $tarea->fecha }}">
    <button type="submit">Actualizar</button>
</form>

@if($errors->any())
    <div style="color:red;">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif