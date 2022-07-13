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
                    <th>Cantidad a cobrar</th>
                    <th>Días Laborales</th>
                    <th>Ubicación</th>
                    <th>Dimención X</th>
                    <th>Dimención Y</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
    
                    <tr>
                        <td>{{ $payment->nombre_comerciante }}</td>
                        <td>{{ $payment->apellido_comerciante }}</td>
                        <td>{{ $payment->rfc }}</td>
                        <td>{{ $payment->domicilio }}</td>
                        <td>{{ $payment->telefono1 }}</td>
                        <td>{{ $payment->telefono2 }}</td>
                        <td>{{ $payment->giro }}</td>
                        <td>{{ $payment->dias }}</td>
                        <td>{{ $payment->apercibimientos }}</td>
                        <td>{{ $payment->categoria->clase }}</td>
                        <td></td>
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