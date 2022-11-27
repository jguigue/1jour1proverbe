<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proverbe;

class ProverbeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proverbes = Proverbe::all();
        return response()->json($proverbes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proverbes = new Proverbe([
            'proverbe' => $request->input('proverbe'),
            'auteur' => $request->input('auteur'),
        ]);
        $proverbes->save();
        return response()->json('Proverbe ajouté!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proverbes = Proverbe::find($id);
        return response()->json($proverbes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proverbes = Proverbe::find($id);
        $proverbes->update($request->all());
        return response()->json('Proverbe mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proverbes = Proverbe::find($id);
        $proverbes->delete();
        return response()->json(' Proverbe suprimé');
    }
}