<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\libraries\REST_Controller;


class peminjaman extends REST_Controller {

    function __construct($config='rest'){
        parent::__construct($config);
        $this->load->database();
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');


    }

    function index_get() {
     
        $id = $this->get('id_peminjaman');
        if ($id == '') {
            $kontak = $this->db->get('peminjaman')->result();
        } else {
            $this->db->where('id_peminjaman', $id);
            $kontak = $this->db->get('peminjaman')->result();
        }
        $this->response($kontak, 200);
    }

        function index_post() {
        $this->load->database();
        $data = array(
                    'id_peminjaman'          => $this->post('id_peminjaman'),
                    'tanggal_peminjaman'     => $this->post('tanggal_peminjaman'),
                    'id_user'                => $this->post('id_user'),
                    'id_buku'                => $this->post('id_buku'),
                    'batas_kembali'          => $this->post('batas_kembali'),
                    'status'                 => $this->post('status')


                );
        $insert = $this->db->insert('peminjaman', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


         function index_put() {
        $this->load->database();
        $id = $this->put('id_peminjaman');
        $data = array(
                    'id_peminjaman'          => $this->put('id_peminjaman'),
                    'tanggal_peminjaman'     => $this->put('tanggal_peminjaman'),
                    'id_user'                => $this->put('id_user'),
                    'id_buku'                => $this->put('id_buku'),
                    'batas_kembali'          => $this->put('batas_kembali'),
                    'status'                 => $this->put('status')
                );
        $this->db->where('id_peminjaman', $id);
        $update = $this->db->update('peminjaman', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

       function index_delete() {
        $this->load->database();
        $id = $this->delete('id_peminjaman');
        $this->db->where('id_peminjaman', $id);
        $delete = $this->db->delete('peminjaman');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    } 

}

