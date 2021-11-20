<?php $__env->startSection('container'); ?>

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class='mt-2'>Detail Mahasiswa</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $mahasiswa['foto']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-title"><b>Nama : </b>
                                <?= $mahasiswa['namamhs']; ?>
                            </p>
                            <p class="card-text"><b>NIM : </b>
                                <?= $mahasiswa['nim']; ?>
                            </p>
                            <p class="card-text"><b>Jenis Kelamin : </b>
                                <?= $mahasiswa['jk']; ?>
                            </p>
                            <p class="card-text"><b>Alamat : </b>
                                <?= $mahasiswa['alamat']; ?>
                            </p>
                            <p class="card-text"><b>Kota : </b>
                                <?= $mahasiswa['kota']; ?>
                            </p>
                            <p class="card-text"><b>Email : </b>
                                <?= $mahasiswa['email']; ?>
                            </p>
                            <form action="/mahasiswa" method="post" class="d-inline">
                                <?php echo method_field('delete'); ?>
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                            <br> <br>
                            <a href="/mahasiswa" class="card-link" style="text-decoration: none;">Kembali ke daftar
                                mahasiswa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ELITEBOOK 8460P\Downloads\laravel\resources\views/mahasiswa/show.blade.php ENDPATH**/ ?>