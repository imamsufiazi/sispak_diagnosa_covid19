<?php flash(); ?>
<div class="container col-lg-6">
    <div class="card border-left-primary animated--grow-in" style="margin-top: 20px;">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold text-primary">Hasil Diagnosa</h4>
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url() ?>" class="btn btn-primary btn-icon-split float-right">
                        <span class="icon text-white-60">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Selesai</span>
                    </a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="font-weight-bold text-primary mt-0">Diagnosa</h5>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <i class="fas fa-stethoscope text-primary"></i>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <h1 class="mt-0 mb-n1 text-center" style="font-size: 50px"><?= ($hasil['nilai'] * 100) . '%' ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="font-weight-bold text-primary mt-0">Biodata Pasien</h5>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <i class="fas fa-id-badge text-primary" style="font-size: 20px"></i>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <li class="mt-n2" style="list-style-type:none; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <i class="fa fa-id-card" style="width: 30px"></i>
                                Nama :
                                <?= $hasil['nama_pasien'] ?>
                            </li>
                            <li style="list-style-type:none;">
                                <i class="fa fa-user" style="width: 30px"></i>
                                Umur :
                                <?= $hasil['umur'] ?>
                            </li>
                            <li class="mb-n2" style="list-style-type:none;">
                                <i class="fa fa-venus-mars" style="width: 30px"></i>
                                Jenis Kelamin :
                                <?= $hasil['gender'] ?>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="card shadow-sm" style="height: 230px">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="font-weight-bold text-primary mt-0">Hasil & Saran</h5>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <i class="fas fa-notes-medical text-primary" style="font-size: 20px"></i>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <div class="row">
                                <div class="col-md-4 d-flex justify-content-center mt-2">
                                    <span class="fa-stack fa-4x">
                                        <?php
                                        if ($hasil['hasil'][1] == 1) {
                                        ?>
                                            <i class="fas fa-circle fa-stack-2x text-success"></i>
                                            <i class="fas fa-smile fa-stack-1x fa-inverse" style="font-size: 80px"></i>
                                        <?php
                                        } else if ($hasil['hasil'][1] == 2) {
                                        ?>
                                            <i class="fas fa-circle fa-stack-2x text-warning"></i>
                                            <i class="fas fa-meh fa-stack-1x fa-inverse" style="font-size: 80px"></i>
                                        <?php
                                        } else if ($hasil['hasil'][1] == 3) {
                                        ?>
                                            <i class="fas fa-circle fa-stack-2x text-danger"></i>
                                            <i class="fas fa-frown fa-stack-1x fa-inverse" style="font-size: 80px"></i>
                                        <?php
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="col-md-8 text-justify ml-n3">
                                    <!-- <h5 id="fit"> -->
                                    <?= $hasil['hasil'][0] ?>
                                    <!-- </h5> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>