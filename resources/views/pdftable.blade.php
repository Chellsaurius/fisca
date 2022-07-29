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
    <style>
        .headt td {
            min-width: 200px;
            height: 30px;

        }
        table {

        }
    </style>
</head>
<body>
    <title>DIRECCIÓN DE FISCALIZACIÓN Y CONTROL</title>
    <div style="margin: 5px">
        <a class="btn btn-primary" onclick="vista('printArea')"> Imprimir comprobante</a>
    </div>
    <div class="container"  id="printArea" style="width: 18.5cm">
        
        <legend class="text-center text-white" style="background-color: grey !important; padding-bottom: 10px; padding-right: 10px; margin-bottom: -10px;">DIRECCIÓN DE FISCALIZACIÓN Y CONTROL</legend>
        
        <form class="row g-1 " action="#" method="post" style="padding: 10px;">
            <div class="d-flex flex-row-reverse mb-1" >
                <div class="border" style="height: 26px; width: 300px">
                    <p >FOLIO: </p>
                </div>
            </div>
            <div class="col-6 border rounded text-center" style="height: 26px">
                <label for="nombre" class="form-label">ORDEN DE PAGO</label>
                
            </div>
            <div class="col-6 border rounded text-center" style="height: 26px">
                <label for="apellidos" class="form-label">FECHA DE EXPEDICIÓN: {{ date('d-m-Y') }}</label>
                
            </div>
            
            <div class="col-12 border rounded pb-1" style="height: 38px">
                <p style="font-size: 10px"> EL CIUDADANO: {{ $pago->comerciante->nombre_comerciante }} {{ $pago->comerciante->apellido_comerciante }} <br> EFECTUA EL PAGO EN LA TESORERÍA MUNICIPAL POR LA CANTIDAD DE: <b style="font-size: 14px"> <u> $ {{ $pago->monto }} MXN</u></b></p>
                
            </div>
            <div class="col-12 border rounded pb-1" style="height: 48px">
                <p><b>DISPOSICIONES ADMINISTRATIVAS DE RECAUDACIÓN PARA EL MUNICIPIO DE SALAMANCA, GUANAJUATO, PARA EL EJERCICIO FISCAL {{ date('Y') }}</b></p>
            </div>
            <div class="col-6 border rounded pb-1">
                <label for="tel" class="form-label">Telefono*</label>
                <br>
                <input type="text" id="tel" class="form-control"  name="tel" required placeholder="Telefono" value="">
                @error ('tel')
                    <span class="invalid-feedback text-uppercase" role="alert">El telefono debe ser solo digitos</span>
                @enderror
            </div>
            <div class="col-6 border rounded">
                <label for="tel2" class="form-label">Telefono opcional:</label>
                <br>
                <input type="text" id="tel2" class="form-control" name="tel2" placeholder="Telefono opcional">
            </div>
            <div class="col-12 border rounded pb-1" style="border: solid;">
                <legend>Giro(s)</legend>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="giro[]" id="inlineCheckbox1" value="opcion1">
                    <label class="form-check-label" for="inlineCheckbox1">Opcion1</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="giro[]" id="inlineCheckbox1" value="opcion2">
                    <label class="form-check-label" for="inlineCheckbox1">Opcion2</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="giro[]" id="inlineCheckbox1" value="opcion3">
                    <label class="form-check-label" for="inlineCheckbox1">Opcion3</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="giro[]" id="inlineCheckbox1" value="opcion4">
                    <label class="form-check-label" for="inlineCheckbox1">Opcion4</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="giro[]" id="inlineCheckbox1" value="opcion5">
                    <label class="form-check-label" for="inlineCheckbox1">Opcion5</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="giro[]" id="inlineCheckbox1" value="opcion6">
                    <label class="form-check-label" for="inlineCheckbox1">Opcion6</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="giro[]" id="inlineCheckbox1" value="opcion7">
                    <label class="form-check-label" for="inlineCheckbox1">Opcion7</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="giro[]" id="inlineCheckbox1" value="opcion8">
                    <label class="form-check-label" for="inlineCheckbox1">Opcion8</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="giro[]" id="inlineCheckbox1" value="opcion9">
                    <label class="form-check-label" for="inlineCheckbox1">Opcion9</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="giro[]" id="inlineCheckbox1" value="opcion10">
                    <label class="form-check-label" for="inlineCheckbox1">Opcion10</label>
                </div>
                <div>
                    <br>
                    <label for="otros" class="form-label">Otro(s):</label>
                    <input type="text" name="otros" id="otros" class="form-control">
                </div>
                
            </div>

            <div class="col-12 border rounded pb-1" style="border: solid;">
                <legend>Dias laborales</legend>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="dias[]" id="inlineCheckbox1" value="Lunes">
                    <label class="form-check-label" for="inlineCheckbox1">Lunes</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="dias[]" id="inlineCheckbox1" value="Martes">
                    <label class="form-check-label" for="inlineCheckbox1">Martes</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="dias[]" id="inlineCheckbox1" value="Miercoles">
                    <label class="form-check-label" for="inlineCheckbox1">Miercoles</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="dias[]" id="inlineCheckbox1" value="Jueves">
                    <label class="form-check-label" for="inlineCheckbox1">Jueves</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="dias[]" id="inlineCheckbox1" value="Viernes">
                    <label class="form-check-label" for="inlineCheckbox1">Viernes</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="dias[]" id="inlineCheckbox1" value="Sabado">
                    <label class="form-check-label" for="inlineCheckbox1">Sabado</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="dias[]" id="inlineCheckbox1" value="Domingo">
                    <label class="form-check-label" for="inlineCheckbox1">Domingo</label>
                </div>
            </div>

            <div class="col-6 border rounded" style="border: solid;">
                <legend>Observaciones</legend>
                <textarea name="observaciones" id="observaciones" cols="50" rows="3"></textarea>
            </div>

            
        </form>

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