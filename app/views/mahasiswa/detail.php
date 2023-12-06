<div class="container mt-5">
    <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="<?= $data['mhs']['picture'] ; ?>" alt="Photo Mahasiswa">
    <div class="card-body">
        <h5 class="card-title"><?= $data['mhs']['name'] ; ?></h5>
        <p class="card-text"><?= $data['mhs']['nim'] ; ?></p>
        <p class="card-text"><?= $data['mhs']['email'] ; ?></p>
        <p class="card-text"><?= $data['mhs']['programStudy'] ; ?></p>
        <a href="<?= BASEURL; ?>/Mahasiswa" class="btn btn-primary">Kembali</a>
    </div>
    </div>
</div>