<?= $this->extend('admin/layout/page_layout') ?>

<?= $this->section('content') ?>
<?= view('v_alert') ?>
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data /</span>Jenis Bantuan</h4>
    <!-- Responsive Table -->
    <div class="card">
      <h5 class="card-header">Tambah Jenis Bantuan
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
          +
        </button>
      </h5>
      <!-- Modal -->
      <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="tambahLabel">Tambah Jenis Bantuan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/jenisbantuan/tambah_jenisbantuan') ?>" method="POST">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="jenisbantuan" class="form-label">Jenis Bantuan</label>
                  <input type="text" class="form-control" id="jenisbantuan" name="jenisbantuan" placeholder="nama jenisbantuan">
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
                <th>Jenis Bantuan</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($jenisbantuan as $row) :
              ?>
                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td><?= $row['jenisbantuan'] ?></td>
                  <td>
                    <button type="button" class="btn btn-icon btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $row['id_jenisbantuan'] ?>">
                      <span class="tf-icons bx bx-edit"></span>
                    </button>
                    <button type="button" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $row['id_jenisbantuan'] ?>">
                      <span class="tf-icons bx bx-x"></span>
                    </button>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="edit<?= $row['id_jenisbantuan'] ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editLabel">Edit Jenis Bantuan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="<?= base_url('admin/jenisbantuan/edit_jenisbantuan') ?>" method="POST">
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="jenisbantuan" class="form-label">Jenis Bantuan</label>
                                <input type="text" class="form-control" id="jenisbantuan" name="jenisbantuan" value="<?= $row['jenisbantuan'] ?>">
                                <input type="text" class="form-control" id="id_jenisbantuan" name="id_jenisbantuan" value="<?= $row['id_jenisbantuan'] ?>" hidden>
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
                    <!-- Modal Hapus -->
                    <div class="modal fade" id="hapus<?= $row['id_jenisbantuan'] ?>" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="hapusLabel">Hapus Jenis Bantuan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="<?= base_url('admin/jenisbantuan/hapus_jenisbantuan') ?>" method="POST">
                            <div class="modal-body">
                              <h3 class="text-center">Hapus Jenis Bantuan <?= $row['jenisbantuan'] ?></h3>
                              <div class="mb-3">
                                <input type="text" class="form-control" id="id_jenisbantuan" name="id_jenisbantuan" value="<?= $row['id_jenisbantuan'] ?>" hidden>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-danger">Hapus</button>
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