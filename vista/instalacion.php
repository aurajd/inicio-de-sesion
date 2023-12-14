<?php if(isset($_GET["error"])){ echo "<h2>".$_GET["error"]."</h2>"; } ?>
<h1>Registro de administrador general</h1>
<form action="index.php?controller=instalacion&action=registrar_admin" method="POST">
    <label for="nombre">Nombre de usuario</label>
    <input type="text" name="nombre" id="nombre">
    <label for="correo">Correo</label>
    <input type="text" name="correo" id="correo">
    <label for="pw">Contraseña</label>
    <input type="password" name="pw" id="pw">
    <input type="submit" name="enviar">
</form>