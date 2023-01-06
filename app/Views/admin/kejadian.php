<?= $this->extend('admin/layout/page_layout') ?>

<?= $this->section('content') ?>
<?= view('v_alert') ?>
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data /</span>Kejadian</h4>
    <!-- Responsive Table -->
    <div class="card">
      <h5 class="card-header">Tambah Kejadian
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
          +
        </button>
      </h5>
      <!-- Modal -->
      <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="tambahLabel">Tambah Kejadian</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/kejadian/tambah_kejadian') ?>" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="kejadian" class="form-label">Kejadian</label>
                  <input type="text" class="form-control" id="kejadian" name="kejadian" placeholder="nama kejadian">
                </div>
                <div class="mb-3">
                  <label for="id_kategori" class="form-label">Kategori</label>
                  <select name="id_kategori" id="" class="form-select">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($kategori as $kat) :
                    ?>
                      <option value="<?= $kat['id_kategori'] ?>"><?= $kat['kategori'] ?></option>
                    <?php
                    endforeach
                    ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="tanggal" class="form-label">Tanggal</label>
                  <input type="datetime-local" class="form-control" id="tanggal" name="tanggal">
                </div>
                <div class="mb-3">
                  <label for="sebab" class="form-label">Sebab</label>
                  <textarea name="sebab" class="form-control" id="" cols="10" rows="3"></textarea>
                </div>
                <div class="mb-3">
                  <label for="akibat" class="form-label">Akibat</label>
                  <textarea name="akibat" class="form-control" id="" cols="10" rows="3"></textarea>
                </div>
                <div class="mb-3">
                  <label for="korban" class="form-label">Korban</label>
                  <input type="text" class="form-control" id="korban" name="korban" placeholder="Korban">
                </div>
                <div class="mb-3">
                  <label for="upaya" class="form-label">Upaya</label>
                  <input type="text" class="form-control" id="upaya" name="upaya" placeholder="Upaya">
                </div>
                <div class="mb-3">
                  <label for="id_lokasi" class="form-label">Lokasi</label>
                  <select name="id_lokasi" id="" class="form-select">
                    <option value="">--Pilih--</option>
                    <?php
                    foreach ($lokasi as $lok) :
                    ?>
                      <option value="<?= $lok['id_lokasi'] ?>"><?= $lok['lokasi'] ?>, <?= $lok['desa'] ?> RT <?= $lok['rt'] ?>/RW <?= $lok['rw'] ?></option>
                    <?php
                    endforeach
                    ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="dokumentasi" class="form-label">Dokumentasi</label>
                  <input type="file" class="form-control" id="dokumentasi" name="dokumentasi" placeholder="Dokumentasi">
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
                <th>Kejadian</th>
                <th>Kategori</th>
                <th>Sebab</th>
                <th>Akibat</th>
                <th>Tanggal</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($kejadian as $row) :
              ?>
                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td><?= $row['kejadian'] ?></td>
                  <td><?= $row['kategori'] ?></td>
                  <td><?= $row['sebab'] ?></td>
                  <td><?= $row['akibat'] ?></td>
                  <td><?= $row['tanggal'] ?></td>
                  <td>
                    <button type="button" class="btn btn-icon btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $row['id_kejadian'] ?>">
                      <span class="tf-icons bx bx-edit"></span>
                    </button>
                    <button type="button" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $row['id_kejadian'] ?>">
                      <span class="tf-icons bx bx-x"></span>
                    </button>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="edit<?= $row['id_kejadian'] ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editLabel">Edit Kejadian</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="<?= base_url('admin/kejadian/edit_kejadian') ?>" method="POST">
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="kejadian" class="form-label">Kejadian</label>
                                <input type="text" class="form-control" id="kejadian" name="kejadian" value="<?= $row['kejadian'] ?>">
                                <input type="text" class="form-control" id="id_kejadian" name="id_kejadian" value="<?= $row['id_kejadian'] ?>" hidden>
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
                    <div class="modal fade" id="hapus<?= $row['id_kejadian'] ?>" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="hapusLabel">Hapus Kejadian</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="<?= base_url('admin/kejadian/hapus_kejadian') ?>" method="POST">
                            <div class="modal-body">
                              <h3 class="text-center">Hapus Kejadian <?= $row['kejadian'] ?></h3>
                              <div class="mb-3">
                                <input type="text" class="form-control" id="id_kejadian" name="id_kejadian" value="<?= $row['id_kejadian'] ?>" hidden>
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