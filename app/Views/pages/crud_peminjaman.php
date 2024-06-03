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
          <li class="active">Data Peminjaman</li>
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
              <i class="bi bi-plus-lg"></i> Ajukan Peminjaman
            </button>
          </div>
          <div class="card-body">
            <?php
            if (session()->getFlashdata('pesan')) {
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
              echo '<span class="badge badge-pill badge-success">Success</span> ' . session()->getFlashdata('pesan');
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
                  <th>Nama Anggota</th>
                  <th>Jumlah Buku</th>
                  <th>Tgl Pinjam</th>
                  <th>Tgl Kembali</th>
                  <th>Batas Waktu</th>
                  <th>Status</th>
                  <th>Denda</th>
                  <th width="100px">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($peminjaman as $key => $value) { ?>
                  <tr>
                    <td class="text-center"><?= $no++ ?>.</td>
                    <td class="text-center">
                      <?php
                      foreach ($anggota as $key => $nama) { ?>
                        <?php if ($value['user_id'] == $nama['id']) {
                          if ($nama['role'] == 'Anggota') {
                            echo $nama['nama'];
                            break;
                          }
                        }
                      } ?>
                    </td>
                    <td class="text-center"><?= $value['jumlah_buku'] ?></td>
                    <td class="text-center"><?= $value['tgl_pinjam'] ?></td>
                    <td class="text-center"><?= $value['tgl_kembali'] ?></td>
                    <td class="text-center"><?= $value['batas_waktu'] ?></td>
                    <td class="text-center"><?= $value['status'] ?></td>
                    <td class="text-center"><?= $value['denda'] ?></td>
                    <td class="text-center">
                      <button type="button" class="btn btn-secondary" data-toggle="modal"
                        data-target="#modal-edit<?= $value['id'] ?>">
                        <i class="bi bi-book"></i> Pilih Buku
                      </button>
                      <a href="<?= base_url('Peminjaman/Detail/' . $value['id']) ?>" class="btn btn-primary mt-1">
                        <i class="bi bi-info-circle"></i> Detail
                      </a>
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


<!-- modal Add -->
<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambahkan Peminjaman</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart(base_url('Peminjaman/Add')) ?>
        <div class="form-group">
          <label>Jumlah Buku</label>
          <input type="number" class="form-control" name="jumlah_buku" placeholder="Jumlah Buku" required>
          <label>Tanggal Pinjam</label>
          <input type="date" class="form-control" name="tgl_pinjam" placeholder="Tanggal Pinjam" required>
          <label>Tanggal Kembali</label>
          <input type="date" class="form-control" name="tgl_kembali" placeholder="Tanggal Kembali" required>
          <label>Batas Waktu</label>
          <input type="time" class="form-control" name="batas_waktu" placeholder="Batas Waktu" required>
          <label>Status</label>
          <select id="status" name="status" class="form-control">
            <option value="Dipinjam">Dipinjam</option>
            <option value="Kembali">Kembali</option>
            <option value="Selesai">Selesai</option>
          </select>
          <label>denda</label>
          <input type="text" class="form-control" name="denda" placeholder="Denda" required>
          <label>Nama Peminjam</label>
          <select class="form-control" name="user_id" id="">
            <option value="">Pilih Peminjam</option>
            <?php foreach ($anggota as $key => $value) {
              if ($value['role'] == 'Anggota') { ?>
                <option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
              <?php }
            } ?>
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
<!-- modal edit -->
<?php foreach ($peminjaman as $key => $value) { ?>
  <div class="modal fade" id="modal-edit<?= $value['id'] ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail Peminjaman</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open(base_url('Peminjaman/AddDetail/' . $value['id'])) ?>
          <div class="form-group">
            <label>id Peminjaman</label>
            <input type="text" class="form-control" value="<?= $value['id'] ?>" name="peminjaman_id" placeholder="Denda"
              required>
          </div>
          <label>Buku</label>
          <select class="form-control" name="buku_id" id="">
            <option value="">Pilih Buku</option>
            <?php foreach ($buku as $nama) { ?>
              <option value="<?= $nama['id'] ?>"><?= $nama['judul'] ?></option>
            <?php } ?>
          </select>
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


<?= $this->endSection();