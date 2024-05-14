<?= $this->extend('layout/landing'); ?>
<?= $this->section('landing'); ?>
<section class="home" id="home">
		<div class="home-bg">
			<div class="container-fluid">
				 <div class="row">
					<div class="col-xs-12 col-sm-5 col-sm-offset-6">
						<div class="header-wrapper">
							<h1 class="header-title">Notebook Mockup</h1>
							<p class="header-sub">
								Review of typefaces with examples.
							</p>
							<p class="description">
								Our all time best selling book is now available in a revised and expanded second edition. Notebook Mockup Vol2 is the definitive guide to using type in visual communication, from the printed page to PC screen.
							</p>
							<a class="btn btn-default btn-lg bttn" href="/login" role="button">Login</a>
							<a class="btn btn-default btn-lg red" href="#" role="button">Purchase eBook $99</a>
						</div> <!-- /.header-wrapper -->
					</div>	<!-- .col-sm-5 -->
				</div> <!-- .row -->
			</div> <!-- /.container-fluid -->
		</div> <!-- .home-bg -->
	</section> <!-- #home -->

<?= $this->endSection();