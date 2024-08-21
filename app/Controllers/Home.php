<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_trader;
use CodeIgniter\I18n\Time;
class Home extends BaseController
{
    private function log_activity($activity)
    {
		$model = new M_trader();
        $data = [
            'id_user'    => session()->get('id'),
            'activity'   => $activity,
			'timestamp' => date('Y-m-d H:i:s'),
			'deleted' => ''
        ];

        $model->tambah('activity', $data);
    }

	private function log_activitys($activity, $id)
    {
		$model = new M_trader();
        $data = [
            'id_user'    => $id,
            'activity'   => $activity,
			'timestamp' => date('Y-m-d H:i:s'),
			'delete' => '0'
        ];

        $model->tambah('activity', $data);
    }
	    public function index()
    {
        echo view('header');
        echo view('login');
        echo view('footer');
        }
	
		public function dashboard()
	{
		 if(session()->get('level')>0) {
        $this->log_activity('User membuka Dashboard'); ///log akt
		 $model = new M_trader();
         $where = array('id_pt' => 2);
         $data['setting'] = $model->getwhere('pt',$where); 
		 $where=array(
            'id_toko'=>1
        );
        //  $data['setting'] = $model->getWhere('toko', $where);
		echo view('header',$data);
        echo view('menu', $data);
        echo view('dashboard');
        echo view('footer');

     }else{
     	return redirect()->to('home/login');
}
}
 

		public function pt()
{
    $model = new M_trader();
    $this->log_activity('User membuka pt'); 
    $where = array('id_pt' => 2);
    $data['setting'] = $model->getwhere('pt',$where);   
    $level = session()->get('level');
    
    echo view('header',$data);
    echo view('menu',$data);

    if ($level == 1) { // Level 1 untuk admin
        // Mengambil data yang diperlukan untuk halaman 'pt'
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where);

        
        echo view('pt', $data);
    } else {
        // Jika level pengguna bukan admin, arahkan ke halaman error
        echo view('access_denied'); // Halaman ini bisa Anda desain sendiri untuk menampilkan pesan akses ditolak
    }
}


public function selesai($id_pesanan) {
    // Load model jika belum
    $this->load->model('M_trader');

    // Ambil data dari tabel pesanan
    $pesanan = $this->M_trader->get_pesanan_by_id($id_pesanan);

    if ($pesanan) {
        // Simpan data ke tabel hs_pengiriman
        $data = [
            'id_pesanan' => $pesanan->id_pesanan,
            'nama_produk' => $pesanan->nama_brg,
            'berat' => $pesanan->berat,
            'Qty' => $pesanan->Qty,
            'alamat' => $pesanan->alamat,
            'tgl_pesan' => $pesanan->tgl_pesan,
            'tgl_kirim' => $pesanan->tgl_kirim,
            'status_pesanan' => 'pengiriman berhasil',
            'total_harga' => $pesanan->total_harga
        ];

        // Insert data ke hs_pengiriman
        $this->db->insert('hs_pengiriman', $data);

        // Hapus data dari tabel pesanan
        $this->db->delete('pesanan', ['id_pesanan' => $id_pesanan]);

        // Redirect atau tampilkan pesan sukses
        $this->session->set_flashdata('message', 'Data berhasil dipindahkan.');
        redirect('home/jadwal');
    } else {
        // Handle jika pesanan tidak ditemukan
        $this->session->set_flashdata('error', 'Pesanan tidak ditemukan.');
        redirect('home/jadwal');
    }
}
public function history_hapus()
    {
        $model = new M_trader();
        $session = session();
        $userId = $session->get('id_users');

        // Ambil riwayat hapus untuk pengguna yang login
        $history = $model->db->table('history_hapus')
                             ->where('id_users', $userId)
                             ->orderBy('deleted_at', 'desc')
                             ->get()
                             ->getResultArray();

        return view('history_hapus', ['history' => $history]);
    }

    public function hapus($table, $id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($table);

        // Ambil data yang akan dihapus
        $data = $builder->getWhere($where)->getRowArray();
        
        if ($data) {
            // Hapus data dari tabel
            $builder->delete($where);

            // Catat detail penghapusan di tabel history_hapus
            $historyBuilder = $db->table('history_hapus');
            $historyBuilder->insert([
                'user_id' => session()->get('id_users'),
                'table_name' => $table,
                'deleted_data' => json_encode($data),
                'deleted_at' => date('Y-m-d H:i:s')
            ]);
            
            return true;
        }
        return false;
    }

public function bayar() {
    $this->log_activity('User melakukan pembayaran'); 
  $this->load->model('Transaksi_model');
  
  // Ambil data dari request POST
  $data = json_decode($this->input->raw_input_stream, true);
  $id_pesanan = $data['id_pesanan'];

  // Ambil data dari tabel keranjang
  $keranjangItems = $this->Transaksi_model->get_keranjang_items($id_pesanan);

  // Simpan data ke tabel transaksi
  foreach ($keranjangItems as $item) {
    $this->Transaksi_model->insert_transaksi($item);
  }

  // Hapus data dari tabel keranjang
  $this->Transaksi_model->delete_from_keranjang($id_pesanan);

  // Kirim respon JSON
  echo json_encode(['success' => true]);
}

