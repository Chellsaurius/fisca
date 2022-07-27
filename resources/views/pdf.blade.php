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
    <div class="container" id="printArea">
        <div class="border shadow-lg p-3 mb-5 bg-body rounded">
            <div class="col-md-12">
                <div class="d-flex justify-content-end row">

                    <div class="mb-3 col-1 border">
                        <label for="nombre" class="form-label">Folio: </label>
                    </div>
                    <div class="mb-3 col-2 border">
                        <label for="nombre" class="form-label">{{ $pago->folio }} </label>
                    </div>
                </div>
                <div class="d-flex justify-content-between row bg-secondary text-white" style="background-color: #6C757D">
                    <h2 class="d-flex justify-content-center"> DIRECCIÓN DE FISCALIZACIÓN Y CONTROL</h2>
                </div>
                <div class="d-flex justify-content-evenly row" >
                    <div class="mb-3 col-4 border d-flex justify-content-center">
                        <h2>ORDEN DE PAGO</h2>
                    </div>
                    <div class="mb-3 col-3 border d-flex justify-content-center">
                        <h2>{{ date('d-m-Y') }}</h2>
                    </div>
                </div>
                <div class="d-flex justify-content-start row">
                    <h4> EL CIUDADANO: {{ $pago->comerciante->nombre_comerciante }} {{ $pago->comerciante->apellido_comerciante }}</h4>
                </div>
                <div class="d-flex justify-content-start row">
                    <h4> EFECTÚA EL PAGO EN LA TESORERÍA MUNICIPAL POR LA CANTIDAD DE: $ {{ $pago->monto }} </h4>
                </div>
                <div class="d-flex justify-content-start row">
                    <h6> POR EL CONCEPTO DE:</h6>
                </div>
                <div class="d-flex justify-content-between row col-md-12">
                    
                    <div class="mb-3 col-12 border d-flex justify-content-center">
                        <h6>DISPOSICIONES ADMINISTRATIVAS DE RECAUDACIÓN PARA EL MUNICIPIO DE SALAMANCA, GUANAJUATO, PARA EL EJERCICIO FISCAL {{ date('Y') }}</h6>
                    </div>
                    <div class="mb-3 col-6 border d-flex justify-content-center row">
                        <div class="mb-3 border d-flex justify-content-start" >
                            <h6>1.- ART. 6 LA OCUPACIÓN Y PROVECHAMIENTO DE LA VÍA PÚBLICA POR LOS PARTICULARES:</h6>
                        </div>
                        <div class="justify-content-start align-items-start row border">
                            <h6 class="col col-3"> FRACCIÓN I</h6>
                            <div class="border border-dark border-2 col col-1 mt-1" style="height: 20px; width: 20px"></div>
                        </div>
                        <div class="justify-content-start align-items-start row border">
                            <h6 class="col col-3"> FRACCIÓN II</h6>
                            <div class="border border-dark border-2 col col-1 mt-1" style="height: 20px; width: 20px"></div>
                        </div>
                        <div class="justify-content-start align-items-start row border ">
                            <h6 class="col col-3"> FRACCIÓN III</h6>
                            <div class="border border-dark border-2 col col-1 mt-1" style="height: 20px; width: 20px"></div>
                        </div>
                        <div class="mb-3 border d-flex justify-content-start" >
                            <h6>2.- ART. PERMISO POR EXTENSIÓN DE HORARIO A ESTABLECIMINENTOS COMERCIALES.</h6>
                            <div class="border border-dark border-2 col col-1 mt-1" style="height: 20px; width: 20px"></div>
                        </div>
                    </div>
                    <div class="mb-3 col-6 border d-flex justify-content-center">
                        <div class="mb-3 col-6 border d-flex justify-content-start" >
                            <h6>FRACCIÓN I </h6>
                            <div class="border" style="height: 15px; width: 20px"></div>
                        </div>
                    </div>
                    
                </div>

                {{ $pago }}
            </div>
        </div>
        
    </div>
    <a class="btn btn-primary" onclick="vista('printArea')"> Imprimir vista</a>
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