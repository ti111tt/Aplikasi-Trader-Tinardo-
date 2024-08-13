<?php
class Transaksi_model extends CI_Model {

    public function addTransaction($data) {
        $this->db->insert('transaksi', $data);
        return $this->db->insert_id();
    }

    public function addTransactionDetail($data) {
        $this->db->insert('transaksi_detail', $data);
    }

    public function clearCart($userId) {
        $this->db->delete('keranjang', array('id_user' => $userId));
    }
}
