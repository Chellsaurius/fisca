@extends('layouts.carcasa')

@section('title')
    <H1>Registrar nuevo pago para el comerciantes</H1>
    <title>Registrar pago</title>
@endsection

@section('content')

    <div class="container">
        <div class="border shadow-lg p-3 mb-5 bg-body rounded">
            @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="d-flex justify-content-end">
                <a href="{{ route('home') }}" class="btn btn-secondary d-flex align-items-end"><i class="fa-solid fa-delete-left"></i>Regresar </a>
            </div>
            <br>
            <div class="row justify-content-end">
                <h5 class="col">Pago de {{ $merchant->nombre_comerciante}} {{ $merchant->apellido_comerciante}} con el RFC: {{ $rfc }}</h5>
                <h5 class="col">Para el local ubicado en; {{ $local->ubicacion_reco }} </h5>
            </div>
            <br>
            <div class="row justify-content-end">
                <h5 class="col">Con dimenciones de: {{ $local->dimx }} x {{ $local->dimy }} mentos, en el horario de: {{ $local->lhora_inicio }} a {{ $local->lhora_final }} </h5>
            </div>
            {{ $merchant }}
            <br>
            {{ $registration }}
            <br>
            {{ $local }}
            <br>
            
            <form action="{{ route('montos.store') }}" method="POST" >
                @csrf
                <div class="d-flex justify-content-between row border">
                    <div class="mb-3 col-4 border">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" value="{{ $merchant->nombre_comerciante}} {{ $merchant->apellido_comerciante}}" id="name" aria-describedby="nameHelp" disabled>
                        <div id="nameHelp" class="form-text">Nombre del que pagó.</div>
                        @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3 col-4 border">
                        <label for="ubication" class="form-label">Ubicación</label>
                        <input type="text" class="form-control" value="{{ $local->ubicacion_reco }}" id="ubication" aria-describedby="ubicationHelp" disabled>
                        <div id="ubicationHelp" class="form-text">Ubicación del local.</div>
                        @error('ubication')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3 col-3 border">
                        <label for="folio" class="form-label">Folio</label>
                        <input type="text" class="form-control" id="folio" aria-describedby="folioHelp">
                        <div id="folioHelp" class="form-text">Folio del pago.</div>
                        @error('folio')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 border">
                        <label for="business" class="form-label">Giro</label>
                        <input type="text" class="form-control" value="{{ $merchant->giro }}" id="business" aria-describedby="businessHelp" disabled>
                        <div id="businessHelp" class="form-text">Giro(s).</div>
                        @error('business')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3 col-4 border">
                        <label for="days" class="form-label">Dias</label>
                        <input type="text" class="form-control" value="{{ $merchant->dias }}" id="days" aria-describedby="daysHelp" disabled>
                        <div id="daysHelp" class="form-text">Dias que labora el comerciante.</div>
                        @error('days')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3 col-4 border col align-self-center">
                        <label for="IDateTianguis" class="form-label"> Selecciona la Fecha de inicio. </label>
                        <input type="date" id="IDatePayment" name="IDatePayment" 
                            aria-describedby="iDateHelp" required>
                        <div id="iDateHelp" class="form-text">Formato: 12 horas (07:00 a.m.). </div>
                    </div>
                    <div class="mb-3 col-4 border col align-self-center">
                        <label for="FDateTianguis" class="form-label"> Selecciona la hora de finalización. </label>
                        <input type="date" id="FDateTianguis" name="FDateTianguis" 
                            aria-describedby="fDateHelp" required>
                        <div id="fDateHelp" class="form-text">Formato: 12 horas (04:00 p.m.).</div>
                    </div>
                    <div class="mb-3 col-3 border">
                        <label for="rfc" class="form-label">RFC</label>
                        <input type="text" class="form-control" id="rfc" value="{{ $merchant->rfc }}" aria-describedby="folioHelp" disabled>
                        <div id="rfcHelp" class="form-text"></div>
                        
                    </div>
                    
                    <div class="mb-3 p-3form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary col-3">Submit</button>
                </div>
            </form>
        </div>
    </div>


@endsection