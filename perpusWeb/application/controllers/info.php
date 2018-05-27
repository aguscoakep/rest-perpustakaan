<?php
Class info extends CI_Controller{
    
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
        $data['datakategori'] = json_decode($this->curl->simple_get( $this->API="http://localhost/perpus/index.php/kategori"));
        $data['datapenerbit'] = json_decode($this->curl->simple_get( $this->API="http://localhost/perpus/index.php/penerbit"));
        $data['datapengarang'] = json_decode($this->curl->simple_get( $this->API="http://localhost/perpus/index.php/pengarang"));
        $data['datapeminjaman'] = json_decode($this->curl->simple_get( $this->API="http://localhost/perpus/index.php/peminjaman"));
        $this->load->view('info/list',$data);
    }
}









