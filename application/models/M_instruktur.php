<?php

/**
 *
 */
class M_instruktur extends CI_Model
{
   function index()
   {
      return $this->db->get('admin');
   }
   function tampil_data($limit, $start, $keyword = null)
   {
      if ($keyword) {
         $this->db->like('username', $keyword);
      }
      return $this->db->get('admin', $limit, $start);
   }
   function countadmin()
   {
      return $this->db->get('admin')->num_rows();
   }
   function input_data($data, $table)
   {
      $this->db->insert($table, $data);
   }
   function edit_data($where, $table)
   {
      return $this->db->get_where($table, $where);
   }
   function update_data($where, $data, $table)
   {
      $this->db->where($where);
      $this->db->update($table, $data);
   }
   function hapus_data($where, $table)
   {
      $this->db->where($where);
      $this->db->delete($table);
   }
}
