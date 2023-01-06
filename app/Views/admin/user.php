<?= $this->extend('admin/layout/page_layout') ?>

<?= $this->section('content') ?>
<?= view('v_alert') ?>
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data /</span>User</h4>
    <!-- Responsive Table -->
    <div class="card">
      <h5 class="card-header">Tambah User
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
          +
        </button>
      </h5>
      <!-- Modal -->
      <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="tambahLabel">Tambah User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/user/tambah_user') ?>" method="POST">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="user" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
                </div>
                <div class="mb-3">
                  <label for="user" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="username">
                </div>
                <div class="mb-3">
                  <label for="user" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="password">
                </div>
                <div class="mb-3">
                  <label for="user" class="form-label">Level</label>
                  <select name="level" class="form-select" id="" required>
                    <option value="">--Pilih--</option>
                    <option>admin</option>
                    <option>relawan</option>
                    <option>kepala</option>
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
                <th>Nama</th>
                <th>Username</th>
                <th>Level</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($user as $row) :
              ?>
                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td><?= $row['nama'] ?></td>
                  <td><?= $row['username'] ?></td>
                  <td><?= $row['level'] ?></td>
                  <td>
                    <button type="button" class="btn btn-icon btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $row['id_user'] ?>">
                      <span class="tf-icons bx bx-edit"></span>
                    </button>
                    <button type="button" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $row['id_user'] ?>">
                      <span class="tf-icons bx bx-x"></span>
                    </button>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="edit<?= $row['id_user'] ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editLabel">Edit User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="<?= base_url('admin/user/edit_user') ?>" method="POST">
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="user" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="<?= $row['nama'] ?>">
                              </div>
                              <div class="mb-3">
                                <label for="user" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?= $row['username'] ?>>
                              </div>
                              <div class="mb-3">
                                <label for="user" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="password">
                              </div>
                              <div class="mb-3">
                                <label for="user" class="form-label">Level</label>
                                <select name="level" class="form-select" id="" required>
                                  <option value="">--Pilih--</option>
                                  <option <?=($row['level']=='admin')?'selected':''?>>admin</option>
                                  <option <?=($row['level']=='relawan')?'selected':''?>>relawan</option>
                                  <option <?=($row['level']=='kepala')?'selected':''?>>kepala</option>
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
                    <!-- Modal Hapus -->
                    <div class="modal fade" id="hapus<?= $row['id_user'] ?>" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="hapusLabel">Hapus User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="<?= base_url('admin/user/hapus_user') ?>" method="POST">
                            <div class="modal-body">
                              <h3 class="text-center">Hapus User <?= $row['username'] ?></h3>
                              <div class="mb-3">
                                <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $row['id_user'] ?>" hidden>
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