<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="p-4 p-md-5 pt-5">
                <h2 class="mb-4">Edit Pattern Template</h2>

                <div class="border border-2 p-4 mb-3">
                    <form action="/pages/confirm_edit">
                        <input type="hidden" name="id" value="<?= $result['id']; ?>">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pertanyaan</label>
                            <input type="text" class="form-control <?= ($validation->hasError('pertanyaan')) ? 'is-invalid' : ''; ?>" id="pertanyaan" name="pertanyaan" value="<?= $result['pertanyaan']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('pertanyaan'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Jawaban</label>
                            <textarea class="form-control <?= ($validation->hasError('jawaban')) ? 'is-invalid' : ''; ?>" id="jawaban" name="jawaban" rows="3"><?= $result['jawaban']; ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('jawaban'); ?>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                </svg>
                                | Edit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>