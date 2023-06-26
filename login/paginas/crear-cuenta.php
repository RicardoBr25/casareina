<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <title>Document</title>
</head>
<body>
    <main>
    <form action="/login/validaciones/validar-crearcuenta.php" method="post">

        <h1>Crear cuenta</h1>

        <p>Nombre <input type="text" placeholder="ingrese su nombre" name="nombre" id="nombre"></p>
        <p>E-mail <input type="email" placeholder="ingrese su email" name="usuario" id="usuario"></p>
        <p>Contraseña <input type="password" placeholder="ingrese su contraseña" name="contraseña" id="contraseña"></p>
        <p>Contraseña <input type="password" placeholder="confirme su contraseña" name="contraseñan"></p>

        <input type="submit" value="Enviar">

    </form>   
    <label><a href="/login/paginas/iniciar-sesion.php">iniciar-sesion</a></label>     
    </main>
</body>
</html>
