<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="/css/login.css">
    </head>
<body>
    <div>
        <form action="/login/login/validaciones/validar-iniciarsesion.php" method="post">

        <h1>Iniciar Sesion</h1>

        <p>Usuario <input type="email" placeholder="ingrese su email" name="usuario"></p>

        <p>Contraseña <input type="password" placeholder="ingrese su contraseña" name="contraseña"></p>

        <input type="submit" value="Ingresar">

        </form>
        <label><a href="/login/login/paginas/iniciar-sesion.php">Crear Cuenta</a></label>
    </div>
    
</body>

</html>