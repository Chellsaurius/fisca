@extends('layouts.carcasa')

@section('content')
    @section('title')
        <h1>Registrar comerciantes</h1>
        <title>Carcase</title>
    @endsection
    <div class="container">
        <div class="border shadow-lg p-3 mb-5 bg-body rounded">
            <div class="col-md-12">
                <form class="row" action="{{ route('gComerciantes') }}" method="POST">
                    @csrf
                    <div class="d-flex justify-content-between row">

                        <div class="mb-3 col-6 border">
                            <label for="nombre" class="form-label">Nombre(s)</label>
                            <input type="text" name="nombre" class="form-control text-uppercase  @error('nombre') is-invalid @enderror " value="{{ old('nombre') }}"
                                id="nombre" aria-describedby="nombreHelp" autofocus required>
                            <div id="nombreHelp" class="form-text">Ingrese el o los nombres.</div>
                            @error('nombre')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3 col-6 border">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control text-uppercase @error('apellidos') is-invalid @enderror" value="{{ old('apellidos') }}"
                                id="apellidos" aria-describedby="nameHelp" required>
                            <div id="apellidosHelp" class="form-text">Ingrese los apellidos.</div>
                            @error('apellidos')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3 col-4 border">
                            <label for="rfc" class="form-label">RFC</label>
                            <input type="text" name="rfc" class="form-control text-uppercase @error('rfc') is-invalid @enderror" value="{{ old('rfc') }}"
                                pattern="[0-9]" onkeypress="return !(event.charCode == 46)" onkeydown="return event.keyCode !== 190"                            
                                id="rfc" aria-describedby="nameHelp" required>
                            <div id="rfcHelp" class="form-text">Ingrese el RFC.</div>
                            @error('rfc')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3 col-4 border">
                            <label for="telefono1" class="form-label">Teléfono 1</label>
                            <input type=text name="telefono1" class="form-control @error('telefono1') is-invalid @enderror" value="{{ old('telefono1') }}"
                                pattern="[0-9]" onkeypress="return !(event.charCode == 46)" onkeydown="return event.keyCode !== 190"
                                id="telefono1" aria-describedby="nameHelp" required>
                            <div id="telefono1Help" class="form-text">Ingrese el teléfono principal.</div>
                            @error('telefono1')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <!-- autocomplete="off" -->
                        </div>
                        <div class="mb-3 col-4 border">
                            <label for="telefono2" class="form-label">Teléfono 2</label>
                            <input type=text name="telefono2" class="form-control  @error('telefono2') is-invalid @enderror" value="{{ old('telefono2') }}"
                                pattern="[0-9]" onkeypress="return !(event.charCode == 46)" onkeydown="return event.keyCode !== 190"
                                id="telefono2" aria-describedby="nameHelp" >
                            <div id="telefono2Help" class="form-text">Ingrese el teléfono alternativo.</div>
                            @error('telefono2')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3 col-9 border">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type=text name="direccion" class="form-control  @error('direccion') is-invalid @enderror" value="{{ old('direccion') }}"
                                id="direccion" aria-describedby="nameHelp" required>
                            <div id="direccionHelp" class="form-text">Ingrese la dirección personal del comerciante.</div>
                            @error('direccion')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3 col-3 p-3 border align-items-center d-flex justify-content-left">
                            <label for="categoria" class="form-label">Tipo de comerciante: </label>
                            <select name="categoria" id="categoria" class="form-control" >
                                @foreach ($types as $type)
                                    <option value="{{ $type->id_categoria }}" >{{ $type->clase }}</option>
                                @endforeach
                                
                            </select>
                            
                        </div>
                        <div class="mb-3 col-12 border form-control ">
                            <div class="row " >
                                <div class="@error('dia') is-invalid @enderror"></div>
                                <label for="dias" class="form-label">Días laborales</label>
                                <div class="d-flex justify-content-left col-1 border align-items-center p-2">
                                    <input type="checkbox" name="dia[]" value="Lunes" class="form-check-input m-1" id="Lunes">
                                    <label class="form-check-label" for="Lunes"> Lunes</label>
                                </div>

                                <div class="d-flex justify-content-left col-1 border align-items-center p-2">
                                    <input type="checkbox" name="dia[]" value="Martes" class="form-check-input m-1" id="Martes">
                                    <label class="form-check-label" for="Martes"> Martes</label>
                                </div>
                                <div class="d-flex justify-content-left col-1 border align-items-center p-2">
                                    <input type="checkbox" name="dia[]" value="Miércoles" class="form-check-input m-1" id="Miércoles">
                                    <label class="form-check-label" for="Miércoles"> Miércoles</label>
                                </div>
                                <div class="d-flex justify-content-left col-1 border align-items-center p-2">
                                    <input type="checkbox" name="dia[]" value="Jueves" class="form-check-input m-1" id="Jueves">
                                    <label class="form-check-label" for="Jueves"> Jueves</label>
                                </div>
                                <div class="d-flex justify-content-left col-1 border align-items-center p-2">
                                    <input type="checkbox" name="dia[]" value="Viernes" class="form-check-input m-1" id="Viernes">
                                    <label class="form-check-label" for="Viernes"> Viernes</label>
                                </div>
                                <div class="d-flex justify-content-left col-1 border align-items-center p-2">
                                    <input type="checkbox" name="dia[]" value="Sábado" class="form-check-input m-1" id="Sábado">
                                    <label class="form-check-label" for="Sábado"> Sábado</label>
                                </div>
                                <div class="d-flex justify-content-left col-1 border align-items-center p-2">
                                    <input type="checkbox" name="dia[]" value="Domingo" class="form-check-input m-1" id="Domingo">
                                    <label class="form-check-label" for="Domingo"> Domingo</label>
                                </div>
                                @error('dia')
                                    <span class="invalid-feedback col-12 p-3" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="mb-3 col-12 border form-control ">
                            <div class="row " >
                                <div class="@error('giro') is-invalid @enderror"></div>
                                <label for="bussinnes" class="form-label ">Giro(s)</label>
                                <div class="d-flex justify-content-left col-2 border align-items-center">
                                    <input type="checkbox" name="giro[]" value="AGUAS" class="form-check-input m-1" id="aguas">
                                    <label class="form-check-label" for="aguas"> Aguas</label>
                                </div>
                                <div class="d-flex justify-content-left border col-2 align-items-center p-3">
                                    <input type="checkbox" name="giro[]" value="ROPA" class="form-check-input m-1" id="ropa">
                                    <label class="form-check-label" for="ropa">Ropa</label>
                                </div>
                                <div class="d-flex justify-content-left  col-2 border align-items-center p-3">
                                    <input type="checkbox" name="giro[]" value="CALZADO" class="form-check-input m-1" id="calzado">
                                    <label class="form-check-label" for="calzado">Calzado</label>
                                </div>
                                <div class="d-flex justify-content-left  col-2 border align-items-center p-3">
                                    <input type="checkbox" name="giro[]" value="FERRETERÍA" class="form-check-input m-1" id="ferretería">
                                    <label class="form-check-label" for="ferretería">Ferretería</label>
                                </div>
                                <div class="d-flex justify-content-left  col-2 border align-items-center p-3">
                                    <input type="checkbox" name="giro[]" value="COMIDA" class="form-check-input m-1" id="comida">
                                    <label class="form-check-label" for="comida">Comida</label>
                                </div>
                                <div class="d-flex justify-content-left  col-4 border align-items-center p-3">
                                    <input type="checkbox" name="giro[]" value="PELÍCULAS EN BLUE-RAY ORIGINALES EN FULL HD 4K SONIDO SURROUND 7.1 1 LINK MEGA" 
                                        class="form-check-input m-1" id="pelis">
                                    <label class="form-check-label" for="pelis">Películas en blue-ray originales en full HD 4k sonido surround 7.1, 1 link MEGA</label>
                                </div>
                                <div class="d-flex justify-content-left  col-2 border align-items-center p-3">
                                    <input type="checkbox" name="giro[]" value="ACCESORIOS DE TELÉFONOS" class="form-check-input m-1" id="phones">
                                    <label class="form-check-label" for="phones">Accesorios de teléfonos</label>
                                </div>
                                <div class="d-flex justify-content-left  col-2 border align-items-center p-3">
                                    <input type="checkbox" name="giro[]" value="CORTINAS" class="form-check-input m-1" id="cortinas">
                                    <label class="form-check-label" for="cortinas">Cortinas</label>
                                </div>
                                <div class="d-flex justify-content-left  col-2 border align-items-center p-3">
                                    <input type="checkbox" name="giro[]" value="HELADOS" class="form-check-input m-1" id="helados">
                                    <label class="form-check-label" for="helados">Helados</label>
                                </div>
                                <div class="d-flex justify-content-left  col-2 border align-items-center p-3">
                                    <input type="checkbox" name="giro[]" value="PAPAS" class="form-check-input m-1" id="papas">
                                    <label class="form-check-label" for="papas">Papas</label>
                                </div>
                                <div class="d-flex justify-content-left  col-2 border align-items-center p-3">
                                    <input type="checkbox" name="giro[]" value="MÚSICA" class="form-check-input m-1" id="music">
                                    <label class="form-check-label" for="music">Música en formato RAW a 320kb/s</label>
                                </div>
                                <div class="d-flex justify-content-left  col-2 border align-items-center p-3">
                                    <input type="checkbox" name="giro[]" value="ELECTRODOMÉSTICOS" class="form-check-input m-1" id="electro">
                                    <label class="form-check-label" for="electro">Electrodomésticos</label>
                                </div>
                                <div class="d-flex justify-content-left  col-2 border align-items-center p-3">
                                    <input type="checkbox" name="giro[]" value="DULCES" class="form-check-input m-1" id="dulces">
                                    <label class="form-check-label" for="dulces">Dulces</label>
                                </div>
                                <div class="mb-3 col-12 p-3">
                                    <input type="checkbox" value="otros" class="form-check-input m-1 @error('otros') is-invalid @enderror" id="otros" >
                                    <label class="form-label" for="otros">Otros</label>
                                    <input type="text" name="otrosg" class="form-control text-uppercase" id="otrosg" aria-describedby="giroHelp" disabled>
                                    <div id="giroHelp" class="form-text">Ingrese el o los giros del comerciante si no están en la parte de arriba, separados por "," sin "Y" al final.</div>
                                </div>
                                
                            </div>
                            
                        </div>
                        @error('giro')
                            <span class="invalid-feedback mb-3 col-12 p-3" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                        @error('otros')
                            <span class="invalid-feedback mb-3 col-12 p-3" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    
                    <div class="col-12 ml-4">
                        <div class="mb-3 form-check col-3 ">
                            <input type="checkbox" class="form-check-input" id="finalCheck" required>
                            <label class="form-check-label" for="finalCheck">Los datos del comerciante son correctos </label>
                        </div>
                    </div>
                    <div class="col-12 ml-4">
                        <button type="submit" class="btn btn-primary col-3">Siguiente</button>
                    </div>
                </form>
            </div>
        </div>  
        @section('js')
            <script>
                document.getElementById('otros').onchange = function() {
                    document.getElementById('otrosg').disabled = !this.checked;
                };
            </script>
            <script>
                function dias(val) {
                    var type ="";
                    if(val == 1)
                    {
                        type = "Tianguista";
                    }
                    if(val == 2)
                    {
                        type = "Semi-fijo";
                    }
                    if(val == 3){
                        type = "Ambulante";
                    }
                    alert("The input value has changed. The new value is: " + type);
                }
            </script>
        @endsection
    </div>
@endsection