public function proses_payment() {
        $this->load->model('Transaksi_model'); // Load model jika diperlukan

        // Ambil data dari POST request
        $address = $this->input->post('address');
        $senderName = $this->input->post('senderName');
        $paymentMethod = $this->input->post('paymentMethod');
        $orders = $this->input->post('orders');

        $this->db->trans_begin(); // Mulai transaksi

        try {
            // Masukkan data ke tabel transaksi
            $totalPrice = array_sum(array_column($orders, 'total'));
            $kodeTransaksi = uniqid(); // Ganti dengan logika pembuatan kode transaksi jika diperlukan
            $dataTransaksi = array(
                'tgl_transaksi' => date('Y-m-d'),
                'kode_transaksi' => $kodeTransaksi,
                'id_users' => 1, // Ganti dengan ID pengguna yang sesuai
                'id_brg' => 1, // Ganti dengan ID barang yang sesuai
                'total_harga' => $totalPrice,
                'nama_pengirim' => $senderName,
                'alamat_pengirim' => $address,
                'nama_penerima' => 'Penerima', // Ganti dengan nama penerima jika ada
                'alamat_penerima' => 'Alamat Penerima', // Ganti dengan alamat penerima jika ada
                'type' => $paymentMethod
            );
            $this->db->insert('transaksi', $dataTransaksi);
            $transactionId = $this->db->insert_id();

            // Masukkan data detail pesanan ke tabel transaksi_detail
            foreach ($orders as $order) {
                $dataDetail = array(
                    'id_transaksi' => $transactionId,
                    'nama_barang' => $order['item'],
                    'jumlah' => $order['quantity'],
                    'total_harga' => $order['total'],
                    'catatan' => $order['note']
                );
                $this->db->insert('transaksi_detail', $dataDetail);
            }

            // Hapus data dari tabel keranjang
            $this->db->delete('keranjang', array('id_user' => 1)); // Ganti dengan ID pengguna yang sesuai

            // Commit transaksi
            $this->db->trans_commit();

            echo json_encode(array('success' => true, 'message' => 'Pembayaran berhasil!'));
        } catch (Exception $e) {
            $this->db->trans_rollback();
            echo json_encode(array('success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()));
        }
    }


public function barang()
{
    $this->log_activity('User membuka barang jual'); 
    if(session()->get('level') > 0) { 
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where); 
        $where1 = array('user.id_user' => session()->get('id'));
        $where = array('id_brg' => session()->get('id'));
        $this->log_activity('User membuka Barang');
        try {
            $data['manda'] = $model->tampilwherenull('barang');
            $data['jel'] = $model->jointigawhere('barang', 'transaksi', 'users', 'barang.id_transaksi=transaksi.id_transaksi', 'barang.id_users=users.id_users', 'barang.id_brg', $where1); 
            $where2 = array('keranjang.id_users' => session()->get('id_users'));
            $data['jol'] = $model->joinWherenel('keranjang', 'barang', 'keranjang.id_makanan=barang.id_brg', $where2);
            echo view('header',$data);
            echo view('menu',$data);
            echo view('barang', $data);
            echo view('footer');
        } catch (\Exception $e) {
            // Handle or log the exception
            echo $e->getMessage();
        }
    } else {
        return redirect()->to('home/login');
    }
}

public function barangjual()
{
    $this->log_activity('User membuka barang jual'); 
    if(session()->get('level') > 0) { 
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where); 
        $where1 = array('user.id_user' => session()->get('id'));
        $where = array('id_brg' => session()->get('id'));
        $this->log_activity('User membuka Barang');
        try {
            $data['manda'] = $model->tampilwherenull('barang');
            $data['jel'] = $model->jointigawhere('barang', 'transaksi', 'users', 'barang.id_transaksi=transaksi.id_transaksi', 'barang.id_users=users.id_users', 'barang.id_brg', $where1); 
            $where2 = array('keranjang.id_users' => session()->get('id_users'));
            $data['jol'] = $model->joinWherenel('keranjang', 'barang', 'keranjang.id_makanan=barang.id_brg', $where2);
            echo view('header',$data);
            echo view('menu',$data);
            echo view('barangjual', $data);
            echo view('footer');
        } catch (\Exception $e) {
            // Handle or log the exception
            echo $e->getMessage();
        }
    } else {
        return redirect()->to('home/login');
    }
}

public function barangrestore()
{
    $this->log_activity('User membuka barang jual'); 
    if(session()->get('level') > 0) { 
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where); 
        $where1 = array('user.id_user' => session()->get('id'));
        $where = array('id_brg' => session()->get('id'));
        $this->log_activity('User membuka Barang');
        try {
   
            $data['manda'] = $model->tampilwhere('barang');
            $data['jel'] = $model->jointigawhere('barang', 'transaksi', 'users', 'barang.id_transaksi=transaksi.id_transaksi', 'barang.id_users=users.id_users', 'barang.id_brg', $where1); 
            $where2 = array('keranjang.id_users' => session()->get('id_users'));
            $data['jol'] = $model->joinWherenel('keranjang', 'barang', 'keranjang.id_makanan=barang.id_brg', $where2);
            echo view('header',$data);
            echo view('menu',$data);
            echo view('barang', $data);
            echo view('footer');
        } catch (\Exception $e) {
            // Handle or log the exception
            echo $e->getMessage();
        }
    } else {
        return redirect()->to('home/login');
    }
}
public function aksi_keran()
    {
        if(session()->get('level')>0){ 
        $model = new M_trader();
      
        $harga= $this->request->getPost('item_name');
        $item_id= $this->request->getPost('item_id');
        $quan= $this->request->getPost('quantity');
        $note= $this->request->getPost('note');
        
        $total = $harga * $quan;

        $isi=array(
            'id_makanan'=>$item_id,
            'jumlah'=>$quan,
            'id_users'=>session()->get('id_users'),
            'total_harga'=>$total,
            'catatan'=>$note,
            
        );



        $model= new M_trader;
        $model->tambah('keranjang', $isi);
        return redirect()->to ('home/barang');
    }else{
        return redirect()->to('home/login');
    }
        
}

