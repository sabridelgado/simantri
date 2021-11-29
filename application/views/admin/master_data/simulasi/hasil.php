<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= ucwords($nama) ?></h1>
    <hr>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">


            <!-- monitoring Modal-->
            <div class="modal fade" id="simulasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Simulasi Pelayanan Antrian </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('pelayanan/simulasi_pelayanan'); ?>" method="POST">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Laju Antrian:</label>
                                    <input type="numerik" name="miu" class="form-control" placeholder="laju pelayanan/satuan waktu" value="<?= set_value('lamda') ?>">
                                    <?php echo form_error('miu', '<small class="text-danger mt-1">', '</small>'); ?>
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Durasi:</label>
                                    <input type="numerik" name="loket" class="form-control" placeholder="Jumlah Loket" value="<?= set_value('durasi') ?>">
                                    <?php echo form_error('loket', '<small class="text-danger mt-1">', '</small>'); ?>
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
                        <th>Nasabah</th>
                        <th>Waktu Datang</th>
                        <th>Waktu Mulai</th>
                        <th>Lama Layanan</th>
                        <th>Waktu Selesai</th>
                        <th>Waktu Tunggu</th>
                        <th>Waku Tunggu Sys</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if ($s_layan != null) { ?>
                        <?php $no = 1;
                        function ubahwaktu($u_waktu)
                        {
                            $detik = $u_waktu  % 60;
                            $menit = floor(($u_waktu % 3600) / 60);
                            $jam = floor(($u_waktu % 86400) / 3600);


                            return "$jam : $menit : $detik";
                        }
                        foreach ($s_layan as $keys) { ?>

                            <tr>
                                <td><?= $keys->id_kedatangan ?></td>
                                <td><?= ubahwaktu($keys->wk_waktu) ?></td>
                                <td><?= ubahwaktu($keys->w_mulai) ?></td>
                                <td><?= ubahwaktu($keys->w_layanan) ?></td>
                                <td><?= ubahwaktu($keys->w_selesai_layanan) ?></td>
                                <td><?= ubahwaktu($keys->w_tunggu_antrian) ?></td>
                                <td><?= ubahwaktu($keys->w_tunggu_sistem) ?></td>

                            </tr>
                        <?php $no++;
                        } ?>
                        <!-- End Looping -->
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- /.container-fluid -->