<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

include'header.php';
include'include/functions.php';

?>

<section role="main" class="content-body content-body-modern">
	<header class="page-header">
		<h2 class="font-weight-bold text-6">Kriteria</h2>
			<div class="right-wrapper">
				<ol class="breadcrumbs">
					<li><span>Kriteria</span></li>
					<li><span>Sistem Pendukung Keputusan Hasil Penjualan</span></li>
				</ol>		
			</div>

	</header>
</section>		

<!-- start: page -->

<section class="card">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>
						
								<h2 class="card-title">Kriteria</h2>
								<?php if (isset($_GET['success'])) { ?>
	                        	<div class="alert alert-success">
	                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                                <i class="card-action card-action-dismiss"></i>
	                            </button>
	                            <span>
	                                <b> Data Berhasil Diproses! </b></span>
	                        	</div>
                    <?php } else if (isset($_GET['failed'])) { ?>
		                        <div class="alert alert-danger col-4">
		                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                                <i class="material-icons">close</i>
		                            </button>
		                            <span>
		                                <b> Data Gagal Diproses! </b></span>
		                        </div>
                    <?php } ?>
							</header>

							

							<div class="card-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-3">
											<p class="card-category"><a href="form-kriteria.php" class="btn btn-warning"><i class="fas fa-plus"> Tambah Data</i></a></p>
										</div>
									</div>
								</div>
								<table class="table table-bordered table-striped mb-0" id="example">
									<thead>
										<tr>
											<th>No</th>
											<th>ID Kriteria</th>
											<th>Nama Kriteria</th>
											<th>Bobot</th>
											<th>Sifat</th>
											<th>Tipe Input</th>
											<th>Keterangan</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$no = 1;
											$kriteria = mysqli_query($conn, "SELECT * FROM kriteria ");
											while ($row = mysqli_fetch_assoc($kriteria)) { ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $row['idkriteria']; ?></td>
													<td><?= $row['namakriteria']; ?></td>
													<td><?= $row['bobot']; ?></td>
													<td><?= $row['sifat']; ?></td>
													<td><?= $row['tipeinput']  ?></td>
													<td><?= $row['keterangan']  ?></td>
													
													<td>
														<a href="include/p_kriteria.php?del&id=<?= $row['idkriteria']; ?>" class="btn btn-danger" onclick="javascript: return confirm('Apakah anda yakin data ini akan dihapus?')" title="DELETE"><i class="fa fa-trash"></i></a>

														<a name="edit" id="edit" href="form-kriteria.php?edit&id=<?= $row['idkriteria']; ?>" class="btn btn-success" title="EDIT"><i class="fa fa-edit"></i></a>
													</td>
												</tr>
												
										<?php  }?>	

										 
												
										
										
									</tbody>
								</table>

								<script>
									$(document).ready(function() {
    								$('#example').DataTable();
									} );
								</script>
							</div>
						</section>

        
						
	
<!-- end: page -->
<div id="dialog" class="modal-block mfp-hide">
			<section class="card">
				<header class="card-header">
					<h2 class="card-title">Are you sure?</h2>
				</header>
				<div class="card-body">
					<div class="modal-wrapper">
						<div class="modal-text">
							<p>Are you sure that you want to delete this row?</p>
						</div>
					</div>
				</div>
				<footer class="card-footer">
					<div class="row">
						<div class="col-md-12 text-right">
							<button id="dialogConfirm" class="btn btn-primary">Confirm</button>
							<button id="dialogCancel" class="btn btn-default">Cancel</button>
						</div>
					</div>
				</footer>
			</section>
		</div>


