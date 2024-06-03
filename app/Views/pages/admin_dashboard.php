<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="content mt-3">
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count"><?= $buku ?></span>
                </h4>
                <p class="text-light">Jumlah Buku</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart1"></canvas>
                </div>

            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count"><?= $penulis ?></span>
                </h4>
                <p class="text-light">Jumlah penulis</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart2"></canvas>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count"><?= $penerbit ?></span>
                </h4>
                <p class="text-light">Jumlah Penerbit</p>

            </div>

            <div class="chart-wrapper px-0" style="height:70px;" height="70">
                <canvas id="widgetChart3"></canvas>
            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count"><?= $kategori ?></span>
                </h4>
                <p class="text-light">Jumlah Kategori</p>

                <div class="chart-wrapper px-3" style="height:70px;" height="70">
                    <canvas id="widgetChart4"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count"><?= $anggota ?></span>
                </h4>
                <p class="text-light">Jumlah User</p>

                <div class="chart-wrapper px-3" style="height:70px;" height="70">
                    <canvas id="widgetChart4"></canvas>
                </div>
            </div>
        </div>
        <!--/social-box-->
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">10</span>
                </h4>
                <p class="text-light">Jumlah Petugas</p>

                <div class="chart-wrapper px-3" style="height:70px;" height="70">
                    <canvas id="widgetChart4"></canvas>
                </div>
            </div>
        </div>
        <!--/social-box-->
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">2</span>
                </h4>
                <p class="text-light">Jumlah Peminjaman</p>

                <div class="chart-wrapper px-3" style="height:70px;" height="70">
                    <canvas id="widgetChart4"></canvas>
                </div>
            </div>
        </div>
        <!--/social-box-->
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">1</span>
                </h4>
                <p class="text-light">Jumlah Pengembalian</p>

                <div class="chart-wrapper px-3" style="height:70px;" height="70">
                    <canvas id="widgetChart4"></canvas>
                </div>
            </div>
        </div>
        <!--/social-box-->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h3 class="card-title"><b>Laporan Hari Ini</b></h3>

                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 col-md-3">
                            <h4 class="text-success"><b>Anggota Baru</b></h4>
                            <h3>2</h3>
                        </div>
                        <div class="col-6 col-md-3">
                            <h4 class="text-info"><b>Peminjaman</b></h4>
                            <h3>1</h3>
                        </div>
                        <div class="col-6 col-md-3">
                            <h4 class="text-info"><b>Pengembalian</b></h4>
                            <h3>2</h3>
                        </div>
                        <div class="col-6 col-md-3">
                            <h4 class="text-danger"><b>Jatuh Tempo</b></h4>
                            <h3>1</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                    <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">Ikhtisar 7 hari terakhir</h5>
                    </div>
                </div>
                <div id="chart"></div>
            </div>
        </div>
    </div>

    <!--/.col-->
    <!--/social-box-->
</div>
<!--/.col-->

</div> <!-- .content -->
</div><!-- /#right-panel -->
<?= $this->endSection();