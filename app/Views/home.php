<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="p-4 p-md-5 pt-5">
                <h2 class="mb-4">Tambah Pattern Template</h2>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="border border-2 p-4 mb-3">
                    <form action="/pages/save" method="POST">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pertanyaan</label>
                            <input type="text" class="form-control <?= ($validation->hasError('pertanyaan')) ? 'is-invalid' : ''; ?>" id="pertanyaan" name="pertanyaan" placeholder="Masukkan Pertanyaan" value="<?= old('pertanyaan'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('pertanyaan'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Jawaban</label>
                            <textarea class="form-control <?= ($validation->hasError('jawaban')) ? 'is-invalid' : ''; ?>" id="jawaban" name="jawaban" rows="3" placeholder="Masukkan Jawaban" value="<?= old('jawaban'); ?>"></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('jawaban'); ?>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success mx-auto">Tambah</button>
                        </div>
                    </form>
                </div>
                <h2 class="mb-4">Pattern Template</h2>

                <table class="table table-striped align-middle table-bordered">
                    <thead>
                        <tr class="align-middle">
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Pertanyaan</th>
                            <th scope="col" class="text-center">Jawaban</th>
                            <th scope="col" class="text-center ps-5 pe-5">Dibuat</th>
                            <th scope="col" class="text-center ps-5 pe-5">Terakhir Diubah</th>
                            <th scope="col" class="text-center ps-5 pe-5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($pattern_template as $p) : ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $i++; ?></th>
                                <td><?= $p['pertanyaan']; ?></td>
                                <td><?= $p['jawaban']; ?></td>
                                <td class="text-center"><?= $p['dibuat']; ?></td>
                                <td class="text-center"><?= $p['diubah']; ?></td>
                                <td class="text-center">
                                    <div class="row g-3">
                                        <div class="col">
                                            <form action="/pages/edit" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="EDIT">
                                                <input type="hidden" name="id" id="id" value="<?= $p['id']; ?>">
                                                <button type="submit" class="btn btn-warning"><i class="bi bi-pencil"></i></button></button>
                                            </form>
                                        </div>
                                        <div class="col">
                                            <form action="/pages/delete" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="id" id="id" value="<?= $p['id']; ?>">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin mengahapus data?');"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>