<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use Illuminate\Http\Request;

class CicloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciclos = Ciclo::orderBy('created_at', 'asc')->get();
        return view('front-end.ciclos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front-end.ciclos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function show(Ciclo $ciclo)
    {
        return view('front-end.ciclos.show', compact('ciclo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function edit(Ciclo $ciclo)
    {
        return view('front-end.ciclos.edit', compact('ciclo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciclo $ciclo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ciclo $ciclo)
    {
        //
    }
}
