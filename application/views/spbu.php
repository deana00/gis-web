<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Lokasi SPBU</title>
</head>

<style>
    .bi {
        align-items: center;
    }
</style>

<body>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID SPBU</th>
                            <th scope="col">Koordinat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <?php $nomor = 1; ?>
                                <th scope="row"><?= $nomor++; ?></th>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['coord']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>/Tamp/update">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="<?= base_url(); ?>/Tamp/delete">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>

</html>