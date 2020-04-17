<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelo extends CI_Model {

    function getCarros($id = 1)
    {

        $this->db->select('*');
        $q = $this->db->where(array('usuario' => $id))->get('carro');
        $response = $q->result_array();

        return $response;
    }


    function getUsuario($id = 0, $pass = "null")
    {

        $this->db->select('*');
        $q = $this->db->where(array('passwd' => $pass, 'id' => $id))->get('usuarios');
        $response = $q->result_array();

        return $response;
    }

    function nuevoCarro($placas = "", $lat = 0.00, $lon= 0.00, $usuario = 0)
    {
        $this->placas = $placas; // please read the below note
        $this->lat = $lat;
        $this->lon = $lon;
        $this->usuario = $usuario;
        return $this->db->insert('carro', $this);
    }

    function updateCarro($id = 0, $placas = "", $lat = 0.00, $lon= 0.00, $usuario = 0)
    {
        $this->placas = $placas; // please read the below note
        $this->lat = $lat;
        $this->lon = $lon;
        return $this->db->update('carro', $this, array('id' => $id));
    }

    function deleteCarro($id = 0)
    {
        $this->db->where('id', $id);
        $delete = $this->db->delete('carro');

        return $delete;
    }

}