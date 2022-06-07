<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="p-4 p-md-5 pt-5">
                <h2 class="mb-4">Evaluasi Kepuasan Pengguna</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center align-middle">
                            <th rowspan=3 scope="col">No</th>
                            <th scope="col">Pertanyaan Yang Ditanyakan</th>
                            <th colspan=2 scope="col">Pattern Yang Dituju</th>
                            <th scope="col">Jawaban Yang Diberikan</th>
                            <th scope="col">Nilai Similarity</th>
                            <th scope="col">Kesimpulan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php $j = 0 ?>
                        <?php $k = 1 ?>
                        <?php foreach ($penilaian as $p) : ?>
                            <tr class="align-middle">
                                <?php if ($j % 3 == 0) { ?>
                                    <th rowspan=3 scope="row" class="text-center"><?= $i++; ?></th>
                                    <td rowspan=3><?= $p['pertanyaan']; ?></td>
                                <?php $k = 1;
                                } ?>
                                <td><?= $k++; ?></td>
                                <td><?= $p['pattern']; ?></td>
                                <td><?= $p['jawaban']; ?></td>
                                <td><?= $p['persentase']; ?>%</td>
                                <?php if ($j % 3 == 0) { ?>
                                    <td rowspan=3 class="text-center"><?= $p['kesimpulan']; ?></td>
                                <?php } ?>
                                <?php $j++; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <caption class="pt-2">Dari <?= $i - 1; ?> pertanyaan, jumlah jawaban yang sesuai adalah <?= $count; ?></caption>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>