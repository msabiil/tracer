<?= $this->extend('layout/default') ?>


<?= $this->Section('tittle') ?>
<title>hasil survei &mdash; Tracer</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>hasil survei</h1>
    </div>

    <?php



    if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>success</b>
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>error</b>
                <?= session()->getFlashdata('error') ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>data survei alumni</h4>
            </div>

            <!-- //search -->


            <div class="row-2">
                <div class="col-md">
                    <a class="btn btn-primary" href="<?= site_url('alumni/exporthalaman') ?>" type="button">export excel</a>
                    <a class="btn btn-primary" href="<?= base_url('alumni/printpdf') ?>" type="button">pdf</a>
                    <a class="btn btn-primary" href="<?= site_url('alumni/print') ?>">Print</a>
                </div>

                <div class="container">
                    <div class="card-body ">
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tbody>
                            <tr>
                                <th>nama</th>
                                <th>kegiatan saat ini</th>
                                <th>kapan anda mulai bekerja</th>
                                <th>Jenis kategori bidang tempat anda bekerja</th>
                                <th>Posisi / Jabatan anda pada pekerjaan saat ini</th>
                                <th>Berapa bulan waktu yang dihabiskan untuk memperoleh pekerjaan utama</th>
                                <th>berapa pendapatan saat awal diterima bekerja</th>
                                <th>Berapa pendapatan anda saat ini</th>
                                <th>Tingkat perusahaan tempat anda bekerja saat ini</th>
                                <th>Seberapa erat hubungan antara bidang studi dengan pekerjaan anda</th>

                            </tr>



                        </tbody>
                    </table>
                </div>
            </div>

        </div>
</section>
<?= $this->endSection() ?>