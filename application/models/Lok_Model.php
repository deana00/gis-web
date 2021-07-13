<?php

class Lok_Model extends CI_Model
{
    public function getloc()
    {
        return $this->db->get('data')->result_array();
    }

    public function tambahDatadata()
    {
        $data = [

            "nama" => $this->input->post('nama', true),
            "coord" => $this->input->post('coord', true),
        ];

        $this->db->insert('data', $data);
    }

    public function hapusDatadata($id)
    {
        $this->db->where('id_lok', $id);
        $this->db->delete('data');
    }

    public function getdataById($id)
    {
        return $this->db->get_where('data', ['id_lok' => $id])->row_array();
    }


    public function ubahdata()
    {
        $data = [
            "id_lok" => $this->input->post('id_lok', true),
            "nama" => $this->input->post('nama', true),
            "coord" => $this->input->post('coord', true),

        ];
        $this->db->where('id_lok', $this->input->post('id_lok'));
        $this->db->update('data', $data);
    }

    public function cariDatadata()
    {
        $keyword = $this->input->post('cari', true);
        $this->db->like('nama', $keyword);
        return $this->db->get('data')->result_array();
    }
}
