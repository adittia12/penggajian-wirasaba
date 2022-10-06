<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <a class="mb-4 mt-2 btn btn-sm btn-success" href="<?= base_url('admin/dataPegawai/tambahData'); ?>"><i class="fas fa-plus"></i> Tambah Pegawai</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai SMK WIRASABA</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Nama Pegawai</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Tanggal Masuk</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Photo</th>
                            <th class="text-center">Hak Akses</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pegawai as $p) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $p->nik; ?></td>
                                <td><?= $p->nama_pegawai; ?></td>
                                <td><?= $p->jenis_kelamin; ?></td>
                                <td><?= $p->jabatan; ?></td>
                                <td><?= $p->tanggal_masuk; ?></td>
                                <td><?= $p->status; ?></td>
                                <td><img src="<?= base_url() . 'assets/photo/' . $p->photo; ?>" width="70px" alt=""></td>

                                <?php if ($p->hak_akses == '1') { ?>
                                    <td>Admin</td>
                                <?php } else { ?>
                                    <td>Pegawai</td>
                                <?php } ?>

                                <td>
                                    <center>
                                        <a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataPegawai/updateData/' . $p->id_pegawai); ?>"><i class="fas fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin Hapus')" class="btn btn-sm btn-danger" href="<?= base_url('admin/dataPegawai/deleteData/' . $p->id_pegawai); ?>"><i class="fas fa-trash"></i></a>
                                    </center>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>