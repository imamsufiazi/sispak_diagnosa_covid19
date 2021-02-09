<!-- Begin Page Content -->
<?php flash(); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card border-left-primary">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="font-weight-bold text-gray-600">Dashboard</h4>
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url('riwayat') ?>" class="btn btn-primary btn-icon-split float-right">
                        <span class="icon text-white-60">
                            <i class="fas fa-history"></i>
                        </span>
                        <span class="text">Lihat Riwayat</span>
                    </a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseGrafik" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseGrafik">
                            <h6 class="m-0 font-weight-bold text-primary">Grafik Riwayat Diagnosa</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseGrafik" style="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <canvas id="canvas" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow mb-">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-primary">Riwayat Berdasarkan Gender</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample" style="">
                            <div class="card-body">
                                <?php foreach ($gender as $r) : ?>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $r->gender ?></div>
                                            <div class="text-xs font-weight-bold text-gray-600 text-uppercase mb-1"><?= $r->total ?> Orang</div>
                                        </div>
                                    </div>
                                    <hr>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<script>
    $.ajax({
        url: '<?= base_url('home/getGrafik') ?>',
        method: 'post',
        dataType: 'json',
        success: function(data) {
            // console.log(data);
            var tanggal = [];
            var total = [];

            data.forEach(function(obj) {
                tanggal.push(obj.tanggal);
                total.push(parseInt(obj.total));
            });

            var barChartData = {
                labels: tanggal,
                datasets: [{
                    fillColor: "#0056b3",
                    strokeColor: "#0056b3",
                    data: total
                }]
            }

            var index = 0;
            var ctx = document.getElementById("canvas").getContext("2d");
            var barChartDemo = new Chart(ctx).Line(barChartData, {
                responsive: true,
                barValueSpacing: 25
            });
            // var interval = setInterval(function() {
            //     barChartDemo.removeData();
            //     console.log(total[index] + ' ' + index + ' ' + penyakit[index]);
            //     barChartDemo.addData([total[index]], [penyakit[index]]);
            //     index++;
            //     if (index == total.length) {
            //         // clearInterval(interval);
            //         index = 0;
            //     }
            // }, 1000);

        }
    });
</script>