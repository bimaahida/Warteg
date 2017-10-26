<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->render['content']   = $this->load->view('menu/menu_list', array(), TRUE);
        $this->load->view('template', $this->render);
    } 
    
    public function Makanan_kategori($id)
    {   
        $ket="";
        if($id == 1){
            $ket = "Makanan";
        }else{
            $ket = "Minuman";
        }

        $data = array(
            'ket' => $ket,
            'data' =>  $this->Menu_model->get_kategori($id),
        );
        $this->render['content']   = $this->load->view('frontEnd/list_menu', $data, TRUE);
        $this->load->view('frontEnd/template', $this->render);
    } 
    public function json() {
        header('Content-Type: application/json');
        echo $this->Menu_model->json();
    }

    public function Cekout(){
        $products = $this->input->post('products');
        $totalPrice = $this->input->post('totalPrice');
        $totalQuantity = $this->input->post('totalQuantity');

        var_dump($products);
        var_dump($totalPrice);
        var_dump($totalQuantity);

        
    }

    public function read($id) 
    {
        $row = $this->Menu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_jenis' => $row->id_jenis,
		'nama' => $row->nama,
		'img' => $row->img,
		'harga' => $row->harga,
	    );
            $this->render['content']   = $this->load->view('menu/menu_read', $data, TRUE);
            $this->load->view('template', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('menu/create_action'),
	    'id' => set_value('id'),
	    'id_jenis' => set_value('id_jenis'),
	    'nama' => set_value('nama'),
	    'img' => set_value('img'),
	    'harga' => set_value('harga'),
	);
        $this->render['content']   = $this->load->view('menu/menu_form', $data, TRUE);
        $this->load->view('template', $this->render);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_jenis' => $this->input->post('id_jenis',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'img' => $this->input->post('img',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Menu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menu/update_action'),
		'id' => set_value('id', $row->id),
		'id_jenis' => set_value('id_jenis', $row->id_jenis),
		'nama' => set_value('nama', $row->nama),
		'img' => set_value('img', $row->img),
		'harga' => set_value('harga', $row->harga),
	    );
            $this->render['content']   = $this->load->view('parameter/menu_form', $data, TRUE);
            $this->load->view('template', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_jenis' => $this->input->post('id_jenis',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'img' => $this->input->post('img',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Menu_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $this->Menu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_jenis', 'id jenis', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('img', 'img', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-13 15:59:32 */
/* http://harviacode.com */