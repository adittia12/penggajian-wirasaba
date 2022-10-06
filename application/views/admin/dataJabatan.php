<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <a class="btn btn-sm btn-success mb-3" href="<?= base_url('admin/dataJabatan/tambahData/'); ?>"><i class="fas fa-plus"></i> Tambah Data</a>

    <?= $this->session->flashdata('pesan'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Jabatan SMK WIRASABA</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mt-2" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-cente">No</th>
                            <th class="text-cente">Nama Jabatan</th>
                            <th class="text-cente">Gaji Pokok</th>
                            <th class="text-cente">Tj. Transport</th>
                            <th class="text-cente">Uang Makang</th>
                            <th class="text-cente">Total</th>
                            <th class="text-cente">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($jabatan as $j) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $j->nama_jabatan ?></td>
                                <td>Rp. <?= number_format($j->gaji_pokok, 0, ',', '.') ?></td>
                                <td>Rp. <?= number_format($j->tj_transport, 0, ',', '.') ?></td>
                                <td>Rp. <?= number_format($j->uang_makan, 0, ',', '.') ?></td>
                                <td>Rp. <?= number_format($j->gaji_pokok + $j->tj_transport + $j->uang_makan, 0, ',', '.') ?></td>
                                <td>
                                    <center>
                                        <a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataJabatan/updateData/' . $j->id_jabatan); ?>"><i class="fas fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin Hapus')" class="btn btn-sm btn-danger" href="<?= base_url('admin/dataJabatan/deleteData/' . $j->id_jabatan); ?>"><i class="fas fa-trash"></i></a>
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