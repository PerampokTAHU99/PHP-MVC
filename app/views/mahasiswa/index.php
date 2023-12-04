<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>
            <?php foreach ($data['mhs'] as $mhs): ?>
                <ul>
                    <li><?=$mhs['name'];?></li>
                    <li><?=$mhs['nim'];?></li>
                    <li><?=$mhs['email'];?></li>
                    <li><?=$mhs['programStudy'];?></li>
                    <li><img src="img/<?=$mhs['picture'];?>" alt="picture" width="200"></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>  