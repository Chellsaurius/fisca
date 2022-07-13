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

            <h5>Pago de {{ $rfc }}</h5>
            <div class="d-flex justify-content-between">
                
                <a href="{{ route('montos') }}" class="btn btn-secondary d-flex align-items-end">   <i class="fa-solid fa-delete-left"></i>Regresar </a>
            </div>
            
            <br>
            <form action="{{ route('montos.store') }}" method="POST">
                @csrf
            </form>
        </div>
    </div>


@endsection