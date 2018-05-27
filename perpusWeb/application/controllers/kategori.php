<?php
Class kategori extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/perpus/index.php/kategori";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    // menampilkan data foot
    function index(){
        $data['datakategori'] = json_decode($this->curl->simple_get($this->API.'/kategori'));
        $this->load->view('kategori/list',$data);
    }
    
    // insert data foot
    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_kategori'       =>  $this->input->post('id_kategori'),
                'nama_kategori'     =>  $this->input->post('nama_kategori')

            );
            $insert =  $this->curl->simple_post($this->API.'/kategori', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('kategori');
        }else{
            $this->load->view('kategori/create');
        }
    }
    
    // edit data foot
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_kategori'       =>  $this->input->post('id_kategori'),
                'nama_kategori'     =>  $this->input->post('nama_kategori')
              );
            $update =  $this->curl->simple_put($this->API.'/kategori', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('kategori');
        }else{
            $params = array('id_kategori'=>  $this->uri->segment(3));
            $data['datakategori'] = json_decode($this->curl->simple_get($this->API.'/kategori',$params));
            $this->load->view('kategori/edit',$data);
        }
    }
    
    // delete data foot
    function delete($id){
        if(empty($id)){
            redirect('kategori');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/kategori', array('id_kategori'=>$id), array(CURLOPT_BUFFERSIZE    => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('kategori');
        }
    }
}