public function aksi_keranjang()
    {
        if(session()->get('level')>0){ 
        $model = new M_trader();
      
        $harga= $this->request->getPost('item_name');
        $item_id= $this->request->getPost('item_id');
        $quan= $this->request->getPost('quantity');
        $note= $this->request->getPost('note');
        
        $total = $harga * $quan;

        $isi=array(
            'id_makanan'=>$item_id,
            'jumlah'=>$quan,
            'id_users'=>session()->get('id_users'),
            'total_harga'=>$total,
            'catatan'=>$note,
            
        );



        $model= new M_trader;
        $model->tambah('keranjang', $isi);
        return redirect()->to ('home/barangjual');
    }else{
        return redirect()->to('home/login');
    }
        
}
public function historypesanan()
{
    if (session()->get('level') > 0) { 
        $model = new M_trader();
         $where = array('id_pt' => 2);
         $data['setting'] = $model->getwhere('pt',$where); 
        $userId = session()->get('id_users');
        $userLevel = session()->get('level');

        try {
            $data['hs'] = $model->getPesanan($userId, $userLevel);
            echo view('header',$data);
            echo view('menu',$data);
            echo view('historypesanan', $data);
            // echo view('footer');
        } catch (\Exception $e) {
            // Handle or log the exception
            echo $e->getMessage();
        }
    } else {
        return redirect()->to('home/login');
    }
}


 public function aksi_tambah_barang()
    {
        // Mengambil data dari form
        $data = array(
            'nama_brg' => $this->request->getPost('productName'),
            'kode_brg' => $this->request->getPost('productCode'),
            'harga' => $this->request->getPost('productPrice'),
            'stok' => $this->request->getPost('productStock'),
            'foto' => $this->_uploadImage() // Fungsi untuk meng-upload gambar
        );
        

        // Menyimpan data ke database
        $this->m_trader->insert_barang($data);

        return redirect()->to('barang'); // Sesuaikan dengan URL tujuan
    }

    private function _uploadImage()
    {
        $file = $this->request->getFile('productImage');
        if ($file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getName();
            $file->move(ROOTPATH . 'public/images', $imageName);
            return $imageName;
        }
        return null;
    }

    
public function aksi_t_keranjang()
{
    $id_user = session()->get('id');
    $id_keranjang = $this->request->getPost('id_keranjang');
    $jumlah = $this->request->getPost('jumlah');
    $catatan = $this->request->getPost('catatan');

    $model = new M_trader();

    // Ambil data produk berdasarkan id_keranjang
    $produk = $model->getWhere('keranjang', ['id_keranjang' => $id_keranjang]);

    if ($produk) {
        $harga = $produk->total_harga;
        $total_harga = $jumlah * $harga;

        $transaksi_data = [
            'id_pesanan' => $produk->id_pesanan,
            'no_surat' => $produk->no_surat,
            'kode_transaksi' => $produk->kode_transaksi,
            'nama_brg' => $produk->nama_brg,
            'tgl_surat' => $produk->tgl_surat,
            'tgl_pembelian' => date('Y-m-d'),
            'total_harga' => $total_harga,
            'transaksi_time' => date('Y-m-d H:i:s'),
            'nama_pengirim' => $produk->nama_pengirim,
            'alamat_pengirim' => $produk->alamat_pengirim,
            'nama_penerima' => $produk->nama_penerima,
            'alamat_penerima' => $produk->alamat_penerima,
            'type' => $produk->type,
        ];

        // Simpan data ke tabel transaksi
        $model->tambah('transaksi', $transaksi_data);

        // Hapus data dari tabel keranjang
        $model->hapus('keranjang', ['id_keranjang' => $id_keranjang]);

        return redirect()->to('home/barang')->with('success', 'Pembayaran berhasil dan data keranjang telah dipindahkan ke transaksi.');
    } else {
        return redirect()->back()->with('error', 'Produk tidak ditemukan.');
    }
}







