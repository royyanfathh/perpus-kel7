<?= $this->extend('layout/landing'); ?>
<?= $this->section('landing'); ?>
<section class="home" id="home">
		<div class="home-bg">
			<div class="container-fluid">
				 <div class="row">
					<div class="col-xs-12 col-sm-5 col-sm-offset-6">
						<div class="header-wrapper">
							<h1 class="header-title">Perpustakaan Digital</h1>
							<p class="header-sub">
                            Membaca adalah kegiatan penuh makna
							</p>
							<p class="description">
                            Perpustakaan digital adalah sebuah platform daring yang menyediakan akses ke koleksi buku, artikel, jurnal, dan sumber daya informasi lainnya secara elektronik.
							</p>
							<a class="btn btn-default btn-lg bttn" href="/login" role="button">Login</a>
							<a class="btn btn-default btn-lg bttn" href="/daftarbuku" role="button">Daftar Buku</a>
						</div> <!-- /.header-wrapper -->
					</div>	<!-- .col-sm-5 -->
				</div> <!-- .row -->
			</div> <!-- /.container-fluid -->
		</div> <!-- .home-bg -->
	</section> <!-- #home -->
	
<?= $this->endSection();