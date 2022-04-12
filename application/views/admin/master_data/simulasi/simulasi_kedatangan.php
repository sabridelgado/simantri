<div class="container-fluid">
    <?php
    if ($this->session->flashdata('add')) {
        $message = $this->session->flashdata('add');
        $heading = '#Tambah User';
    } else if ($this->session->flashdata('update')) {
        $message = $this->session->flashdata('update');
        $heading = '#Update User';
    } else if ($this->session->flashdata('delete')) {
        $message = $this->session->flashdata('delete');
        $heading = '#Delete User';
    } else if ($this->session->flashdata('simked')) {
        $message = $this->session->flashdata('simked');
        $heading = '#Simulasi Kedatangan';
    }
    ?>
    <?php if (isset($message)) { ?>
        <script>
            $(document).ready(function() {
                $.toast({
                    text: '<?php echo $message; ?>',
                    heading: '<?php echo $heading; ?>',
                    position: 'top-right',
                    width: 'auto',
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: 5000
                })
            });
        </script>
    <?php } ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= ucwords($nama) ?></h1>
    <hr>
    <?= $this->session->flashdata('message') ?>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#simulasiModal">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Mulai Simulasi</span>
            </a>
            <a href="<?php echo site_url('kedatangan') ?>" class="btn btn-success btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fa fa-refresh"></i>
                </span>
                <span class="text">Refresh Halaman</span>
            </a>
            <a href="<?php echo site_url('kedatangan/resetdata') ?>" class="btn btn-danger btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fa fa-trash"></i>
                </span>
                <span class="text">Reset Data</span>
            </a>

            <!-- monitoring Modal-->
            <div class="modal fade" id="simulasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Simulasi Kedatangan Antrian </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('kedatangan/simulasi_kedatangan'); ?>" method="POST">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Laju Kedatangan Antrian:</label>
                                    <input type="numerik" name="lamda" class="form-control" placeholder="laju Kedatangan antrian/satuan waktu" value="<?= set_value('lamda') ?>">
                                    <?php echo form_error('lamda', '<small class="text-danger mt-1">', '</small>'); ?>
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Durasi:</label>
                                    <input type="numerik" name="durasi" class="form-control" placeholder="Waktu Simulasi/ jam" value="<?= set_value('durasi') ?>">
                                    <?php echo form_error('durasi', '<small class="text-danger mt-1">', '</small>'); ?>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Mulai Simulasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Import Data monitoring Modal-->
            <div class="modal fade" id="importmonitoringModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data monitoring</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <form method="post" id="import_form" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <a href="<?php echo base_url("upload/excel/format_monitoring.xlsx"); ?>">Download Format</a><br>
                                    <label for=""><b>Import Data</b></label>
                                    <input type="file" class="form-control" name="file" id="file" required accept=".xls, .xlsx">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="import" value="Import" class="btn btn-info" />
                        </form>

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>

                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 15%;">Kedatangan</th>
                        <th style="">Bilangan Acak</th>
                        <th>Interfal Waktu Kedatangan</th>
                        <th>Waktu Kedatangan</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if ($s_kedatangan != null) { ?>
                        <?php $no = 1;
                        function ubahwaktu($u_waktu)
                        {
                            $detik = $u_waktu  % 60;
                            $menit = floor(($u_waktu % 3600) / 60);
                            $jam = floor(($u_waktu % 86400) / 3600);


                            return "$jam : $menit : $detik";
                        }
                        foreach ($s_kedatangan as $keys) { ?>

                            <tr>
                                <td><?= $keys->id_kedatangan ?></td>
                                <td><?= $keys->bil_acak ?></td>
                                <td><?= ubahwaktu($keys->iwk_waktu)   ?></td>
                                <td><?= ubahwaktu($keys->wk_waktu)  ?></td>

                            </tr>
                        <?php $no++;
                        } ?>
                        <!-- End Looping -->
                    <?php } ?>

                </tbody>
            </table>
            <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
        </div>
    </div>
</div>


<!-- /.container-fluid -->