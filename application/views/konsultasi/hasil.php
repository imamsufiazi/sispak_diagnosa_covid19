<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-primary shadow">
        <div class="card-body ">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold text-gray-600">Hasil Diagnosa</h4>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary btn-icon-split float-right simpan-riwayat ml-2">
                        <span class="icon text-white-60">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Simpan</span>
                    </button>
                    <a href="<?= base_url('konsultasi/index') ?>" type="button" class="btn btn-secondary btn-icon-split float-right">
                        <span class="icon text-white-60">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>
                </div>
            </div>
            <hr>
            <div class="card border-left-primary shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-5">
                            <div class="h5 font-weight-bold text-primary mb-1">Nama Pasien</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-600" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= $hasil['nama_pasien'] ?></div>
                        </div>
                        <div class="col">
                            <div class="h5 font-weight-bold text-primary mb-1">Umur</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-600"><?= $hasil['umur'].' Tahun' ?></div>
                        </div>
                        <div class="col">
                            <div class="h5 font-weight-bold text-primary mb-1">Jenis Kelamin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-600"><?= $hasil['gender'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-id-card fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-left-primary shadow-sm mt-3">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
                    <h6 class="m-0 h5 font-weight-bold text-primary">Gejala Yang Dipilih</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-clipboard-list fa-lg fa-fw text-primary"></i>
                        </a>
                    </div>
                </div>
                <?php
                if ($gejala) {
                ?>
                    <table class="table table-sm table-bordered table-hover" style="margin-bottom: 0px">
                        <thead>
                            <tr>
                                <th scope="col" width="5%" class="text-center">No</th>
                                <th scope="col" width="10%">Kode</th>
                                <th scope="col" width="70%">Gejala</th>
                                <th scope="col" width="15%">Kondisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($gejala as $data) {
                            ?>
                                <tr>
                                    <td scope="row" align="center"><?= ++$i ?></td>
                                    <td><?= $data['kode'] ?></td>
                                    <td><?= $data['gejala'] ?></td>
                                    <td><?= $data['kondisi'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                ?>
                    <div class="card-body" style="padding-bottom: 3px; padding-top: 6px">
                        <div class="h6 mb-0 text-gray-600 my-3">
                            Tidak ada gejala yang dipilih
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="card shadow-sm border-left-primary" style="height: 230px">
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
                            <h1 class="mt-0 mb-n1 text-center" style="font-size: 100px"><?= ($hasil['nilai'] * 100) . '%' ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card shadow-sm border-left-primary" style="height: 230px">
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
                                    <h5 id="fit">
                                    <?= $hasil['hasil'][0] ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="<?= base_url('konsultasi/simpan') ?>" method="POST" id="form-diagnosa">
        <input type="hidden" name="nama_pasien" value="<?= $hasil['nama_pasien'] ?>">
        <input type="hidden" name="umur" value="<?= $hasil['umur'] ?>">
        <input type="hidden" name="gender" value="<?= $hasil['gender'] ?>">
        <input type="hidden" name="nilai" value="<?= $hasil['nilai'] ?>">
        <input type="hidden" name="tanggal" value="<?= $hasil['tanggal'] ?>">
    </form>
</div>
<!-- /.container-fluid -->

<script>
    $('.simpan-riwayat').on('click', function() {
        Swal.fire({
            title: 'Simpan Riwayat Diagnosa ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3CB371',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                // hapus($(this).data('id'));
                $('#form-diagnosa').submit();
            }
        })
    });
</script>