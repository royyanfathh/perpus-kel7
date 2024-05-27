<?= $this->extend('layout/crud'); ?>
    <?= $this->section('crud'); ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="/dashboard">Dashboard</a></li>
                            <li class="active">Data Penulis</li>
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
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <strong class="card-title mt-3">Data Table</strong>
                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#modal-sm">
                                <i class="bi bi-plus-lg"></i> Add Data
                                </button>
                            </div>
                            <div class="card-body">
                                <?php
                                if (session()->getFlashdata('pesan')) {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                                echo '<span class="badge badge-pill badge-success">Success</span> '.session()->getFlashdata('pesan');
                                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                                echo '<span aria-hidden="true">&times;</span>';
                                echo '</button>';
                                echo '</div>';
                                }
                                ?>
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th width="50px">No</th>
                                            <th width="300">Nama Penulis</th>
                                            <th width="300">Alamat</th>
                                            <th width="150">Website</th>
                                            <th width="300px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($penulis as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?>.</td>
                                            <td class="text-center"><?= $value['nama'] ?></td>
                                            <td class="text-center"><?= $value['alamat'] ?></td>
                                            <td class="text-center"><?= $value['website'] ?></td>
                                            <td class ="text-center">
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-edit<?= $value['id'] ?>">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?= $value['id'] ?>">
                                                <i class="bi bi-trash3"></i> Delete
                                            </button>
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
    </div><!-- /#right-panel -->
<!-- modal add -->
    <div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Penulis</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <?php echo form_open(base_url('Penulis/Add')) ?>
               <div class="form-group">
                <label>Nama Penulis</label>
                <input type="text" class="form-control"  name="nama" placeholder="Nama Penulis" required>
                <label>Alamat</label>
                <input type="text" class="form-control"  name="alamat" placeholder="Alamat" required>
                <label>Website</label>
                <input type="text" class="form-control"  name="website" placeholder="Website" required>
               </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!--modal edit -->
<?php foreach ($penulis as $key => $value) { ?> 
   <div class="modal fade" id="modal-edit<?= $value['id'] ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Penulis</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <?php echo form_open(base_url('Penulis/EditData/'.$value['id'])) ?>
               <div class="form-group">
                <label>Nama Penulis</label>
                <input type="text" class="form-control" value="<?= $value['nama'] ?>" name="nama" placeholder="Nama Kategori" required>
                <label>Alamat</label>
                <input type="text" class="form-control" value="<?= $value['alamat'] ?>" name="alamat" placeholder="Alamat" required>
                <label>Website</label>
                <input type="text" class="form-control" value="<?= $value['website'] ?>" name="website" placeholder="Website" required>
               </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<?php } ?>

<!-- modal delete -->
<?php foreach ($penulis as $key => $value) { ?> 
   <div class="modal fade" id="modal-delete<?= $value['id'] ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Penulis</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <?php echo form_open(base_url('Penulis/DeleteData/'.$value['id'])) ?>
               <div class="form-group">
                Apakah Anda Yakin ingin menghapus data <b><?= $value['nama']?></b>?
               </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<?php } ?>

    <?= $this->endSection();