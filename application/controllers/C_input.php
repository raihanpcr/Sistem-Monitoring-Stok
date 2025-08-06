<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Common\Entity\Row;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class C_input extends CI_Controller {

    public function __construct()
    {
      parent::__construct();

      if($this->session->userdata('username') != 'admin')
      {
          $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
              Silahkan login terlebih dahulu
              </div>');
              redirect('auth/login');
      }

      $this->load->model('M_laporan');

    }

    public function index() 
    {
          $data['title'] = "Export Import";
          $data['jenislaporan'] = $this->M_laporan->get_jenislaporan();
          $this->load->view('templates/header');
          $this->load->view('templates/sidebar');
          $this->load->view('v_input',$data);
          $this->load->view('templates/footer');
    }

    public function uploaddata()
    {
     $id = $this->input->post('Jenis');
     $idj = '0';
     if($id == 1)
     {
          $idj = 'PUPUK';
     }
     else 
     {
          $idj = 'BAHAN_KIMIA';
     }
     $tanggal = $this->input->post('kalender');
     $config['upload_path'] = './uploads/';
     $config['file_name'] = 'STOK_'.$idj.'_'.$tanggal;
     $config['allowed_types'] = 'xlsx|xls';
     // $config['file_name'] = 'Pupuk ' ;
     $this->load->library('upload', $config);
     
     if ($this->upload->do_upload('importexcel')){
          $file = $this->upload->data();
          $reader = ReaderEntityFactory::createXLSXReader();
          // $reader->returnDatesAsStrings();
          // $reader->setShouldFormatDates(false); // default value
          $reader->setShouldFormatDates(true); // will return formatted dates
          $reader->open('uploads/' . $file['file_name']);
          
          foreach($reader->getSheetIterator() as $sheet){
               $numRow = 1;
               foreach ($sheet->getRowIterator() as $row){
                   if ($numRow > 1) {
                    // $Date = $row['lastUsing']->format('d/m/Y');
                    $datalaporan = array(
                      'plant' => $row->getCellAtIndex(0),
                      'plantDesc' => $row->getCellAtIndex(1),
                      'materialGroup' => $row->getCellAtIndex(2),
                      'materialGroupDesc' => $row->getCellAtIndex(3),
                      'material' => $row->getCellAtIndex(4),
                      'materialDesc' => $row->getCellAtIndex(5),
                      'lastUsing' => $row->getCellAtIndex(6),
                      'umur' => $row->getCellAtIndex(7),
                      'stok' => $row->getCellAtIndex(8),
                      'satuan' => $row->getCellAtIndex(9),
                      'value' => $row->getCellAtIndex(10),
                      'stok2' => $row->getCellAtIndex(11),
                      'satuan2' => $row->getCellAtIndex(12),
                      'value2' => $row->getCellAtIndex(13),
                      'stok3' => $row->getCellAtIndex(14),
                      'satuan3' => $row->getCellAtIndex(15),
                      'value3' => $row->getCellAtIndex(16),
                      'tanggal' => $tanggal,
                      'idJenis' => $id,
                    );
                         $datalaporan['lastUsing'] = date('Y-m-d',strtotime($datalaporan['lastUsing']));

                         if($datalaporan['lastUsing'] == "1970-01-01") {
                              $datalaporan['lastUsing'] = NULL;
                              $datalaporan['umur'] = NULL;
                              $datalaporan['stok'] = NULL;
                              $datalaporan['stok2'] = NULL;
                              $datalaporan['stok3'] = NULL;
                         }
                         
                         $this->M_laporan->import_data($datalaporan);

                         // var_dump($datalaporan['lastUsing']);
                  }
                  $numRow++;
               }
          }
          
          // die();

          redirect(base_url());
     }
     else{
          echo "Error : " . $this->upload->display_errors();
     }
     
    }
}
