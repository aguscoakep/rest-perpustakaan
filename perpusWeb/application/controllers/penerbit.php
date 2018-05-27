<?php
Class penerbit extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/perpus/index.php/penerbit";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    // menampilkan data foot
    function index(){
        $data['datapenerbit'] = json_decode($this->curl->simple_get($this->API.'/penerbit'));
        $this->load->view('penerbit/list',$data);
    }
    
    // insert data foot
    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_penerbit'       =>  $this->input->post('id_penerbit'),
                'nama_penerbit'     =>  $this->input->post('nama_penerbit')

            );
            $insert =  $this->curl->simple_post($this->API.'/penerbit', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('penerbit');
        }else{
            $this->load->view('penerbit/create');
        }
    }
    
    // edit data foot
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_penerbit'       =>  $this->input->post('id_penerbit'),
                'nama_penerbit'     =>  $this->input->post('nama_penerbit')
              );
            $update =  $this->curl->simple_put($this->API.'/penerbit', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('penerbit');
        }else{
            $params = array('id_penerbit'=>  $this->uri->segment(3));
            $data['datapenerbit'] = json_decode($this->curl->simple_get($this->API.'/penerbit',$params));
            $this->load->view('penerbit/edit',$data);
        }
    }
    
    // delete data foot
    function delete($id){
        if(empty($id)){
            redirect('penerbit');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/penerbit', array('id_penerbit'=>$id), array(CURLOPT_BUFFERSIZE    => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('penerbit');
        }
    }
}