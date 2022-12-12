<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employe_model extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->db=$this->load->database('default',true); // no need for now
    }
    function fetch_country(){
        $this->db->order_by("country_name", "ASC");
        $query = $this->db->get("country");
        return $query->result();
    }
    public function fetch_province($country_id)
    {
        $this->db->where('country_id', $country_id);
        $this->db->order_by('province_name', 'ASC');
        $query = $this->db->get('province');
        $output = '<option value="">Select Province</option>';
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->province_id.'">'.$row->province_name.'</option>';
        }
        return $output;
    }
    public function fetch_municipality($province_id)
    {
        $this->db->where('province_id', $province_id);
        $this->db->order_by('municipality_name', 'ASC');
        $query = $this->db->get('municipality');
        $output = '<option value="">Select Municipality</option>';
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->municipality_id.'">'.$row->municipality_name.'</option>';
        }
        return $output;

    }
    public function saverecords($data)
    {
        $this->db->insert('patient',$data);
        return true;
    }


     # 2. Using Query Builder
    //  e.g., $return_data = $this->db_name->select('*')
    //  ->from('TABLE_NAME')
    //  ->get()
    //  ->result();

    //now execute the query

    // function executeEmployeData(){
    //     $query=$this->db->post('EMPLOYE');
    //     $return_result=$this->db->query($sql)->result();

    //     // $return_data=$this->db->select('*')->from('EMPLOYE')->get()->result();
    //     return $return_result;
    // }

    // //save data to the table

    

    // function saveData($employename,$employeid,$employemail)
    // {
    //     // $sql = "SELECT NVL(MAX(ID),0) AS MAX FROM EMPLOYE";
    //     // $max = $this->db->query($sql)->row();
    //     // $next_id = $max->MAX + 1;

    //     $getData=$this->db->set('EMPLOYENAME',$employename)
    //                             ->set('EMPLOYEID',$employeid)
    //                             ->set('EMPLOYEMAIL',$employemail)
    //                             // ->set('ID',$next_id)
    //                             ->insert('EMPLOYE');

    //     //checking
    //     if($getData){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
}
?>