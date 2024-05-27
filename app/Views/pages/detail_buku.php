<?= $this->extend('layout/daftarbuku'); ?>
<?= $this->section('daftarbuku'); ?>
<div class="container">
	<a href="<?= base_url(); ?>" class="btn btn-outline-primary m-3 mt-4 position-absolute">
		<i class="ti ti-home"></i>
		Home
	</a>
	<div class="row">
		<div class="col-12">
			<div class="section-title">
				<br>
				<h2>Detail Buku</h2>
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
	
							
							
							</div>
						</div>
					</div>
					<!--/ End Single Tab -->
					<?= $this->endSection();