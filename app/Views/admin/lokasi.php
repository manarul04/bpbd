<?= $this->extend('admin/layout/page_layout') ?>

<?= $this->section('content') ?>
<?= view('v_alert') ?>
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data /</span>Lokasi</h4>
    <!-- Responsive Table -->
    <div class="card">
      <h5 class="card-header">Tambah Lokasi
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
          +
        </button>
      </h5>
      <!-- Modal -->
      <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="tambahLabel">Tambah Lokasi</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/lokasi/tambah_lokasi') ?>" method="POST">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="lokasi" class="form-label">Lokasi</label>
                  <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="nama lokasi">
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="rt" class="form-label">RT</label>
                      <input type="text" class="form-control" id="rt" name="rt" placeholder="RT">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="rw" class="form-label">RW</label>
                      <input type="text" class="form-control" id="rw" name="rw" placeholder="RW">
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="lokasi" class="form-label">Kota</label>
                    <select name="kota" id="" class="form-select">
                      <option>--Pilih Kota--</option>
                      <option>Kudus</option>
                      <option>Jepara</option>
                      <option>Pati</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <select name="kecamatan" id="kecamatan" class="form-select">
                      <option>--Pilih Kecamatan--</option>
                      <option>Gebog</option>
                      <option>Kaliwungu</option>
                      <option>Dawe</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="desa" class="form-label">Desa</label>
                    <select name="desa" id="desa" class="form-select">
                      <option>--Pilih Desa--</option>
                      <option>Getassrabi</option>
                      <option>Besito</option>
                      <option>Dawe</option>
                    </select>
                  </div>
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
                <th>Lokasi</th>
                <th>RT/RW</th>
                <th>Desa</th>
                <th>Kecamatan</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($lokasi as $row) :
              ?>
                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td><?= $row['lokasi'] ?></td>
                  <td><?= $row['rt'] ?>/<?= $row['rw'] ?></td>
                  <td><?= $row['desa'] ?></td>
                  <td><?= $row['kecamatan'] ?></td>
                  <td>
                    <button type="button" class="btn btn-icon btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $row['id_lokasi'] ?>">
                      <span class="tf-icons bx bx-edit"></span>
                    </button>
                    <button type="button" class="btn btn-icon btn-danger">
                      <span class="tf-icons bx bx-x"></span>
                    </button>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="edit<?= $row['id_lokasi'] ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editLabel">Edit Lokasi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="<?= base_url('admin/lokasi/edit_lokasi') ?>" method="POST">
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $row['lokasi'] ?>">
                                <input type="text" class="form-control" id="id_lokasi" name="id_lokasi" value="<?= $row['id_lokasi'] ?>" hidden>
                              </div>
                              <div class="row">
                                <div class="col-6">
                                  <div class="mb-3">
                                    <label for="rt" class="form-label">RT</label>
                                    <input type="text" class="form-control" id="rt" name="rt" value="<?= $row['rt'] ?>">
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="mb-3">
                                    <label for="rw" class="form-label">RW</label>
                                    <input type="text" class="form-control" id="rw" name="rw" value="<?= $row['rw'] ?>">
                                  </div>
                                </div>
                                <div class="mb-3">
                                  <label for="lokasi" class="form-label">Kota</label>
                                  <select name="kota" id="" class="form-select">
                                    <option <?= ($row['kota'] == 'Kudus') ? 'selected' : '' ?>>Kudus</option>
                                    <option <?= ($row['kota'] == 'Jepara') ? 'selected' : '' ?>>Jepara</option>
                                    <option <?= ($row['kota'] == 'Pati') ? 'selected' : '' ?>>Pati</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="kecamatan" class="form-label">Kecamatan</label>
                                  <select name="kecamatan" id="kecamatan" class="form-select">
                                    <option <?= ($row['kecamatan'] == 'Gebog') ? 'selected' : '' ?>>Gebog</option>
                                    <option <?= ($row['kecamatan'] == 'Kaliwungu') ? 'selected' : '' ?>>Kaliwungu</option>
                                    <option <?= ($row['kecamatan'] == 'Dawe') ? 'selected' : '' ?>>Dawe</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="desa" class="form-label">Desa</label>
                                  <select name="desa" id="desa" class="form-select">
                                    <option <?= ($row['desa'] == 'Getassrabi') ? 'selected' : '' ?>>Getassrabi</option>
                                    <option <?= ($row['desa'] == 'Besito') ? 'selected' : '' ?>>Besito</option>
                                    <option <?= ($row['desa'] == 'Dawe') ? 'selected' : '' ?>>Dawe</option>
                                  </select>
                                </div>
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