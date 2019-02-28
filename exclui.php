<?php
require_once("conecta.php");

 
	$id=$_POST['id'];

	$query="delete from usuario where id = '$id'";
	$resultado=mysqli_query($conexao,$query);
	if($resultado){
		echo "<script>location.href='crud.php';</script>";
}
	else{
		echo "Falha ao apagar registro!";
	}
?>
