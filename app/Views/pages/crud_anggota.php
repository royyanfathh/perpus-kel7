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
                            <li class="active">Data User</li>
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
                                            <th width="50px">No</th>
                                            <th width="50px">Nama Anggota</th>
                                            <th width="50px">Jenis Kelamin</th>
                                            <th width="50px">No Telp</th>
                                            <th width="50px">Alamat</th>
                                            <th width="50px">Role</th>
                                            <th width="50px">Email</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th width="300px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($anggota as $key => $value) { 
                                          if ($value['role'] == 'Anggota') {?>
                                        <tr>
                                            <td  class="text-center"><?= $no++ ?>.</td>
                                            <td  class="text-center"><?= $value['nama'] ?></td>
                                            <td  class="text-center"><?= $value['jk'] ?></td>
                                            <td  class="text-center"><?= $value['telp'] ?></td>
                                            <td  class="text-center"><?= $value['alamat'] ?></td>
                                            <td  class="text-center"><?= $value['role'] ?></td>
                                            <td  class="text-center"><?= $value['email'] ?></td>
                                            <td  class="text-center"><?= $value['username'] ?></td>
                                            <td  class="text-center"><?= $value['password'] ?></td>
                                            <td class ="text-center">
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-edit<?= $value['id'] ?>">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?= $value['id'] ?>">
                                                <i class="bi bi-trash3"></i> Delete
                                            </button>
                                            </td>
                                        </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
    
    
    <!-- modal Add -->
    <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Anggota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <?php echo form_open_multipart(base_url('Anggota/Add')) ?>
               <div class="form-group">
                <label>Nama Anggota</label>
                <input type="text" class="form-control"  name="nama" placeholder="Nama Anggota" required>
                <label>Jenis Kelamin</label>
                <select id="jk" name="jk" class="form-control" value="Pilih Jenis Kelamin">
                <option value="laki-laki">laki laki</option>
                <option value="Perempuan">perempuan</option>
                </select>
                <label>No Telp</label>
                <input type="number" class="form-control"  name="telp" placeholder="No Telp" required>
                <label>Alamat</label>
                <input type="text" class="form-control"  name="alamat" placeholder="Alamat" required>
                <label>Email</label>
                <input type="email" class="form-control"  name="email" placeholder="Email" required>
                <label>Username</label>
                <input type="text" class="form-control"  name="username" placeholder="Username" required>
                <label>Password</label>
                <input type="text" class="form-control"  name="password" placeholder="Password" required>
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
<!-- modal edit -->
<?php foreach ($anggota as $key => $value) { ?> 
    <div class="modal fade" id="modal-edit<?= $value['id'] ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Anggota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php echo form_open(base_url('Anggota/EditData/'.$value['id'])) ?>
               <div class="form-group">
                <label>Nama Anggota</label>
                <input type="text" class="form-control" value="<?= $value['nama'] ?>" name="nama" placeholder="Nama Anggota" required>
                <label>Jenis Kelamin</label>
                <select id="jk" name="jk" class="form-control" value="<?= $value['jk'] ?>">
                <option value="laki-laki">laki laki</option>
                <option value="Perempuan">perempuan</option>
                </select>
                <label>No Telp</label>
                <input type="number" class="form-control" value="<?= $value['telp'] ?>" name="telp" placeholder="No Telp" required>
                <label>Alamat</label>
                <input type="text" class="form-control" value="<?= $value['alamat'] ?>" name="alamat" placeholder="Alamat" required>
                <label>Email</label>
                <input type="email" class="form-control" value="<?= $value['email'] ?>" name="email" placeholder="Email" required>
                <label>Username</label>
                <input type="text" class="form-control"  value="<?= $value['username'] ?>" name="username" placeholder="Username" required>
                <label>Password</label>
                <input type="text" class="form-control" value="<?= $value['password'] ?>" name="password" placeholder="Password" required>
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

<?php foreach ($anggota as $key => $value) { ?> 
    <div class="modal fade" id="modal-delete<?= $value['id'] ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Anggota</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open(base_url('Anggota/DeleteData/'.$value['id'])) ?>
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