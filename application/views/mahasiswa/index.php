<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="text-success font-weight-bold">Data Mahasiswa</h5>
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url('mahasiswa/tambahData') ?>" class="btn btn-outline-success float-right mb-3">Tambah Data</a>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($mahasiswa as $mhs) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $mhs->nama; ?></td>
                            <td><?= $mhs->nim; ?></td>
                            <td><?= $mhs->prodiNama; ?></td>
                            <td>
                                <a class="btn btn-outline-warning btn-sm" href="<?= base_url('mahasiswa/edit/') . $mhs->id; ?>">Edit</a>
                                <button class="btn btn-outline-danger btn-sm confirm-hapus" data-id="<?= $mhs->id ?>" data-nama="<?= $mhs->nama ?>">Hapus</button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->

    <script>
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
                url: '<?= base_url() ?>mahasiswa/hapus/' + id,
                data: {
                    id: id
                },
                method: 'post',
                // dataType: 'json',
                success: function(data) {
                    if (data != 'access') {
                        window.location.href = '<?= base_url('auth/blocked') ?>';
                    } else {
                        window.location.href = '<?= base_url('mahasiswa') ?>';
                    }
                }
            });
        }
    </script>