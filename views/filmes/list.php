<script type="text/javascript">
	function deleta(x){
		if(confirm("Deseja realmente apagar o registro?")){
			window.location = "?p=views/categorias/delete.php&id="+x;
		}
	}
</script>
<?php
include_once 'class/categorias.php';
?>

<div class="clearfix"></div>

<div class="container">
<a href="?p=views/categorias/add.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Adicionar registro</a>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 <table class='table table-bordered table-responsive'>
		 <tr>
			 <th>#</th>
			 <th>Descrição</th>
			 <th colspan="2" width="5%">Ações</th>
		 </tr>
		 <?php
			$crud = new crud($DB_con);
			$query = "SELECT * FROM categorias";
			$crud->dataview($query);
		 ?>
 
	</table>
    
</div>