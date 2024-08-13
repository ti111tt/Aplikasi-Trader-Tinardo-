<?php namespace App\Models;

use CodeIgniter\Model;

class M_trader extends Model
{
    protected $table = 'users'; // Nama tabel di database
    protected $primaryKey = 'id_users'; // Nama kolom primary key
    protected $allowedFields = ['nama_users', 'email', 'no_telp', 'password']; // Kolom yang bisa diupdate

    /**
     * Mereset password pengguna berdasarkan ID.
     * 
     * @param int $id ID pengguna
     * @param string $newPassword Password baru yang akan di-hash
     * @return bool Status apakah update berhasil atau tidak
     */
    public function resetPassword($id, $newPassword)
    {
        // Hash password baru
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // Data yang akan diupdate
        $data = [
            'password' => $hashedPassword
        ];

        // Update password berdasarkan ID
        return $this->update($id, $data);
    }
}
