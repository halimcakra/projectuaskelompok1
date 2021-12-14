<?php
class Crud_instruktur extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('M_instruktur');
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
    $this->db->from('admin');

    $config['base_url'] = 'http://localhost/CI/index.php/Crud_instruktur/index';
    $config['total_rows'] = $this->db->count_all_results();
    $config['num_links'] = 1;

    $data['total_rows'] = $config['total_rows'];
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

    $data['judul'] = 'Data Admin';
    $data['user'] = $this->db->get_where('user', ['name' =>
    $this->session->userdata('name')])->row_array();
    $data['start'] = $this->uri->segment(3);
    $data['admin'] = $this->M_instruktur->tampil_data($config['per_page'], $data['start'], $data['keyword'])->result();
    $this->load->view('laundry/v_header', $data);
    $this->load->view('admin/v_admin', $data);
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

    if ($this->form_validation->run() == false) {
      $data['judul'] = 'Data Admin';
      $data['user'] = $this->db->get_where('user', ['name' =>
      $this->session->userdata('name')])->row_array();
      $data['admin'] = $this->M_instruktur->index()->result();
      $this->load->view('laundry/v_header', $data);
      $this->load->view('admin/v_tambah', $data);
      $this->load->view('laundry/v_footer', $data);
    } else {
      $kd_admin = $this->input->post('kd_admin');
      $username = $this->input->post('username');
      $telp_admin = $this->input->post('telp_admin');
      $alamat_admin = $this->input->post('alamat_admin');
      $lulusan_admin = $this->input->post('lulusan_admin');

      $data = array(
        'kd_admin' => $kd_admin,
        'username' => $username,
        'telp_admin' => $telp_admin,
        'alamat_admin' => $alamat_admin,
        'lulusan_admin' => $lulusan_admin
      );
      $this->M_instruktur->input_data($data, 'admin');
      if ($this->db->affected_rows() > 0) {
        echo "<script>alert('Data Berhasil disimpan');</script>";
      }
      echo "<script>window.location='" . site_url('Crud_instruktur') . "';</script>";
    }
  }
  function edit($id_admin)
  {
    $this->form_validation->set_rules(
      'username',
      'Nama',
      'required|min_length[2]|callback_username_check',
      array('min_length' => '%s Minimal 2 karakter !')
    );

    if ($this->form_validation->run() == false) {
      $where = array('id_admin' => $id_admin);
      $data['judul'] = 'Data Admin';
      $data['user'] = $this->db->get_where('user', ['name' =>
      $this->session->userdata('name')])->row_array();
      $data['admin'] = $this->M_instruktur->edit_data($where, 'admin')->result();
      $this->load->view('laundry/v_header', $data);
      $this->load->view('admin/v_edit', $data);
      $this->load->view('laundry/v_footer', $data);
    } else {
      $id_admin = $this->input->post('id_admin');
      $kd_admin = $this->input->post('kd_admin');
      $telp_admin = $this->input->post('telp_admin');
      $username = $this->input->post('username');
      $alamat_admin = $this->input->post('alamat_admin');
      $data = array(
        'id_admin' => $id_admin,
        'kd_admin' => $kd_admin,
        'telp_admin' => $telp_admin,
        'username' => $username,
        'alamat_admin' => $alamat_admin
      );
      $where = array('id_admin' => $id_admin);
      $this->M_pelanggan->update_data($where, $data, 'admin');
      if ($this->db->affected_rows() > 0) {
        echo "<script>alert('Data Berhasil disimpan');</script>";
      }
      echo "<script>window.location='" . site_url('Crud_instruktur') . "';</script>";
    }
  }
  function username_check()
  {
    $post = $this->input->post(null, TRUE);
    $query = $this->db->query("SELECT * FROM peserta WHERE username = '$post[username]' AND id_admin != '$post[id_admin]'");
    if ($query->num_rows() > 0) {
      $this->form_validation->set_message('username_check', '{field} ini sudah dipakai,silahkan ganti !');
      return FALSE;
    } else {
      return TRUE;
    }
  }

  function hapus($id_instr)
  {
    $where = array('id_instr' => $id_instr);
    $this->M_instruktur->hapus_data($where, 'instruktur');
    if ($this->db->affected_rows() > 0) {
      echo "<script>alert('Data Berhasil dihapus');</script>";
    }
    echo "<script>window.location='" . site_url('Crud_instruktur') . "';</script>";
  }
}
