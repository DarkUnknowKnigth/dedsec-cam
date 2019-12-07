<?php

namespace App\Http\Controllers;

use App\Place;
use App\Criminal;
use Illuminate\Http\Request;
use File;
use Carbon\Carbon;

class CriminalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('criminals.index')->with([
            'criminals'=>Criminal::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('criminals.create');
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
            'image'=>'file|required',
            'name'=>'string|required',
            'characteristics'=>'string|required',
            'sex'=>'boolean|required',
            'address'=>'string|required',
        ]);
        $place=Place::create([
            'address'=>$request->address,
            'latitude'=>$request->latitude?:'No',
            'longitude'=>$request->longitude?:'No',
        ]);
        $criminal=Criminal::create($request->except('image'));
        if($files = $request->file('image')) {
            $destinationPath = 'public/image/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
         }
         $criminal->update(['imagePath'=>$destinationPath.$profileImage]);
         $criminal->places()->attach($place->id,['fecha'=>Carbon::now()->format('Y-m-d h:m:s')]);
        return redirect()->route('criminals.index')->with([
            'msg'=>'Creado'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function show(Criminal $criminal)
    {
        return view('criminals.show')->with([
            'crime'=>$criminal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function edit(Criminal $criminal)
    {
        return view('criminals.edit')->with([
            'crime'=>$criminal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Criminal $criminal)
    {
        $request->validate([
            'image'=>'file|required',
            'name'=>'string',
            'place_id'=>'numeric',
            'characteristics'=>'string',
            'sex'=>'boolean'
        ]);
        $criminal->update($request->except('image'));
        File::delete(\public_path().$request->imagePath);
        if($files = $request->file('image')) {
            $destinationPath = 'public/image/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
         }
         $criminal->update(['imagePath'=>$destinationPath.$profileImage]);
        return redirect()->route('criminals.index')->with([
            'msg'=>'Actualizado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Criminal  $criminal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Criminal $criminal)
    {
        $criminal->destroy();
        return redirect()->route('criminals.index')->with([
            'msg'=>'Eliminado'
        ]);
    }
}
