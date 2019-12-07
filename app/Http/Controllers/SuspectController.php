<?php

namespace App\Http\Controllers;

use App\Suspect;
use Illuminate\Http\Request;

class SuspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('suspects.index')->with([
            'suspects'=>Suspect::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suspects.create');
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
            'name'=>'string|required',
            'job'=>'string|required',
            'crime_id'=>'numeric|required',

        ]);
        return redirect()->route('suspects.index')->with([
            'msg'=>'Creado'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suspect  $suspect
     * @return \Illuminate\Http\Response
     */
    public function show(Suspect $suspect)
    {
        return view('suspects.show')->with([
            'suspect'=>$suspect
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suspect  $suspect
     * @return \Illuminate\Http\Response
     */
    public function edit(Suspect $suspect)
    {
        return view('suspects.edit')->with([
            'suspect'=>$suspect
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suspect  $suspect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suspect $suspect)
    {
        $request->validate([
            'date'=>'date|required',
            'establishment'=>'string|required'
        ]);
        $Suspect->update($request->all());
        return redirect()->route('suspects.index')->with([
            'msg'=>'Actualizado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suspect  $suspect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suspect $suspect)
    {
        $Suspect->destroy();
        return redirect()->route('suspects.index')->with([
            'msg'=>'Eliminado'
        ]);
    }
}
