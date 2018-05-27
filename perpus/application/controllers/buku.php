<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\libraries\REST_Controller;


class buku extends REST_Controller {

    function __construct($config='rest'){
        parent::__construct($config);
        $this->load->database();
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');


    }

    function index_get() {
     
        $id = $this->get('id_buku');
        if ($id == '') {
            $kontak = $this->db->get('buku')->result();
        } else {
            $this->db->where('id_buku', $id);
            $kontak = $this->db->get('buku')->result();
        }
        $this->response($kontak, 200);
    }

        function index_post() {
        $this->load->database();
        $data = array(
                    'id_buku'        => $this->post('id_buku'),
                    'judul'          => $this->post('judul'),
                    'id_kategori'    => $this->post('id_kategori'),
                    'id_penerbit'    => $this->post('id_penerbit'),
                    'id_pengarang'   => $this->post('id_pengarang'),
                    'status'         => $this->post('status'));
        $insert = $this->db->insert('buku', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


         function index_put() {
        $this->load->database();
        $id = $this->put('id_buku');
        $data = array(
                    'id_buku'        => $this->put('id_buku'),
                    'judul'          => $this->put('judul'),
                    'id_kategori'    => $this->put('id_kategori'),
                    'id_penerbit'    => $this->put('id_penerbit'),
                    'id_pengarang'   => $this->put('id_pengarang'),
                    'status'         => $this->put('status'));
        $this->db->where('id_buku', $id);
        $update = $this->db->update('buku', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

       function index_delete() {
        $this->load->database();
        $id = $this->delete('id_buku');
        $this->db->where('id_buku', $id);
        $delete = $this->db->delete('buku');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    } 

}

