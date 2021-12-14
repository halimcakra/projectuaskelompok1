<?php
class Crud_peserta extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('M_pelanggan');
    $this->load->helper('url');
  }
  function index()
  {

    // Search

    if ($this->input->post('Search')) {

      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->set_userdata('keyword');
    }

    // config

    $this->db->like('username', $data['keyword']);
    $this->db->from('pelanggan');
    $config['total_rows'] = $this->db->count_all_results();
    $data['total_rows'] = $config['total_rows'];
    $config['base_url'] = 'http://localhost/CI/Crud_peserta/index';

    $config['num_links'] = 1;
    $config['per_page'] = 7;
    $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
    $config['full_tag_close'] = '</ul></nav>';

    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li">';

    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li">';

    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li">';

    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li">';


    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close'] = '</a></li">';

    $config['num_tag_open'] = '<li class="page-item active">';
    $config['num_tag_close'] = '</li">';

    $config['attributes'] = array('class' => 'page-link');




    // inisialisasi
    $this->pagination->initialize($config);

    $data['judul'] = 'Data Pelanggan';
    $data['user'] = $this->db->get_where('user', ['name' =>
    $this->session->userdata('name')])->row_array();
    $data['start'] = $this->uri->segment(3);
    $data['pelanggan'] = $this->M_pelanggan->tampil_data($config['per_page'], $data['start'], $data['keyword'])->result();
    $this->load->view('laundry/v_header', $data);
    $this->load->view('laundry/v_konten', $data);
    $this->load->view('laundry/v_footer', $data);
  }

  function tambah()
  {
    $this->form_validation->set_rules(
      'username',
      'Nama',
      'required|min_length[2]',
      array('min_length' => '%s Minimal 2 karakter !')
    );

    $this->form_validation->set_rules('no_telp', 'No HP', 'required');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi !');

    if ($this->form_validation->run() == false) {
      $data['judul'] = 'Data Pelanggan';
      $data['user'] = $this->db->get_where('user', ['name' =>
      $this->session->userdata('name')])->row_array();
      $data['pelanggan'] = $this->M_pelanggan->index()->result();
      $this->load->view('laundry/v_header', $data);
      $this->load->view('pelanggan/v_tambah', $data);
      $this->load->view('laundry/v_footer', $data);
    } else {
      $kd_pelanggan = $this->input->post('kd_pelanggan');
      $username = $this->input->post('username');
      $alamat_pelanggan = $this->input->post('alamat_pelanggan');
      $no_telp = $this->input->post('no_telp');

      $data = array(
        'kd_pelanggan' => $kd_pelanggan,
        'username' => $username,
        'alamat_pelanggan' => $alamat_pelanggan,
        'no_telp' => $no_telp
      );
      $this->M_pelanggan->input_data($data, 'pelanggan');
      if ($this->db->affected_rows() > 0) {
        echo "<script>alert('Data Berhasil disimpan');</script>";
      }
      echo "<script>window.location='" . site_url('Crud_peserta') . "';</script>";
    }
  }
  function edit($id_pelanggan)
  {
    $this->form_validation->set_rules(
      'username',
      'Nama',
      'required|min_length[2]|callback_username_check',
      array('min_length' => '%s Minimal 2 karakter !')
    );

    if ($this->form_validation->run() == false) {
      $where = array('id_pelanggan' => $id_pelanggan);
      $data['judul'] = 'Data pelanggan';
      $data['user'] = $this->db->get_where('user', ['name' =>
      $this->session->userdata('name')])->row_array();
      $data['pelanggan'] = $this->M_pelanggan->edit_data($where, 'pelanggan')->result();
      $this->load->view('laundry/v_header', $data);
      $this->load->view('pelanggan/v_edit', $data);
      $this->load->view('laundry/v_footer', $data);
    } else {
      $id_pelanggan = $this->input->post('id_pelanggan');
      $kd_pelanggan = $this->input->post('kd_pelanggan');
      $username = $this->input->post('username');
      $no_telp = $this->input->post('no_telp');
      $alamat_pelanggan = $this->input->post('alamat_pelanggan');
      $data = array(
        'id_pelanggan' => $id_pelanggan,
        'kd_pelanggan' => $kd_pelanggan,
        'username' => $username,
        'no_telp' => $no_telp,
        'alamat_pelanggan' => $alamat_pelanggan
      );
      $where = array('id_pelanggan' => $id_pelanggan);
      $this->M_pelanggan->update_data($where, $data, 'pelanggan');
      if ($this->db->affected_rows() > 0) {
        echo "<script>alert('Data Berhasil disimpan');</script>";
      }
      echo "<script>window.location='" . site_url('Crud_peserta') . "';</script>";
    }
  }
  function username_check()
  {
    $post = $this->input->post(null, TRUE);
    $query = $this->db->query("SELECT * FROM pelanggan WHERE username = '$post[username]' AND id_pelanggan != '$post[id_pelanggan]'");
    if ($query->num_rows() > 0) {
      $this->form_validation->set_message('username_check', '{field} ini sudah dipakai,silahkan ganti !');
      return FALSE;
    } else {
      return TRUE;
    }
  }

  function hapus($id_pelanggan)
  {
    $where = array('id_pelanggan' => $id_pelanggan);
    $this->M_pelanggan->hapus_data($where, 'pelanggan');
    if ($this->db->affected_rows() > 0) {
      echo "<script>alert('Data Berhasil dihapus');</script>";
    }
    echo "<script>window.location='" . site_url('Crud_peserta') . "';</script>";
  }
}
