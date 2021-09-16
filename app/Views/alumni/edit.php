<?= $this->extend('layout/default') ?>

<?= $this->section('tittle') ?>
<title>edit alumni &mdash; tracer</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('alumni') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>edit alumni</h1>
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>edit data alumni </h4>
            </div>
            <div class="card body col-lg">
                <form action="<?= site_url('alumni/' . $alumni->id_alumni) ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class=" form-group">
                        <label>nama lengkap</label>
                        <input type="text" name="nama_lengkap" value="<?= $alumni->nama_lengkap ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>tempat lahir</label>
                        <input type="text" name="tempat_lahir" value="<?= $alumni->tempat_lahir ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>tanggal lahir</label>
                        <input type="date" name="tanggal_lahir" value="<?= $alumni->tanggal_lahir ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>alamat</label>
                        <input type="text" name="alamat" value="<?= $alumni->alamat ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>nomor telpon</label>
                        <input type="text" name="no_telpon" value="<?= $alumni->no_telpon ?>" class="form-control" placeholder="gunakan format : contoh 6282345102945" required>
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="text" name="email" value="<?= $alumni->email ?>" class="form-control" placeholder="yourname@example.com" required>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">program studi</label>
                            <select class="form-control" name="program_studi" value="<?= $alumni->program_studi ?>" id="exampleFormControlSelect1" required>
                                <option>Teknik Informatika</option>
                                <option>Teknik Mesin</option>
                                <option>Teknik Elektro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">angkatan</label>
                        <select class="form-control" name="kelulusan" value="<?= $alumni->kelulusan ?>" id="exampleFormControlSelect1" required>
                            <option>1997</option>
                            <option>1998</option>
                            <option>1999</option>
                            <option>2000</option>
                            <option>2001</option>
                            <option>2002</option>
                            <option>2003</option>
                            <option>2004</option>
                            <option>2005</option>
                            <option>2006</option>
                            <option>2007</option>
                            <option>2008</option>
                            <option>2009</option>
                            <option>2010</option>
                            <option>2011</option>
                            <option>2012</option>
                            <option>2013</option>
                            <option>2014</option>
                            <option>2015</option>
                            <option>2016</option>
                            <option>2017</option>
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                            <option>2021</option>
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>save</a></button>
                        <button type="reset" class="btn btn-danger" class="fas fa-trash">reset</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
<?= $this->endSection() ?>