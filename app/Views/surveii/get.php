<?= $this->extend('layout/default') ?>


<?= $this->Section('tittle') ?>
<title>alumni &mdash; Tracer</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">

    <div class="section-header">
        <h1>Survei</h1>
    </div>

    <div class="section-body">

        <div class="card">

            <div class="card body col-lg">
                <br>
                <form>
                    <h5>Kegiatan saat ini</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="example1" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Bekerja ( Full Time, Part Time, Wirausaha)
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="example2" id="exampleRadios2" value="option2" checked>
                        <label class="form-check-label" for="exampleRadios2">
                            Belum Bekerja / Tidak Bekerja
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="example3" id="exampleRadios3" value="option3" checked>
                        <label class="form-check-label" for="exampleRadios3">
                            Melanjutkan Study
                        </label>
                    </div>

                    <br>
                    <br>
                    <h5> Bekerja di perusahaan</h5>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kapan anda mulai bekerja </label>
                        <input type="date" name="example4" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Jenis kategori bidang tempat anda bekerja</label>
                        <input type="text" class="form-control" name="example5" placeholder="contoh : sosial,hukum,teknologi dsb">
                        <small id="" class="form-text text-muted">
                            penulisan
                            jika sudah bekerja sebelum lulus di tulis contoh -1 berapa bulan sebelum lulus, jika setelah lulus tulis
                            +1 berapa bulan setelah lulus
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Posisi / Jabatan anda pada pekerjaan saat ini</label>
                        <input type="email" name="example6" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Berapa bulan waktu yang dihabiskan untuk memperoleh pekerjaan utama </label>
                        <input type="text" name="example7" class="form-control">
                        <small id="" class="form-text text-muted">
                            penulisan
                            jika sudah bekerja sebelum lulus di tulis contoh -1 berapa bulan sebelum lulus, jika setelah lulus tulis
                            +1 berapa bulan setelah lulus
                        </small>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">berapa pendapatan saat awal diterima bekerja</label>
                        <input type="text" name="example8" class="form-control">
                        <small id="emailHelp" class="form-text text-muted">contoh : 37500000</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Berapa pendapatan anda saat ini</label>
                        <input type="text" name="example9" class="form-control">
                        <small id="emailHelp" class="form-text text-muted">contoh : 37500000</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tingkat perusahaan tempat anda bekerja saat ini</label>
                        <input type="text" class="form-control" name="example9" placeholder="contoh : lokal berwirausaha berizin">
                        <small id="" class="form-text text-muted">
                            lokal berwirausaha (berizin / tidak berizin) / nasional (berizin) / internasional
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Seberapa erat hubungan antara bidang studi dengan pekerjaan anda</label>
                        <input type="text" name="example10" class="form-control">
                        <small id="" class="form-text text-muted">tidak erat / sangat erat</small>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
</section>
<?= $this->endSection() ?>