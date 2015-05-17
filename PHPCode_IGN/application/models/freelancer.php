<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Unknown
 * Date: 11/21/13
 * Time: 7:38 AM
 * To change this template use File | Settings | File Templates.
 */
class freelancer extends CI_Model{

    function create_freelancer($data){
        $data['password']=sha1($data['password']);
        $this->db->insert('freelancers',$data);

    }

    function get_freelancer($email,$password){
        $this->db->select('id')->from('freelancers')->where(array(
            'email' => $email,
            'password' => sha1($password)
        ));
        $query=$this->db->get();
        //print_r($query);
        return $query->first_row('array');
    }
    function get_freelancer_add_info($email,$password){

        $this->db->select('id')->from('freelancers')->where(array(
            'email' => $email,
            'password' => sha1($password)
        ));
        $query=$this->db->get();

        return $query->first_row('array');
    }

    function get_freelancer_by_id($id){

        $this->db->select('*')->from('freelancers')->where(array(
            'id' => $id

        ));
        $query=$this->db->get();
        //print_r($query);
        return $query->first_row('array');
    }
    function update_freelancer($id,$data){
        $this->db->where('id',$id);
        //$data_to_update=array('companyname'=> $cname);
        $this->db->update('freelancers',$data);
    }

    function get_user_name_for_bid($pid){
        $this->db->select('fname','lname')->from("freelancers")->where('id','3');
        $query=$this->db->get();
        return $query->result_array();
    }


    function get_username_from_bid($cur_id){
        $this->db->select('fname,lname')->from("freelancers")->where('id',$cur_id);
        $query=$this->db->get();
        return $query->first_row('array');
    }

    function get_all_freelancers($end=0,$start=0){
        $this->db->select('*')->from('freelancers')->limit($end,$start);
        $query=$this->db->get();
        return $query->result_array();
    }

    function get_freelancer_count(){
        $this->db->select('*')->from('freelancers');
        $query=$this->db->get();
        return $query->num_rows();
    }
    function del_freelancer($id){
        $this->db->where('id',$id);
        $this->db->delete('freelancers');
        return "True";
    }
}