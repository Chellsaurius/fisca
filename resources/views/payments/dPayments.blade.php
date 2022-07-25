@extends('layouts.carcasa')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('title')
    <H1>Lista de locales del comerciante</H1>
    <title>Locales del comerciante</title>
@endsection

@section('content')    
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif
  
        <div class="d-flex justify-content-between" >
            <h2 class="text-start align-items-start">Locales  del comerciante con RFC: {{ $rfc }}</h2>
        </div>
        
        <br>

        <table id="montos" class="table table-striped dt-responsive nowrap table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Ubicación o recorrido</th>
                    <th>Hora de inicio</th>
                    <th>Hora de finalización</th>
                    <th>Tianguis</th>
                    <th>Acciones</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($locales as $local)
                    <tr>
                        <td>{{ $local->ubicacion_reco }}</td>
                        <td>{{ $local->lhora_inicio }}</td>
                        <td>{{ $local->lhora_final }}</td>
                        <td>{{ $local->nombre_tianguis ?? 'No afiliado a un tianguis' }}</td>
                        <td>
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pagarModal{{ $local->id_local }}">
                                Pagar local: {{ $local->id_local }}
                            </a>
                        </td>
                    </tr>
                    @include('modal.mPayment')
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