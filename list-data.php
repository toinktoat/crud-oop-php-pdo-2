<?php
require_once("class.crud.php");
$crud = new CRUD();
?>   
  <table id="example1" class="table table-bordered table-striped">
  <thead>
  <tr>
  <th>No</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>E - mail ID</th>
  <th>Contact No</th>
  <th>Actions</th>

  </tr>
  </thead>
  <tbody>
  <?php
  $query = "select * from tbl_users";
  $crud->dataview($query);
  ?>
  </tbody>
            <tfoot>
            <tr>
              <th>No</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>E - mail ID</th>
              <th>Contact No</th>
              <th>Actions</th>             
            </tr>
            </tfoot>
          </table>

<script>
    $(function () {
        $("#example1").DataTable({
            "columnDefs": [{
                "defaultContent": "-",
                "targets": "_all"
            }]
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>