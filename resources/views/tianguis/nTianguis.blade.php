@extends('layouts.carcasa')

@section('title')
    <h1>Ingresar un nuevo tianguis.</h1>
    <title>Nuevo tianguis</title>
@endsection

@section('content')
    <div class="container border shadow-lg p-3 mb-5 bg-body rounded ">
        @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="d-flex justify-content-end">
            <a href="{{ route('lTianguis') }}" 
                class="btn btn-secondary d-flex align-items-end">
                No quiero registrar OTRO tianguis
            </a>
        </div>
        <br>

        <form action="{{ route('tianguis.store') }}" method="POST" >
            @csrf
            <div class="mb-3 col-5 ">
                <label for="nameTianguis" class="form-label"> Nombre del tianguis</label>
                <input type="text" name="nameTianguis" autofocus="on" autocomplete="off" class="form-control text-uppercase" 
                    id="nameTianguis" aria-describedby="nameHelp" required>
                <div id="nameHelp" class="form-text">Formato: nombre completo.</div>
            </div>
            
            <div class="mb-3 col-3">
                <label for="dayTianguis" class="form-label"> Día del tianguis </label>
                <select name="dayTianguis" id="dayTianguis" class="form-control" >
                    <option value="1" >LUNES</option>
                    <option value="2" >MARTES</option>
                    <option value="3" >MIÉRCOLES</option>
                    <option value="4" >JUEVES</option>
                    <option value="5" >VIERNES</option>
                    <option value="6" >SÁBADO</option>
                    <option value="7" >DOMINGO</option>
                    
                </select>
                
            </div>
        
            <div class="mb-3 col-5">
                <label for="IHourTianguis" class="form-label"> Selecciona la hora de inicio. </label>
                <input type="time" id="IHourTianguis" name="IHourTianguis" 
                    aria-describedby="iHourHelp" min="01:00" max="23:59" required>
                <div id="iHourHelp" class="form-text">Formato: 12 horas (07:00 a.m.). </div>
            </div>
            <div class="mb-3 col-5">
                <label for="FHourTianguis" class="form-label"> Selecciona la hora de finalización. </label>
                <input type="time" id="FHourTianguis" name="FHourTianguis" 
                    aria-describedby="fHourHelp" min="01:00" max="24:00" required>
                <div id="fHourHelp" class="form-text">Formato: 12 horas (04:00 p.m.).</div>
            </div>
            <div class="col-12 ml-4">
                <button type="submit" class="btn btn-primary col-3">Siguiente</button>
            </div>
        </form>
    </div>
@endsection