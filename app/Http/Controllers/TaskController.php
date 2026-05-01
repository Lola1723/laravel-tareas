<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //
    public function index(){
        $tareas = Task::all();
        return view('tareas', compact('tareas'));
    }
    //otro metodo en mi controlador
    public function saludo(){
        return "Hola desde controlador";
    }
    //metodo para guardar datos
    public function guardar(){
        Task::create([
            'name' => 'Mi primera tarea desde Laravel'
        ]);
        return 'Guardado correctamente';
    }
    //metodo listar
    public function listar(){
        $tareas = Task::all();
        return $tareas;
    }

    //metodo guardar
    public function store(Request $request){
        $request->validate([
            'name'=> 'required'
        ], [
            'name.required' => 'Te faltó escribir la tarea'
        ]);
        Task::create([
            'name' => $request->name,
            'fecha' => $request->fecha
        ]);
        return redirect('/tareas')->with('success', 'Tarea guardada');
    }

    //metodo eliminar
    public function destroy($id){
        Task::find($id)->delete();
        return redirect('/tareas');
    }

    //metodo cargar vista para editar
    public function edit($id){
        $tarea=Task::find($id);
        return view('editar', compact('tarea'));
    }
    //metodo update
    public function update(Request $request, $id){
        $request->validate([
            'name' =>'required',
            'fecha' =>'required'

        ], [
            'name.required' => 'La tarea no puede estar vacia',
            'fecha.required' => 'La tfechaarea no puede estar vacia'
        ]);

        $tarea = Task::find($id);
        $tarea->update([
            'name'=> $request->name,
            'fecha'=> $request->fecha
        ]);
        return redirect('/tareas');
    }
}