public function bm()
    {
        if(session()->get('level')>0){ 
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where); 
         $where = array('id_pt' => 2);
         $data['setting'] = $model->getwhere('pt',$where); 
        $where=array('id_bm'=>session()->get('id'));
        $data ['manda'] = $model->tampil('barang_masuk'); 

        echo view('header',$data);
        echo view('menu',$data);
        echo view('bm',$data);
        echo view('footer');
         }else{
        return redirect()->to('home/login');
    }
    }
    
    public function t_bm()
{
    if(session()->get('level') > 0) { 
        $model = new M_trader();
         $where = array('id_pt' => 2);
         $data['setting'] = $model->getwhere('pt',$where); 
        $where = array('id_bm' => session()->get('id'));
        $data['manda'] = $model->tampil('barang_masuk');

        echo view('header',$data);
        echo view('menu',$data);
        echo view('t_bm', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
}


 public function aksi_tbm()
    {
        if(session()->get('level')>0){ 
        $model = new M_trader();
        $kode = $this->request->getPost('id_brg');
        $nama = $this->request->getPost('nama_brg');
        $jumlah= $this->request->getPost('jumlah');
        $tglmsk = $this->request->getPost('tglmsk');
        


        $isi=array(
            'id_brg'=>$kode,
            'nama_brg'=>$nama,
            'jumlah'=>$jumlah,
            'tglmsk'=>$tglmsk,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

            
        );

        $model= new M_trader;
        $model->tambah('barang_masuk', $isi);
        return redirect()->to ('home/bm');
    }else{
        return redirect()->to('home/login');
    }
        
}
public function show_detail($id_bm)
{
    if (session()->get('level') == 1) {
        $model = new M_trader();
         $where = array('id_pt' => 2);
         $data['setting'] = $model->getwhere('pt',$where); 
        $data['flora'] = $model->getDetail('barang_masuk', $id_bm); // Sesuaikan nama metode dan model

        echo view('header');
        echo view('menu');
        echo view('detail_barang_masuk', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login')->with('error', 'Anda tidak memiliki akses.');
    }
}

public function delete_bm($id)
    {
        $model = new M_trader;
        $where = array('id_bm' => $id);
        $model->hapus('barang_masuk', $where);
        return redirect()->to('home/bm');
    }
    public function delete_kry($id)
    {
        $model = new M_trader;
        $where = array('id_kry' => $id);
        $model->hapus('karyawan', $where);
        return redirect()->to('home/karyawan');
    }
   public function update_bm($id)
{
    if (session()->get('level') > 0) {
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where); 
        $where = array('id_bm' => $id);
        $data['Manda'] = $model->getWhere('barang_masuk', $where);
        
        echo view('header');
        echo view('menu');
        echo view('update_bm', $data);
        echo view('footer');

         $model->tampil('barang_masuk', $isi);
    } else {
        return redirect()->to('home/login');
    }
}

public function laporanbm()
    {
         if(session()->get('level')>0){ 
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where);
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where); 
        $where=array('id_bm'=>session()->get('id'));
        $data ['manda'] = $model->tampil('barang_masuk'); 

        echo view('header',$data);
        echo view('menu',$data);
        echo view('laporanbm',$data);
        echo view('footer');
         }else{
        return redirect()->to('home/login');
    }
    }






//captcha offline


public function bk()
    {
        if(session()->get('level')>0){ 
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where); 
        $where=array('id_bk'=>session()->get('id'));
        $data ['manda'] = $model->tampil('barang_keluar'); 

        echo view('header',$data);
        echo view('menu',$data);
        echo view('bk',$data);
        echo view('footer');
         }else{
        return redirect()->to('home/login');
    }
    }
   public function t_bk()
{
    if(session()->get('level') > 0) {
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where);
        $where = array('id_bk' => session()->get('id'));
        $data['manda'] = $model->tampil('barang_keluar');

        echo view('header',$data);
        echo view('menu',$data);
        echo view('t_bk', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
}



public function aksi_tbk()
{
    if (session()->get('level') > 0) {
        $model = new M_trader();

        $kode = $this->request->getPost('id_brg');
        $nama = $this->request->getPost('nama_brg');
        $jumlah = $this->request->getPost('jumlah');
        $tglklr = $this->request->getPost('tgl_klr');

        $isi = array(
            'id_brg' => $kode,
            'nama_brg' => $nama,
            'jumlah' => $jumlah,
            'tgl_klr' => $tglklr,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        if ($model->tambah('barang_keluar', $isi)) {
            return redirect()->to('home/bk')->with('success', 'Data barang keluar berhasil ditambah');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah data barang keluar');
        }
    } else {
        return redirect()->to('home/login');
    }
}

 public function update_bk($id)
{
    if (session()->get('level') > 0) {
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where);
        $where = array('id_bk' => $id);
        $data['Manda'] = $model->getWhere('barang_keluar', $where);
        
        echo view('header',$data);
        echo view('menu',$data);
        echo view('update_bk', $data);
        echo view('footer');

         $model->tampil('barang_keluar', $isi);
    } else {
        return redirect()->to('home/login');
    }
}
 public function laporanbk()
    {
         if(session()->get('level')>0){ 
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where);
        $where=array('id_bk'=>session()->get('id'));
        $data ['manda'] = $model->tampil('barang_keluar'); 

        echo view('header',$data);
        echo view('menu',$data);
        echo view('laporanbk',$data);
        echo view('footer');
         }else{
        return redirect()->to('home/login');
    }
    }
 public function delete_bk($id)
    {
        $model = new M_trader;
        $where = array('id_bk' => $id);
        $model->hapus('barang_keluar', $where);
        return redirect()->to('home/bk');
    }

  // Controller Home.php
public function print_bk() {
    // Check if the user is logged in and has the correct level
    if (session()->get('level') > 0) {
        // Load the model
        $model = new M_trader(); 

        // Fetch all data from the barang_keluar table
        $data['manda'] = $model->findAll(); 

        // Load the view with the fetched data
        return view('print_bk', $data); 
    } else {
        // Redirect to login page if the user doesn't have the correct level
        return redirect()->to('home/login');
    }
}


 
    public function print_u() {
    // Check if the user is logged in and has the correct level
    if (session()->get('level') > 0) {
        // Load the model
        $model = new M_trader(); 

        // Fetch all data from the barang_keluar table
        $data['manda'] = $model->findAll(); 

        // Load the view with the fetched data
        return view('print_u', $data); 
    } else {
        // Redirect to login page if the user doesn't have the correct level
        return redirect()->to('home/login');
    }
}


// public function update_profile()
// {
//     $userId = $this->session->userdata('id_users'); // Dapatkan ID pengguna dari sesi
//     $data = [
//         'nama_users' => $this->input->post('nama_users'),
//         'email' => $this->input->post('email'),
//         'no_telp' => $this->input->post('no_telp')
//     ];

