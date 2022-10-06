<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Data Gaji Pegawai
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-2">
                    <label class="" for="staticEmail2">Bulan : </label>
                    <select class="form-control ml-3" name="bulan">
                        <option selected="selected">Bulan</option>
                        <?php
                        $bulan = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
                        $jlh_bln = count($bulan);
                        for ($c = 0; $c < $jlh_bln; $c += 1) {
                            echo "<option value=$bulan[$c]> $bulan[$c] </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-2 ml-5">
                    <label for="staticEmail2">Tahun : </label>
                    <select class="form-control ml-3" name="tahun" id="">
                        <option value="">-- Pilih Tahun --</option>
                        <?php $tahun = date('Y');
                        for ($i = 2022; $i < $tahun + 5; $i++) { ?>
                            <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <?php
                if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun']) != '') {
                    $bulan = $_GET['bulan'];
                    $tahun = $_GET['tahun'];
                    $bulantahun = $bulan . $tahun;
                } else {
                    $bulan = date('m');
                    $tahun = date('Y');
                    $bulantahun = $bulan . $tahun;
                }
                ?>

                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
                <?php if (count($gaji) > 0) { ?>
                    <a href="<?= base_url('admin/dataPenggajian/cetakGaji?bulan=' . $bulan), '&tahun=' . $tahun; ?>" target="_blank" class="btn btn-success mb-2 ml-3"><i class="fas fa-print"></i> </a>
                <?php } else { ?>
                    <button type="button" class="btn btn-success mb-2 ml-3" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-print"></i>
                    </button>
                <?php } ?>
            </form>
        </div>
    </div>

    <?php
    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun']) != '') {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun = $bulan . $tahun;
    } else {
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun = $bulan . $tahun;
    }
    ?>

    <div class="alert alert-info">
        Menampilkan Data Gaji Pegawai Bulan : <span class="font-weight-bold"><?= $bulan; ?></span> Tahun : <span class="font-weight-bold"><?= $tahun; ?></span>
    </div>

    <?php
    $jml_data = count($gaji);
    if ($jml_data > 0) { ?>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">Nama Pegawai</th>
                                <th class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Jabatan</th>
                                <th class="text-center">Gaji Pokok</th>
                                <th class="text-center">TJ. Transport</th>
                                <th class="text-center">Uang Makan</th>
                                <th class="text-center">Potongan</th>
                                <th class="text-center">Total Gaji</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($potongan as $p) {
                                $alpha = $p->jml_potongan;
                            } ?>

                            <?php $no = 1;
                            foreach ($gaji as $g) : ?>
                                <?php $potongan = $g->alpha * $alpha ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $g->nik; ?></td>
                                    <td><?= $g->nama_pegawai; ?></td>
                                    <td><?= $g->jenis_kelamin; ?></td>
                                    <td><?= $g->nama_jabatan; ?></td>
                                    <td>Rp.<?= number_format($g->gaji_pokok, 0, ',', '.'); ?></td>
                                    <td>Rp.<?= number_format($g->tj_transport, 0, ',', '.'); ?></td>
                                    <td>Rp.<?= number_format($g->uang_makan, 0, ',', '.'); ?></td>
                                    <td>Rp.<?= number_format($potongan, 0, ',', '.'); ?></td>
                                    <td>Rp.<?= number_format($g->gaji_pokok + $g->tj_transport + $g->uang_makan - $potongan, 0, ',', '.'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>


                    </table>
                </div>
            </div>
        </div>


    <?php } else { ?>
        <span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data absensi kosong, silakan input data kehadiran pada bulan dan tahun yang sudah dipilih!.</span>
    <?php } ?>


</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Data Gaji Masih Kosong, Silakan Input Absensi Terlebih Dahulu Pada Bulan dan Tahun yang Anda Pilih
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>