@extends('layouts.app-main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-1 mb-1 border-bottom">
    <h1 class="h2" style="color: #607D8B">Ciclos Escolares</h1>
    <div class="btn-toolbar mb-1 mb-md-0">
        <a href="{{ route('ciclos.create') }}" class="btn text-white" role="button" aria-pressed="true" style="background-color: #4CAF50">
            <i class="fas fa-plus"></i>
            Nuevo Ciclo
        </a>
    </div>
</div>
@endsection()
