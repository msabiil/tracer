<?= $this->extend('layout/default') ?>


<?= $this->Section('tittle') ?>
<title>alumni &mdash; Tracer</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Alumni</h1>
    <div class="section-header-button">
      <a href="<?= site_url('alumni/add') ?>" class="btn btn-primary">add new</a>
    </div>
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
        <h4>data alumni</h4>
      </div>

      <!-- //search -->
      <!-- <div class="row-9">
        <div class="col-6">
          <form action="" method="post">
            <div class="input-group mb-3">
              <input type="text" name="search" class="form-control" placeholder="search alumni">
              <div class="input-group-append">
                <button class="btn btn-primary" class="fas fa-search" type="submit" autocomplete="off">search</button>
              </div>
            </div>
          </form>
        </div>
      </div> -->

      <div class="form-group row-2">
        <div class="col-md">


          <a class="btn btn-primary" href="<?= site_url('alumni/exportexcel') ?>" type="button">export excel</a>
          <a class="btn btn-primary" href="<?= base_url('alumni/printpdf') ?>" type="button">pdf</a>
          <a class="btn btn-primary" href="<?= site_url('alumni/print') ?>">Print</a>


          <!-- <?php
                echo form_open_multipart('alumni/importexcel');
                ?>
          <div class="form-group">
            <label></label>
            <input type="file" name="fileexcel" class="form-control-file" accept=".xls, .xlsx">
          </div>

          <div class="form-group">
            <button class="btn btn-primary" type="submit">submit</button>
          </div>
          <?php echo form_close() ?> -->

        </div>
      </div>
      <br><br>




      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped table-md">
            <tbody class="text-center">
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>tempat lahir</th>
                <th>tanggal lahir</th>
                <th>alamat</th>
                <th>nomor telpon</th>
                <th>email</th>
                <th>program studi</th>
                <th>kelulusan</th>
                <th>action</th>
              </tr>

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
                  <td class=" text-center" style="width: 15%">
                    <a href="<?= site_url('alumni/edit/' . $value->id_alumni) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                    <form action="<?= site_url('alumni/' . $value->id_alumni) ?>" method="post" class="d-inline" onsubmit="return confirm('yakin hapus data?')">
                      <?= csrf_field() ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
</section>
<?= $this->endSection() ?>