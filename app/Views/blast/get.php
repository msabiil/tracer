<?= $this->extend('layout/default') ?>

<?= $this->Section('tittle') ?>
<title>blast &mdash; Tracer</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Email Blast</h1>
    </div>
    <div class="section-body">


        <div class="card">
            <div class="card-header">
                <h4>broadcast</h4>
            </div>
            <?php
            if (session()->getFlashData('success')) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashData('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }
            ?>

            <?php
            if (session()->getFlashData('failed')) {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashData('failed') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }
            ?>
            <div class="card-body">

                <form id="formBlast" action="<?= site_url('blast/kirim_aksi') ?>" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="text" name="email" class="form-control" placeholder="name@example.com" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">subject</label>
                        <input type="text" name="subject" class="form-control" id="" placeholder="subjet here" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">text</label>
                        <textarea rows="20" name="content" cols="50" class="form-control" id="exampleFormControlTextarea1" style="height:100px" required></textarea>

                    </div>
                    <button type="submit" id="broad" class="btn btn-primary">broadcast</button>
                </form>
            </div>
        </div>
    </div>



    </div>
</section>
<?= $this->endSection() ?>

<?= $this->Section('script') ?>
<script>
    // $(document).ready(function(){
    //     $('#broad').click(function(e){
    //         e.preventDefault();
    //         $('#formBlast').submit();
    //     });
    // });
</script>
<?= $this->endSection() ?>