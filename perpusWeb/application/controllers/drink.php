<?php
Class drink extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/foot/index.php/drink";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    // menampilkan data foot
    function index(){
        $data['datadrink'] = json_decode($this->curl->simple_get($this->API.'/drink'));
        $this->load->view('drink/list',$data);
    }
    
    // insert data foot
    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id'       =>  $this->input->post('id'),
                'nama_minuman'    =>  $this->input->post('nama_minuman'),
                'tipe'=>  $this->input->post('tipe'),
                'jumlah'=>  $this->input->post('jumlah'),
                'harga'=>  $this->input->post('harga')


            );
            $insert =  $this->curl->simple_post($this->API.'/drink', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('drink');
        }else{
            $this->load->view('drink/create');
        }
    }
    
    // edit data foot
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id'       =>  $this->input->post('id'),
                'nama_minuman'      =>  $this->input->post('nama_minuman'),
                'tipe'=>  $this->input->post('tipe'),
                'jumlah'=>  $this->input->post('jumlah'),
                'harga'=>  $this->input->post('harga'));
            $update =  $this->curl->simple_put($this->API.'/drink', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('drink');
        }else{
            $params = array('id'=>  $this->uri->segment(3));
            $data['datadrink'] = json_decode($this->curl->simple_get($this->API.'/drink',$params));
            $this->load->view('drink/edit',$data);
        }
    }
    
    // delete data foot
    function delete($id){
        if(empty($id)){
            redirect('drink');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/drink', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('drink');
        }
    }
}