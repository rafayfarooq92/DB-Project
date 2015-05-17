<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Unknown
 * Date: 11/21/13
 * Time: 7:56 AM
 * To change this template use File | Settings | File Templates.
 */
class client extends CI_Model{

    function create_client($data){
        $data['password']=sha1($data['password']);
        $this->db->insert('clients',$data);

    }



    function get_client($email,$password){
        $this->db->select('id')->from('clients')->where(array(
            'email' => $email,
            'password' => sha1($password)
        ));
        $query=$this->db->get();
        //print_r($query);
        return $query->first_row('array');
    }
    function get_client_add_info($email,$password){
        $this->db->select('*')->from('clients')->where(array(
            'email' => $email,
            'password' => sha1($password)
        ));
        $query=$this->db->get();
        //print_r($query);
        return $query->first_row('array');
    }


    function get_client_by_id($id){

        $this->db->select('*')->from('clients')->where(array(
            'id' => $id

        ));
        $query=$this->db->get();
        //print_r($query);
        return $query->first_row('array');
    }
    function get_clientname_by_id($id){

        $this->db->select('companyname')->from('clients')->where(array(
            'id' => $id

        ));
        $query=$this->db->get();
        //print_r($query);
        return $query->first_row('array');
    }
    function set_company_type($id,$company_type){
        $this->db->where('id',$id);
        $data_to_update=array('companyrelated'=> $company_type);
        $this->db->update('clients',$data_to_update);

    }
    function set_empno($id,$empno){
        $this->db->where('id',$id);
        $data_to_update=array('empno'=> $empno);
        $this->db->update('clients',$data_to_update);
    }
    function set_cname($id,$cname){
        $this->db->where('id',$id);
        $data_to_update=array('companyname'=> $cname);
        $this->db->update('clients',$data_to_update);
    }

    function update_client($id,$data){
        $this->db->where('id',$id);
        //$data_to_update=array('companyname'=> $cname);
        $this->db->update('clients',$data);
    }
    function get_all_clients($end=0,$start=0){
        $this->db->select('*')->from('clients')->limit($end,$start);
        $query=$this->db->get();
        return $query->result_array();
    }

    function get_clients_count(){
        $this->db->select('*')->from('clients');
        $query=$this->db->get();
        return $query->num_rows();
    }

    function del_client($id){
        $this->db->where('id',$id);
        $this->db->delete('clients');
        return "True";

    }


}