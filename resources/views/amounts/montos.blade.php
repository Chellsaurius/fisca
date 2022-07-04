@extends('layouts.carcasa')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection

@section('title')
    <h1>Historial de costos</h1>
    <title>Monto fiscal</title>
@endsection

@section('content')



<div class="container">
   
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    
    <div class="d-flex justify-content-between" >
        <h2 class="text-start align-items-start">Monto por metro cuadrado del año fiscal.</h2>
        <a href="{{ route('nmontos') }}" class="btn btn-secondary d-flex align-items-end">Nuevo año, nuevo costo :D</a>
    </div>
    
    <br>
    <div style="width: 40%">
    <table id="montos" class="table table-striped dt-responsive nowrap table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Monto por m^2</th>
                <th>Año fiscal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($montos as $monto)
                @if ($monto->estatus_monto == 1)
                    <tr>
                        <td>${{ number_format($monto->monto,2) }}</td>
                        <td>{{ $monto->year }}</td>
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
