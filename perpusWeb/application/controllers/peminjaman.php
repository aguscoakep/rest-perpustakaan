<?php
Class peminjaman extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/perpus/index.php/peminjaman";
       
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    // menampilkan data foot
    function index(){
        $data['datapeminjaman'] = json_decode($this->curl->simple_get($this->API.'/peminjaman'));
        $this->load->view('peminjaman/list',$data);

    }
    
    // insert data foot
    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_peminjaman'              =>  $this->input->post('id_peminjaman'),
                'tanggal_peminjaman'         =>  $this->input->post('tanggal_peminjaman'),
                'id_user'                    =>  $this->input->post('id_user'),
                'id_buku'                    =>  $this->input->post('id_buku'),
                'batas_kembali'              =>  $this->input->post('batas_kembali'),
                'status'                     =>  $this->input->post('status')
            );
            $insert =  $this->curl->simple_post($this->API.'/peminjaman', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('peminjaman');
        }else{
        $data['dataUser'] = json_decode($this->curl->simple_get($this->API="http://localhost/perpus/index.php/user"));
        $data['databuku'] = json_decode($this->curl->simple_get($this->API="http://localhost/perpus/index.php/buku"));
        $this->load->view('peminjaman/create',$data);
        }
    }
    
    // edit data foot
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_peminjaman'              =>  $this->input->post('id_peminjaman'),
                'tanggal_peminjaman'         =>  $this->input->post('tanggal_peminjaman'),
                'id_user'                    =>  $this->input->post('id_user'),
                'id_buku'                    =>  $this->input->post('id_buku'),
                'batas_kembali'              =>  $this->input->post('batas_kembali'),
                'status'                     =>  $this->input->post('status')
            );
            $update =  $this->curl->simple_put($this->API.'/peminjaman', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('peminjaman');
        }else{
            $params = array('id_peminjaman'=>  $this->uri->segment(3));
            $data['datapeminjaman'] = json_decode($this->curl->simple_get($this->API.'/peminjaman',$params));
            $data['dataUser'] = json_decode($this->curl->simple_get($this->API="http://localhost/perpus/index.php/user"));
            $data['databuku'] = json_decode($this->curl->simple_get($this->API="http://localhost/perpus/index.php/buku"));
            $this->load->view('peminjaman/edit',$data);
        }
    }
    
    // delete data foot
    function delete($id){
        if(empty($id)){
            redirect('peminjaman');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/peminjaman', array('id_peminjaman'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('peminjaman');
        }
    }
    function combobox(){
          $data['dataUser'] = json_decode($this->curl->simple_get($this->API.'/peminjaman'));
        $this->load->view('peminjaman/create',$data);
    
    }

}