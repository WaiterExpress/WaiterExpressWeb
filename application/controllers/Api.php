<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller 
{

    public function __construct(){
        parent::__construct();
        $this->load->model("user_model");
    }

	public function index(){
        echo 'WaiterExpress Api v1.0';
    }

    

    public function estados($id){
        $result = $this->db->where("ubicacionpaisid", $id)->get("ciudad")->result();
        echo json_encode($result);
    }

    public function distritos($id){
        $result = $this->db->where("id_distrito", $id)->get("distrito")->result();
        echo json_encode($result);
    }
}