//     // Update data pengguna di database
//     $this->db->where('id_users', $userId);
//     $update = $this->db->update('users', $data);

//     if ($update) {
//         $this->session->set_flashdata('success', 'Profil berhasil diperbarui');
//     } else {
//         $this->session->set_flashdata('error', 'Gagal memperbarui profil');
//     }

//     // Redirect kembali ke halaman update profile
//     redirect('home/update_profile');
// }

    public function signup() {
        // Load model Level untuk mengambil daftar level (jabatan)
        $levelModel = new \App\Models\M_trader(); // Use the correct model
        $data['levels'] = $levelModel->findAll();

        // Load view untuk form sign-up
        echo view('signup', $data);
    }

    public function register()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_users' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
            'no_telp' => 'required',
            'id_level' => 'required'
        ]);

        if (!$this->validate($validation->getRules())) {
            // Tampilkan kembali form signup dengan pesan error
            $data['validation'] = $this->validator;
            return view('signup', $data);
        }

        // Ambil data dari form
        $userModel = new M_trader(); // Ensure you have a UserModel
        $userData = [
            'nama_users' => $this->request->getPost('nama_users'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'no_telp' => $this->request->getPost('no_telp'),
            'id_level' => $this->request->getPost('id_level'),
        ];

        // Simpan data ke tabel users
        if ($userModel->insert($userData)) {
            // Redirect ke halaman login setelah berhasil registrasi
            return redirect()->to(base_url('login'))->with('success', 'Registrasi berhasil, silakan login.');
        } else {
            // Tampilkan pesan error jika gagal menyimpan data
            return redirect()->back()->with('error', 'Gagal melakukan registrasi.');
        }
    }


   public function laporantransaksi()
	{
		 if(session()->get('level')>0){ 
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where);
        $where=array('id_transaksi'=>session()->get('id'));
        $data ['manda'] = $model->tampil('transaksi'); 

        echo view('header',$data);
        echo view('menu',$data);
        echo view('laporantransaksi',$data);
        echo view('footer');
         }else{
        return redirect()->to('home/login');
    }
    }
  public function print_tr()
{
    // Load data dari model
    $this->load->model('M_trader'); // Sesuaikan dengan nama model Anda
    $data['manda'] = $this->M_trader->getAlltransaksi(); // Sesuaikan dengan fungsi model Anda

    // Load view untuk mencetak data transaksi
    $this->load->view('print_tr', $data);
}

    public function hstran()
    {
       if(session()->get('level')>0){ 
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where);
        $where=array('id_hstran'=>session()->get('id_hstran'));
        $data ['manda'] = $model->tampil('hs_tran'); 

        echo view('header',$data);
        echo view('menu',$data);
        echo view('hstran',$data);
        echo view('footer');
         }else{
        return redirect()->to('home/login');
    }
    }












public function karyawan()
    {
        if(session()->get('level')>0){ 
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where); 
        $where=array('id_kry'=>session()->get('id'));
        $data ['manda'] = $model->tampil('karyawan'); 

        echo view('header',$data);
        echo view('menu',$data);
        echo view('karyawan',$data);
        echo view('footer');
         }else{
        return redirect()->to('home/login');
    }
    }
    public function t_kry()
    {
         if(session()->get('level')>0){ 
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where);
        $where=array('id_bk'=>session()->get('id'));
        $data ['manda'] = $model->tampil('karyawan'); 

        echo view('header',$data);
        echo view('menu',$data);
        echo view('t_kry',$data);
        echo view('footer');
         }else{
        return redirect()->to('home/login');
    }
    }

 public function aksi_tkry()
    {
        if(session()->get('level')>0){ 
        $model = new M_trader();
        $id = $this->request->getPost('id_kry');
        $nik = $this->request->getPost('NIK');
        $nama= $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $email= $this->request->getPost('email');
        $no_hp= $this->request->getPost('no_hp');
        


        $isi=array(
            'id_kry'=>$id,
            'NIK'=>$nik,
            'nama'=>$nama,
            'alamat'=>$alamat,
             'email'=>$email,
              'no_hp'=>$no_hp,

            
        );

        $model= new M_trader;
        $model->tambah('karyawan', $isi);
        return redirect()->to ('home/karyawan');
    }else{
        return redirect()->to('home/login');
    }
        
}
 public function update_kry($id)
{
    if (session()->get('level') > 0) {
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where);
        $where = array('id_kry' => $id);
        $data['Manda'] = $model->getWhere('karyawan', $where);
        
        echo view('header',$data);
        echo view('menu',$data);
        echo view('update_kry', $data);
        echo view('footer');

         $model->tampil('karyawan', $isi);
    } else {
        return redirect()->to('home/login');
    }
}

public function deletekry($id)
    {
        $model = new M_trader;
        $where = array('id_kry' => $id);
        $model->hapus('karyawan', $where);
        return redirect()->to('home/karyawan');
    }





