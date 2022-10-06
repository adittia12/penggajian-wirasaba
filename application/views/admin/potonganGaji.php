<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <a class="btn btn-sm btn-success mb-2 mt-2" href="<?= base_url('admin/potonganGaji/tambahData'); ?>"><i class="fas fa-plus"></i> Tambah Data</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Setting Potongan Gaji</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Jenis Potongan</th>
                            <th class="text-center">Jumlah Potongan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pot_gaji as $p) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $p->potongan; ?></td>
                                <td>Rp. <?= number_format($p->jml_potongan, 0, ',', '.'); ?></td>
                                <td>
                                    <center>
                                        <a class="btn btn-sm btn-primary" href="<?= base_url('admin/potonganGaji/updateData/') . $p->id; ?>"><i class="fas fa-edit"></i></a>
                                        <a onclick="return confirm('Yaki Hapus?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/potonganGaji/deleteData/' . $p->id); ?>"><i class="fas fa-trash"></i></a>
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