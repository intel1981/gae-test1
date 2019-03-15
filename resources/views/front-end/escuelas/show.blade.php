@extends('layouts.app-main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-1 mb-1 border-bottom">
    <h1 class="h2" style="color: #607D8B">Detalles de escuela</h1>
    <div class="btn-toolbar mb-1 mb-md-0">
        <a href="{{ route('escuelas.index') }}" class="btn text-white" role="button" aria-pressed="true" style="background-color: #4CAF50">
            <i class="fas fa-arrow-left"></i>
            Regresar
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8 my-3 p-3 rounded bg-white shadow-sm border">
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h6 class="alert-heading">
                    <i class="fas fa-check"></i></i>
                    {{ session('status') }}
                </h6>
            </div>
        @endif
        <div class="form row">
            <div class="form-group col-md-6">
                <label for="cct">C.C.T.</label>
                <input type="text" class="form-control" value="{{ $escuela->cct }}" disabled>
            </div>
        </div>
        <div class="form row">
            <div class="form-group col-md-12">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" value="{{ $escuela->nombre  }}" disabled>
            </div>
        </div>
        <div class="form row">
            <div class="form-group col-md-4">
                <label for="nombre">Nivel</label>
                <input type="text" class="form-control" value="{{ $escuela->nivel  }}" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="nombre">Turno</label>
                <input type="text" class="form-control" value="{{ $escuela->turno  }}" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="nombre">Sostenimiento</label>
                <input type="text" class="form-control" value="{{ $escuela->sostenimiento  }}" disabled>
            </div>
        </div>
        <div class="form row">
            <div class="form-group col-md-3">
                <label for="status">Escuela disponible </label>
                <input type="text" class="form-control" value="{{ $escuela->status ? 'Si' : 'No'  }}" disabled>
            </div>
        </div>

        <div class="float-right">
            <a class="btn text-white" style="background-color: #0D47A1" href="{{ route('escuelas.edit', ['id' => $escuela->id]) }}" id="btn_edit" name="btn_edit" role="button">
                <i class="fas fa-pencil-alt"></i>
                Editar
            </a>
        </div>
    </div>
</div>
@endsection
