<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-primary">
        <div class="card-body shadow">
            <h5 class="font-weight-bold text-gray-600">Tambah Gejala</h5>
            <div class="row">
                <div class="col-md-6">
                    <hr>
                    <?= form_open_multipart(base_url('gejala/tambahGejala'), ['id' => 'tambahGejala']); ?>
                    <div class="form-group">
                        <?= form_label('Kode Gejala', 'kode-gejala', ['class' => 'h6 text-primary']); ?>
                        <?= form_input(['name' => 'kode-gejala', 'id' => 'kode-gejala', 'class' => 'form-control', 'value' => $idGejala, 'autocomplete' => 'off', 'placeholder' => 'Kode gejala', 'readonly' => 'on']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('kode-gejala'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Gejala', 'gejala', ['class' => 'h6 text-primary']); ?>
                        <?= form_textarea(['name' => 'gejala', 'id' => 'gejala', 'class' => 'form-control', 'value' => set_value('gejala'), 'autocomplete' => 'off', 'placeholder' => 'Deskripsi Gejala . . .']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('gejala'); ?></small>
                    </div>
                    <div class="form-group">
                        <?= form_label('Nilai Rule', 'nilai', ['class' => 'h6 text-primary']); ?>
                        <?= form_input(['name' => 'nilai', 'id' => 'nilai', 'class' => 'form-control', 'value' => set_value('nilai'), 'autocomplete' => 'off', 'placeholder' => 'Nilai rule gejala']); ?>
                        <small class="form-text text-danger ml-3"><?= form_error('nilai'); ?></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <hr>
                    <div class="form-group">
                        <?= form_submit('btnTambahGejala', 'Simpan', ['class' => 'btn btn-outline-primary float-right']); ?>
                        <a href="<?= base_url('gejala') ?>" class="btn btn-outline-secondary float-right mr-2">Kembali</a>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->