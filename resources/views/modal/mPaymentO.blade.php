<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="pagarModalotros{{ $locales->id_local }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title {{ $locales->id_local }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_comerciante" value="{{ $locales->id_comerciante }}">
                    <input type="hidden" name="id_local" value="{{ $locales->id_local }}">
                    <div class="d-flex justify-content-between row ">
                        <div class="mb-3 col-4 border">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" class="form-control" value="{{ $locales->nombre_comerciante}} {{ $locales->apellido_comerciante}}" id="name" aria-describedby="nameHelp" readonly>
                            <div id="nameHelp" class="form-text">Nombre del que pagó.</div>
                            @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3 col-6 border">
                            <label for="business" class="form-label">Giro</label>
                            <input type="text" name="business" class="form-control" value="{{ $locales->giro }}" id="business" aria-describedby="businessHelp" readonly hidden>
                            <input type="text"  class="form-control" value="{{ trim($locales->giro, ',') }}"   readonly>
                            <div id="businessHelp" class="form-text">Giro(s).</div>
                            @error('business')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3 col-2 border">
                            <label for="folio" class="form-label">Folio</label>
                            <input type="text" name="folio" class="form-control" id="folio" aria-describedby="folioHelp">
                            <div id="folioHelp" class="form-text">Folio del pago.</div>
                            @error('folio')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 border">
                            <label for="ubication" class="form-label">Ubicación</label>
                            <input type="text" name="ubication" class="form-control" value="{{ $locales->ubicacion_reco }}" id="ubication" aria-describedby="ubicationHelp" readonly>
                            <div id="ubicationHelp" class="form-text">Ubicación del local.</div>
                            @error('ubication')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3 col-6 border">
                            <label for="days" class="form-label">Dias</label>
                            <input type="text" name="days" class="form-control" value="{{ $locales->dias }}" id="days" aria-describedby="daysHelp" readonly hidden>
                            <input type="text"  class="form-control" 
                                @for ($i=1; $i<=strlen($locales->dias); $i++)
                                    
                                    {{ $locales->dias = str_replace("1", "LUNES", $locales->dias) }}
                                    {{ $locales->dias = str_replace("2", "MARTES", $locales->dias) }}
                                    {{ $locales->dias = str_replace("3", "MIÉRCOLES", $locales->dias) }}
                                    {{ $locales->dias = str_replace("4", "JUEVES", $locales->dias) }}
                                    {{ $locales->dias = str_replace("5", "VIERNES", $locales->dias) }}
                                    {{ $locales->dias = str_replace("6", "SÁBADO", $locales->dias) }}
                                    {{ $locales->dias = str_replace("7", "DOMINGO", $locales->dias) }}
                                @endfor
                            value="{{ trim($locales->dias, ',') }}"   readonly>
                            <div id="daysHelp" class="form-text">Dias que labora el comerciante.</div>
                            @error('days')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3 col-3 border col align-self-center">
                            <label for="IDatePayment" class="form-label"> Selecciona la fecha de inicio. </label>
                            <input type="date" id="IDatePayment" name="IDatePayment" 
                                aria-describedby="iDateHelp" required>
                            <div id="iDateHelp" class="form-text">Fecha en la que inicia el permiso. </div>
                        </div>
                        <div class="mb-3 col-3 border col align-self-center">
                            <label for="FDatePayment" class="form-label"> Selecciona la fecha de finalización. </label>
                            <input type="date" id="FDatePayment" name="FDatePayment" disabled="disabled"
                                aria-describedby="fDateHelp" onchange="daysDifference()"  required >
                            <div id="fDateHelp" class="form-text">Fecha en la que termina el permiso.</div>
                        </div>
                        <div class="mb-3 col-3 border">
                            <label for="rfc" class="form-label">RFC</label>
                            <input type="text" name="rfc" class="form-control" id="rfc" value="{{ $locales->rfc }}" aria-describedby="folioHelp" readonly>
                            <div id="rfcHelp" class="form-text">Registro federal del contribuyente. </div>
                            
                        </div>
                        <div class="mb-3 col-3 border">
                            <label for="cost" class="form-label">Valor del m^2. $</label>
                            <input type="text" name="cost" class="form-control" id="cost" value="{{ $monto->monto }}" aria-describedby="costHelp" disabled>
                            <div id="costHelp" class="form-text">Costo del m^2 del año fiscal en curso. </div>
                        </div>
                        <div class="mb-3 col-3 border">
                            <label for="measurements" class="form-label">Medidas.</label>
                            <input type="text" name="measurment" class="form-control" id="measurements" value="{{ $locales->dimx}} x {{ $locales->dimy }}" aria-describedby="measurementsHelp" disabled>
                            <div id="measurementHelp" class="form-text">Medidas del local del comerciante. </div>
                        </div>
                        
                        <div class="mb-3 col-3 border">
                            <label for="value" class="form-label">Cantidad del pago por los día. $</label>
                            <input type="text" name="value" class="form-control" id="value" value="{{ $locales->dimx * $locales->dimy * $monto->monto }}" aria-describedby="valueHelp" readonly>
                            <div id="valueHelp" class="form-text">Cantidad que el ciudadano va a pagar. </div>
                            
                        </div>
                        
                            <div class="mb-3 col-3 border">
                                <label for="dWorked" class="form-label">Días laborados: </label>
                                <input type="text" name="dWorked" class="form-control" id="dWorked"  aria-describedby="dWorkedHelp" readonly>
                                <div id="dWorkedHelp" class="form-text">Cantidad de días que el ciudadano trabajó. </div>
                                
                            </div>
                            <div class="mb-3 col-3 border">
                                <label for="total" class="form-label">Total: </label>
                                <input type="text" name="total" class="form-control" id="total"  aria-describedby="totalHelp" onchange="setTwoNumberDecimal" readonly>
                                <div id="totalHelp" class="form-text">Monto que el ciudadano pagará. </div>
                                
                            </div>
                            
                            <div class="mb-3 col-6 ">
                                <div class="mb-3 ml-10 form-check ">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                    <label class="form-check-label" for="exampleCheck1">Los datos son correctos</label>
                                </div>
                                <button type="submit" class="btn btn-primary col-3 ">Generar pago</button> 
                            </div>
                            
                        
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>
</form>

@section('js')
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

                    var ano1 = date1.getFullYear();
                    var ano2 = date2.getFullYear();
                   
                    if (ano1 == ano2) {
                        result = 'positive';
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
                        const weekday = ["7","1","2","3","4","5","6"];
                        var counter = 0;
                        //console.log(start)
                        let loop = new Date(start);
                        do{
                        
                            let newDate = loop.setDate(loop.getDate() + 1 );
                            loop = new Date(newDate);
                            for (let index = 0; index < cadena.length; index++) {
                                
                                if (weekday[loop.getDay()] == cadena[index]) {
                                    counter = counter + 1;
                                    console.log("entró al día: " + cadena[index])
                                    console.log("contador: " + counter)
                                }
                            }
                            
                            console.log(weekday[loop.getDay()]);
                        }while(loop <= end);
                        let total = counter * costo;

                        var result = document.getElementById("dWorked");
                        result.value = counter;

                        var result = document.getElementById("total");
                        result.value = total;

                    } else {
                        result = 'NOT positive';
                        alert ("Los años son distintos.");  
                    }
                    //return document.getElementById("result").innerHTML = total;  
                }  
           </script>   
            
        @endsection