<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card o-hidden shadow-lg animated--grow-in" style="margin-top: 25%">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row ">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="row mt-n3 mb-4" style="margin-left: 2px">
                                    <a href="<?= base_url('user_diagnosa/') ?>" class="text-primary" id="btnform" style="text-decoration: none">
                                        <i class="fa fa-arrow-left"></i>
                                        <span class="font-weight-bold">KEMBALI</span>
                                    </a>
                                </div>
                                <div class="text-center">
                                    <h1 class="h4 text-primary ml-n4 mb-4">
                                        <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                                        ADMIN PAGE
                                    </h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url(); ?>auth">
                                    <div class="form-group">
                                        <?= form_input(['name' => 'username', 'id' => 'username', 'class' => 'form-control form-control-user', 'value' => set_value('username'), 'autocomplete' => 'off', 'placeholder' => 'Username']); ?>
                                        <small class="form-text text-danger ml-3"><?= form_error('username'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <?= form_password(['name' => 'pass', 'id' => 'pass', 'class' => 'form-control form-control-user', 'placeholder' => 'Password']); ?>
                                        <small class="form-text text-danger ml-3"><?= form_error('pass'); ?></small>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <?= form_submit('btnLogin', 'LOGIN', ['class' => 'btn btn-primary btn-user btn-block font-weight-bold']); ?>
                                    </div>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>