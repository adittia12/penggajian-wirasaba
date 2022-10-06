<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Data Absensi Pegawai
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

                <a href="<?= base_url('admin/dataAbsensi/inputAbsensi'); ?>" class="btn btn-success mb-2 ml-3"><i class="fas fa-plus"></i> Input Kehadiran</a>

                <?php if (count($absensi) > 0) { ?>
                    <a href="<?= base_url('admin/dataAbsensi/cetakLaporanAbsensi?bulan=' . $bulan), '&tahun=' . $tahun; ?>" target="_blank" class="btn btn-success mb-2 ml-3"><i class="fas fa-print"></i></a>
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
        Menampilkan Data Kehadiran Pegawai Bulan : <span class="font-weight-bold"><?= $bulan; ?></span> Tahun : <span class="font-weight-bold"><?= $tahun; ?></span>
    </div>

    <?php
    $jml_data = count($absensi);
    if ($jml_data > 0) { ?>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table responsive">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <td class="text-center">No</td>
                                <td class="text-center">NIK</td>
                                <td class="text-center">Nama Pegawai</td>
                                <td class="text-center">Jenis Kelamin</td>
                                <td class="text-center">Jabatan</td>
                                <td class="text-center">Hadir</td>
                                <td class="text-center">Sakit</td>
                                <td class="text-center">Alpha</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($absensi as $a) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $a->nik; ?></td>
                                    <td><?= $a->nama_pegawai; ?></td>
                                    <td><?= $a->jenis_kelamin; ?></td>
                                    <td><?= $a->nama_jabatan; ?></td>
                                    <td><?= $a->hadir; ?></td>
                                    <td><?= $a->sakit; ?></td>
                                    <td><?= $a->alpha; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    <?php } else { ?>
        <span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data masih kosong, silakan input data kehadiran pada bulan dan tahun yang sudah dipilih!.</span>
    <?php } ?>

</div>