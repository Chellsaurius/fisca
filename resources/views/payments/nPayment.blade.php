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
          
            {{ $merchant }}
            <br>
            {{ $registration }}
            <br>
            {{ $local }}
            <br>
            {{ $contador }}
            <br>
            {{ $monto }}
            
            <form action="{{ route('payment.save') }}" method="POST" >
                @csrf
                <input type="hidden" name="id_comerciante" value="{{ $merchant->id_comerciante }}">
                <input type="hidden" name="id_local" value="{{ $registration->id_local }}">
                <div class="d-flex justify-content-between row border">
                    <div class="mb-3 col-4 border">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{ $merchant->nombre_comerciante}} {{ $merchant->apellido_comerciante}}" id="name" aria-describedby="nameHelp" disabled>
                        <div id="nameHelp" class="form-text">Nombre del que pagó.</div>
                        @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 border">
                        <label for="business" class="form-label">Giro</label>
                        <input type="text" name="business" class="form-control" value="{{ $merchant->giro }}" id="business" aria-describedby="businessHelp" disabled>
                        <div id="businessHelp" class="form-text">Giro(s).</div>
                        @error('business')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3 col-2 border">
                        <label for="folio" class="form-label">Folio</label>
                        <input type="text" name="folio" class="form-control" id="folio" aria-describedby="folioHelp" required>
                        <div id="folioHelp" class="form-text">Folio del pago.</div>
                        @error('folio')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 border">
                        <label for="ubication" class="form-label">Ubicación</label>
                        <input type="text" name="ubication" class="form-control" value="{{ $local->ubicacion_reco }}" id="ubication" aria-describedby="ubicationHelp" disabled>
                        <div id="ubicationHelp" class="form-text">Ubicación del local.</div>
                        @error('ubication')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 border">
                        <label for="days" class="form-label">Dias</label>
                        <input type="text" name="days" class="form-control" value="{{ $merchant->dias }}" id="days" aria-describedby="daysHelp" disabled>
                        <div id="daysHelp" class="form-text">Dias que labora el comerciante.</div>
                        @error('days')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3 col-3 border col align-self-center">
                        <label for="IDateTianguis" class="form-label"> Selecciona la fecha de inicio. </label>
                        <input type="date" id="IDatePayment" name="IDatePayment" 
                            aria-describedby="iDateHelp" required>
                        <div id="iDateHelp" class="form-text">Fecha en la que inicia el permiso. </div>
                    </div>
                    <div class="mb-3 col-3 border col align-self-center">
                        <label for="FDateTianguis" class="form-label"> Selecciona la fecha de finalización. </label>
                        <input type="date" id="FDateTianguis" name="FDateTianguis" 
                            aria-describedby="fDateHelp" required>
                        <div id="fDateHelp" class="form-text">Fecha en la que termina el permiso.</div>
                    </div>
                    <div class="mb-3 col-3 border">
                        <label for="rfc" class="form-label">RFC</label>
                        <input type="text" name="rfc" class="form-control" id="rfc" value="{{ $merchant->rfc }}" aria-describedby="folioHelp" disabled>
                        <div id="rfcHelp" class="form-text">Registro federal del contribuyente</div>
                        
                    </div>
                    <div class="mb-3 col-3 border">
                        <label for="cost" class="form-label">Valor del m^2.</label>
                        <input type="text" name="cost" class="form-control" id="cost" value="{{ $monto->monto }}" aria-describedby="costHelp" disabled>
                        <div id="costHelp" class="form-text">Costo del m^2 del año fiscal en curso </div>
                    </div>
                    <div class="mb-3 col-3 border">
                        <label for="measurements" class="form-label">Medidas.</label>
                        <input type="text" name="measurment" class="form-control" id="measurements" value="{{ $local->dimx }} x {{ $local->dimy }}" aria-describedby="measurementsHelp" disabled>
                        <div id="measurementHelp" class="form-text">Medidas del local del comerciante </div>
                    </div>
                    
                    <div class="mb-3 col-3 border">
                        <label for="value" class="form-label">Cantidad del pago por los día</label>
                        $<input type="text" name="value" class="form-control" id="value" value="{{ $total }}" aria-describedby="valueHelp" disabled>
                        <div id="valueHelp" class="form-text">Cantidad que el ciudadano va a pagar </div>
                        
                    </div>
                    
                    <div class="mb-3 pl-5 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1">Los datos son correctos</label>
                    </div>
                    <button type="submit" class="btn btn-primary col-3 ">Generar pago</button> 
                    
                </div>
            </form> 
        </div>
        @section('js')
            var = 

        @endsection
    </div>


@endsection