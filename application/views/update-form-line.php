<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mt-3">
                            <div class="card-header">
                                <form method="post" action="<?= base_url('Tamp/update_line/' . $line['id_line']) ?>">
                                    <div class="form-group">
                                        <label>Nama Line</label>
                                        <input type="text" class="form-control" name="nama_line" id="nama" value="<?= $line['nama_line'] ?>">
                                        <?= form_error('nama_line', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Koordinat</label>
                                        <textarea class="form-control" name="coordinate" id="coord"><?= $line['coordinate'] ?></textarea>
                                        <?= form_error('coordinate', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                                    <a class="btn btn-danger" href="<?= base_url('Tamp/dataLine') ?>" role="button">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>