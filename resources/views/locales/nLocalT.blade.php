@extends('layouts.carcasa')

@section('title')
    <H1>Registrar nuevo local para comerciantes</H1>
    <title>Registrar local</title>
@endsection

@section('content')   
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="container col-md-12">
        <div class="border shadow-lg p-3 mb-5 bg-body rounded">
            <div class="d-flex justify-content-left row col-md-12">
                <h5 class="col-6">Nuevo local: </h5>
                
                <form class="row" action="{{ route('sLocal') }}" method="POST">
                    @csrf
                    <input type="hidden" name="cat" id="cat" value="1">
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

                    
                        <input type="hidden" id="cat" name="cat" value="1">
                        <div class="mb-3 col-12 border">
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
                        
                    <div class="col-12 ml-4">
                        <button type="submit" class="btn btn-primary col-3">Siguiente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
