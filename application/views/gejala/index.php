<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-primary">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold text-gray-600">Gejala</h4>
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url('gejala/tambahGejala') ?>" class="btn btn-primary btn-icon-split float-right">
                        <span class="icon text-white-60">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Gejala</span>
                    </a>
                </div>
            </div>
            <hr>
            <table id="table-gejala" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" width="5%" class="text-center">No</th>
                        <th>Kode</th>
                        <th scope="col" width="60%">Gejala</th>
                        <th class="text-center">Nilai CF</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $start = 0; ?>
                    <?php foreach ($gejala as $g) : ?>
                        <tr>
                            <td align="center" scope="row"><?= ++$start; ?></td>
                            <td><?= strip_tags($g->kode) ?></td>
                            <td><?= strip_tags($g->gejala) ?></td>
                            <td align="center"><?= strip_tags($g->nilai) ?></td>
                            <td align="center">
                                <a class="btn btn-outline-warning btn-sm" href="<?= base_url('gejala/edit/') . $g->id; ?>"><i class="fas fa-edit"></i></a>
                                <button class="btn btn-outline-danger btn-sm confirm-hapus" data-id="<?= $g->id ?>" data-kode="<?= $g->kode ?>"> <i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script>
    $(document).ready(function() {
        $('#table-gejala').DataTable();
    });

    $('.confirm-hapus').on('click', function() {
        Swal.fire({
            title: 'Hapus ' + $(this).data('kode') + ' ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3CB371',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                hapus($(this).data('id'));
            }
        })
    });

    function hapus(id) {
        $.ajax({
            url: '<?= base_url() ?>gejala/hapus/' + id,
            data: {
                id: id
            },
            method: 'post',
            // dataType: 'json',
            success: function(data) {
                window.location.href = '<?= base_url('gejala') ?>';
            }
        });
    }
</script>