<?php namespace App\Models;

use CodeIgniter\Model;

class M_trader extends Model
{
    // Properties for the `barang_keluar` table
    protected $table = 'barang_keluar';
    protected $primaryKey = 'id_bk';
    protected $allowedFields = ['id_bk', 'id_brg', 'nama_brg', 'jumlah', 'tgl_klr', 'created_at', 'updated_at'];

    // Method to get all data from `barang_keluar`
    public function get_all_barang_keluar()
    {
        return $this->db->table($this->table)
                        ->get()
                        ->getResult();
    }

    // Properties for the `pesanan` table
    protected $table_pesanan = 'pesanan';
    protected $primaryKey_pesanan = 'id_pesanan';
    protected $allowedFields_pesanan = ['nama_brg', 'berat', 'Qty', 'alamat', 'tgl_pesan', 'tgl_kirim', 'status_pesanan', 'total_harga'];

    // Method to get all data from `pesanan`
    public function getAllPesanan()
    {
        return $this->db->table($this->table_pesanan)
                        ->get()
                        ->getResult();
    }

    // Methods for other functionalities...

    public function tampil($tabel)
    {
        return $this->db->table($tabel)
                        ->get()
                        ->getResult();
    }

    public function join($tabel, $tabel2, $on)
    {
        return $this->db->table($tabel)
                        ->join($tabel2, $on, 'left')
                        ->get()
                        ->getResult();
    }

    public function getLevels()
    {
        return $this->db->table('level')->select('id_level, nama_level')->get()->getResult();
    }

    public function countAll($table)
    {
        return $this->db->table($table)->countAllResults();
    }

    public function joinWhere($tabel, $tabel2, $on, $where)
    {
        return $this->db->table($tabel)
                        ->join($tabel2, $on, 'left')
                        ->getWhere($where)
                        ->getRow();
    }

    public function getWhere($tabel, $where)
    {
        $query = $this->db->table($tabel)
                          ->getWhere($where);

        if (!$query) {
            log_message('error', 'Query failed for table: ' . $tabel);
            return false; // Handle the error as needed
        }

        return $query->getRow();
    }

    public function editpw($tabel, $isi, $where)
    {
        return $this->db->table($tabel)
                        ->update($isi, $where);
    }

    public function jointigawhere($tabel, $tabel2, $tabel3, $on, $on2, $id, $where)
    {
        return $this->db->table($tabel)
                        ->join($tabel2, $on, 'left')
                        ->join($tabel3, $on2, 'left')
                        ->orderby($id, 'desc')
                        ->getWhere($where);
    }

    public function tambah($tabel, $isi)
    {
        return $this->db->table($tabel)
                        ->insert($isi);
    }

    public function edit($tabel, $isi, $where)
    {
        return $this->db->table($tabel)
                        ->update($isi, $where);
    }

    public function hapus($table, $where)
    {
        return $this->db->table($table)
                        ->delete($where);
    }

    public function insert_user($data)
    {
        return $this->db->table('users')->insert($data);
    }

    public function get_all_users()
    {
        return $this->db->table('users')->get()->getResult();
    }

    public function getWhere1($tabel, $where)
    {
        return $this->db->table($tabel)
                        ->where($where)
                        ->get()
                        ->getRow();
    }

    public function getWhere1nel($tabel, $where)
    {
        return $this->db->table($tabel)
                        ->where($where)
                        ->get()
                        ->getResult();
    }

    public function uploaded($file)
    {
        $imageName = $file->getName();
        $file->move(ROOTPATH . 'public/images', $imageName);
    }

    public function getLoginHistoryByUserId($userId)
    {
        $loginModel = new \App\Models\HsLoginModel();
        return $loginModel->where('id_users', $userId)->orderBy('login_time')->findAll();
    }

    public function joinWherenel($tabel, $tabel2, $on, $where)
    {
        return $this->db->table($tabel)
                        ->join($tabel2, $on, 'left')
                        ->where($where)
                        ->get()
                        ->getResult();
    }
    public function getPesanan($userId, $userLevel)
{
    if ($userLevel == 1) { // Admin can see all data
        return $this->db->table('hs_pesan')
                        ->join('barang', 'barang.id_brg=hs_pesan.id_makanan', 'left')
                        ->join('users', 'users.id_users=hs_pesan.id_users', 'left')
                        ->get()
                        ->getResult();
    } else { // Trader can see only their data
        return $this->db->table('hs_pesan')
                        ->join('barang', 'barang.id_brg=hs_pesan.id_makanan', 'left')
                        ->join('users', 'users.id_users=hs_pesan.id_users', 'left')
                        ->where('hs_pesan.id_users', $userId)
                        ->get()
                        ->getResult();
    }
}
public function insert_barang($data) {
        $this->db->insert('barang', $data);
    }

    public function get_all_barang() {
        return $this->db->get('barang')->result();
    }

    public function updateStatus($id_pesanan, $status)
    {
        return $this->db->table($this->table_pesanan)
                        ->update(['status_pengiriman' => $status], ['id_pesanan' => $id_pesanan]);
    }
    
}
