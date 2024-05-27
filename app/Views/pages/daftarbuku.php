<?= $this->extend('layout/daftarbuku'); ?>
<?= $this->section('daftarbuku'); ?>
<div class="container">
<div class="d-flex justify-content-between mt-5">
			<a class="btn btn-default btn-lg bttn" href="/" role="button"><i class="bi bi-house"></i> Kembali ke Home</a>
			<a class="btn btn-default btn-lg bttn ms-auto" href="<?= base_url('login/logout') ?>" role="button"><i class="bi bi-box-arrow-left"></i>
				Logout</a>
		</div>
	<div class="row">
		<div class="col-12">
			<div class="section-title">
				<br>
				<h2>Daftar Buku</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="product-info">
				<div class="tab-content" id="myTabContent">
					<!-- Start Single Tab -->

					<div class="tab-pane fade show active" id="man" role="tabpanel">
						<div class="tab-single">
							<div class="row">
								<?php $no = 1;
								foreach ($buku as $key => $value) { ?>
									<div class="col-xl-3 col-lg-4 col-md-4 col-12">
										<div class="single-product">
											<div class="product-img">
												<a href="#">
													<img class="default-img" src="<?= base_url('images/' . $value['foto_buku']) ?>" alt="#">
													<img class="hover-img" src="<?= base_url('images/' . $value['foto_buku']) ?>" alt="#">
												</a>
												<div class="button-head">
													<div class="product-action">
														<a class=" ti-eye" href="#"></i><span>Ajukan Pinjaman</span></a>
													</div>
													<div class="product-action-2">
														<a title="Add to cart" href="#">Pinjam Sekarang!</a>
													</div>
												</div>
											</div>
											<div class="product-content text-center">
												<h3><a href='<?= base_url('DetailBuku/index/' . $value['id']) ?>'>
														<h4><?= $value['judul'] ?></h4>
													</a></h3>
												<div class="product-price text-center">
													<span>Penulis:
														<?php
														foreach ($penulis as $key => $nama) {
															if ($value['penulis_id'] == $nama['id']) {
																echo $nama['nama'];
																break;
															}
														} ?>
													</span>
													<span><br>
														<?php
														foreach ($penerbit as $key => $nama) {
															if ($value['penerbit_id'] == $nama['id']) {
																echo $nama['nama'];
																break;
															}
														} ?>
													</span>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<!--/ End Single Tab -->
					<?= $this->endSection();