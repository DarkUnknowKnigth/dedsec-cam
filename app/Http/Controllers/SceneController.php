<?php

namespace App\Http\Controllers;

use App\Scene;
use Illuminate\Http\Request;

class SceneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('scenes.index')->with([
            'scenes'=>Scene::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('scenes.create');
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
            'imagePath'=>'string|required',
            'crime_id'=>'numeric|required',
            'criminal_id'=>'numeric',
        ]);
        return redirect()->route('scenes.index')->with([
            'msg'=>'Creado'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Scene  $scene
     * @return \Illuminate\Http\Response
     */
    public function show(Scene $scene)
    {
        return view('scenes.show')->with([
            'scene'=>$scene
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Scene  $scene
     * @return \Illuminate\Http\Response
     */
    public function edit(Scene $scene)
    {
        return view('scenes.edit')->with([
            'scene'=>$scene
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Scene  $scene
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scene $scene)
    {
        $request->validate([
            'imagePath'=>'string|required',
            'crime_id'=>'numeric|required',
            'criminal_id'=>'numeric',
        ]);
        $scene->update($request->all());
        return redirect()->route('scenes.index')->with([
            'msg'=>'Actualizado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scene  $scene
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scene $scene)
    {
        $scene->destroy();
        return redirect()->route('scenes.index')->with([
            'msg'=>'Eliminado'
        ]);
    }
}
