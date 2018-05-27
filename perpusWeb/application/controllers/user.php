<?php
Class user extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/perpus/index.php/user";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    // menampilkan data foot
    function index(){
        $data['datauser'] = json_decode($this->curl->simple_get($this->API.'/user'));
        $this->load->view('user/list',$data);
    }
    
    // insert data foot
    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_user'            =>  $this->input->post('id_user'),
                'nama'               =>  $this->input->post('nama'),
                'alamat'             =>  $this->input->post('alamat'),
                'no_telp'            =>  $this->input->post('no_telp'),
                'tanggal_lahir'      =>  $this->input->post('tanggal_lahir'),
                'status'             =>  $this->input->post('status'),
                'u_name'             =>  $this->input->post('u_name'),
                'u_paswd'            =>  $this->input->post('u_paswd'),
                'role'               =>  $this->input->post('role')
            );
            $insert =  $this->curl->simple_post($this->API.'/user', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('user');
        }else{
            
            $data['datauser'] = json_decode($this->curl->simple_get($this->API.'/user'));
             $this->load->view('user/list',$data);
        }
    }
    
    // edit data foot
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
               'id_user'            =>  $this->input->post('id_user'),
                'nama'               =>  $this->input->post('nama'),
                'alamat'             =>  $this->input->post('alamat'),
                'no_telp'            =>  $this->input->post('no_telp'),
                'tanggal_lahir'      =>  $this->input->post('tanggal_lahir'),
                'status'             =>  $this->input->post('status'),
                'u_name'             =>  $this->input->post('u_name'),
                'u_paswd'            =>  $this->input->post('u_paswd'),
                'role'               =>  $this->input->post('role')
            );
            $update =  $this->curl->simple_put($this->API.'/user', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('user');
        }else{
            $params = array('id_user'=>  $this->uri->segment(3));
            $data['datauser'] = json_decode($this->curl->simple_get($this->API.'/user',$params));
            $this->load->view('user/edit',$data);
        }
    }
    
    // delete data foot
    function delete($id){
        if(empty($id)){
            redirect('user');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/user', array('id_user'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('user');
        }
    }
}