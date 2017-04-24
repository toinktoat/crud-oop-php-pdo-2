<div class="container">

</div>
<div id="preloader">
    <div id="preloader-inner"></div>
</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="jquery.js"></script>
<script src="parsleyjs/dist/parsley.min.js"></script>
<script src="parsleyjs/dist/i18n/id.js"></script>
<script src="preloader/dist/jquery.preloader.min.js" type="text/javascript"></script>
<script src="sw/sweetalert2.min.js"></script>
<!-- Java script Datatables -->
<script src="datatables/jquery.dataTables.min.js"></script>
<script src="datatables/dataTables.bootstrap.min.js"></script>


<!-- Java script Datatables -->
<!-- Java script parsley -->
<script>
$(document).ready(function(){
	$('form').parsley();
});
</script>
<!-- Java script parsley -->

<!-- Java script Preloader -->
<script>
    $(window).preloader({
        delay: 500
    });
</script>
<!-- Java script Preloadder -->

<!-- Java script Sweetalert -->
<script>
	$(document).ready(function(){

	     readUsers();

		 $(document).on('click', '#delete_user', function(e){

			var userId = $(this).data('id');
			SwalDelete(userId);
			e.preventDefault();
		});

	});

	function SwalDelete(userId){

		swal({
			title: 'Apakah Anda Yakin?',
			text: "Data Akan Terhapus Secara Permanen!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus Data!',
			showLoaderOnConfirm: true,

			preConfirm: function() {
			  return new Promise(function(resolve) {

			     $.ajax({
			   		url: 'delete.php',
			    	type: 'POST',
			       	data: 'delete='+userId,
			       	dataType: 'json'
			     })
			     .done(function(response){
			     	swal('Terhapus!', response.message, response.status);
					readUsers();
			     })
			     .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false
		});

	}

	function readUsers(){
		$('#load-users').load('list-data.php');
	}

</script>
<!-- Java script Sweetalert -->

</body>
</html>
