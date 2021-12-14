<?php

class M_trans extends CI_Model
{
  public function get($id_trans = null)
  {
    $this->db->from('transaksi');
    if($id != null){
      $this->db->where('id_trans',$id_trans);
    }
    $query = $this->db->get();
    return $query;
  }


  function tampil_data($limit,$start,$keyword = null)
  {
   if ($keyword) {
      $this->db->like('id_trans',$keyword);
   }
   return $this->db->get('transaksi',$limit,$start);

  }

  function get_relasi($id_trans = null)
  {
     $this->db->select('transaksi.*, jadwal.kode_jadwal as kode_jwl ,peserta.username as peserta_name, pembayaran.nama as nama_pembayaran');
     $this->db->from('transaksi');
     $this->db->join('jadwal','jadwal.id_jadwal = transaksi.id_jadwal','inner');
     $this->db->join('pembayaran','pembayaran.id_pembayaran = transaksi.id_pembayaran','inner');
     $this->db->join('peserta','peserta.id_peserta = transaksi.id_peserta','inner');
     if ($id_trans != null) {
       $this->db->where('id_trans',$id_trans);
     }
     return $this->db->get();
  }

  public function del($id_trans)
  {
    $this->db->where('id_trans', $id_trans);
    $this->db->delete('transaksi');
  }

  public function countPaket()
  {
    return $this->db->get('transaksi')->num_rows();
  }

  public function add($post)
  {
    $params = [
      'id_jadwal' =>  $post['id_jadwal'],
      'id_peserta' => $post['id_peserta'],
      'id_pembayaran' => $post['id_pembayaran'],
      'date_created' => date('Y-m-d')
    ];
    $this->db->insert('transaksi',$params);

  }

  // public function edit($post)
  // {
  //   $params = [
  //     'nama' =>  $post['nama'],
  //     'harga' => $post['harga'],
  //     'byk_pertemuan' => $post['byk_pertemuan'],
  //   ];
  //   $this->db->where('id', $post['id']);
  //   $this->db->update('paket',$params);
  // }

}
