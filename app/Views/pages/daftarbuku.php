<?= $this->extend('layout/daftarbuku'); ?>
<?= $this->section('daftarbuku'); ?>
<div class="container">
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
							<?php $no = 1;
          foreach ($penulis as $key => $nama) { ?>
								<div class="col-xl-3 col-lg-4 col-md-4 col-12">
									<div class="single-product">
										<div class="product-img">
											<a href="product-details.html">
												<img class="default-img" src="<?= base_url('images/' .$value['foto_buku']) ?>" alt="#">
												<img class="hover-img" src="<?= base_url('images/' .$value['foto_buku']) ?>" alt="#">
											</a>
											<div class="button-head">
												<div class="product-action">
													<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i
															class=" ti-eye"></i><span>Quick Shop</span></a>
													<a title="Wishlist" href="#"><i class="ti-heart"></i><span>Add to Wishlist</span></a>
													<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
															class=" ti-eye"></i><span>Ajukan Pinjaman</span></a>
												</div>
												<div class="product-action-2">
													<a title="Add to cart" href="/dashboard">Pinjam Sekarang!</a>
												</div>
											</div>
										</div>
										<div class="product-content text-center">
											<h3><a href='<?= base_url('DetailBuku/index/' .$value['id']) ?>'><h4><?= $value['judul'] ?></h4></a></h3>
											<div class="product-price text-center">
												<span>Penulis: <?= $nama['nama'] ?></span>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
								<?php } ?>
							</div>
						</div>
					</div>
					<!--/ End Single Tab -->
					<?= $this->endSection();