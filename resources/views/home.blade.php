@extends('layouts.carcasa')

@section('css')
@endsection

@section('title')
    <h1>Inicio</h1>
@endsection

@section('content')
<div class="container">
    @if (session('message'))
        @if (session('message')=="success")
            <div class="alert alert-success">
                El comerciante ha sido registrado correctamente. 
            </div>
        @else
            <div class="alert alert-error">
                ¡Chale! Algo salió mal.
            </div>
        @endif
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
