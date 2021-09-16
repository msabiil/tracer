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

            <div class="card-body">

                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="text" class="form-control" placeholder="name@example.com" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">subject</label>
                        <input type="text" class="form-control" id="" placeholder="subjet here">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">text</label>
                        <textarea rows="10" cols="50" class="form-control" id="exampleFormControlTextarea1"></textarea>

                    </div>
                    <button type="submit" class="btn btn-primary">broadcast</button>
                </form>
            </div>
        </div>
    </div>



    </div>
</section>
<?= $this->endSection() ?>