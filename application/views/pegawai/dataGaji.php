<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 font-weight-bold text-primary"><?= $title; ?></h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>Bulan/Tahun</th>
                            <th>Gaji Pokok</th>
                            <th>Tj. Transport</th>
                            <th>Uang Makan</th>
                            <th>Potongan Gaji</th>
                            <th>Total Gaji</th>
                            <th>Cetak Slip Gaji</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($potongan as $potong) {
                            $potongan = $potong->jml_potongan;
                        } ?>
                        <?php foreach ($gaji as $money) : ?>
                            <?php $pot_gaji = $money->alpha * $potongan ?>
                            <tr>
                                <td><?= $money->bulan; ?></td>
                                <td>Rp. <?= number_format($money->gaji_pokok, 0, ',', '.'); ?></td>
                                <td>Rp. <?= number_format($money->tj_transport, 0, ',', '.'); ?></td>
                                <td>Rp. <?= number_format($money->uang_makan, 0, ',', '.'); ?></td>
                                <td>Rp. <?= number_format($pot_gaji, 0, ',', '.'); ?></td>
                                <td>Rp. <?= number_format($money->gaji_pokok + $money->tj_transport + $money->uang_makan - $pot_gaji, 0, ',', '.'); ?></td>
                                <td>
                                    <center>
                                        <a target="_blank" class="btn btn-sm btn-primary" href="<?= base_url('pegawai/dataGaji/cetakSlip/' . $money->id_kehadiran); ?>"><i class="fas fa-print"></i></a>
                                    </center>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>



</div>