public function pengiriman()
    {
        if(session()->get('level')>0){ 
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where);
        $where=array('id_pesanan'=>session()->get('id'));
        $data ['manda'] = $model->tampil('pesanan'); 

        echo view('header',$data);
        echo view('menu',$data);
        echo view('pengiriman',$data);
        echo view('footer');
         }else{
        return redirect()->to('home/login');
    }
    }
    public function delete_pesanan($id)
    {
        $model = new M_trader;
        $where = array('id_pesanan' => $id);
        $model->hapus('pesanan', $where);
        return redirect()->to('home/pengiriman');
    }
    public function t_pengiriman()
    {
         if(session()->get('level')>0){ 
        $model = new M_trader();
        $where=array('id_pesanan'=>session()->get('id'));
        $data ['manda'] = $model->tampil('pesanan'); 
        $data['levels'] = $model->getLevels(); 


        echo view('header');
        echo view('menu');
        echo view('t_pengiriman',$data);
        echo view('footer');
         }else{
        return redirect()->to('home/login');
    }
    }
    public function update_status($id_pesanan, $status)
{
    $model = new M_trader();

    if ($status == 'completed') {
        $model->updateStatus($id_pesanan, 'Selesai');
    } elseif ($status == 'failed') {
        $model->updateStatus($id_pesanan, 'Gagal');
    }

    return redirect()->to('home/jadwal');
}



  public function jadwal() {
    // Ensure user has the correct level to access this page
    if (session()->get('level') > 0) {
        $model = new M_trader(); 
        // Replace with your actual model
        $data['manda'] = $model->getAllPesanan(); // Fetch data

        return view('jadwal', $data); // Pass data to the view
    } else {
        return redirect()->to('home/login');
    }
}

public function aksi_tpengiriman()
    {
        if(session()->get('level')>0){ 
        $model = new M_trader();
      
      
        $id_pesanan= $this->request->getPost('id_pesanan');
        $nama_brg= $this->request->getPost('nama_brg');
        $berat= $this->request->getPost('berat');
        $Qty= $this->request->getPost('Qty');
        $alamat= $this->request->getPost('alamat');
        $tgl_pesan= $this->request->getPost('tgl_pesan');
        $tgl_kirim= $this->request->getPost('tgl_kirim');
        $status_pengiriman= $this->request->getPost('status_pesanan');
        $total_harga= $this->request->getPost('total_harga');
        
        


        $isi=array(
            'nama_brg'=>$nama_brg,
            'berat'=>$berat,
            'Qty'=>$Qty,
            'alamat'=>$alamat,
            'tgl_pesan'=>$tgl_pesan,
            'tgl_kirim'=>$tgl_kirim,
            'status_pesanan'=>$status_pengiriman,
            'total_harga'=>$total_harga,
             
            
        );

        $model= new M_trader;
        $model->tambah('pesanan', $isi);
        return redirect()->to ('home/pengiriman');
    }else{
        return redirect()->to('home/login');
    }
        
}






   
public function users()
{
    if (session()->get('level') > 0) { 
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where); 
        $where = array('id_users' => session()->get('id'));

        // Ambil data users
        $data['manda'] = $model->tampil('users');

        // Ambil data levels untuk jabatan
        $data['levels'] = $model->tampil('level'); // Pastikan model `M_trader` punya method `tampil('level')`

        echo view('header',$data);
        echo view('menu',$data);
        echo view('users', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
}

public function aksireset()
    {
        $model = new M_trader();
        $id = $this->request->getPost('id');
        
        $where= array('id_users'=>$id);
           
        $isi = array(

            'password' => md5('12345')
            
            
        );
        $model->edit('users', $isi,$where);

        return redirect()->to('Home/users');
        
        
        
    }

    public function edit_pt()
    {
        $model = new M_trader();
        $id = $this->request->getPost('id');
        $pt = $this->request->getPost('nama_pt');
        $uploadedFile = $this->request->getFile('logo');
        $where = array('id_pt' => $id);
        
        // Initialize the array with non-file fields
        $isi = array(
            'nama_pt' => $pt,
        );
        
        // Check if a file was uploaded and is valid
        if ($uploadedFile && $uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
            $foto = $uploadedFile->getName();
            $model->uploaded($uploadedFile); // Upload the new file
            $isi['logo'] = $foto; // Add the new file name to the array data
        }
        
        // Update the record in the database
        $model->edit('pt', $isi, $where);
    
        return redirect()->to('Home/pt');
    }
    
   

     public function t_u()
    {
         if(session()->get('level')>0){ 
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where); 
        $where=array('id_users'=>session()->get('id'));
        $data ['manda'] = $model->tampil('users'); 
        $data['levels'] = $model->getLevels(); 


        echo view('header',$data);
        echo view('menu',$data);
        echo view('t_u',$data);
        echo view('footer');
         }else{
        return redirect()->to('home/login');
    }
    }


public function aksi_tu()
    {
        if(session()->get('level')>0){ 
        $model = new M_trader();
      
      
        $nama= $this->request->getPost('nama_users');
        $email= $this->request->getPost('email');
        $password= md5($this->request->getPost('password'));
        $no_telp= $this->request->getPost('no_telp');
        $idlevel= $this->request->getPost('id_level');
        
        


        $isi=array(
            'nama_users'=>$nama,
            'email'=>$email,
            'password'=>$password,
            'no_telp'=>$no_telp,
            'id_level'=>$idlevel,
             
            
        );

        $model= new M_trader;
        $model->tambah('users', $isi);
        return redirect()->to ('home/users');
    }else{
        return redirect()->to('home/login');
    }
        
}
  
public function delete_users($id)
    {
        $model = new M_trader;
        $where = array('id_users' => $id);
        $model->hapus('users', $where);
        return redirect()->to('home/users');
    }

















   
