@extends('layouts.carcasa')

@section('title')
    <H1>Registrar local del comerciante</H1>
    <title>Registrar local</title>
@endsection

@section('content')   
    <div class="container col-md-12">
        <div class="border shadow-lg p-3 mb-5 bg-body rounded">
            <div class="d-flex justify-content-left row col-md-12">
                <h5 class="col-6">Nombre del comerciante: {{ $merchant->nombre_comerciante }} {{ $merchant->apellido_comerciante }}</h5>
                <h5 class="col-3"> Con el RFC: {{ $merchant->rfc }}</h5>
                <h5 class="col-3"> Con categoría de: {{ $merchant->categoria->clase }}</h5>
                <form class="row" action="{{ route('sLocal', $merchant->rfc) }}" method="POST">
                    @csrf
                   
                    <div class="mb-3 col-6 border">
                        <label for="dimx" class="form-label">Dimensión X</label>
                        <input type=number step=0.01 name="dimx" autocomplete="off" autofocus="on" min=0.01
                            class="form-control" id="dimx" aria-describedby="xHelp" placeholder="X.XX" 
                            required>
                        <div id="xHelp" class="form-text">Formato: solo números con 2 decimales.</div>
                        @error('dimx')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3 col-6 border">
                        <label for="dimy" class="form-label">Dimensión Y</label>
                        <input type=number step=0.01 name="dimy" autocomplete="off" autofocus="on" min=0.01
                            class="form-control" id="dimy" aria-describedby="yHelp" placeholder="X.XX" 
                            required>
                        <div id="yHelp" class="form-text">Formato: solo números con 2 decimales.</div>
                        @error('dimy')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    @if ($merchant->categoria->id_categoria == 1) <!-- Tianguista -->
                        <input type="hidden" id="cat" name="cat" value="1">
                        <div class="mb-3 col-10 border">
                            <label for="ubicacion" class="form-label">Ubicación</label>
                            <input type=text name="ubicacion" autocomplete="off" autofocus="on" min=0.01
                                class="form-control text-uppercase" id="ubicacion" aria-describedby="ubiHelp" 
                                required>
                            <div id="ubiHelp" class="form-text">Ingresar la ubicación del local.</div>
                            @error('ubicacion')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3 col-3 p-3 border align-items-center d-flex justify-content-left">
                            <label for="tianguis" class="form-label">Tianguis: </label>
                            <select name="tianguis" id="tianguis" class="form-control" >
                                @foreach ($tianguis as $tiangui)
                                    <option value="{{ $tiangui->id_tiangui }}" > {{ $tiangui->nombre_tianguis }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    @if ($merchant->categoria->id_categoria == 2 ) <!-- semi o ambulante -->
                        <input type="hidden" id="cat" name="cat" value="2">
                        <div class="mb-3 col-10 border">
                            <label for="ubicacion" class="form-label">Ubicación</label>
                            <input type=text name="ubicacion" autocomplete="off" autofocus="on"
                                class="form-control text-uppercase" id="ubicacion" aria-describedby="ubiHelp"  
                                required>
                            <div id="ubiHelp" class="form-text">Ingresar la ubicación del local.</div>
                            @error('ubicacion')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3 col-5">
                            <label for="IHour" class="form-label"> Selecciona la hora de inicio. </label>
                            <input type="time" id="IHour" name="IHour" 
                                aria-describedby="iHourHelp" required>
                            <div id="iHourHelp" class="form-text">Formato: 12 horas (07:00 a.m.). </div>
                        </div>
                        <div class="mb-3 col-5">
                            <label for="FHour" class="form-label"> Selecciona la hora de finalización. </label>
                            <input type="time" id="FHour" name="FHour" 
                                aria-describedby="fHourHelp" required>
                            <div id="fHourHelp" class="form-text">Formato: 12 horas (04:00 p.m.).</div>
                        </div>
                    @endif

                    @if ($merchant->categoria->id_categoria == 3)
                        <input type="hidden" id="cat" name="cat" value="3">
                        <div class="mb-3 col-10 border">
                            <label for="ubicacion" class="form-label">Ruta del recorrido</label>
                            <input type=text name="ubicacion" autocomplete="off" autofocus="on"
                                class="form-control text-uppercase" id="ubicacion" aria-describedby="ubiHelp"  
                                required>
                            <div id="ubiHelp" class="form-text">Ingresar la ruta que recorre el comerciante.</div>
                            @error('ubicacion')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3 col-5">
                            <label for="IHour" class="form-label"> Selecciona la hora de inicio. </label>
                            <input type="time" id="IHour" name="IHour" 
                                aria-describedby="iHourHelp" required>
                            <div id="iHourHelp" class="form-text">Formato: 12 horas (07:00 a.m.). </div>
                        </div>
                        <div class="mb-3 col-5">
                            <label for="FHour" class="form-label"> Selecciona la hora de finalización. </label>
                            <input type="time" id="FHour" name="FHour" 
                                aria-describedby="fHourHelp" required>
                            <div id="fHourHelp" class="form-text">Formato: 12 horas (04:00 p.m.).</div>
                        </div>
                    @endif
                        
                    <div class="col-12 ml-4">
                        <button type="submit" class="btn btn-primary col-3">Siguiente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
