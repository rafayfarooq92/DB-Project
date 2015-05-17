<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Unknown
 * Date: 11/23/13
 * Time: 3:39 AM
 * To change this template use File | Settings | File Templates.
 */
class project extends CI_Model{
    function new_project($data){

        $this->db->insert('projects',$data);
        return $this->db->insert_id();
    }

    function get_user_projects($end,$start,$cid){
        $this->db->select('*')->from('projects')->where('company_id',$cid)->limit($end,$start);
        $query=$this->db->get();
        return $query->result_array();

    }
    function get_user_projects_counts($cid)
    {
        $this->db->select('*')->from('projects')->where('company_id',$cid);
        $query=$this->db->get();
        return $query->num_rows();
    }
    function delete_project($pid){
        $this->db->where('pid',$pid);
        $this->db->delete('projects');
    }
    function get_user_project($pid){

        $this->db->select('*')->from('projects')->where(array('pid'=>$pid));
        $query=$this->db->get();
        return $query->first_row('array');

    }
    function edit_a_project($pid,$data){

        $this->db->where('pid',$pid);
        $this->db->update('projects',$data);
    }


    function get_all_projects($start=1,$end=0){
        $this->db->select('*')->from('projects')->order_by('data_time','desc')->limit($start,$end);
        $query=$this->db->get();
        return $query->result_array();
    }
    function get_project($pid){
        $this->db->select('*')->from('projects')->where('pid',$pid);
        $query=$this->db->get();
        return $query->first_row('array');
    }
    function get_project_count(){
        $this->db->select('pid')->from('projects');
        $query=$this->db->get();
        return $query->num_rows();
    }
   /* function get_company_details($pid){
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('projects', 'projects.company_id = clients.id');
        $query=$this->db->get();
        return $query->first_row('array');
    }
*/
    function get_project_name($pid){
        $this->db->select('title')->from('projects')->where('pid',$pid);
        $query=$this->db->get();
        return $query->first_row('array');
    }

    function  get_project_count_by_user($cur_id){
        $this->db->select('*')->from('projects')->where('company_id',$cur_id);
        $query=$this->db->get();
        return $query->num_rows();
    }

    function  get_project_company($cur_id){
        $this->db->select('*')->from('projects')->where('company_id',$cur_id);
        $query=$this->db->get();
        return $query->num_rows();
    }

}