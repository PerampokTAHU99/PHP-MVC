<div class="container mt-3">
  <div class="row">
    <div class="col-lg">
      <!-- Button trigger modal -->
      <div class="heading">
        <div class="row">
          <div class="col-lg-6">
            <?php
            Flasher::flash();
            ?>
          </div>
        </div>
        <div class="container">
          <div class="row justify-content-center float-left">
            <div class="col-lg-10">
              <form action="<?= BASEURL; ?>/Mahasiswa/find" method="POST">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Cari Mahasiswa ..." id="keyword" name="keyword">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" id="findButton">Cari</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <button type="button" class="btn btn-primary mb-1 ml-2 buttonAddData" data-toggle="modal"
                data-target="#formModal">
                Tambah Data
              </button>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 text-center">
              <h3>Daftar Mahasiswa</h3>
            </div>
          </div>
        </div>
        <ul class="list-group">
          <?php foreach ($data['mhs'] as $mhs): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center mt-1">
              <?= $mhs['name']; ?>
              <div class="float-right">
                <a href="<?= BASEURL; ?>/Mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary">detail
                </a>
                <a href="<?= BASEURL; ?>/Mahasiswa/update/<?= $mhs['id']; ?>" class="badge badge-warning showEditModal"
                  data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>">update
                </a>
                <a href="<?= BASEURL; ?>/Mahasiswa/delete/<?= $mhs['id']; ?>" class="badge badge-danger"
                  onclick="return confirm('Yakin?');">delete
                </a>
              </div>
            </li>

          <?php endforeach; ?>

        </ul>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Tambah Data Mahasiswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= BASEURL; ?>/Mahasiswa/add" method="POST">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Nama Mahasiswa">
            </div>
            <div class="form-group">
              <label for="nim">NIM</label>
              <input type="number" class="form-control" id="nim" name="nim" placeholder="NIM Mahasiswa">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="E-mail Mahasiswa">
            </div>
            <div class="form-group">
              <label for="programStudy">Program Study</label>
              <select class="form-control" id="programStudy" name="programStudy">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Sipil">Teknik Sipil</option>
                <option value="Teknik Pangan">Teknik Pangan</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Teknik Elektro">Teknik Elektro</option>
                <option value="Teknik Industri">Teknik Industri</option>
                <option value="Teknik Lingkungan">Teknik Lingkungan</option>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
        </form>
      </div>
    </div>
  </div>