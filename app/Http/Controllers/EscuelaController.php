<?php

namespace App\Http\Controllers;

use App\Http\Requests\EscuelaRequest;
use App\Models\Escuela;
use Illuminate\Http\Request;

class EscuelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escuelas = Escuela::orderBy('created_at', 'desc')->get();
        return view('front-end.escuelas.index', compact('escuelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front-end.escuelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\EscuelaRequest
     * @return \Illuminate\Http\Response
     */
    public function store(EscuelaRequest $request)
    {
        $escuela = tap(new Escuela($request->all()))->save();
        return redirect()
            ->route('escuelas.show', ['id' => $escuela->id])
            ->with('status','La escuela se ha creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function show(Escuela $escuela)
    {
        return view('front-end.escuelas.show', compact('escuela'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function edit(Escuela $escuela)
    {
        return view('front-end.escuelas.edit', compact('escuela'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\EscuelaRequest
     * @param  \App\Models\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function update(EscuelaRequest $request, Escuela $escuela)
    {
        $escuela->update($request->all());
        return redirect()
            ->route('escuelas.show', ['id' => $escuela->id])
            ->with('status','La escuela se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escuela $escuela)
    {
        return dd($escuela);
    }
}
