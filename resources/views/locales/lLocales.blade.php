@extends('layouts.carcasa')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('title')
    <H1>Lista de locales </H1>
    <title>Lista de locales</title>
@endsection

@section('content')    
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="d-flex justify-content-between" >
            <a href="{{ route('nLocalT') }}" class="btn btn-secondary">Registrar nuevo local de tianguis</a>
            <!-- <a href="{{ route('nLocalA') }}" class="btn btn-secondary">Registrar nuevo local ambulante o semi-fijo</a> -->
        </div>
        <br>

        <table id="montos" class="table table-striped dt-responsive nowrap table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>RFC</th>
                    <th>Ubicación o recorrido</th>
                    <th>Hora de inicio</th>
                    <th>Hora de finalización</th>
                    <th>Tianguis</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($locales as $local)
    
                    <tr>
                        <td>{{ $local->nombre_comerciante }} {{ $local->apellido_comerciante }}</td>
                        <td>{{ $local->rfc }}</td>
                        <td>{{ $local->ubicacion_reco }}</td>
                        <td>{{ $local->lhora_inicio }}</td>
                        <td>{{ $local->lhora_final }}</td>
                        <td>{{ $local->nombre_tianguis }}</td>
                        
                    </tr>
                    
                
                @endforeach
    
                
            </tbody>
        </table>
        @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" ></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js" ></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js" ></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js" ></script>
        <script>
            $(document).ready(function() {
                $('#montos').DataTable({
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Entradas",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                });
            });
        </script>
    @endsection
    </div>
@endsection