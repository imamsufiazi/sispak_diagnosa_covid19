<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container col-md-6">
    <!-- Page Heading -->
    <div class="card border-left-primary">
        <div class="card-body shadow">
            <h4 class="font-weight-bold text-gray-600">Konsultasi</h4>
            <hr>
            <form class="user" action="<?= base_url('konsultasi/index') ?>" method="POST">
                <div class="form-group">
                    <label for="nama" class="h6 text-primary">Nama Pasien</label>
                    <input type="text" name="nama" id="nama" class="form-control" autocomplete="off" value="<?= set_value('nama') ?>" placeholder="Nama Pasien">
                </div>
                <div class="form-group mt-n2 mb-4">
                    <label for="umur" class="h6 text-primary">Umur Pasien</label>
                    <input type="number" min="1" name="umur" id="umur" class="form-control" autocomplete="off" value="<?= set_value('umur') ?>" placeholder="Umur">
                </div>
                <small class="form-text text-danger ml-3 mt-n3 mb-n3"><?= form_error(end($error)) ?></small>
                <div class="form-group d-flex mt-3 mb-0">
                    <label class="font-weight-bold text-primary mr-2">Gender :</label>
                    <div class="custom-control custom-radio custom-control-inline mr-2">
                        <input type="radio" id="pria" value="Pria" name="gender" class="custom-control-input" checked>
                        <label class="custom-control-label text-primary" for="pria">
                            Pria
                            <i class="fa fa-mars"></i>
                        </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="wanita" value="Wanita" name="gender" class="custom-control-input">
                        <label class="custom-control-label text-primary" for="wanita">
                            Wanita
                            <i class="fa fa-venus"></i>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block font-weight-bold">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->