public function setting()
    {
        // if(session()->get('level')>0) {
        // $model = new M_trader();
        // $where=array('id_user'=session()->get('id'));

        echo view('header');
        echo view('menu');
        echo view('setting');
        echo view('footer');

    // }else{
    //  return redirect()->to('home/login');

       
}
public function reset_password()
{
    $id = $this->request->getPost('id_users');
    $model = new M_traders(); // Sesuaikan dengan nama model yang benar

    // Logika untuk mereset password
    $new_password = 'default_password'; // Ganti dengan logika pengaturan password yang aman
    $data = ['password' => password_hash($new_password, PASSWORD_BCRYPT)];

    if ($model->update($id, $data)) {
        return $this->response->setJSON(['status' => 'success', 'message' => 'Password berhasil direset']);
    } else {
        return $this->response->setJSON(['status' => 'error', 'message' => 'Password gagal direset']);
    }
}

 
 public function login()
    {
        
        session()->destroy();
        return redirect()->to('login', $data);
    }
    public function generateCaptcha()
    {
        // Create a string of possible characters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $captcha_code = '';
        
        // Generate a random CAPTCHA code with letters and numbers
        for ($i = 0; $i < 6; $i++) {
            $captcha_code .= $characters[rand(0, strlen($characters) - 1)];
        }
        
        // Store CAPTCHA code in session
        session()->set('captcha_code', $captcha_code);
        
        // Create an image for CAPTCHA
        $image = imagecreate(120, 40); // Increased size for better readability
        $background = imagecolorallocate($image, 200, 200, 200);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        $line_color = imagecolorallocate($image, 64, 64, 64);
        
        imagefilledrectangle($image, 0, 0, 120, 40, $background);
        
        // Add some random lines to the CAPTCHA image for added complexity
        for ($i = 0; $i < 5; $i++) {
            imageline($image, rand(0, 120), rand(0, 40), rand(0, 120), rand(0, 40), $line_color);
        }
        
        // Add the CAPTCHA code to the image
        imagestring($image, 5, 20, 10, $captcha_code, $text_color);
        
        // Output the CAPTCHA image
        header('Content-type: image/png');
        imagepng($image);
        imagedestroy($image);
    }
    
    
    public function aksi_login()
{
    $session = session();
    $model = new M_trader();
    $u = $this->request->getPost('username');
    $p = $this->request->getPost('password');

    // Periksa koneksi internet
    if (!$this->checkInternetConnection()) {
        // Jika tidak ada koneksi, cek CAPTCHA gambar
        $captcha_code = $this->request->getPost('captcha_code');
        if ($session->get('captcha_code') !== $captcha_code) {
            $session->setFlashdata('toast_message', 'Invalid CAPTCHA');
            $session->setFlashdata('toast_type', 'danger');
            return redirect()->to('home/login');
        }
    } else {
        // Jika ada koneksi, cek Google reCAPTCHA
        $recaptchaResponse = trim($this->request->getPost('g-recaptcha-response'));
        $secret = '6Lc3hiAqAAAAAF_9qCtiHo9IdUW8zlzjMQIETuPV'; // Ganti dengan Secret Key Anda
        $credential = array(
            'secret' => $secret,
            'response' => $recaptchaResponse
        );

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        curl_close($verify);

        $status = json_decode($response, true);

        if (!$status['success']) {
            $session->setFlashdata('toast_message', 'Captcha validation failed');
            $session->setFlashdata('toast_type', 'danger');
            return redirect()->to('home/login');
        }
    }
    $hashedPassword = password_hash($p, PASSWORD_DEFAULT);
    // Proses login seperti biasa
    $user = $model->getWheres('users', ['nama_users' => $u]);

    if ($user) {
        $lock_time = $user['lock_time'];
        $current_time = date('Y-m-d H:i:s');

        // Check if account is locked
        if ($lock_time && strtotime($current_time) < strtotime($lock_time) + 5 * 60) { // 5 minutes lock
            $remaining_time = (strtotime($lock_time) + 5 * 60) - strtotime($current_time);
            $minutes = floor($remaining_time / 60);
            $seconds = $remaining_time % 60;
            $session->setFlashdata('toast_message', "Akun terkunci. Coba lagi dalam $minutes menit dan $seconds detik.");
            $session->setFlashdata('toast_type', 'danger');
            return redirect()->to('home/login');
        }
        $where = array(
            'nama_users' => $u,
            'password' => md5($p),
        );
    
        $cek = $model->getWhere('users', $where);

        // Validate password using password_verify
        if ($cek) {
            // Reset login attempts on successful login
            $model->edit('users', ['login_attempts' => 0, 'lock_time' => null], ['id_users' => $user['id_users']]);
        
            $session->set('nama', $user['nama_users']);
            $session->set('id', $user['id_users']);
            $session->set('level', $user['id_level']);
            return redirect()->to('home/dashboard');
        } else {
            $word = 'Password salah';

    // Pass the $word variable to the view
    $data = [
        'word' => $word
    ];
        echo view('header');
        echo view('login', $data);
        echo view('footer');
            // // Increment login attempts
            // $attempts = $user['login_attempts'] + 1;
            // $data = ['login_attempts' => $attempts];

            // // Lock account if 3 attempts reached
            // if ($attempts >= 3) {
            //     $data['lock_time'] = date('Y-m-d H:i:s');
            //     $session->setFlashdata('toast_message', 'Akun terkunci karena 3 kali percobaan gagal. Coba lagi setelah 5 menit.');
            // } else {
            //     $session->setFlashdata('toast_message', 'Password salah. Percobaan ke-' . $attempts);
            // }

            // $model->edit('users', $data, ['id_users' => $user['id_users']]);
            // $session->setFlashdata('toast_type', 'danger');
            // return redirect()->to('home/login');
        }
    } else {
        // $session->setFlashdata('toast_message', 'Nama pengguna tidak ditemukan');
        $word = 'Nama pengguna tidak ditemukan';

    // Pass the $word variable to the view
    $data = [
        'word' => $word
    ];
        echo view('header');
        echo view('login', $data);
        echo view('footer');
        // return redirect()->to('home/login');
    }
}


    
    public function checkInternetConnection()
    {
        $connected = @fsockopen("www.google.com", 80);
        if ($connected) {
            fclose($connected);
            return true;
        } else {
            return false;
        }
    }
   
