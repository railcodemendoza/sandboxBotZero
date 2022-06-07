<?php
session_start();
include "../mensajes/includes/config.php";
include "../mensajes/includes/funciones.php";

if(isset($_SESSION['user'])) {
	header("Location: ../mensajes/index.php");
}

ini_set('error_reporting',0);
?>

<form id="form1" name="form1" method="post" action="">
  <p>
    <label for="textfield"></label>
    Usuario: 
    <input type="text" name="usuario" id="textfield" />
  </p>
  <p>
    Contraseña: 
    <input type="password" name="contrasena" id="textfield2" />
  </p>
  <p>
    <input type="submit" name="guardar" id="button" value="Entrar" />
  </p>
</form>


<?php
if($_POST['guardar']) {

	$usuario = clean($_POST['usuario']);
	$contrasena = md5($_POST['contrasena']);

        
    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $result = mysqli_query($conn, $query);
	
	$contar = mysqli_num_rows($result);
	
	if ($contar != 0) {
	
		while($row=mysqli_fetch_array($result)) {
		
			if($usuario == $row['usuario'] && $contrasena == $row['contrasena']) 
			
			{
			
				$_SESSION['usuario'] = $usuario;
				
				$_SESSION['id'] = $row['id'];
				
				$_SESSION['rango'] = $row['rango'];
				
				header("Location: ../mensajes/index.php");
				
			}
			
		} 
		
	} else { echo "El nombre de usuario y/o contrasena no coinciden"; }
	
}
?>