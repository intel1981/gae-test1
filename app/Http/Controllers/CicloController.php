<?php

namespace App\Http\Controllers;

use App\Http\Requests\CicloRequest;
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
     * @param  App\Http\Requests\CicloRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CicloRequest $request)
    {
        $count = Ciclo::where('inicio', $request->get('inicio'))
                 ->where('fin', $request->get('fin'))->count();
        if($count){
            return back()->withInput()->with('status', 'El ciclo escolar ya existe.');
        }
        $ciclo = tap(new Ciclo($request->all()))->save();
        return redirect()
            ->route('ciclos.show', ['id' => $ciclo->id])
            ->with('status','El ciclo escolar se ha creado correctamente');
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
