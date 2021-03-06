@extends('layouts.carcasa')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('title')
    <H1>Lista de comerciantes</H1>
    <title>Lista de comerciantes</title>
@endsection

@section('content')    
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif

        <table id="montos" class="table table-striped dt-responsive nowrap table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre(s)</th>
                    <th>RFC</th>
                    <th>Domicilio</th>
                    <th>Teléfono 1</th>
                    <th>Teléfono 2</th>
                    <th>Giro(s)</th>
                    <th>Días laborados </th>
                    <th>Apercibimientos</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($merchants as $merchant)
    
                    <tr>
                        <td>{{ $merchant->nombre_comerciante }} {{ $merchant->apellido_comerciante }}</td>
                        <td>{{ $merchant->rfc }}</td>
                        <td>{{ $merchant->domicilio }}</td>
                        <td>{{ $merchant->telefono1 }}</td>
                        <td>{{ $merchant->telefono2 }}</td>
                        <td>{{ trim($merchant->giro, ',') }}</td>
                        <td>{{ trim($merchant->dias, ',') }}</td>
                        <td>{{ $merchant->apercibimientos }}</td>
                        <td>{{ $merchant->categoria->clase }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('rLocal', $merchant->rfc) }}">Registrar un local</a>

                            <a class="btn btn-primary" href="{{ route('payment.locals', $merchant->rfc ) }}">Refrendos</a>
                            
                        </td>
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