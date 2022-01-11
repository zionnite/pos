<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans extends My_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
        $this->session_checker->auto_logout();

		$data['phone_no']         		=$this->session->userdata('phone_no');
		$data['user_id']         		=$this->session->userdata('user_id');
		$data['user_name']         		=$this->session->userdata('user_name');
        $data['email']                  =$this->session->userdata('email');
        $data['user_status']            =$this->session->userdata('user_status');
        $data['full_name']              =$this->session->userdata('full_name');


        $data['get_info']           =$this->Plan_db->get_plans();
	
		$data['content']	='select_plan';
		$this->load->view($this->layout,$data);
	}


	public function verify_payment(){
        //http://localhost/ecard9jaPlus/Profile/verify_payment?status=successful&tx_ref=%2B2349034286339-1606327921&transaction_id=332165918
        $public_key   =$this->Admin_db->get_public_live_key();
        $secure_key   =$this->Admin_db->get_private_live_key();
        
        $p_status       =$this->input->get('status');
        $p_tx_ref       =$this->input->get('tx_ref');
        $p_trans_id     =$this->input->get('transaction_id');
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/".$p_trans_id."/verify",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer ".$secure_key
          ),
        ));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 16 * 1000); // it's in milliseconds
        curl_setopt($curl, CURLOPT_TIMEOUT, 16 * 1000);
        $response = curl_exec($curl);
        $result  = json_decode($response, true);
        $result  = array_change_key_case($result, CASE_LOWER);

        curl_close($curl);
        //echo $response;
        
        $v_status           = $result['status'];
        $v_data             = $result['data'];
        $v_customer         = $v_data['customer'];
        $v_meta             = $v_data['meta'];
        
        print_r($v_meta);
        if($v_status =='success'){
            $v_amount           = $v_data['amount'];
            
            $v_name             =$v_customer['name'];
            $v_phone            =$v_customer['phone_number'];
            $v_email            =$v_customer['email'];
            $v_id               =$v_meta['user_id'];
            $v_plan_id          =$v_meta['plan_id'];

            // echo $v_id.br().$v_plan_id.br().$v_email;
            
            $action             =$this->Admin_db->select_plan($v_id,$v_plan_id,$v_name,$v_phone,$v_email,$v_amount,$p_tx_ref,$p_trans_id);
            if($action == true){
                $data['alert']	='<div class="alert alert-success" role="alert"><strong>Success:</strong> Your Payment was successful! </div>';
                $this->session->set_flashdata('alert',$data['alert']);
				redirect('Office');
            }else{
                $data['alert']	='<div class="alert alert-warning" role="alert"><strong>Success:</strong>Oops!! Your Transaction was successful but we can\'t verify your payment </div>';
                $this->session->set_flashdata('alert',$data['alert']);
				redirect('Plans');
            }
        }else{
            $data['alert']	='<div class="alert alert-danger" role="alert"><strong>Success:</strong>Oops!! Transaction was not successful! </div>';
            $this->session->set_flashdata('alert',$data['alert']);
			redirect('Plans');
        }        
    }

}
