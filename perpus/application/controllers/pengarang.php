<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\libraries\REST_Controller;


class pengarang extends REST_Controller {

    function __construct($config='rest'){
        parent::__construct($config);
        $this->load->database();
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');


    }

    function index_get() {
     
        $id = $this->get('id_pengarang');
        if ($id == '') {
            $kontak = $this->db->get('pengarang')->result();
        } else {
            $this->db->where('id_pengarang', $id);
            $kontak = $this->db->get('pengarang')->result();
        }
        $this->response($kontak, 200);
    }

        function index_post() {
        $this->load->database();
        $data = array(
                    'id_pengarang'           => $this->post('id_pengarang'),
                    'nama_pengarang'                  => $this->post('nama_pengarang')


                );
        $insert = $this->db->insert('pengarang', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


         function index_put() {
        $this->load->database();
        $id = $this->put('id_pengarang');
        $data = array(
                    'id_pengarang'       => $this->put('id_pengarang'),
                    'nama_pengarang'    => $this->put('nama_pengarang'));
        $this->db->where('id_pengarang', $id);
        $update = $this->db->update('pengarang', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

       function index_delete() {
        $this->load->database();
        $id = $this->delete('id_pengarang');
        $this->db->where('id_pengarang', $id);
        $delete = $this->db->delete('pengarang');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    } 

}

