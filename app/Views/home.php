<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>

<?= $this->Section('tittle') ?>
<title>dashboard &mdash; Tracer</title>
<?= $this->endSection() ?>

<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

  <?php if (session()->get('akses') == 2) { ?>
    <div class="section-body">

      <div class="card">
        <div class="card-body">
          <h3>
            <center style="font: 100; font-family: monospace;"> Silahkan mengisi Survei yang telah disediakan.</center>
          </h3>
        </div>
      </div>
    </div>
  <?php } ?>


  <?php if (session()->get('akses') == 1) { ?>
    <div class="section-body">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Alumni</h4>
              </div>
              <div class="card-body">
                10
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Pertanyaan Survei</h4>
              </div>
              <div class="card-body">
                42
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Hasil Reports</h4>
              </div>
              <div class="card-body">
                1,201
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  <?php } ?>
</section>
<?= $this->endSection() ?>