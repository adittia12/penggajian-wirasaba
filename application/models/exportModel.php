<?php

class ExportModel extends CI_Model
{
    public function getAll()
    {
        $builder = $this->db->table('data_kehadiran');
        $builder->join('data_jabatan', 'data_jabatan.nama_jabatan = data_kehadiran.nama_jabatan');
        $query = $builder->get();
        return $query->get();
    }
}
