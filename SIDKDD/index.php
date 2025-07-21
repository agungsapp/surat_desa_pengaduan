<?php

?>



<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SIDKDB</title>
	<link rel="icon" href="dist/img/LOGO.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-red navbar-light" style="background-color: teal; padding: 0; margin: 0; width: 100%;"><!-- Left navbar links -->


			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link">
						<font color="white">
							<b>SISTEM INFORMASI DATA KEPENDUDUKAN DESA BOGOREJO</b>
						</font>
					</a>
				</li>
			</ul>

		</nav>

		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->


	<?php
	// include "surat/suket_lahir.php";
	if (isset($_GET['page'])) {
		$hal = $_GET['page'];
		switch ($hal) {

			//Pengguna
			case 'data-pengguna':
				include "admin/pengguna/data_pengguna.php";
				break;
			case 'add-pengguna':
				include "admin/pengguna/add_pengguna.php";
				break;
			case 'edit-pengguna':
				include "admin/pengguna/edit_pengguna.php";
				break;
			case 'del-pengguna':
				include "admin/pengguna/del_pengguna.php";
				break;

			//kartu KK
			case 'data-kartu':
				include "admin/kartu/data_kartu.php";
				break;
			case 'add-kartu':
				include "admin/kartu/add_kartu.php";
				break;
			case 'edit-kartu':
				include "admin/kartu/edit_kartu.php";
				break;
			case 'anggota':
				include "admin/kartu/anggota.php";
				break;
			case 'del-anggota':
				include "admin/kartu/del_anggota.php";
				break;
			case 'del-kartu':
				include "admin/kartu/del_kartu.php";
				break;

			//penduduk
			case 'data-pend':
				include "admin/pend/data_pend.php";
				break;
			case 'add-pend':
				include "admin/pend/add_pend.php";
				break;
			case 'edit-pend':
				include "admin/pend/edit_pend.php";
				break;
			case 'del-pend':
				include "admin/pend/del_pend.php";
				break;
			case 'view-pend':
				include "admin/pend/view_pend.php";
				break;

			//lahir
			case 'data-lahir':
				include "admin/lahir/data_lahir.php";
				break;
			case 'add-lahir':
				include "admin/lahir/add_lahir.php";
				break;
			case 'edit-lahir':
				include "admin/lahir/edit_lahir.php";
				break;
			case 'del-lahir':
				include "admin/lahir/del_lahir.php";
				break;

			//mendu
			case 'data-mendu':
				include "admin/mendu/data_mendu.php";
				break;
			case 'add-mendu':
				include "admin/mendu/add_mendu.php";
				break;
			case 'edit-mendu':
				include "admin/mendu/edit_mendu.php";
				break;
			case 'del-mendu':
				include "admin/mendu/del_mendu.php";
				break;

			//pindah
			case 'data-pindah':
				include "admin/pindah/data_pindah.php";
				break;
			case 'add-pindah':
				include "admin/pindah/add_pindah.php";
				break;
			case 'edit-pindah':
				include "admin/pindah/edit_pindah.php";
				break;
			case 'del-pindah':
				include "admin/pindah/del_pindah.php";
				break;

			//datang
			case 'data-datang':
				include "admin/datang/data_datang.php";
				break;
			case 'add-datang':
				include "admin/datang/add_datang.php";
				break;
			case 'edit-datang':
				include "admin/datang/edit_datang.php";
				break;
			case 'del-datang':
				include "admin/datang/del_datang.php";
				break;

			//suket
			case 'suket-domisili':
				include "surat/suket_domisili.php";
				break;
			case 'suket-lahir':
				include "surat/suket_lahir.php";
				break;
			case 'suket-mati':
				include "surat/suket_mati.php";
				break;
			case 'suket-datang':
				include "surat/suket_datang.php";
				break;
			case 'suket-pindah':
				include "surat/suket_pindah.php";
				break;

			//laporan
			case 'data penduduk':
				include "false";
				break;
			case 'data kartu keluarga':
				include "false";
				break;
			case 'data lahir':
				include "false";
				break;
			case 'data meninggal':
				include "false";
				break;
			case 'data pendatang':
				include "false";
				break;
			case 'data pindah':
				include "false";
				break;



			//default/false
			default:
				echo "<center><b>FITUR IKI DURUNG DADI BOSS, TERIMA KASIH!</b></center>";
				break;
		}
	} else {
		// Auto Halaman Home Pengguna

	}
	?>

	</div>
	</section>
	<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<div class="float-right d-none d-sm-block">
			Copyright &copy;
			</a>
			2025
		</div>

	</footer>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>