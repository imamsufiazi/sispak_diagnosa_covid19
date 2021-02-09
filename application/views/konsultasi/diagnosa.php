<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-primary">
        <div class="card-body shadow">
            <?= form_open_multipart(base_url('konsultasi/hasil'), ['id' => 'diagnosa']); ?>
            <div class="row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold text-gray-600">Konsultasi</h4>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-icon-split float-right ml-2">
                        <span class="icon text-white-60">
                            <i class="fas fa-search-plus"></i>
                        </span>
                        <span class="text">Diagnosa</span>
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
            <table id="table-gejala" class="table table-hover table-bordered shadow-sm" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" width="5%" class="text-center">No</th>
                        <th>Kode</th>
                        <th>Gejala</th>
                        <th scope="col" width="15%" class="text-center">Kondisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $start = 0; ?>
                    <?php foreach ($gejala as $g) : ?>
                        <tr>
                            <td scope="row" align="center"><?= ++$start; ?></td>
                            <td><?= strip_tags($g->kode) ?></td>
                            <td><?= strip_tags($g->gejala) ?></td>
                            <td align="center">
                                <?= form_dropdown($g->kode, $kondisi, set_value($g->kode), [
                                    'id' => 'kondisi',
                                    'class' => 'custom-select custom-select-sm',
                                    'selected' => set_value('kondisi'),
                                ]); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->