<?= $this->extend('admin/layout/page_layout') ?>

<?= $this->section('content') ?>
<?= view('v_alert') ?>
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data /</span>Kategori</h4>
    <!-- Responsive Table -->
    <div class="card">
      <h5 class="card-header">Tambah Kategori
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
          +
        </button>
      </h5>
      <!-- Modal -->
      <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="tambahLabel">Tambah Kategori</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/kategori/tambah_kategori') ?>" method="POST">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="kategori" class="form-label">Kategori</label>
                  <input type="text" class="form-control" id="kategori" name="kategori" placeholder="nama kategori">
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
                <th>Kategori</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($kategori as $row) :
              ?>
                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td><?= $row['kategori'] ?></td>
                  <td>
                    <button type="button" class="btn btn-icon btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $row['id_kategori'] ?>">
                      <span class="tf-icons bx bx-edit"></span>
                    </button>
                    <button type="button" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $row['id_kategori'] ?>">
                      <span class="tf-icons bx bx-x"></span>
                    </button>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="edit<?= $row['id_kategori'] ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editLabel">Edit Kategori</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="<?= base_url('admin/kategori/edit_kategori') ?>" method="POST">
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $row['kategori'] ?>">
                                <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="<?= $row['id_kategori'] ?>" hidden>
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
                    <div class="modal fade" id="hapus<?= $row['id_kategori'] ?>" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="hapusLabel">Hapus Kategori</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="<?= base_url('admin/kategori/hapus_kategori') ?>" method="POST">
                            <div class="modal-body">
                              <h3 class="text-center">Hapus Kategori <?= $row['kategori'] ?></h3>
                              <div class="mb-3">
                                <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="<?= $row['id_kategori'] ?>" hidden>
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