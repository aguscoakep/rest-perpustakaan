<?php
Class pengarang extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/perpus/index.php/pengarang";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    // menampilkan data foot
    function index(){
        $data['datapengarang'] = json_decode($this->curl->simple_get($this->API.'/pengarang'));
        $this->load->view('pengarang/list',$data);
    }
    
    // insert data foot
    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_pengarang'       =>  $this->input->post('id_pengarang'),
                'nama_pengarang'     =>  $this->input->post('nama_pengarang')

            );
            $insert =  $this->curl->simple_post($this->API.'/pengarang', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('pengarang');
        }else{
            $this->load->view('pengarang/create');
        }
    }
    
    // edit data foot
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_pengarang'       =>  $this->input->post('id_pengarang'),
                'nama_pengarang'     =>  $this->input->post('nama_pengarang')
              );
            $update =  $this->curl->simple_put($this->API.'/pengarang', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('pengarang');
        }else{
            $params = array('id_pengarang'=>  $this->uri->segment(3));
            $data['datapengarang'] = json_decode($this->curl->simple_get($this->API.'/pengarang',$params));
            $this->load->view('pengarang/edit',$data);
        }
    }
    
    // delete data foot
    function delete($id){
        if(empty($id)){
            redirect('pengarang');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/pengarang', array('id_pengarang'=>$id), array(CURLOPT_BUFFERSIZE    => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('pengarang');
        }
    }
}