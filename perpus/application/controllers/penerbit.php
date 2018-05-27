<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\libraries\REST_Controller;


class penerbit extends REST_Controller {

    function __construct($config='rest'){
        parent::__construct($config);
        $this->load->database();
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');


    }

    function index_get() {
     
        $id = $this->get('id_penerbit');
        if ($id == '') {
            $kontak = $this->db->get('penerbit')->result();
        } else {
            $this->db->where('id_penerbit', $id);
            $kontak = $this->db->get('penerbit')->result();
        }
        $this->response($kontak, 200);
    }

        function index_post() {
        $this->load->database();
        $data = array(
                    'id_penerbit'           => $this->post('id_penerbit'),
                    'nama_penerbit'         => $this->post('nama_penerbit')


                );
        $insert = $this->db->insert('penerbit', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


         function index_put() {
        $this->load->database();
        $id = $this->put('id_penerbit');
        $data = array(
                    'id_penerbit'         => $this->put('id_penerbit'),
                    'nama_penerbit'       => $this->put('nama_penerbit'));
        $this->db->where('id_penerbit', $id);
        $update = $this->db->update('penerbit', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

       function index_delete() {
        $this->load->database();
        $id = $this->delete('id_penerbit');
        $this->db->where('id_penerbit', $id);
        $delete = $this->db->delete('penerbit');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    } 

}

