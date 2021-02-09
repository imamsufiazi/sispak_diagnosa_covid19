<div class="container col-md-6">
    <div class="card bg-gradient-primary" id="1" style="margin-top: 70px">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <img class="rounded-lg" src="<?= base_url('assets/img/profile/doctor.jpg') ?>" alt="" style="width: 280px">
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card card-body ml-n2 animated--grow-in" id="form">
                        <div class="row mt-n3" style="margin-left: 2px">
                            <a href="<?=base_url('user_diagnosa/')?>" class="text-primary" id="btnform" style="text-decoration: none">
                                <i class="fa fa-arrow-left"></i>
                                <span class="font-weight-bold">KEMBALI</span>
                            </a>
                        </div>
                        <div class="row d-flex justify-content-center mt-2">
                            <i class="fa fa-user text-primary mr-1"></i>
                            <label class="h6 text-primary">BIODATA</label>
                        </div>
                        <form class="user" action="<?= base_url('user_diagnosa/biodata')?>" method="POST">
                            <div class="form-group">
                                <input type="text" name="nama" id="nama" class="form-control form-control-user" autocomplete="off" value="<?=set_value('nama')?>" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group mt-n2 mb-4">
                                <input type="number" min="1" name="umur" id="umur" class="form-control form-control-user" autocomplete="off" value="<?=set_value('umur')?>" placeholder="Umur">
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
                            <div class="form-group mt-n1 mb-n3">
                                <button type="submit" class="btn btn-primary btn-user btn-block font-weight-bold">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
