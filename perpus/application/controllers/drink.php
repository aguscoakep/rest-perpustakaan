<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\libraries\REST_Controller;


class 	drink extends REST_Controller {

    function __construct($config='rest'){
        parent::__construct($config);
        $this->load->database();
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');


    }

    function index_get() {
     
        $id = $this->get('id');
        if ($id == '') {
            $kontak = $this->db->get('minuman')->result();
        } else {
            $this->db->where('id', $id);
            $kontak = $this->db->get('minuman')->result();
        }
        $this->response($kontak, 200);
    }

        function index_post() {
        $this->load->database();
        $data = array(
                    'id'           => $this->post('id'),
                    'nama_minuman'          => $this->post('nama_minuman'),
                    'tipe'    => $this->post('tipe'),
                    
                    'jumlah'    => $this->post('jumlah'),
                    'harga'    => $this->post('harga')


                );
        $insert = $this->db->insert('minuman', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


         function index_put() {
        $this->load->database();
        $id = $this->put('id');
        $data = array(
                    'id'       => $this->put('id'),
                    'nama_minuman'      => $this->put('nama_minuman'),
                    'tipe'=> $this->put('tipe'),
                    
                    'jumlah'    => $this->put('jumlah'),
                    'harga'    => $this->put('harga'));
        $this->db->where('id', $id);
        $update = $this->db->update('minuman', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

       function index_delete() {
        $this->load->database();
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('minuman');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    } 

}

