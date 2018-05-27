<?php
Class buku extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/perpus/index.php/buku";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    // menampilkan data foot
    function index(){
        $data['databuku'] = json_decode($this->curl->simple_get($this->API.'/buku'));
        $this->load->view('buku/list',$data);
    }
    
    // insert data foot
    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_buku'          =>  $this->input->post('id_buku'),
                'judul'            =>  $this->input->post('judul'),
                'id_kategori'      =>  $this->input->post('id_kategori'),
                'id_penerbit'      =>  $this->input->post('id_penerbit'),
                'id_pengarang'     =>  $this->input->post('id_pengarang'),
                'status'           =>  $this->input->post('status')
            );
            $insert =  $this->curl->simple_post($this->API.'/buku', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('buku');
        }else{
        $data['databuku'] = json_decode($this->curl->simple_get($this->API="http://localhost/perpus/index.php/buku"));
        $data['datakategori'] = json_decode($this->curl->simple_get($this->API="http://localhost/perpus/index.php/kategori"));
        $data['datapenerbit'] = json_decode($this->curl->simple_get($this->API="http://localhost/perpus/index.php/penerbit"));
        $data['datapengarang'] = json_decode($this->curl->simple_get($this->API="http://localhost/perpus/index.php/pengarang"));
        $this->load->view('buku/create',$data);
        }
    }
    
    // edit data foot
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_buku'          =>  $this->input->post('id_buku'),
                'judul'            =>  $this->input->post('judul'),
                'id_kategori'      =>  $this->input->post('id_kategori'),
                'id_penerbit'      =>  $this->input->post('id_penerbit'),
                'id_pengarang'     =>  $this->input->post('id_pengarang'),
                'status'           =>  $this->input->post('status')
            );
            $update =  $this->curl->simple_put($this->API.'/buku', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('buku');
        }else{



            $params = array('id_buku'=>  $this->uri->segment(3));
            $data['databuku'] = json_decode($this->curl->simple_get($this->API.'/buku',$params));
             $data['datakategori'] = json_decode($this->curl->simple_get($this->API='http://localhost/perpus/index.php/kategori'));
            $data['datapenerbit'] = json_decode($this->curl->simple_get($this->API="http://localhost/perpus/index.php/penerbit"));
            $data['datapengarang'] = json_decode($this->curl->simple_get($this->API="http://localhost/perpus/index.php/pengarang"));
           
         
            $this->load->view('buku/edit',$data);
        }
    }
    
    // delete data foot
    function delete($id){
        if(empty($id)){
            redirect('buku');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/buku', array('id_buku'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('buku');
        }
    }
}