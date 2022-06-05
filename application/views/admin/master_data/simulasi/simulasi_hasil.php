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
        $heading = '#Delete Data Hasil';
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

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">




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
        <div class="table-responsive table table-striped">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>Nasabah</th>
                        <th>Rata-Rata Layanan</th>
                        <th>Jumlah Loket</th>
                        <th>Rata-Rata Tunggu (HH:MM:SS)</th>
                        <th>Rata-Rata Layanan (HH:MM:SS)</th>
                        <th>Probailitas Server</th>
                        <th>Total Layanan (HH:MM:SS)</th>
                        <th>Kesimpulan</th>
                        <!-- <th>Alat</th> -->

                    </tr>
                </thead>
                <?php



                ?>

                <tbody>

                    <?php if ($hasil != null) { ?>
                        <?php $no = 1;
                        function ubahwaktu($u_waktu)
                        {
                            $detik = $u_waktu  % 60;
                            $menit = floor(($u_waktu % 3600) / 60);
                            $jam = floor(($u_waktu % 86400) / 3600);


                            return "$jam : $menit : $detik";
                        }


                        foreach ($hasil as $keys) { ?>

                            <tr>

                                <td><?= $keys->p_lamda ?></td>
                                <td><?= $keys->p_miu ?></td>
                                <td><?= $keys->p_loket ?></td>
                                <td><?= ubahwaktu($keys->r_tunggu_antrian * 3600) ?></td>
                                <td><?= ubahwaktu($keys->r_tunggu_layan * 3600) ?></td>
                                <td><?= $keys->probabilitas_teler * 100 ?> %</td>
                                <td><?= ubahwaktu($keys->r_layan_total * 3600) ?></td>
                                <!-- <td style="  color: <?= $keys->warna ?>; font-size: 17px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;"><?= $keys->konten ?></td>
                                <td> <button class="btn btn-xs btn-flat btn-danger" data-toggle="modal" data-target="#modalDelete<?php echo $keys->id_hasil; ?>"> <i class="fas fa-trash text-white-30"></i></button></td> -->
                            </tr>

                            <!-- Modal Delete-->
                            <div class="modal fade" id="modalDelete<?php echo $keys->id_hasil; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <?php echo form_open("pelayanan/delete") ?>
                                        <div class="modal-body">
                                            Apakah anda yakin akan menghapus data ini ?

                                            <input type="hidden" class="form-control" name="id_hasil" required="required" value="<?php echo $keys->id_hasil; ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger font-weight-bold">Hapus</button>
                                            <?php echo form_close(); ?>
                                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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