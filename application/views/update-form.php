<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mt-3">
                            <div class="card-header">
                                <form method="post" action="<?= base_url('Tamp/update/' . $data['id_lok']) ?>">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $data['nama'] ?>">
                                        <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Koordinat</label>
                                        <input type="text" class="form-control" name="coord" id="coord" value="<?= $data['coord'] ?>">
                                        <?= form_error('coord', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                                    <a class="btn btn-danger" href="<?= base_url('Tamp/data_spbu') ?>" role="button">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>