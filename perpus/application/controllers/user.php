<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\libraries\REST_Controller;


class user extends REST_Controller {

    function __construct($config='rest'){
        parent::__construct($config);
        $this->load->database();
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    function index_get() {
     
        $id = $this->get('id_user');
        if ($id == '') {
            $kontak = $this->db->get('user')->result();
        } else {
            $this->db->where('id_user', $id);
            $kontak = $this->db->get('user')->result();
        }
        $this->response($kontak, 200);
    }

        function index_post() {
        $this->load->database();
        $data = array(
                    'id_user'                => $this->post('id_user'),
                    'nama'                   => $this->post('nama'),
                    'alamat'                 => $this->post('alamat'),
                    'no_telp'                => $this->post('no_telp'),
                    'tanggal_lahir'          => $this->post('tanggal_lahir'),
                    'status'                 => $this->post('status'),
                    'u_name'                 => $this->post('u_name'),
                    'u_paswd'                => MD5($this->post('u_paswd')),
                    'role'                   => $this->post('role')
                );
        $insert = $this->db->insert('user', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


         function index_put() {
        $this->load->database();
        $id = $this->put('id_user');
        $data = array(
                    'id_user'                => $this->put('id_user'),
                    'nama'                   => $this->put('nama'),
                    'alamat'                 => $this->put('alamat'),
                    'no_telp'                => $this->put('no_telp'),
                    'tanggal_lahir'          => $this->put('tanggal_lahir'),
                    'status'                 => $this->put('status'),
                    'u_name'                 => $this->put('u_name'),
                    'u_paswd'                => MD5($this->put('u_paswd')),
                    'role'                   => $this->put('role')
                );
        $this->db->where('id_user', $id);
        $update = $this->db->update('user', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

       function index_delete() {
        $this->load->database();
        $id = $this->delete('id_user');
        $this->db->where('id_user', $id);
        $delete = $this->db->delete('user');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    } 

}

