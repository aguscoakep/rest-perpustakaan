<?php
Class pengembalian extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/perpus/index.php/pengembalian";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    // menampilkan data foot
    function index(){
        $data['datapengembalian'] = json_decode($this->curl->simple_get($this->API.'/pengembalian'));
        $this->load->view('pengembalian/list',$data);
    }
    
    // insert data foot
    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_pengembalian'       =>  $this->input->post('id_pengembalian'),
                'id_peminjaman'         =>  $this->input->post('id_peminjaman'),
                'id_user'               =>  $this->input->post('id_user'),
                'id_buku'               =>  $this->input->post('id_buku'),
                'jatuhtempo'            =>  $this->input->post('jatuhtempo'),
                'denda'                 =>  $this->input->post('denda'),
                'tanggal_dikembalikan'  =>  $this->input->post('tanggal_dikembalikan'),
                'status'                =>  $this->input->post('status')
            );
            $insert =  $this->curl->simple_post($this->API.'/pengembalian', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('pengembalian');
        }else{
        $data['dataUser'] = json_decode($this->curl->simple_get($this->API="http://localhost/perpus/index.php/user"));
        $data['databuku'] = json_decode($this->curl->simple_get($this->API="http://localhost/perpus/index.php/buku"));
        $data['datapeminjaman'] = json_decode($this->curl->simple_get($this->API="http://localhost/perpus/index.php/peminjaman"));
        $this->load->view('pengembalian/create',$data);
        }
    }
    
    // edit data foot
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_pengembalian'       =>  $this->input->post('id_pengembalian'),
                'id_peminjaman'         =>  $this->input->post('id_peminjaman'),
                'id_user'               =>  $this->input->post('id_user'),
                'id_buku'               =>  $this->input->post('id_buku'),
                'jatuhtempo'            =>  $this->input->post('jatuhtempo'),
                'denda'                 =>  $this->input->post('denda'),
                'tanggal_dikembalikan'  =>  $this->input->post('tanggal_dikembalikan'),
                'status'                =>  $this->input->post('status')
            );
            $update =  $this->curl->simple_put($this->API.'/pengembalian', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('pengembalian');
        }else{
            $params = array('id_pengembalian'=>  $this->uri->segment(3));
            $data['datapengembalian'] = json_decode($this->curl->simple_get($this->API.'/pengembalian',$params));
            $data['dataUser'] = json_decode($this->curl->simple_get($this->API="http://localhost/perpus/index.php/user"));
            $data['databuku'] = json_decode($this->curl->simple_get($this->API="http://localhost/perpus/index.php/buku"));
            $data['datapeminjaman'] = json_decode($this->curl->simple_get($this->API="http://localhost/perpus/index.php/peminjaman"));
            $this->load->view('pengembalian/edit',$data);
        }
    }
    
    // delete data foot
    function delete($id){
        if(empty($id)){
            redirect('pengembalian');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/pengembalian', array('id_pengembalian'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('pengembalian');
        }
    }
}