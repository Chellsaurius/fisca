@extends('layouts.carcasa')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('title')
    <h1>Lista de tianguis</h1>
    <title>Tianguis</title>
@endsection

@section('content')



<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="d-flex justify-content-between" >
        <h2 class="text-start align-items-start">Lista de los Tianguis actuales.</h2>
        <a href="{{ route('nTianguis') }}" class="btn btn-secondary d-flex align-items-end">Registra otro tianguis aqui :o</a>
    </div>
    
    <br>
    <div >
    <table id="tianguis" class="table table-striped dt-responsive nowrap table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Día</th>
                <th>Hora de inicio</th>
                <th>Hora de finalización</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tianguis as $tiangui)
                @if ($tiangui->estatus_tianguis == 1)
                    <tr>
                        <td>{{ $tiangui->nombre_tianguis }}</td>
                        <td>
                            @if ($tiangui->dia == 1)
                                Lunes
                            @endif
                            @if ($tiangui->dia == 2)
                                Martes
                            @endif
                            @if ($tiangui->dia == 3)
                                Miércoles
                            @endif
                            @if ($tiangui->dia == 4)
                                Jueves
                            @endif
                            @if ($tiangui->dia == 5)
                                Viernes
                            @endif
                            @if ($tiangui->dia == 6)
                                Sábado
                            @endif
                            @if ($tiangui->dia == 7)
                                Domingo
                            @endif
                        </td>
                        <td>{{ $tiangui->thora_inicio }}</td>
                        <td>{{ $tiangui->thora_final }}</td>
                    </tr>
                @endif
            
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
@endsection
