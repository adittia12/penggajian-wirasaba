<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Input Absensi Pegawai
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

                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Generate</button>

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
    <form action="" method="POST">
        <button class="btn btn-success mb-3" type="submit" name="submit" value="submit">Simpan</button>

        <table class="table table-bordered table-striped">
            <tr>
                <td class="text-center">No</td>
                <td class="text-center">NIK</td>
                <td class="text-center">Nama Pegawai</td>
                <td class="text-center">Jenis Kelamin</td>
                <td class="text-center">Jabatan</td>
                <td class="text-center" width="8%">Hadir</td>
                <td class="text-center" width="8%">Sakit</td>
                <td class="text-center" width="8%">Alpha</td>
            </tr>
            <?php $no = 1;
            foreach ($input_absensi as $a) : ?>
                <tr>
                    <input type="hidden" name="bulan[]" class="form-control" value="<?= $bulantahun; ?>">
                    <input type="hidden" name="nik[]" class="form-control" value="<?= $a->nik; ?>">
                    <input type="hidden" name="nama_pegawai[]" class="form-control" value="<?= $a->nama_pegawai; ?>">
                    <input type="hidden" name="jenis_kelamin[]" class="form-control" value="<?= $a->jenis_kelamin; ?>">
                    <input type="hidden" name="nama_jabatan[]" class="form-control" value="<?= $a->nama_jabatan; ?>">

                    <td><?= $no++; ?></td>
                    <td><?= $a->nik; ?></td>
                    <td><?= $a->nama_pegawai; ?></td>
                    <td><?= $a->jenis_kelamin; ?></td>
                    <td><?= $a->nama_jabatan; ?></td>
                    <td><input type="number" name="hadir[]" class="form-control" value="0"></td>
                    <td><input type="number" name="sakit[]" class="form-control" value="0"></td>
                    <td><input type="number" name="alpha[]" class="form-control" value="0"></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>



</div>