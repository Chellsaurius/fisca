@extends('layouts.carcasa')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('title')
    <H1>Lista de pagos</H1>
    <title>Lista de pagos</title>
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
                    <th>Folio</th>
                    <th>Nombre </th>
                    <th>RFC</th>
                    <th>Inicio de contrato</th>
                    <th>Fin de contrato</th>
                    <th>Días laborados</th>
                    <th>Cantidad cobrada</th>
                    <th>Ubicación</th>
                    <th>Dimención X</th>
                    <th>Dimención Y</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
    
                    <tr>
                        <td>{{ $payment->folio }}</td>
                        <td>{{ $payment->comerciante->nombre_comerciante }} {{ $payment->comerciante->apellido_comerciante }}</td>
                        <td>{{ $payment->comerciante->rfc }}</td>
                        <td>{{ $payment->fecha_inicio }}</td>
                        <td>{{ $payment->fecha_final }}</td>
                        <td>{{ $payment->dias_laborales }}</td>
                        <td>{{ $payment->monto }}</td>
                        <td>{{ $payment->local->ubicacion_reco }}</td>
                        <td>{{ $payment->local->dimx }}</td>
                        <td>{{ $payment->local->dimy }}</td>
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