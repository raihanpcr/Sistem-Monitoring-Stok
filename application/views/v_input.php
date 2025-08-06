<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb bg-white">
		<div class="row align-items-center">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Halaman Input</h4>
			</div>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">
		<!-- ============================================================== -->
		<!-- RECENT SALES -->
		<!-- ============================================================== -->
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12">
				<div class="white-box">
					<div class="d-md-flex mb-3">

						<div class="col-md-3 col-sm-4 col-xs-6 ms-auto">

						</div>
					</div>

					<div class="table-responsive">
						<table>
							<?= form_open_multipart('c_input/uploaddata')?>
							<label>Tanggal Laporan</label>
							<div class="col-2">
								<div class="input-group mb-3">
									<input type="date" name="kalender" id="kalender" class="form-control" >
								</div>
							</div>

							<label>Jenis Laporan</label>
							<div class="col-2">
								<div class="input-group mb-3">
									<select class="dropdown-item" id="jenis" name="Jenis">
										<?php foreach($jenislaporan as $jns) : ?>
											<option value="<?= $jns->idJenis ?>"><?= $jns->jenisLaporan ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
                            
							<label>Upload Data</label>
							<div class="input-group mb-3">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="importexcel" name="importexcel" accept=".xlsx,.xls">
								</div>
							</div>

							<tr>
								<td>
									<button type="submit" class="btn btn-primary">Upload</button>
								</td>
							</tr>
							<?= form_close(); ?>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- /.col -->
	</div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center"> Sistem Monitoring Bahan Pupuk dan Bahan Kimia <a
                    href="#">PTPN5</a>
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
