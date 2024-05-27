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
                            <li><a href="/">Dashboard</a></li>
                            <li class="active">Data Buku</li>
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
                                <strong class="card-title mt-3">Data Buku</strong>
                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#modal-lg">
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
                                            <th width="20px">id</th>
                                            <th width="20px">foto buku</th>
                                            <th width="300">Judul Buku</th>
                                            <th width="150">Tahun</th>
                                            <th width="150">Jumlah</th>
                                            <th width="100">Lokasi</th>
                                            <th width="150">id Penulis</th>
                                            <th width="150">id Penerbit</th>
                                            <th width="150">id Kategori</th>
                                            <th width="300">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($buku as $key => $value) { ?>
                                        <tr>
                                            <td  class="text-center"><?= $no++ ?>.</td>
                                            <td  class="text-center"><img src ="<?= base_url('images/' .$value['foto_buku']) ?>" alt="user-avatar" class="img-fluid"></td>
                                            <td  class="text-center"><?= $value['judul'] ?></td>
                                            <td  class="text-center"><?= $value['tahun'] ?></td>
                                            <td  class="text-center"><?= $value['jumlah'] ?></td>
                                            <td  class="text-center"><?= $value['lokasi'] ?></td>
                                            <td  class="text-center"><?= $value['penulis_id'] ?></td>
                                            <td  class="text-center"><?= $value['penerbit_id'] ?></td>
                                            <td  class="text-center"><?= $value['kategori_id'] ?></td>
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
    <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <?php echo form_open_multipart(base_url('crudBuku/Add')) ?>
               <div class="form-group">
                <label>foto_buku</label>
                <input type="file" class="form-control"  name="foto_buku" placeholder="foto_buku" required>
                <label>Judul</label>
                <input type="text" class="form-control"  name="judul" placeholder="judul" required>
                <label>Tahun</label>
                <input type="text" class="form-control"  name="tahun" placeholder="tahun" required>
                <label>Jumlah</label>
                <input type="text" class="form-control"  name="jumlah" placeholder="jumlah" required>
                <label>Lokasi</label>
                <input type="text" class="form-control"  name="lokasi" placeholder="lokasi" required>

                <label>Penulis</label>
                <select class="form-control" name="penulis_id" id="">
                    <option value="">Pilih Penulis</option>
                    <?php foreach ($penulis as $key => $value) { ?>
                        <option value="<?= $value['id'] ?>"><?= $value['nama']?></option>
                    <?php } ?>
                </select>
                <label>penerbit</label>
                <select class="form-control" name="penerbit_id" id="">
                    <option value="">Pilih Penerbit</option>
                    <?php foreach($penerbit as $key => $value) { ?>
                        <option value="<?= $value['id'] ?>"><?= $value['nama']?></option>
                    <?php } ?>
                </select>
                
                <label>Kategori</label>
                <select class="form-control" name="kategori_id" id="">
                    <option value="">Pilih Kategori</option>
                    <?php foreach($kategori as $key => $value) { ?>
                        <option value="<?= $value['id'] ?>"><?= $value['nama']?></option>
                    <?php } ?>
                </select>

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
<?php foreach ($buku as $key => $value) { ?> 
   <div class="modal fade" id="modal-edit<?= $value['id'] ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php echo form_open_multipart(base_url('crudBuku/EditData/' .$value['id'])) ?>
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
               <label>foto_buku</label>
                <input type="file" class="form-control" value="<?= $value['foto_buku'] ?>" name="foto_buku" placeholder="foto_buku" required>
                <label>Judul</label>
                <input type="text" class="form-control"  value="<?= $value['judul'] ?>" name="judul" placeholder="judul" required>
                <label>Tahun</label>
                <input type="text" class="form-control" value="<?= $value['tahun'] ?>" name="tahun" placeholder="tahun" required>
                <label>Jumlah</label>
                <input type="text" class="form-control" value="<?= $value['jumlah'] ?>" name="jumlah" placeholder="jumlah" required>
                <label>Lokasi</label>
                <input type="text" class="form-control" value="<?= $value['lokasi'] ?>" name="lokasi" placeholder="lokasi" required>
                
                <label>Penulis</label>
                <select class="form-control" name="penulis_id" id="">
                    <option value="">Pilih Penulis</option>
                    <?php foreach ($penulis as $key => $value) { ?>
                        <option value="<?= $value['id'] ?>"><?= $value['nama']?></option>
                    <?php } ?>
                </select>

                <label>penerbit</label>
                <select class="form-control" name="penerbit_id" id="">
                    <option value="">Pilih Penerbit</option>
                    <?php foreach($penerbit as $key => $value) { ?>
                        <option value="<?= $value['id'] ?>"><?= $value['nama']?></option>
                    <?php } ?>
                </select>
    
                <label>Kategori</label>
                <select class="form-control" name="kategori_id" id="">
                    <option value="">Pilih Kategori</option>
                    <?php foreach($kategori as $key => $value) { ?>
                        <option value="<?= $value['id'] ?>"><?= $value['nama']?></option>
                    <?php } ?>
                </select>

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
<?php foreach ($buku as $key => $value) { ?>
<div class="modal fade" id="modal-delete<?= $value['id'] ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('crudBuku/DeleteData/'.$value['id'])) ?>
                <div class="form-group">
                    Apakah Anda Yakin ingin menghapus data <b><?= $value['judul']?></b>?
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
    <!-- Right Panel -->
    <?= $this->endSection();