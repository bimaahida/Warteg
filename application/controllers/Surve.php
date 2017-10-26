<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class surve extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $parameter = array();
        $jenis = array();
        

        $this->load->model('Jenis_parameter_model');
        $this->load->model('Parameter_model');
        $row = $this->Jenis_parameter_model->get_all();
        if ($row) {
            foreach ($row as $key) {
                $pisah = explode(" ",$key->parameter);
                $string = "";
                for($i=0; $i < count($pisah); $i++){
                    $string .= $pisah[$i];
                }
                $row2 = $this->Parameter_model->get_by_id_jenis($key->id);
                foreach ($row2 as $key2) {
                    $jenis[$string][] = $key2->parameter;
                }
                
            }
            //var_dump($jenis);
            $data = array(
                'data' => $jenis,
                'action' => site_url('surve/search'),
            );
            $this->render['content']   = $this->load->view('frontEnd/form_surve',$data, TRUE);
            $this->load->view('frontEnd/template', $this->render);    
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('parameter'));
        } 
    }

    public function search(){
        $this->load->model('Menu_model');
        $this->load->model('Jenis_parameter_model');
        $row = $this->Jenis_parameter_model->get_all();
        
        $data = array();
        foreach($row as $key){
            $pisah = explode(" ",$key->parameter);
            $string = "";
            for($i=0; $i < count($pisah); $i++){
                $string .= $pisah[$i];
            }
            if(isset($key)){
                $data[$string] = $this->input->post($string,TRUE);
            }
        }        
        $data_send = array(
            'data_surve' => $this->Menu_model->get_surve($data),
        );
        $this->render['content']   = $this->load->view('frontEnd/list_surve',$data_send, TRUE);
        $this->load->view('frontEnd/template', $this->render);    
    }
}
