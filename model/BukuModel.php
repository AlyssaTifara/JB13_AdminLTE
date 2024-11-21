<?php
include('Model.php');

class BukuModel extends Model
{
    private $db;
    private $table = 'm_buku'; // Nama tabel buku

    public function __construct()
    {
        include_once('../lib/Connection.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        // query untuk insert data buku
        $query = $this->db->prepare("INSERT INTO {$this->table} (buku_kode, buku_nama, kategori_id, jumlah, deskripsi, gambar) 
                                    VALUES (?, ?, ?, ?, ?, ?)");
        // binding parameter
        $query->bind_param('ssisss', $data['buku_kode'], $data['buku_nama'], $data['kategori_id'], $data['jumlah'], $data['deskripsi'], $data['gambar']);
        // eksekusi query
        $query->execute();
    }

    public function getData()
    {
        // query untuk mengambil data dari tabel buku
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($id)
    {
        // query untuk mengambil data berdasarkan id buku
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE buku_id = ?");
        // binding parameter
        $query->bind_param('i', $id);
        // eksekusi query
        $query->execute();
        // mengambil hasil query
        return $query->get_result()->fetch_assoc();
    }

    public function updateData($id, $data)
    {
        // query untuk update data buku
        $query = $this->db->prepare("UPDATE {$this->table} 
                                    SET buku_kode = ?, buku_nama = ?, kategori_id = ?, jumlah = ?, deskripsi = ?, gambar = ? 
                                    WHERE buku_id = ?");
        // binding parameter
        $query->bind_param('ssiissi', $data['buku_kode'], $data['buku_nama'], $data['kategori_id'], $data['jumlah'], $data['deskripsi'], $data['gambar'], $id);
        // eksekusi query
        $query->execute();
    }

    public function deleteData($id)
    {
        // query untuk delete data buku
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE buku_id = ?");
        // binding parameter
        $query->bind_param('i', $id);
        // eksekusi query
        $query->execute();
    }
}