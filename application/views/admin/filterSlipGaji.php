<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card mx-auto" style="width: 35%;">
        <div class="card-header bg-primary text-white text-center">
            <?= $title; ?>
        </div>

        <form action="<?= base_url('admin/slipGaji/cetakSlipGaji'); ?>" method="POST">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Bulan</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="bulan">
                            <option selected="selected">-- Bulan --</option>
                            <?php
                            $bulan = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
                            $jlh_bln = count($bulan);
                            for ($c = 0; $c < $jlh_bln; $c += 1) {
                                echo "<option value=$bulan[$c]> $bulan[$c] </option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Tahun</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="tahun" id="">
                            <option value="">-- Pilih Tahun --</option>
                            <?php $tahun = date('Y');
                            for ($i = 2022; $i < $tahun + 5; $i++) { ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="nama_pegawai" id="">
                            <option value="">-- Pilih Pegawai --</option>
                            <?php foreach ($pegawai as $pekerja) : ?>
                                <option value="<?= $pekerja->nama_pegawai; ?>"><?= $pekerja->nama_pegawai; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button style="width: 100%;" type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Slip Gaji</button>
            </div>
    </div>
    </form>


</div>