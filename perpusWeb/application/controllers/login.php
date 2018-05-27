<?php
class login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('m_user'));
        
    }
    function index() {
        $this->load->view('login/login');
           if ($this->session->userdata('u_name')) {
            redirect('karyawan/tampil');
        }
    }

    function proses() {
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/login');
        } else {

            $usr = $this->input->post('username');
            $psw = $this->input->post('password');
            $u = $usr;
            $p = md5($psw);
            $cek = $this->m_user->cek($u, $p);
            if ($cek->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cek->result() as $qad) {
                    $sess_data['u_id'] = $qad->u_id;
                    $sess_data['nama'] = $qad->nama;
                    $sess_data['u_name'] = $qad->u_name;
                    $sess_data['role'] = $qad->role;
                    $this->session->set_userdata($sess_data);
                }

                if ($cek->row()->role == "Administrator") {
                    redirect('buku');  /// iki yang mengarah ke halaman admin                  
                } else {
                    redirect('info');/// iki yang mengarah ke halaman user
                }
            } else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('login');
            }

        }
    }




  public function logout() {
        $this->session->sess_destroy();
        redirect('login/index');
    }
}
