<?php

require_once('dbconfig.php');

class crud
{
	private $conn;

	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }

	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	public function create($fname,$lname,$email,$contact)
	{
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO tbl_users(first_name,last_name,email_id,contact_no) VALUES(:fname, :lname, :email, :contact)");
			$stmt->bindparam(":fname",$fname);
			$stmt->bindparam(":lname",$lname);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":contact",$contact);
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
		$stmt = $this->conn->prepare("SELECT * FROM tbl_users WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function update($id,$fname,$lname,$email,$contact)
	{
		try
		{
			$stmt=$this->conn->prepare("UPDATE tbl_users SET first_name=:fname,
		                                               last_name=:lname,
													   email_id=:email,
													   contact_no=:contact
													WHERE id=:id ");
			$stmt->bindparam(":fname",$fname);
			$stmt->bindparam(":lname",$lname);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":contact",$contact);
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
		$stmt = $this->conn->prepare("DELETE FROM tbl_users WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}

	/* paging */

	public function dataview($query)
	{
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php print($row['id']); ?></td>
                <td><?php print($row['first_name']); ?></td>
                <td><?php print($row['last_name']); ?></td>
                <td><?php print($row['email_id']); ?></td>
                <td><?php print($row['contact_no']); ?></td>
                <td align="center">
                <a class="btn btn-sm btn-success" href="edit-data.php?edit_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
           
             
                 <a class="btn btn-sm btn-danger" id="delete_user" data-id="<?php print($row['id']); ?>" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i></a>
							  </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Data Kosong</td>
            </tr>
            <?php
		}

	}


	/* paging */

}