public function logonama() {
    if (session()->get('level') == 1 || session()->get('level') == 0) {
        $model = new M_trader();
        $where = array('id_pt' => 2);
        $data['setting'] = $model->getwhere('pt',$where); 
        // Menentukan id_toko yang ingin diambil
        $id = 1; // id_toko yang diinginkan
        
        // Mengambil data dari tabel 'toko' berdasarkan id_toko
        $data['setting'] = $model->getWhere('toko', ['id_toko' => $id]);
        
        echo view('header',$data);
        echo view('menu', $data);
        echo view('setting', $data);
        echo view('footer', $data);
    } else {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
}


public function aksietoko()
{
    $model = new M_trader();
    $nama = $this->request->getPost('nama');
    $id = $this->request->getPost('id');
    $uploadedFile = $this->request->getFile('foto');

    $where = ['id_toko' => $id];

    $isi = [
        'nama_toko' => $nama
    ];

    // Cek apakah ada file yang diupload
    if ($uploadedFile && $uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
        $foto = $uploadedFile->getName();
        $model->upload($uploadedFile); // Mengupload file baru
        $isi['logo'] = $foto; // Menambahkan nama file baru ke array data
    }

    $model->edit('toko', $isi, $where);

    return redirect()->to('home/setting/'.$id);
}

public function aksi_reset($id)
{
    $model = new M_trader();

    $where= array('id_users'=>$id);

    $isi = array(

        'password' => md5('123')      

    );
    $model->editpw('users', $isi,$where);

    return redirect()->to('home/users');



}
public function update_status_pembayaran() {
    $id = $this->input->post('id');
    $status = $this->input->post('status');
    
    $this->Barang_model->update_status_pembayaran($id, $status);
    echo json_encode(['status' => 'success']);
}
public function lppw()
{
    return view('lppw'); // Load the forgot password view
}

public function forgot_password_action()
{
    $email = $this->request->getPost('email');

    // Validate the email and handle the password reset logic here
    // For now, we'll just simulate success
    
    session()->setFlashdata('message', 'Check your email for the password reset instructions.');

    return redirect()->to('/home/lppw'); // Redirect back to the form with a message
}



    public function logout()
    {
        $model = new M_trader();
        $where = ['id_users' => session()->get('id_users')];

    $isi = [
        'logout_time' => date('Y-m-d H:i:s')
    ];
        $model->edit('hs_login', $isi, $where);
        session()->destroy();
        return redirect()->to('login');
    }


public function riwayat_login()
{
    $model = new M_trader();
    $data['logins'] = $model->tampil('hs_login');
    
    echo view('menu');
    echo view('header');
    echo view('hslogin', $data);
    
}

public function activity(){
    $model = new M_trader();
    $where = array('id_pt' => 2);
    $data['setting'] = $model->getwhere('pt',$where);
    $data['activity'] = $model->join('activity','users','activity.id_user = users.id_users');
    echo view('menu',$data);
    echo view('header',$data);
    echo view('activity', $data);
}



    public function aksi_hs()
{
    if(session()->get('level') > 0){ 
        $model = new M_trader();
    
        $metode = $this->request->getPost('metode');
        $alamat = $this->request->getPost('alamat');
        $currentTime = Time::now();

        // Format the time and date
        $formattedTime = $currentTime->format('YmdHis');
        $currentTimestamp = $currentTime->format('Y-m-d H:i:s');

        $where2 = array('id_users' => session()->get('id_users'));
        $data['jol'] = $model->getWhere1nel('keranjang', $where2);
    
        foreach ($data['jol'] as $item) {
            $isi = array(
                'kode_hs_pesan' => $formattedTime,
                'id_makanan' => $item->id_makanan,
                'jumlah' => $item->jumlah,
                'id_users' => $item->id_users,
                'total_harga' => $item->total_harga,
                'catatan' => $item->catatan,
                'metode_pembayaran' => $metode,
                'alamat_pengiriman' => $alamat,
                 'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            );

            $model = new M_trader();
            $model->tambah('hs_pesan', $isi);

            $where = array('id_keranjang' => $item->id_keranjang);
            $model->hapus('keranjang', $where);
        }
    
        return redirect()->to('home/barang');
    } else {
        return redirect()->to('home/login');
    }
}

public function restoreupbarang($id)
{
    $model = new M_trader();

    // Restore product data
    $model->restoreProduct('barang_keluar_backup','id_brg',$id);
	// $this->updatelog('User Restore Updated Data Barang');
    return redirect()->to('home/barang');
}

public function sdbarang($id)
{
		$model = new M_trader;
		// Ubah status transaksi menjadi "habis" di kedua tabel
		// $this->log_activity('User Soft Delete Keranjang');
		$model->softdelete1('barang','id_brg',$id);

		// Kirim respons (jika diperlukan)
		return redirect()->to('home/barang');
}

public function rsbarang($id){
    $model = new M_trader;
    // Pass the where condition directly to the softdelete() function
    $model->restore1('barang','id_brg',$id);
    // $this->log_activity('User Restore Data Barang');
    // print_r($id);
    // Redirect to 'home/recyclebin'
    return redirect()->to('home/barangrestore');
}

   } 


