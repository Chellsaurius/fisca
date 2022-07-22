@extends('layouts.carcasa')

@section('title')
    <H1>Registrar nuevo local para comerciantes</H1>
    <title>Registrar local</title>
@endsection

@section('content')   
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        
    @endif
    <div class="container col-md-12">
        <div class="border shadow-lg p-3 mb-5 bg-body rounded">
            <div class="d-flex justify-content-left row col-md-12">
                <h5 class="col-6">Nuevo local {{ $merchant->categoria->clase }}. </h5>
                <h5 class="col-3">Del comerciante: {{ $rfc }}</h5>
                
                <form class="row" action="{{ route('sMLocal', $rfc) }}" method="POST">
                    @csrf
                    <input type="hidden" name="rfc" id="rfc" value="{{ $rfc }}">
                    
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
                        <input type=number step=0.01 name="dimy" autocomplete="off" autofocus="off" min=0.01
                            class="form-control" id="dimy" aria-describedby="yHelp" placeholder="X.XX" 
                            required>
                        <div id="yHelp" class="form-text">Formato: solo números con 2 decimales.</div>
                        @error('dimy')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    
                    <div class="mb-3 col-3 border" @if ($merchant->id_categoria == 1) hidden @endif>
                        <label for="IHour" class="form-label"> Selecciona la hora de inicio. </label>
                        <input type="time" class="form-control" id="IHour" name="IHour"  @if ($merchant->id_categoria == 1)value="00:00" disable required @endif 
                            aria-describedby="iHourHelp" >
                        <div id="iHourHelp" class="form-text">Formato: 12 horas (07:00 a.m.). </div>
                    </div>
                    <div class="mb-3 col-3 border" @if ($merchant->id_categoria == 1) hidden @endif>
                        <label for="FHour" class="form-label"> Selecciona la hora de finalización. </label>
                        <input type="time" class="form-control" id="FHour" name="FHour"  @if ($merchant->id_categoria == 1)value="00:00" disable required @endif 
                            aria-describedby="fHourHelp" > 
                        <div id="fHourHelp" class="form-text">Formato: 12 horas (04:00 p.m.).</div>
                    </div>
                    
                    <div class="mb-3 col-12 border" >
                        <label for="ubicacion" class="form-label"> 
                            @if ($merchant->id_categoria == 1 ||$merchant->id_categoria == 2) 
                                Ingresar la ubicación del local. 
                            @else 
                                Ingresar la ruta del comerciante.
                            @endif
                        </label>
                        <input type=text name="ubicacion" autocomplete="off" autofocus="on" min=0.01
                            class="form-control text-uppercase" id="ubicacion" aria-describedby="ubiHelp" 
                            required>
                        <div id="ubiHelp" class="form-text"> 
                            @if ($merchant->id_categoria == 1 ||$merchant->id_categoria == 2) 
                                Ingresar la ubicación del local. 
                            @else 
                                Ruta de comerciante
                            @endif
                        </div>
                        @error('ubicacion')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3 col-5 p-3 border" @if ($merchant->id_categoria != 1) hidden @endif>  
                        <label for="tianguis" class="form-label">Tianguis: </label>
                        <select name="tianguis" id="tianguis" class="form-control" >
                            @if ($merchant->id != 1)
                                <option value="" ></option>   
                            @endif
                            @foreach ($tianguis as $tiangui)
                                @for ($i=0; $i<strlen($dias); $i++)
                                {
                                    @if ($dias[$i] == $tiangui->dia)
                                        <option value="{{ $tiangui->id_tianguis }}" > {{ $tiangui->nombre_tianguis }}</option>
                                    @endif
                                }
                                @endfor
                                
                            @endforeach
                        </select>
                    
                    </div>
                   
                    <div class="col-12 ml-4">
                        <button type="submit" class="btn btn-primary col-3">Siguiente</button>
                    </div>
                </form>
            </div>
        </div>
        
         <div id="derecha" style="width: 349px; float:right; height:220px;">
            <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->backgroundColor(204,255,229)->size(200)->generate('http://localhost:8000'.'/'.@$rfc)) }} ">
        </div>
    </div>

@endsection
