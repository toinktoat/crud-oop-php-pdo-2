<?php
require_once("class.crud.php");
$crud = new CRUD();
?>

<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">
<a href="add-data.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah Data</a>
</div>

<div class="clearfix"></div><br />

<div class="container">		
      <div id="load-users"></div>
</div>

<?php include_once 'footer.php'; ?>
