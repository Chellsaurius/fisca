@extends('layouts.carcasa')

@section('css')
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('title')
    <h1>Ingresar un nuevo costo para el año en curso</h1>
    <title>Nuevo monto fiscal</title>
@endsection

@section('content')
<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-danger">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="d-flex justify-content-between">
        <h2 class="text-start align-items-start">Registrar el monto para el cobro del año fiscal.</h2>
        <a href="{{ route('montos') }}" class="btn btn-secondary d-flex align-items-end">No es nuevo año, retirada D:</a>
    </div>
    
    <br>
    <form action="{{ route('montos.store') }}" method="POST">
        @csrf
        <div class="mb-3" style="width: 30%">
            <label for="CostOfSpace" class="form-label"> Monto por metro cuadrado: </label>
            $<input type=number step=0.01 name="monto" autocomplete="off" autofocus="on" min=0 max="10.99"
                class="form-control" id="CostOfSpace" aria-describedby="costHelp" placeholder="X.YY" 
                pattern="[0-9]" onkeypress="return !(event.charCode == 46)" onkeydown="return event.keyCode !== 190" required>
            <div id="costHelp" class="form-text">Formato: solo números con 2 decimales.</div>
            @error('monto')
                <span class="invalid-feedback" role="alert">
                    <strong>Error de datos en el monto</strong>
                </span>
            @enderror
          </div>
          <div class="mb-3" style="width: 30%">
            <label for="fiscalYear" class="form-label"> Año fiscal: </label>
            <input type="number" step=1 name="year" autocomplete="off" min=2015 max="2030" 
                class="form-control" id="year" required>
            @error('year')
            <span class="invalid-feedback" role="alert">
                <strong>Error de datos en el año</strong>
            </span>
            @enderror
          </div>
          <div class="mb-3 form-check" style="width: 30%">
            <input type="checkbox" class="form-check-input" id="checkBox" required>
            <label class="form-check-label" for="checkBox">He verificado y quiero ingresar un monto para el nuevo año fiscal :O</label>
          </div>
          <button type="submit" class="btn btn-primary">Registar Monto</button>
    </form>
    
</div>
@endsection
