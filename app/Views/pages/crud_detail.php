<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perpustakaan | <?php echo $title ?></title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/bootstrap/dist/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/themify-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/flag-icon-css/css/flag-icon.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/selectFX/css/cs-skin-elastic.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/jqvmap/dist/jqvmap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style>
        .grey-button {
            background-color: #B0B0B0;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 6px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
        .grey-button:hover {
            background-color: #A0A0A0;
        }
    </style>
</head>

<body>


    <!-- Left Panel -->

    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Detail Peminjaman</h1>
                </div>
                <a href="/Peminjaman" class="grey-button">Kembali</a>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Detail Peminjaman</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/dashboard">Dashboard/ </a></li>
                        <li><a href="/Peminjaman">Data Peminjaman/ </a></li>
                        <li class="active">Detail Peminjaman</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Nama Peminjam: <?php
                            foreach ($anggota as $nama) { ?>
                                    <?php if ($peminjam['user_id'] == $nama['id']) {
                                        echo $nama['nama'];
                                        break;
                                    }
                            } ?></strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Buku yang dipinjam</th>
                                        <th>Jumlah Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Batas Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($detail_peminjaman as $detail) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?php
                                            foreach ($buku as $key => $nama) {
                                                if ($detail['buku_id'] == $nama['id']) {
                                                    echo $nama['judul'];
                                                    break;
                                                }
                                            } ?>
                                            </td>
                                            <td><?php
                                            foreach ($peminjaman as $key => $pe) {
                                                echo $pe['jumlah_buku'];
                                                break;
                                            } ?>
                                            </td>
                                            <td><?php
                                            foreach ($peminjaman as $key => $pe) {
                                                echo $pe['tgl_pinjam'];
                                                break;
                                            } ?>
                                            </td>
                                            <td><?php
                                            foreach ($peminjaman as $key => $pe) {
                                                echo $pe['tgl_kembali'];
                                                break;
                                            } ?>
                                            </td>
                                            <td><?php
                                            foreach ($peminjaman as $key => $pe) {
                                                echo $pe['batas_waktu'];
                                                break;
                                            } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>


</body>

</html>