<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\libraries\REST_Controller;


class pengembalian extends REST_Controller {

    function __construct($config='rest'){
        parent::__construct($config);
        $this->load->database();
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');


    }

    function index_get() {

      $id = $this->get('id_pengembalian');
        if ($id == '') {
            $kontak = $this->db->get('pengembalian')->result();
        } else {
            $this->db->where('id_pengembalian', $id);
            $kontak = $this->db->get('pengembalian')->result();
        }
        $this->response($kontak, 200);
    }


        function index_post() {
        $this->load->database();
        $data = array(
                    'id_pengembalian'        => $this->post('id_pengembalian'),
                    'id_peminjaman'          => $this->post('id_peminjaman'),
                    'id_user'                => $this->post('id_user'),
                    'id_buku'                => $this->post('id_buku'),
                    'jatuhtempo'             => $this->post('jatuhtempo'),
                    'denda'                  => $this->post('denda'),
                    'tanggal_dikembalikan'   => $this->post('tanggal_dikembalikan'),
                    'status'                 => $this->post('status')


                );
        $insert = $this->db->insert('pengembalian', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


        function index_put() {
        $this->load->database();
        $id = $this->put('id_pengembalian');
        $data = array(
                    'id_pengembalian'        => $this->put('id_pengembalian'),
                    'id_peminjaman'          => $this->put('id_peminjaman'),
                    'id_user'                => $this->put('id_user'),
                    'id_buku'                => $this->put('id_buku'),
                    'jatuhtempo'             => $this->put('jatuhtempo'),
                    'denda'                  => $this->put('denda'),
                    'tanggal_dikembalikan'   => $this->put('tanggal_dikembalikan'),
                    'status'                 => $this->put('status')
                );
        $this->db->where('id_pengembalian', $id);
        $update = $this->db->update('pengembalian', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

       function index_delete() {
        $this->load->database();
        $id = $this->delete('id_pengembalian');
        $this->db->where('id_pengembalian', $id);
        $delete = $this->db->delete('pengembalian');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    } 

}

