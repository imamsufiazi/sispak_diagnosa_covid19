<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card">
        <div class="card-body shadow">
            <h5 class="font-weight-bold">Tambah Data</h5>
            <div class="row">
                <div class="col-md-6">
                    <hr>
                    <?= form_open_multipart(base_url('mahasiswa/tambahData'), ['id' => 'tambahData']); ?>
                    <div class="form-group">
                        <?= form_label('Nama', 'nama', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'nama', 'id' => 'nama', 'class' => 'form-control', 'value' => set_value('nama'), 'autocomplete' => 'off', 'placeholder' => 'Nama lenkgap']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('NIM', 'nim', ['class' => 'h6']); ?>
                        <?= form_input(['name' => 'nim', 'id' => 'nim', 'type' => 'number', 'class' => 'form-control', 'value' => set_value('nim'), 'autocomplete' => 'off', 'placeholder' => 'Nomor induk mahasiswa']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('nim'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Program Studi', 'prodi', ['class' => 'h6']); ?>
                        <?= form_dropdown('prodi', $prodi, set_value('prodi'), [
                            'id' => 'prodi',
                            'class' => 'form-control chosen schosen-select',
                            'selected' => set_value('prodi'),
                        ]); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('prodi'); ?></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <hr>
                    <div class="form-group">
                        <?= form_submit('btnTambah', 'Tambah Data', ['class' => 'btn btn-outline-success float-right']); ?>
                        <a href="<?= base_url('mahasiswa') ?>" class="btn btn-outline-secondary float-right mr-2">Kembali</a>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->