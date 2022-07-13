@extends('layouts.carcasa')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('title')
    <h1>Lista de Inspectores</h1>
    <title>Inspectores</title>
@endsection

@section('content')



<div class="container">
    <div class="border shadow-lg p-3 mb-5 bg-body rounded">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        
        <div class="d-flex justify-content-between" >
            <h2 class="text-start align-items-start">Inspectores.</h2>
            <a href="{{ route('inspector.new') }}" class="btn btn-secondary d-flex align-items-end">Agregar otro inspector</a>
        </div>
        
        <br>
        <div >
        <table id="inspectores" class="table table-striped dt-responsive nowrap table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inspectores as $inspector) 
                    <tr>
                        <td>{{ $inspector->name }}</td>
                        <td>{{ $inspector->email }}</td>
                    </tr>
                @endforeach

                
            </tbody>
        </table>
        </div>
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
</div>
@endsection
