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
                        @if ($local->id_categoria == 1)
                            <td>{{ $local->nombre_tianguis }}</td>
                        @endif
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pagarModal{{ $local->id_local }}">
                                Pagar
                            </button>
                        </td>
                    </tr>
                    
                @endforeach

            </tbody>
        </table>

        @foreach ($locales as $local)
            <div class="modal fade" id="pagarModal{{ $local->id_local }}" tabindex="-1" aria-labelledby="pagarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="pagarModalLabel">Ventana de pago</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> <!-- contenido del modal -->
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        @endforeach

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
        <script>
            document.getElementById('IDatePayment').onchange = function () 
            {
                if (this.value == '0') 
                {
                    document.getElementById("FDatePayment").disabled = true;
                }

                else 
                {
                    document.getElementById("FDatePayment").disabled = false;
                }
            }
        </script>
        <script>  
            function daysDifference() {  
                //define two variables and fetch the input from HTML form  
                var dateI1 = document.getElementById("IDatePayment").value;  
                var dateI2 = document.getElementById("FDatePayment").value;  
                var costo = document.getElementById("value").value;
                
                //define two date object variables to store the date values  
                var date1 = new Date(dateI1);  
                var date2 = new Date(dateI2);  
            
                //calculate time difference  
                var time_difference = date2.getTime() - date1.getTime();  
        
                //calculate days difference by dividing total milliseconds in a day  
                var result = time_difference / (1000 * 60 * 60 * 24);  
                var result = result + 1;
                
                var dias = document.getElementById("days").value;

                const cadena = dias.split(",");
                //console.log(cadena[0])
           
                const start = new Date(date1);
                const end = new Date(date2);
                const weekday = ["DOMINGO","LUNES","MARTES","MIÉRCOLES","JUEVES","VIERNES","SÁBADO"];
                var counter = 0;
                //console.log(start)
                let loop = new Date(start);
                do{
                   
                    let newDate = loop.setDate(loop.getDate() + 1 );
                    loop = new Date(newDate);
                    for (let index = 0; index < cadena.length; index++) {
                        
                        if (weekday[loop.getDay()] == cadena[index]) {
                            counter = counter + 1;
                            //console.log("entró al día: " + cadena[index] + counter)
                        }
                    }
                    
                    //console.log(weekday[loop.getDay()]);
                }while(loop <= end);
                let total = counter * costo;

                var result = document.getElementById("dWorked");
                result.value = counter;

                var result = document.getElementById("total");
                result.value = total;
                //return document.getElementById("result").innerHTML = total;  
            }  
       </script>  
    @endsection
    </div>
@endsection