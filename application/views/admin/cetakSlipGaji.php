<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style type="text/css">
        body {
            font-family: Arial;
            color: black;
        }
    </style>
</head>

<body>

    <center>
        <img class="mb-3" style="width: 100px;" src="<?= base_url('assets'); ?>/img/logosmk.png" alt="">
        <h1>SMK WIRASABA</h1>
        <h2>Slip Gaji Pegawai</h2>
        <hr style="width: 50%; border-width:5px; color:black;">
    </center>

    <?php foreach ($potongan as $potong) {
        $potongan = $potong->jml_potongan;
    } ?>
    <?php $no = 1;
    foreach ($print_slip as $slip) : ?>
        <?php $potongan_gaji = $slip->alpha * $potongan; ?>
        <table style="width: 100%;">
            <tr>
                <td width="20%">Nama Pegawai</td>
                <td width="2%">:</td>
                <td><?= $slip->nama_pegawai; ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?= $slip->nik; ?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?= $slip->nama_jabatan; ?></td>
            </tr>
            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?= substr($slip->bulan, 0, 2); ?></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?= substr($slip->bulan, 2, 4); ?></td>
            </tr>
        </table>

        <table class="table table-bordered table-striped mt-3">
            <tr>
                <th class="text-center" width="5%">No</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Jumlah</th>
            </tr>
            <tr>
                <td><?= $no++; ?></td>
                <td>Gaji Poko</td>
                <td>Rp. <?= number_format($slip->gaji_pokok, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <td><?= $no++; ?></td>
                <td>Tunjangan Transportasi</td>
                <td>Rp. <?= number_format($slip->tj_transport, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <td><?= $no++; ?></td>
                <td>Uang Makan</td>
                <td>Rp. <?= number_format($slip->uang_makan, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <td><?= $no++; ?></td>
                <td>Potongan</td>
                <td>Rp. <?= number_format($potongan_gaji, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <th colspan="2" style="text-align: center;">Total Gaji</th>
                <th>Rp. <?= number_format($slip->gaji_pokok + $slip->tj_transport + $slip->uang_makan + $potongan_gaji, 0, ',', '.'); ?></th>
            </tr>
        </table>

        <table width="100%" class="mt-3">
            <tr>
                <td></td>
                <td>
                    <p>Pegawai</p>
                    <br>
                    <br>
                    <p class="font-weight-bold"><?= $slip->nama_pegawai; ?></p>
                </td>
                <td width="200px">
                    <p>Karawang, <?= date("d M Y"); ?> <br> Ketua Yayasan,</p>
                    <br>
                    <br>
                    <p>________________________</p>
                </td>
            </tr>
        </table>
    <?php endforeach; ?>

</body>

</html>

<script type="text/javascript">
    window.print();
</script>