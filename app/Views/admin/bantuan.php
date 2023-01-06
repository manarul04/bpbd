<?= $this->extend('admin/layout/page_layout') ?>

<?= $this->section('content') ?>
<?= view('v_alert') ?>
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data /</span>Bantuan</h4>
    <!-- Responsive Table -->
    <div class="card">
      <h5 class="card-header">Tambah Bantuan
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
          +
        </button>
      </h5>
      <!-- Modal -->
      <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="tambahLabel">Tambah Bantuan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/bantuan/tambah_bantuan') ?>" method="POST">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="bantuan" class="form-label">Bantuan</label>
                  <input type="text" class="form-control" id="bantuan" name="bantuan" placeholder="nama bantuan">
                </div>
                <div class="mb-3">
                  <label for="bantuan" class="form-label">Tanggal</label>
                  <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>

                <div class="mb-3">
                  <label for="bantuan" class="form-label">Jenis Bantuan</label>
                  <select name="jenis_bantuan" id="" class="form-select">
                    <option>--Pilih Jenis Bantuan--</option>
                    <?php
                    foreach ($jenisbantuan as $jb) :
                    ?>
                      <option value="<?= $jb['id_jenisbantuan'] ?>"><?= $jb['jenisbantuan'] ?></option>
                    <?php
                    endforeach
                    ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="kecamatan" class="form-label">Kejadian</label>
                  <select name="id_kejadian" id="" class="form-select">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($kejadian as $kej) :
                    ?>
                      <option value="<?= $kej['id_kejadian'] ?>"><?= $kej['kejadian'] ?>, <?= $kej['desa'] ?> RT <?= $kej['rt'] ?>/RW <?= $kej['rw'] ?></option>
                    <?php
                    endforeach
                    ?>
                  </select>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="myTable">
            <thead>
              <tr">
                <th>No</th>
                <th>Bantuan</th>
                <th>Jenis Bantuan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($bantuan as $row) :
              ?>
                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td><?= $row['bantuan'] ?></td>
                  <td><?= $row['jenisbantuan'] ?></td>
                  <td><?= $row['tanggal'] ?></td>
                  <td>
                    <button type="button" class="btn btn-icon btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $row['id_bantuan'] ?>">
                      <span class="tf-icons bx bx-edit"></span>
                    </button>
                    <button type="button" class="btn btn-icon btn-danger">
                      <span class="tf-icons bx bx-x"></span>
                    </button>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="edit<?= $row['id_bantuan'] ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editLabel">Edit Bantuan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="<?= base_url('admin/bantuan/edit_bantuan') ?>" method="POST">
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="bantuan" class="form-label">Bantuan</label>
                                <input type="text" class="form-control" id="bantuan" name="bantuan" placeholder="nama bantuan">
                                <input type="text" class="form-control" id="id_bantuan" name="id_bantuan" value="<?= $row['id_bantuan'] ?>" hidden>
                              </div>
                              <div class="mb-3">
                                <label for="bantuan" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $row['tanggal'] ?>">
                              </div>

                              <div class="mb-3">
                                <label for="bantuan" class="form-label">Jenis Bantuan</label>
                                <select name="jenis_bantuan" id="" class="form-select">
                                  <?php
                                  foreach ($jenisbantuan as $jb) :
                                  ?>
                                    <option value="<?= $jb['id_jenisbantuan'] ?>" ><?= $jb['jenisbantuan'] ?></option>
                                  <?php
                                  endforeach
                                  ?>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kejadian</label>
                                <select name="id_kejadian" id="" class="form-select">
                                  <option value="">--Pilih--</option>
                                  <?php
                                  foreach ($kejadian as $kej) :
                                  ?>
                                    <option value="<?= $kej['id_kejadian'] ?>"><?= $kej['kejadian'] ?>, <?= $kej['desa'] ?> RT <?= $kej['rt'] ?>/RW <?= $kej['rw'] ?></option>
                                  <?php
                                  endforeach
                                  ?>
                                </select>
                              </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php
              endforeach
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--/ Responsive Table -->
  </div>
  <!-- / Content -->

  <!-- Footer -->
  <?= view('admin/layout/footer') ?>
  <!-- / Footer -->

  <div class="content-backdrop fade"></div>
</div>
<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>
<?= $this->endSection() ?>