<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\libraries\REST_Controller;


class kategori extends REST_Controller {

    function __construct($config='rest'){
        parent::__construct($config);
        $this->load->database();
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    function index_get() {
     
        $id = $this->get('id_kategori');
        if ($id == '') {
            $kontak = $this->db->get('kategori')->result();
        } else {
            $this->db->where('id_kategori', $id);
            $kontak = $this->db->get('kategori')->result();
        }
        $this->response($kontak, 200);
    }

        function index_post() {
        $this->load->database();
        $data = array(
                    'id_kategori'           => $this->post('id_kategori'),
                    'nama_kategori'    => $this->post('nama_kategori')


                );
        $insert = $this->db->insert('kategori', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


         function index_put() {
        $this->load->database();
        $id = $this->put('id_kategori');
        $data = array(
                    'id_kategori'         => $this->put('id_kategori'),
                    'nama_kategori'       => $this->put('nama_kategori'));
        $this->db->where('id_kategori', $id);
        $update = $this->db->update('kategori', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

       function index_delete() {
        $this->load->database();
        $id = $this->delete('id_kategori');
        $this->db->where('id_kategori', $id);
        $delete = $this->db->delete('kategori');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    } 

}

