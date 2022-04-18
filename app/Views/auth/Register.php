<?= $this->extend('auth/template/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                                </div>
                                <form action="<?php echo site_url("Register/tambah_sanggar") ?>" method="Post">
                                    <form class="user">
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <input type="text" name="nama_sanggar" class="form-control form-control-user" id="nama_sanggar" placeholder="Nama Sanggar">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="alamat_sanggar" class="form-control form-control-user" id="almat_sanggar" placeholder="Alamat Sanggar">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="Email Address">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="no_hp" class="form-control form-control-user" id="no_hp" placeholder="No HP">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" id="username" placeholder="Username">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group form-action-d-flex mb-3">
                                            <button type="submit" class="btn btn-secondary btn-block">Register</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= site_url("login") ?>">Already have an account? Login!</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>