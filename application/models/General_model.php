<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class General_model extends CI_Model
{

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('general_settings');
        $query = $this->db->get();
        return $query->row_array();
    }


    // public function updateGeneralSettings($data)
    // {
    //     $this->db->where('id', 1); 
    //     return $this->db->update('general_settings', $data);
    // }

    public function updateGeneralSettings($data)
    {

        $this->db->select('id');
        $this->db->from('general_settings');
        $this->db->where('id', 1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            $this->db->where('id', 1);
            return $this->db->update('general_settings', $data);
        } else {
            return $this->db->insert('general_settings', $data);
        }
    }
}
