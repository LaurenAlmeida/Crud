<?php 
 include 'conecta.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Crud 1</title>
</head>
<body>

<form action="crud.php" method="post">
	Nome:<input type="text" name="nome" id="nome"><br><br>
	Cidade:<input type="text" name="cidade" id="cidade"><br><br>
	<button type="submit" name="enviar" id="enviar">Enviar</button> <br><br>
</form>
	<table>
		<tr>
		<th>Id</th>
		<th>Nome</th>
		<th>Cidade</th>
		<tr>
<?php
$query = "SELECT * FROM usuario";
$resultado=mysqli_query($conexao,$query);
$linhas=mysqli_num_rows($resultado);
for($i=0;$i<$linhas;$i++){
		$registro=mysqli_fetch_array($resultado);
	?>
				<tr>
				<td><?= $registro['id']?></td>
				<td><?= $registro['nome']?></td>
				<td><?= $registro['cidade']?></td>
				<td>
				<form action="altera.php" method="post"><input type="hidden"  value="<?= $registro['id']?>" name="id"><button type="submit" id="editar">Editar</button></form></td>
				<td>
				<form action="exclui.php" method="post"><input type="hidden" value="<?= $registro['id']?>" name="id"><button type="submit" id="deletar">Excluir</button></form></td>

			</tr>
<?php
}
?>
	</table>
</body>
</html>

<?php
if (isset($_POST['enviar'])) {
	$nome = $_POST['nome'];
	$cidade = $_POST['cidade'];
	$sql = "INSERT INTO usuario (nome,cidade) VALUES ('$nome','$cidade')";
	$res = mysqli_query($conexao,$sql);
	if($res){
			echo "<script>location.href='crud.php';</script>";

	}else{
		echo "ERRO";
	}

}
?>
