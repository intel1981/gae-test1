<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\EscuelaRequest;
use App\Models\Admin\Nivel;
use App\Models\Admin\Tipo;
use App\Models\Escuela;
use Illuminate\Http\Request;

class EscuelaController extends Controller
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
        if(Auth::user()->hasPermissionTo('escuelas.index')) {
            $escuelas = Escuela::orderBy('created_at', 'desc')->with('nivel')->get();
            return view('front-end.escuelas.index', compact('escuelas'));
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
        if(Auth::user()->hasPermissionTo('escuelas.create')){
            return view('front-end.escuelas.create2',[
                'tipos' => Tipo::orderBy('id','asc')->get()
            ]);
        }
        else{
            abort(403);
        }

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
        return response()
            ->json([
                'message'  => 'Los datos se han guardado correctamente',
                'location' => route('escuelas.show', ['id' => $escuela->id])
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function show(Escuela $escuela)
    {
        if(Auth::user()->hasPermissionTo('escuelas.show')) {
            return view('front-end.escuelas.show', compact('escuela'));
        }
        else{
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function edit(Escuela $escuela)
    {
        if(Auth::user()->hasPermissionTo('escuelas.edit')) {
            return view('front-end.escuelas.edit2', [
                'escuela' => $escuela,
                'tipos' => Tipo::orderBy('id', 'asc')->get(),
                'niveles' => Tipo::find($escuela->tipo_id)->niveles,   /*TIPOS:NIVELES*/
                'servicios' => Nivel::find($escuela->nivel_id)->servicios /*NIVELES:SERVICIOS*/
            ]);
        }
        else{
            abort(403);
        }
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
        return response()
            ->json([
                'message'  => 'Los datos se han actualizado correctamente',
                'location' => route('escuelas.show', ['id' => $escuela->id])
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escuela $escuela)
    {
        $escuela->delete();
        return response()->json([
            'success' => true
        ]);
    }
}
