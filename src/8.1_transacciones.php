<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/garra.png" type="image/x-icon">  <!-- Icono para la pestaña -->
    <title>Transacciones</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" 
        crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" 
        crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url(assets/images/fondo.png);
        }
    
        h1 {
            color: white;
            padding: 5px;
            margin: 10px;
        }

        p {
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pagos y transferencias:</h1>
        <ul class="list-group">
            <?php
                //Calculo del IVA al total del monto a pagar
                function calculoIVA($monto) {
                    $iva = 0;
                    $iva += $monto*0.16;
                    return $iva;
                }

                //Calculo de la suma de todos los pagos a realizar
                function sumaTotal($n1, $n2) {
                    return $n1 + $n2;
                }

                if(isset($_POST['btnPago'])){
                    if(!empty($_POST['monto'])) {
                        // Contando el numero de input seleccionados checkboxes
                        $checked_contador = count($_POST['monto']);
                        echo "<li class='list-group-item list-group-item-success text-center'>Comprobante de Pago</li>";
                        echo "<li class='list-group-item list-group-item-success'>Total de pagos seleccionados: ".$checked_contador."</li>";
                        // Bucle para almacenar y visualizar valores activados checkbox
                        $suma = 0;
                        foreach($_POST['monto'] as $seleccion) {
                            echo "<li class='list-group-item list-group-item-success'>".$seleccion."</li>";
                            switch ($seleccion) {
                                case 'Trimestre - $128.43':
                                    $suma += 128.43;
                                    break;
                                case 'Anualidad - $128.43':
                                    $suma += 128.43;
                                    break;
                                case 'Biblioteca - $10.00':
                                    $suma += 10;
                                    break;
                                case 'Comedor - $7.00':
                                    $suma += 7;
                                    break;
                                case 'Examen Recuperacion - $4.40':
                                    $suma += 4.4;
                                    break;
                                case 'Libreria - $500.00':
                                    $suma += 500;
                                    break;
                                case 'Barra Fria - $70.00':
                                    $suma += 70;
                                    break;
                                default:
                                    # code...
                                    break;
                            }
                        }
                        $ivaAplicado = calculoIVA($suma);
                        $total = sumaTotal($suma, $ivaAplicado);

                        echo "<li class='list-group-item list-group-item-success'>Monto total sin IVA: $".$suma."</li>";
                        echo "<li class='list-group-item list-group-item-success'>Porcentaje aplicado del IVA: 16% (.16)</li>";
                        echo "<li class='list-group-item list-group-item-success'>IVA: $".$ivaAplicado."</li>";
                        echo "<li class='list-group-item list-group-item-success'>Monto total con IVA: $".$total."</li>";
                    }
                    else{
                        echo "<li class='list-group-item list-group-item-success'>Por favor seleccione al menos una opción.</li>";
                    }
                }
            ?>
         </ul>
    </div>
</body>
</html>
