@extends('layouts.carcasa')

@section('css')

@endsection

@section('title')
    <h1>Registrar a un nuevo inspector.</h1>
    <title>Nuevo inspector</title>
@endsection

@section('content')
    <div class="container">
        <div class="border shadow-lg p-3 mb-5 bg-body rounded">
            @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class=" d-flex align-items-end">
            
                <a href="{{ route('inspectores') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left-long"></i> No quiero registrar a otro esclavo.
                </a>
            </div>
            <br>
            <form action="{{ route('inspector.store') }}" method="POST">
                @csrf
                
                <div class="mb-3 col-7 border">
                    <label for="name" class="form-label">Nombre Completo</label>
                    <input type="text" name="name" class="form-control text-uppercase  @error('name') is-invalid @enderror " value="{{ old('name') }}"
                        id="name" aria-describedby="nameHelp" autocomplete="off" autofocus required>
                    <div id="nameHelp" class="form-text">Ingrese el o los nombres.</div>
                    @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="mb-3 col-7 border">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" class="form-control text-uppercase  @error('email') is-invalid @enderror " value="{{ old('email') }}"
                        id="email" aria-describedby="emailHelp" autocomplete="off"  size="30" required>
                    <div id="emailHelp" class="form-text">Ingrese el correo electrónico de la persona.</div>
                    @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="mb-3 col-7 border">
                    <label for="pass">Nueva contraseña</label>
                    <input type="password" name="pass" class="form-control col-6" id="pass" 
                        aria-describedby="passlHelp" placeholder="Nueva contraseña" required>
                    <small id="passlHelp" class="form-text text-muted">Minimo 8 caracteres.</small>
                </div>
  
                <div class="mb-3 col-7 border">
                    <label for="pass_confirmation">Verifique la contraseña</label>
                    <input type="password" name="pass_verified" class="form-control col-6" id="pass_confirmation" 
                    aria-describedby="vPasslHelp" placeholder="Verifique la contraseña" required>
                </div>
                  
                <div class="mb-3 form-check" style="width: 30%">
                    <input type="checkbox" class="form-check-input" id="checkBox" required>
                    <label class="form-check-label" for="checkBox">He verificado y quiero ingresar un nuevo inspector</label>
                </div>
                <button type="submit" class="btn btn-primary">Registar inspector</button>
            </form>
        </div>
    </div>
@endsection