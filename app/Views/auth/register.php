<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/selectric/public/selectric.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <label>REGISTER</label>
                            <!-- <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"> -->
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            <div class="card-body">
                                <?php
                                //pesan validasi error
                                $errors = session()->getFlashdata('errors');
                                if (!empty($errors)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            <?php foreach ($errors as $error) : ?>
                                                <li><?= esc($error) ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <?php
                                if (session()->getFlashdata('pesan')) {
                                    echo '<div class="alert alert-success"role="alert">';
                                    echo session()->getFlashdata('pesan');
                                    echo '</div>';
                                }
                                ?>

                                <form action="<?= site_url('auth/saveregister') ?>" method="POST">
                                    <?= csrf_field() ?>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>nama lengkap *</label>
                                            <input type="text" name="nama_lengkap" class="form-control">
                                        </div>
                                        <div class="form-group col-6">
                                            <label>tempat lahir*</label>
                                            <input type="text" name="tempat_lahir" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>tanggal lahir *</label>
                                            <input type="date" name="tanggal_lahir" class="form-control">
                                        </div>
                                        <div class="form-group col-6">
                                            <label>alamat*</label>
                                            <input type="text" name="alamat" class="form-control">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label>nomor telpon*</label>
                                        <input type="text" name="no_telpon" class="form-control" placeholder="gunakan format : contoh 6282345102945">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" placeholder="traacer@example.com" class="form-control" name="email">
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>username*</label>
                                            <input type="text" name="username" class="form-control" placeholder="">
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password*</label>
                                            <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="exampleFormControlSelect1">program studi*</label>
                                            <select class="form-control" name="program_studi" id="exampleFormControlSelect1">
                                                <option>Teknik Informatika</option>
                                                <option>Teknik Mesin</option>
                                                <option>Teknik Elektro</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>angkatan*</label>
                                            <select class="form-control" name="kelulusan" id="exampleFormControlSelect2">
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
                                    </div>



                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                            <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                    <a href="<?= base_url('auth/login') ?>" class="text-center">back to login form</a>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Muhammad sabiil 2021
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>/template/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/selectric/public/jquery.selectric.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/custom.js"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>
    <!-- Page Specific JS File -->
    <script src="<?= base_url() ?>/template/assets/js/page/auth-register.js"></script>
</body>

</html>