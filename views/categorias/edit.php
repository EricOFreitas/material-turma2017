<?php
include_once 'class/categorias.php';
$crud = new crud($DB_con);

if(isset($_POST['btn-edit']))
{
	$id = $_GET['id'];
	$descricao = $_POST['descricao'];
	
	if($crud->update($id,$descricao))
	{
		$msg = "<div class='alert alert-info'>
				<strong>Sucesso!</strong>!
				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<strong>Erro!</strong>
				</div>";
	}
}

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	extract($crud->getID($id));	
}

?>
<div class="clearfix"></div>

<div class="container">
<?php
if(isset($msg))
{
	echo $msg;
}
?>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 
     <form method='post'>
	<h3>Editar registro</h3>
    <table class='table table-bordered'>
 
        <tr>
            <td>Descrição</td>
            <td><input type='text' name='descricao' class='form-control' value="<?php echo $descricao; ?>" required></td>
        </tr>
 
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-edit">
    			<span class="glyphicon glyphicon-edit"></span>  Atualizar Registro
				</button>
                <a href="?p=views/categorias/list.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Voltar</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>