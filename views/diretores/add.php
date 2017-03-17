<?php
include_once 'class/categorias.php';
$crud = new crud($DB_con);

if(isset($_POST['btn-save']))
{
	$descricao = $_POST['descricao'];
	
	if($crud->create($descricao))
	{
		header("Location: ?p=views/categorias/add.php&sucesso");
	}
	else
	{
		header("Location: ?p=views/categorias/add.php&falha");
	}
}
?>
<div class="clearfix"></div>

<?php
if(isset($_GET['sucesso']))
{
	?>
		<div class="container">
		<div class="alert alert-info">
		<strong>Sucesso!!!</strong>!
		</div>
		</div>
    <?php
}
else if(isset($_GET['falha']))
{
	?>
    <div class="container">
		<div class="alert alert-warning">
			<strong>Falha!!!</strong>
		</div>
	</div>
    <?php
}
?>

<div class="clearfix"></div><br />

<div class="container">

 	
	<form method='post'>
		<h3>Novo registro</h3>
		<table class='table table-bordered'>
	 
			<tr>
				<td>Descrição</td>
				<td><input type='text' name='descricao' class='form-control' required></td>
			</tr>
	 
			<tr>
				<td colspan="2">
					<button type="submit" class="btn btn-primary" name="btn-save">
						<span class="glyphicon glyphicon-plus"></span> Criar Novo
					</button>  
					<a href="?p=views/categorias/list.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Voltar</a>
				</td>
			</tr>
	 
		</table>
	</form>
     
     
</div>