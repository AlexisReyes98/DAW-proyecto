<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <?php
        $numCuenta = $_POST['cuenta'];
        $contraseña = $_POST['contraseña'];
        $autenticacion = array('2163031812' => '123',
                            '001' => '456',
                            '002' => '789');
        $aceptado = 0;
        foreach($autenticacion as $cuenta=>$contra) {
            if ($numCuenta == $cuenta) {
                if ($contraseña == $contra) {
                    $aceptado = 1;
                }
            }
        }
        if ($aceptado == 1) {
            header("Location: 2_frameDivisas.html");
            exit();
        } else {
            header("Location: 1_login.html");   //Para redireccionar al usuario a cierta página
            exit();
        }
    ?>
</body>
</html>
