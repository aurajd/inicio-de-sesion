<?php if(isset($_SESSION['perfil']) && $_SESSION["perfil"]=="s"){?>
    <a href="index.php?controller=admin">Volver atrás</a>
    <?php if(isset($_GET["error"])){ echo "<h2>".$_GET["error"]."</h2>"; } ?>
    <h1>Registro de administrador de minijuegos</h1>
    <form action="index.php?controller=admin&action=registrar_admin" method="POST">
        <label for="nombre">Nombre de usuario</label>
        <input type="text" name="nombre" id="nombre">
        <label for="correo">Correo</label>
        <input type="text" name="correo" id="correo">
        <label for="pw">Contraseña</label>
        <input type="password" name="pw" id="pw">
        <input type="submit" name="enviar">
</form>
<?php } else { ?>
    <h1>No deberías estar aquí, inicia sesión</h2>
<?php } ?>