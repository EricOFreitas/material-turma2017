<?php

include_once 'dbconfig.php';

class crud
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	public function create($descricao)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO categorias(descricao) VALUES(:descricao)");
			$stmt->bindparam(":descricao",$descricao);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
	
	public function getID($id)
	{
		$stmt = $this->db->prepare("SELECT * FROM categorias WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	public function update($id,$descricao)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE categorias SET descricao=:descricao
													WHERE id=:id ");
			$stmt->bindparam(":descricao",$descricao);
			$stmt->bindparam(":id",$id);
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function delete($id)
	{
		$stmt = $this->db->prepare("DELETE FROM categorias WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
		
	public function dataview($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php print($row['id']); ?></td>
                <td><?php print($row['descricao']); ?></td>
                <td align="center">
                <a href="?p=views/categorias/edit.php&id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                <a href="#" onclick="deleta(<?php print($row['id']); ?>)"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
				<td>Não há descrições cadastradas.<td>
            </tr>
            <?php
		}
		
	}
}
