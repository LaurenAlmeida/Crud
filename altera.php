<?php
require_once 'conecta.php';

	$id = $_POST['id'];
  $query = "SELECT * FROM usuario WHERE id='$id'";
$resultado=mysqli_query($conexao,$query);
$linhas=mysqli_num_rows($resultado);
for($i=0;$i<$linhas;$i++){
		$registro=mysqli_fetch_array($resultado);
	?>

 <form method="post" action="altera.php">
 	Id:<input type="text" name="id" id="id" value="<?php echo $registro['id']?>"> <br><br>
	Nome:<input type="text" name="nome" id="nome" value="<?php echo $registro['nome']?>"><br><br>
	Cidade:<input type="text" name="cidade" id="cidade" value="<?php echo $registro['cidade']?>"><br><br>
	<button type="submit" name="salvar" id="salvar">Salvar</button> <br>
<?php
}?>
 </form>

 <?php
if (isset($_POST['salvar'])) {
      
      	$id = $_POST['id'];
  

    $nome = $_POST['nome'];
	$cidade = $_POST['cidade'];
	$q2="UPDATE usuario set nome='$nome',cidade='$cidade' WHERE id='$id';";
	$r2=mysqli_query($conexao,$q2);
	if ($r2){
	echo "<script>location.href='crud.php';</script>";
}
else{
	echo "Erro ao alterar.Tente novamente!";
}
}
?>