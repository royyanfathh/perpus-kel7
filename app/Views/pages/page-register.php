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
                    <?php if (!empty(session()->getFlashdata('error'))): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <h4>Periksa Entrian Form</h4>
                            </hr>
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('/register/process'); ?>" method="POST">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <center><h5>Register Member</h5></center>
                            <label>Name</label>
                            <input type="text" name="nama" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select id="jk" name="jk" class="form-control">
                                <option value="laki-laki">laki laki</option>
                                <option value="Perempuan">perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="telp" class="form-control" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <label>Adress</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Adress">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                        <div class="social-login-content">
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="/login"> Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection();