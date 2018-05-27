<?php

class M_user extends CI_Model {

    private $table = "user";

    function cek($username, $password) {
        $this->db->where("u_name", $username);
        $this->db->where("u_paswd", $password);
        return $this->db->get("user");
    }

   public function semua() 
   {
        return $this->db->get("user");
    }

}