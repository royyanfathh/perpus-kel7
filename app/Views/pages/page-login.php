<?= $this->extend('layout/login'); ?>
<?= $this->section('content'); ?>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <?php echo form_open('login/cekLogin') ?>
                    <?php
                    //notifikasi
                    $errors = session()->getFlashdata('errors');
                    if (!empty($errors)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <h4>Periksa entrian form</h4>
                            <ul>
                                <?php foreach ($errors as $error) { ?>
                                    <li><?= esc($error) ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>

                    <?php
                    if (session()->getFlashdata('pesan')) {
                        echo '<div class="alert alert-danger" role="alert">';
                        echo session()->getFlashdata('pesan');
                        echo '</div>';
                    }
                    ?>
                    <div class="form-group">
                        <center>
                            <h5>Login Member</h5>
                        </center>
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    <div class="social-login-content">
                    </div>
                    <div class="register-link m-t-15 text-center">
                        <p>Don't have account ? <a href="/register"> Sign Up Here</a></p>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection();
