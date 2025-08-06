<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model {

	public function import_data($datalaporan)
    {
        $jumlah = count($datalaporan);
        if ($jumlah > 0) {
            $this->db->insert('laporan', $datalaporan);
        }
    }

    public function get_jenislaporan()
    {
        return $this->db->get('jenislaporan')->result();
    }

    public function get_data(){
        return $this->db->query("SELECT laporan.*, jenislaporan.jenisLaporan FROM laporan, jenislaporan WHERE laporan.idJenis=jenislaporan.idJenis")->result_array();
    }

   public function get_laporan_filter_all($id,$tgl)
   {
       return $this->db->query("SELECT laporan.*, jenislaporan.jenisLaporan FROM laporan, jenislaporan WHERE laporan.idJenis=jenislaporan.idJenis AND laporan.idJenis=$id AND laporan.tanggal='$tgl'")->result_array();
   }

   public function get_laporan_filter_laporan($id)
   {
       return $this->db->query("SELECT laporan.*, jenislaporan.jenisLaporan FROM laporan, jenislaporan WHERE laporan.idJenis=jenislaporan.idJenis AND laporan.idJenis=$id")->result_array();
   }

   public function get_laporan_filter_tgl($tgl)
   {
       return $this->db->query("SELECT laporan.*, jenislaporan.jenisLaporan FROM laporan, jenislaporan WHERE laporan.idJenis=jenislaporan.idJenis AND laporan.tanggal='$tgl'")->result_array();
   }

   public function hapus($id,$tgl)
   {
       $this->_deleteFile($id,$tgl);
       $this->db->delete('laporan', array('idJenis' => $id, 'tanggal' => $tgl));
   }

   private function _deleteFile($id,$tgl)
    {
        $idj = '0';
        if($id == 1)
        {
            $idj = 'PUPUK';
        }
        else 
        {
            $idj = 'BAHAN_KIMIA';
        }
        $nm = 'STOK_'.$idj.'_'.$tgl;
        $filename = explode(".", $nm)[0];
        return array_map('unlink', glob(FCPATH . "uploads/$filename.*"));
    }
}