<?php

class Lok_Model extends CI_Model
{
    // Markers
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

    public function updateData($id)
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "coord" => $this->input->post('coord', true),
        ];
        return $this->db->update('data', $data, ['id_lok' => $id]);
    }

    public function cariDatadata()
    {
        $keyword = $this->input->post('cari', true);
        $this->db->like('nama', $keyword);
        return $this->db->get('data')->result_array();
    }

    // Lines
    public function getline()
    {
        return $this->db->get('line')->result_array();
    }

    public function tambahLine()
    {
        $line = [
            "nama_line" => $this->input->post('nama_line', true),
            "coordinate" => $this->input->post('coordinate', true),
        ];

        $this->db->insert('line', $line);
    }

    public function hapusLine($id)
    {
        $this->db->where('id_line', $id);
        $this->db->delete('line');
    }

    public function getLineById($id)
    {
        return $this->db->get_where('line', ['id_line' => $id])->row_array();
    }

    public function updateLine($id)
    {
        $line = [
            "nama_line" => $this->input->post('nama_line', true),
            "coordinate" => $this->input->post('coordinate', true),
        ];
        return $this->db->update('line', $line, ['id_line' => $id]);
    }
}
