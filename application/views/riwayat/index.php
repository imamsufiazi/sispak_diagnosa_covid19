<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-primary">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold text-gray-600">Riwayat Pasien</h4>
                </div>
            </div>
            <hr>
            <table id="table-penyakit" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" width="5%" class="text-center">No</th>
                        <th class="text-center" width=20%">Tanggal Diagnosa</th>
                        <th scope="col" width="40%">Nama</th>
                        <th class="text-center">Umur</th>
                        <th scope="col" width="10%">Gender</th>
                        <th class="text-center">Nilai</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $start = 0; ?>
                    <?php foreach ($riwayat as $p) : ?>
                        <tr>
                            <td scope="row" align="center"><?= ++$start; ?></td>
                            <td><?= strip_tags($p->tanggal) ?></td>
                            <td><?= strip_tags($p->nama_pasien) ?></td>
                            <td align="center"><?= strip_tags($p->umur) ?></td>
                            <td><?= strip_tags($p->gender) ?></td>
                            <td align="center"><?= strip_tags($p->nilai) ?></td>
                            <td align="center">
                                <button class="btn btn-outline-danger btn-sm confirm-hapus" data-id="<?= $p->id ?>" data-nama="<?= $p->nama_pasien ?>"><i class="fas fa-trash"></i></button>
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
        $('#table-penyakit').DataTable();
    });

    $('.confirm-hapus').on('click', function() {
        Swal.fire({
            title: 'Hapus ' + $(this).data('nama') + ' ?',
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
            url: '<?= base_url() ?>riwayat/hapus/' + id,
            data: {
                id: id
            },
            method: 'post',
            // dataType: 'json',
            success: function(data) {
                window.location.href = '<?= base_url('riwayat') ?>';
            }
        });
    }
</script>