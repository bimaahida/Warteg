<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('pesanan/pesanan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pesanan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pesanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'waktu' => $row->waktu,
		'harga' => $row->harga,
	    );
            $this->load->view('pesanan/pesanan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pesanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pesanan/create_action'),
	    'id' => set_value('id'),
	    'waktu' => set_value('waktu'),
	    'harga' => set_value('harga'),
	);
        $this->load->view('pesanan/pesanan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'waktu' => $this->input->post('waktu',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Pesanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pesanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pesanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pesanan/update_action'),
		'id' => set_value('id', $row->id),
		'waktu' => set_value('waktu', $row->waktu),
		'harga' => set_value('harga', $row->harga),
	    );
            $this->load->view('pesanan/pesanan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pesanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'waktu' => $this->input->post('waktu',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Pesanan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pesanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pesanan_model->get_by_id($id);

        if ($row) {
            $this->Pesanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pesanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pesanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('waktu', 'waktu', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pesanan.xls";
        $judul = "pesanan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Waktu");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");

	foreach ($this->Pesanan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->waktu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Pesanan.php */
/* Location: ./application/controllers/Pesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-26 09:28:48 */
/* http://harviacode.com */