<?php

class C_dashboard extends CI_Controller {

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
        $data['datalaporan'] = $this->M_laporan->get_data();
        $data['jenislaporan'] = $this->M_laporan->get_jenislaporan();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function load()
    {
        $laporan = $_GET['idJenisLaporan'];
        $tgl = $_GET['filtertgl'];
        
        if($laporan != 0 && $tgl != '') 
        {
            $data['datalaporan'] = $this->M_laporan->get_laporan_filter_all($laporan,$tgl);
        }
        else if ($laporan != 0)
        {
            $data['datalaporan'] = $this->M_laporan->get_laporan_filter_laporan($laporan);
        }
        else if ($tgl != '')
        {
            $data['datalaporan'] = $this->M_laporan->get_laporan_filter_tgl($tgl);
        }
        else
        {
            $data['datalaporan'] = $this->M_laporan->get_data();
        }
        
        if (!empty($data['datalaporan'])) 
        {
            foreach ($data['datalaporan'] as $lpr) : ?>

<?php
            
            $warna="";
            
            if($lpr['umur'] <= 60 && $lpr['umur'] != NULL)
            {
                $warna = 'background-color: #9CC3D5FF;';
            }
            elseif($lpr['umur'] >= 61 && $lpr['umur'] <= 120)
            {
                $warna = 'background-color: #EEA47FFF;';
            }
            elseif($lpr['umur'] > 120)
            {
                $warna = 'background-color: #E94B3CFF;
                color: #FFFFFFFF;';
            }
            else
            {
                $warna = 'background-color: white;';
            }
            // echo $warna."<br>";
            
            ?>

        <tr style="<?php echo $warna?>">
            <td><?php echo $lpr['plant'];?></td>
            <td><?php echo $lpr['plantDesc'];?></td>
            <td><?php echo $lpr['materialGroup'];?></td>
            <td><?php echo $lpr['materialGroupDesc'];?></td>
            <td><?php echo $lpr['material'];?></td>
            <td><?php echo $lpr['materialDesc'];?></td>
            <td><?php echo $lpr['lastUsing'];?></td>
            <td><?php echo $lpr['umur'];?></td>
            <td><?php echo number_format($lpr['stok'], 0, ',','.');?></td>
            <td><?php echo $lpr['satuan'];?></td>
            <td><?php echo number_format($lpr['value'], 0, ',','.');?></td>
            <td><?php echo number_format($lpr['stok2'], 0, ',','.');?></td>
            <td><?php echo $lpr['satuan2'];?></td>
            <td><?php echo number_format($lpr['value2'], 0, ',','.');?></td>
            <td><?php echo number_format($lpr['stok3'], 0, ',','.');?></td>
            <td><?php echo $lpr['satuan3'];?></td>
            <td><?php echo number_format($lpr['value3'], 0, ',','.');?></td>
            <td><?php echo $lpr['tanggal'];?></td>
            <td><?php echo $lpr['jenisLaporan'];?></td>
        </tr>

<?php endforeach;
            } 
            else 
            {
                
                ?>

<tr>
	<td style="text-align:center" colspan='19'>Tidak ada data</td>
</tr>

<?php
                }
            }
        }
