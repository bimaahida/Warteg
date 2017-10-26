<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_pesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detail_pesanan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->render['content']   = $this->load->view('detail_pesanan/detail_pesanan_list', array(), TRUE);
        $this->load->view('template', $this->render);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Detail_pesanan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Detail_pesanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_pesanan' => $row->id_pesanan,
		'id_menu' => $row->id_menu,
		'jumlah' => $row->jumlah,
		'total' => $row->total,
        );
            $this->render['content']   = $this->load->view('detail_pesanan/detail_pesanan_read', $data, TRUE);
            $this->load->view('template', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_pesanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail_pesanan/create_action'),
	    'id' => set_value('id'),
	    'id_pesanan' => set_value('id_pesanan'),
	    'id_menu' => set_value('id_menu'),
	    'jumlah' => set_value('jumlah'),
	    'total' => set_value('total'),
	);
        $this->render['content']   = $this->load->view('detail_pesanan/detail_pesanan_form', $data, TRUE);
        $this->load->view('template', $this->render);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pesanan' => $this->input->post('id_pesanan',TRUE),
		'id_menu' => $this->input->post('id_menu',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'total' => $this->input->post('total',TRUE),
	    );

            $this->Detail_pesanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detail_pesanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_pesanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail_pesanan/update_action'),
		'id' => set_value('id', $row->id),
		'id_pesanan' => set_value('id_pesanan', $row->id_pesanan),
		'id_menu' => set_value('id_menu', $row->id_menu),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'total' => set_value('total', $row->total),
	    );
            $this->render['content']   = $this->load->view('detail_pesanan/detail_pesanan_form', $data, TRUE);
            $this->load->view('template', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_pesanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_pesanan' => $this->input->post('id_pesanan',TRUE),
		'id_menu' => $this->input->post('id_menu',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'total' => $this->input->post('total',TRUE),
	    );

            $this->Detail_pesanan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detail_pesanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detail_pesanan_model->get_by_id($id);

        if ($row) {
            $this->Detail_pesanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detail_pesanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_pesanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_pesanan', 'id pesanan', 'trim|required');
	$this->form_validation->set_rules('id_menu', 'id menu', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('total', 'total', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "detail_pesanan.xls";
        $judul = "detail_pesanan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pesanan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Menu");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
	xlsWriteLabel($tablehead, $kolomhead++, "Total");

	foreach ($this->Detail_pesanan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pesanan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_menu);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->total);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Detail_pesanan.php */
/* Location: ./application/controllers/Detail_pesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-26 09:28:54 */
/* http://harviacode.com */