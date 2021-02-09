<div class="container col-lg-6">
    <form action="<?=base_url('user_diagnosa/hasil')?>" method="POST">
        <?php
            $index = 1;
            foreach ($gejala as $g_key => $g_value) :
        ?>
            <div class="card border-left-primary animated--grow-in" id="<?= $index ?>" style="margin-top: 70px; display: <?php if ($index > 1) echo 'none' ?>">
                <div class="card-body shadow ">
                    <h4 class="font-weight-bold text-primary">Pertanyaan <?= ($index) ?></h4>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <!-- <div class="card card-body shadow-sm"> -->
                                <h4 class="text-dark"><?= $g_value['gejala'] ?></h4>
                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="row mt-2 mb-n1">
                        <div class="col">
                            <h6 class="text-dark">Jawaban :</h6>
                        </div>
                    </div>
                    <?php
                        $i = 1;
                        foreach ($kondisi as $k_key => $k_value) :
                        if($i==1) echo "<div class='d-flex justify-content-between'>";
                        if($i==4) echo "</div><div class='d-flex justify-content-between'>";
                    ?>
                        <div class="custom-control custom-radio col-md-3">
                            <input class="custom-control-input" type="radio" name="<?= $g_value['kode'] ?>" id="radio<?= $index.$i ?>" value="<?= $k_value ?>" <?php if ($i == 1) echo "checked" ?>>
                            <label class="custom-control-label text-dark" for="radio<?= $index.$i ?>"><?=$k_key?></label>
                        </div>
                    <?php
                        $i++;
                        endforeach;
                        echo "</div>";
                        if($g_key == array_key_last($gejala)){
                    ?>
                        <button class="btn btn-block btn-primary font-weight-bold rounded-pill mt-2 mb-n2" type="submit" data-id="<?= $index ?>">Simpan</button>
                    <?php
                        } else {
                    ?>
                        <button class="btn btn-block btn-primary font-weight-bold rounded-pill mt-2 mb-n2" type="button" data-id="<?= $index ?>">Berikutnya</button>
                    <?php
                        }
                    ?>
                </div>
            </div>
        <?php
            $index++;
            endforeach;
        ?>
    </form>
</div>

<script>
    $(document).ready(function() {
        $("button").click(function() {
            var id = $(this).data('id');
            $("#" + id).fadeOut(200).delay(2000, function() {
                $('#' + (id + 1)).show();
            });
        })
    })
</script>