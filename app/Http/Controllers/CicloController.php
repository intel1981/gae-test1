<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\CicloRequest;
use App\Models\Ciclo;
use Illuminate\Http\Request;

class CicloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasPermissionTo('ciclos.index')) {
            $ciclos = Ciclo::all();
            return view('front-end.ciclos.index', compact('ciclos'));
        }
        else{
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->hasPermissionTo('ciclos.create')) {
            return view('front-end.ciclos.create');
        }
        else{
            abort(403);
        }
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
        $ciclo = tap(new Ciclo($request->all()))->save();
        return response()
            ->json([
                'message'  => 'Los datos se han guardado correctamente',
                'location' => route('ciclos.show', ['id' => $ciclo->id])
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function show(Ciclo $ciclo)
    {
        if(Auth::user()->hasPermissionTo('ciclos.show')) {
            return view('front-end.ciclos.show', compact('ciclo'));
        }
        else{
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function edit(Ciclo $ciclo)
    {
        if(Auth::user()->hasPermissionTo('ciclos.edit')) {
            return view('front-end.ciclos.edit', compact('ciclo'));
        }
        else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ciclo  $ciclo
     * @param  \App\Http\Requests\CicloRequest
     * @return \Illuminate\Http\Response
     */
    public function update(CicloRequest $request, Ciclo $ciclo)
    {
        $ciclo->update($request->all());
        return response()
            ->json([
                'message'  => 'Los datos se han actualizado correctamente',
                'location' => route('ciclos.show', ['id' => $ciclo->id])
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ciclo $ciclo)
    {
        $ciclo->delete();
        return response()->json([
            'success' => true
        ]);
    }
}
