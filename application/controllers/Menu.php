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
        $this->load->model('Stok_model');
        $this->load->model('Pesanan_model');
        $this->load->model('Detail_pesanan_model');

        $data = $this->input->post('data');
        $data_json = json_decode($data);
        $totalPrice = $this->input->post('totalPrice');
        $totalQuantity = $this->input->post('totalQuantity');
        $data_pesan = array(
            'harga' => $totalPrice,
        );
        $inset_id = $this->Pesanan_model->insert($data_pesan);
        var_dump($inset_id);
        foreach ($data_json as $key => $value) {
            $id = $value->id;
            $price = $value->price;
            $quantity = $value->quantity;

            $data_detail = array(
                'id_pesanan' => $inset_id,
                'id_menu' => $id,
                'jumlah' => $quantity,
                'total' => $price,
            );
            $this->Detail_pesanan_model->insert($data_detail);
            $row = $this->Stok_model->get_by_id_menu($id);
            if ($row) {
                $stok = $row->stok;
                $stok = $stok - $quantity;
                $data = array(
                    'stok' => $stok,
                );
                $this->Stok_model->update_by_menu($id,$data);
            }    
        }
        // $data_print = array(
        //     'pesanan' = $this->Pesanan_model->get_by_id($inset_id),
        //     'detail_pesanan' =  $this->Detail_pesanan_model->get_by_id_pesanan($inset_id),
        // );
    }

    public function read($id) 
    {
        $row = $this->Menu_model->get_by_id($id);
        var_dump($row);
        if($row > 0){
        foreach ($row as $key) {
            $data = array(
                'id' => $key->id,
                'jenis' => $key->jenis,
                'nama' => $key->nama,
                'img' => $key->img,
                'harga' => $key->harga,
                );
        }
            
        //var_dump($data);
        $this->render['content']   = $this->load->view('menu/menu_read', $data, TRUE);
        $this->load->view('template', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function create() 
    {
        $this->load->model('Jenis_menu_model');

        $data_jenis = $this->Jenis_menu_model->get_all();

        $data = array(
            'button' => 'Create',
            'action' => site_url('menu/create_action'),
            'id' => set_value('id'),
            'id_jenis' => set_value('id_jenis'),
            'nama' => set_value('nama'),
            'img' => set_value('img'),
            'harga' => set_value('harga'),
            'data_jenis' => $data_jenis,
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
    {   $this->load->model('Jenis_menu_model');
        
        $data_jenis = $this->Jenis_menu_model->get_all();

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
                'data_jenis' => $data_jenis,
            );
            $this->render['content']   = $this->load->view('menu/menu_form', $data, TRUE);
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