<?php

namespace App\Http\Controllers;

use App\Scene;
use App\Place;
use App\Crime;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CrimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('crimes.index')->with([
            'crimes'=>Crime::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crimes.create');
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
            'establishment'=>'string|required',
            'gun'=>'string|required',
            'vehicle'=>'boolean|required',
            'type_id'=>'numeric',
            'place_id'=>'numeric',
            'scene_id'=>'numeric'
        ]);
        $place = Place::create([
            'address'=>$request->address,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude
        ]);
        $crime=Crime::create([
            'place_id'=>$place->id,
            'vehicle'=>$request->vehicle,
            'gun'=>$request->gun,
            'establishment'=>$request->establishment,
            'date'=>Carbon::now(),
            'type_id'=>$request->type_id,

        ]);
        return redirect()->route('crimes.index')->with([
            'msg'=>'Creado'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function show(Crime $crime)
    {
        return view('crimes.show')->with([
            'crime'=>$crime
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function edit(Crime $crime)
    {
        return view('crimes.edit')->with([
            'crime'=>$crime
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crime $crime)
    {
        $request->validate([
            'date'=>'date',
            'establishment'=>'string',
            'gun'=>'string',
            'vehicle'=>'boolean',
            'type_id'=>'numeric',
            'place_id'=>'numeric',
            'scene_id'=>'numeric'
        ]);
        $crime->update($request->all());
        return redirect()->route('crimes.index')->with([
            'msg'=>'Actualizado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crime $crime)
    {
        $crime->destroy();
        return redirect()->route('crimes.index')->with([
            'msg'=>'Eliminado'
        ]);
    }
}
