<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employe extends MX_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->Model('Employe_model');
    }

    function index(){
        $data['country'] = $this->Employe_model->fetch_country();
        $this->load->view('employeview',$data);
    }
    function fetch_province()
        {
            if($this->input->post('country_id'))
            {
             echo $this->Employe_model->fetch_province($this->input->post('country_id'));
            }
        }
    function fetch_municipality()
    {
        if($this->input->post('province_id'))
        {
            echo $this->Employe_model->fetch_municipality($this->input->post('province_id'));
        }
    }
    public function savedata()
	{
		/*load registration view form*/
		$this->load->view('employeview');	
		/*Check submit button */
		// if($this->input->post('save'))
		// {
		    $data['name']=$this->input->post('name');
			$data['age']=$this->input->post('age');
			$data['gender']=$this->input->post('fav_gender');
			$data['language']=$this->input->post('language1');
			$data['country']=$this->input->post('country');
			$data['province']=$this->input->post('province');
			$data['municipality']=$this->input->post('municipality');
			$data['address']=$this->input->post('address');
			$data['mobile']=$this->input->post('mobile');
			$data['date_time']=$this->input->post('date_time');
            // $data['patient_id']=$this->input->post('patient_id');
			$response=$this->Employe_model->saverecords($data);
			if($response==true){
			        echo "Records Saved Successfully";
			}
			else{
					echo "Insert error !";
			}
		// }
	}

    

    // function showview(){
    //     // $data=array();
    //     // $this->view_name="employeview";
    //     // $this->display($data);
    // }

        #request Type is either GET OR POST
            # 1. GET - $this->input->get('data_posted'); 
            # 2. POST - $this->input->post('data_posted'); 
        // $employename=$this->input->post('employename');
        // $employeid=$this->input->post('employeid');
        // $employemail=$this->input->post('employemail');

        

        //now go to model and load database

        //status check 
       
        //ava encode the data go to view for it

      
    // function saveEmployee()
    // {
    //     $employename = $this->input->post('employename');
    //     $employeid = $this->input->post('employeid');
    //     $employemail = $this->input->post('employemail');


    //     $alldata = $this->employe_model->saveData($employename,$employeid,$employemail);

    //     // echo "test";die;



    //     if ($alldata){
    //         $status='success';
    //     }else{
    //         $status='Failed';
    //     }
        
    //     echo json_encode(
    //         array(
    //            'status'=>$status
    //         )
    //     );
    // }

  
}
?>