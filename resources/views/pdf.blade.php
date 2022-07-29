<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet"/>

</head>
<body>
    <a class="btn btn-primary" onclick="vista('printArea')"> Imprimir vista</a>
    <div class="container" id="printArea">
        <div class="border shadow-lg bg-body rounded" style="padding: 10px;">
            <div class="col-md-12">
                <div class="d-flex justify-content-end row" style="padding-bottom: -100px !important;">

                    <div class="col-1 border" >
                        <p style="font-size: 10px ">Folio</p>
                    </div>
                    <div class="col-5 border">
                        <label for="nombre" class="form-label">{{ $pago->folio }} </label>
                    </div>
                </div>
                <div class="d-flex justify-content-between row bg-secondary text-white" style="background-color: #6C757D">
                    <p class="d-flex justify-content-center" style="background-color: #6C757D"> DIRECCIÓN DE FISCALIZACIÓN Y CONTROL</p>
                </div>
                <div class="d-flex justify-content-evenly row" >
                    <div class="col-4 border border-dark border-3 d-flex justify-content-center">
                        <p style="font-size: 10px ">ORDEN DE PAGO</p>
                    </div>
                    <div class="col-6 border border-dark border-3 d-flex justify-content-center">
                        <p style="font-size: 10px ">FECHA DE EXPEDICIÓN: {{ date('d-m-Y') }}</p>
                    </div>
                </div>
                <div class="d-flex justify-content-start row" style="padding-bottom: -50px !important;">
                    <p style="font-size: 10px " style="padding-bottom: -50px !important;"> EL CIUDADANO: {{ $pago->comerciante->nombre_comerciante }} {{ $pago->comerciante->apellido_comerciante }}</p>
                </div>
                <div class="d-flex justify-content-start row" style="padding-bottom: -50px !important;">
                    <p style="font-size: 10px "> EFECTUA EL PAGO EN LA TESORERÍA MUNICIPAL POR LA CANTIDAD DE: $ {{ $pago->monto }} </p>
                </div>
                <div class="d-flex justify-content-start row" style="padding-bottom: -50px !important;">
                    <p style="font-size: 10px "> POR EL CONCEPTO DE:</p>
                </div>
                <div class="d-flex justify-content-evenly row col-md-12">
                    
                    <div class="col-12 border d-flex justify-content-center ">
                        <p style="font-size: 10px ">DISPOSICIONES ADMINISTRATIVAS DE RECAUDACIÓN PARA EL MUNICIPIO DE SALAMANCA, GUANAJUATO, PARA EL EJERCICIO FISCAL {{ date('Y') }}</p>
                    </div>
                    <div class="col-6 border d-flex justify-content-center row p-1">
                        <div class="border d-flex justify-content-start" >
                            <p style="font-size: 10px ">1.- ART. 6 LA OCUPACIÓN Y PROVECHAMIENTO DE LA VÍA PÚBLICA POR LOS PARTICULARES:</p>
                        </div>
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11 " style="font-size: 10px "> FRACCIÓN I</p>
                            <div class="border border-dark border-2 col col-1 mt-1" style="height: 20px; width: 28px"></div>
                        </div>
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11 align-middle " style="font-size: 10px "> FRACCIÓN II</p>
                            <div class="border border-dark border-2 col col-1 mt-1" style="height: 20px; width: 28px"></div>
                        </div>
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11 align-middle" style="font-size: 10px "> FRACCIÓN III</p>
                            <div class="border border-dark border-2 col col-1 mt-1" style="height: 20px; width: 28px"></div>
                        </div>
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11" style="font-size: 10px ">2.- ART. 8 PERMISO POR EXTENSIÓN DE HORARIO A ESTABLECIMINENTOS COMERCIALES.</p>
                            <div class="border border-dark border-2 col col-1 mt-1" style="height: 20px; width: 28px"></div>
                        </div>
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11" style="font-size: 10px ">3.- ART. 19 EMPADRONAMIENTO DE MESAS DE BILLAR, MÁQUINAS DE VIDEOJUEGOS, APARATIS ELECTROMECÁNICOS, JUEGOS MECÁNICOS O SIMILARES, CAMA ELÁSTICA.</p>
                            <div class="border border-dark border-2 col col-1 mt-1" style="height: 20px; width: 28px"></div>
                        </div>
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11" style="font-size: 10px ">4.- ART. 20 EXPEDICIÓN DE PERMISO POR EMPADRONAMIENTO MINICIPAL.</p>
                            <div class="border border-dark border-2 col col-1 mt-1" style="height: 20px; width: 28px"></div>
                        </div>
                        

                    </div>
                    <div class="col-6 border d-flex justify-content-center row p-1">
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11"  style="font-size: 10px ">5.- ART. 21 POR INSPECCIÓN FÍSICA OCULAR PARA ANUENCIA DE LICENCIA DE GIROS CON VENTA DE BEBIDAS ALCOHÓLICAS.</p>
                            <div class="border border-dark border-2 col col-1 mt-1 align-middle" style="height: 20px; width: 28px"></div>
                        </div>
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11"  style="font-size: 10px ">6.- ART. 22 PUBLICIDAD POR VOLANTEO POR DÍA.</p>
                            <div class="border border-dark border-2 col col-1 mt-1 align-middle" style="height: 20px; width: 28px"></div>
                        </div>
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11"  style="font-size: 10px ">7.- ART. 23 POR INSPECCIÓN FÍSICA OCULAR PARA PERMISO DE VÍA PÚBLICA. </p>
                            <div class="border border-dark border-2 col col-1 mt-1 align-middle" style="height: 20px; width: 28px"></div>
                        </div>
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11"  style="font-size: 10px ">8.- ART. 24 SELLADO DE BOLETOS: </p>
                        </div>
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11"  style="font-size: 10px "> I.- HASTA 1000 UNIDADES. </p>
                            <div class="border border-dark border-2 col col-1 mt-1" style="height: 20px; width: 28px"></div>
                        </div>
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11"  style="font-size: 10px "> A) 1001 A 5000 UNIDADES. </p>
                            <div class="border border-dark border-2 col col-1 mt-1" style="height: 20px; width: 28px"></div>
                        </div>
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11"  style="font-size: 10px "> B) 5001 UNIDADES EN ADELANTE. </p>
                            <div class="border border-dark border-2 col col-1 mt-1" style="height: 20px; width: 28px"></div>
                        </div>
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11" style="font-size: 10px "> II.- AMPLIACIÓN DE HORARIO PARA SALONES DE FIESTA DESTINADOS A EVENTOS PRIVADOS O PÚBLICOS. </p>
                            <div class="border border-dark border-2 col col-1 mt-1" style="height: 20px; width: 28px"></div>
                        </div>
                        
                    </div>
                
                </div>
                <div class="d-flex justify-content-evenly row col-md-12 " >
                    <div class="col-12 border d-flex justify-content-center ">
                        <p style="font-size: 10px ">LEY  DE INGRESOS PARA EL MUNICIIO DE SALAMANCA, GUANAJUATO, PARA EL EJERCICIO FISCAL DEL AÑO {{ date('Y') }}</p>
                    </div>

                    <div class="col-6 border d-flex justify-content-center row p-1">
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11" style="font-size: 10px ">1.- SECCIÓN 5TA ART. 10 IMPUESTO SOBRE JUEGOS Y APUESTAS PERMITIDAS. </p>
                            <div class="border border-dark border-2 col col-1 mt-1 align-middle" style="height: 20px; width: 28px"></div>
                        </div>
                        <div class="border d-flex justify-content-start " >
                            <p class="col col-11" style="font-size: 10px ">2.- SECCIÓN 6TA ART. 11 IMPUESTO SOBRE DIVERSIONES Y ESPECTÁCULOS PÚBLICOS. </p>
                            <div class="border border-dark border-2 col col-1 mt-1 align-middle" style="height: 20px; width: 28px"></div>
                        </div>
                        
                    </div>
                    <div class="col-6 border d-flex justify-content-center row p-1">
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11" style="font-size: 10px ">3.- ART. 28 FRACCIÓN III EXPEDICIÓN DE PERMISOS POR DÍA PARA LA DIFUSIÓN FONÉTICA: </p>
                        </div>
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11" style="font-size: 10px "> A) FIJA. </p>
                            <div class="border border-dark border-2 col col-1 mt-1" style="height: 20px; width: 28px"></div>
                        </div>
                        <div class="border d-flex justify-content-start" >
                            <p class="col col-11" style="font-size: 10px "> B) MÓVIL. </p>
                            <div class="border border-dark border-2 col col-1 mt-1" style="height: 20px; width: 28px"></div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-start row border" >
                    <p style="font-size: 10px "> LUGAR: {{ $pago->local->ubicacion_reco }}</p>
                </div>
                <div class="d-flex justify-content-start row border border-dark border-2">
                    <p style="font-size: 10px "> CÁLCULOS: DÍAS LABORADOS = {{ $pago->dias_laborales }} * COSTO FISCAL =  ${{ $monto->monto }} * DIMENSIONES = {{ $pago->local->dimx }}M * {{ $pago->local->dimy }}M, TOTAL = ${{ $pago->monto }}</p>
                </div>
                <div class="d-flex justify-content-center row align-items-center" style="padding-bottom: -30px !important;">
                    <div class="d-flex justify-content-center">
                        <p style="font-size: 10px "> DATOS GENERALES </p>
                    </div>
                </div>
                <div class="d-flex justify-content-start row border" >
                    <p style="font-size: 10px "> LUGAR: {{ $pago->local->ubicacion_reco }}</p>
                </div>
                <div class="d-flex justify-content-start row border" >
                    <p style="font-size: 10px "> COLONIA: {{ $pago->comerciante->domicilio }}</p>
                </div>
                <div class="d-flex justify-content-start row border" >
                    <p style="font-size: 10px "> GIRO(S): {{ $pago->comerciante->giro }}</p>
                </div>
                <div class="d-flex justify-content-start row border" >
                    <p style="font-size: 10px "> DENOMINACIÓN: </p>
                </div>
                <div class="d-flex justify-content-start row border" >
                    <p style="font-size: 10px "> VIGENCIA DEL: {{ $pago->fecha_inicio }} AL: {{ $pago->fecha_final }}</p>
                </div>
            </div>
            
        </div>
        
    </div>
    
</body>

<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    function vista(printArea) {
        var content = document.getElementById(printArea).innerHTML;
        var originalContent = document.body.innerHTML;

        document.body.innerHTML = content;

        window.print();

        document.body.innerHTML = originalContent;
    }
</script>
</html>