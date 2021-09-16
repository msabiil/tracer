<head>
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Data Alumni</title>

</head>


<body>

    <div class="text-center">
        <h1>Data Alumni</h1>
    </div>
    <br>

    <div class="row-2" class="">
        <div class="col-md">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>Nama</th>
                        <th>tempat lahir</th>
                        <th>tanggal lahir</th>
                        <th>alamat</th>
                        <th>nomor telpon</th>
                        <th>email</th>
                        <th>program studi</th>
                        <th>kelulusan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alumni as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value->nama_lengkap ?></td>
                            <td><?= $value->tempat_lahir ?></td>
                            <td><?= $value->tanggal_lahir ?></td>
                            <td><?= $value->alamat ?></td>
                            <td><?= $value->no_telpon ?></td>
                            <td><?= $value->email ?></td>
                            <td><?= $value->program_studi ?></td>
                            <td><?= $value->kelulusan ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>