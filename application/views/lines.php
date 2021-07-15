<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    <div class="card bg-light mt-3 mb-70">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead align="center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Line</th>
                                        <th scope="col" colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    <?php foreach ($line as $row) : ?>
                                        <tr align="center">
                                            <th><?= $nomor++; ?></th>
                                            <td><?= $row['nama_line']; ?></td>
                                            <td>
                                                <a href=" <?= base_url('Tamp/edit_line/' . $row['id_line']); ?>" class="btn btn-primary btn-sm">
                                                    <i class="bi bi-pencil-square"> Edit</i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('Tamp/delete_line/' . $row['id_line']); ?>" onclick=" return confirm('Are you sure want to delete? Data will be permanently lost.');" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"> Hapus</i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>