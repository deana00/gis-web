<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mt-3">
                            <div class="card-header">
                                <form method="post">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                                        <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Koordinat</label>
                                        <input type="text" class="form-control" name="coord" id="coord" placeholder="Koordinat">
                                        <?= form_error('coord', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>