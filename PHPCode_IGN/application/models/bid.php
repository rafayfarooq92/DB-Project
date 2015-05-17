<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Unknown
 * Date: 11/25/13
 * Time: 6:08 PM
 * To change this template use File | Settings | File Templates.
 */
class bid extends CI_Model{
    function place_bid($data){
        $this->db->insert('bids',$data);
        return TRUE;
    }


    function get_bids($pid){
        $query=$this->db->select('*')->from('bids')->where(array('active'=>"TRUE",
        'pid'=>$pid));
        $query=$this->db->get();
        return $query->result_array();
    }
    function get_all_from_user($cur_id,$end=10,$start=0){
        $this->db->select('*')->from('bids')->where('user_id',$cur_id)->limit($end,$start);
        $query=$this->db->get();
        return $query->result_array();
    }

    function count_user_bids($cur_id){
        $this->db->select('*')->from('bids')->where('user_id',$cur_id);
        $query=$this->db->get();
        return $query->num_rows();
    }
    function count_total_bids($cur_id){
        $this->db->select('*')->from('bids')->where('pid',$cur_id);
        $query=$this->db->get();
        return $query->num_rows();
    }

    function get_bids_by_project($end,$start,$cur_id){
        $this->db->select('*')->from('bids')->where('pid',$cur_id)->limit($end,$start);
        $query=$this->db->get();
        return $query->result_array();
    }
    function get_bids_count_by_project($cur_id){
        $this->db->select('*')->from('bids')->where('pid',$cur_id);
        $query=$this->db->get();
        return $query->num_rows();
    }

    function mark_bid_approved($id){
        $this->db->where(array(
            'bid_id'=>$id
        ));
        $my_data=array('approved'=>1);
        $this->db->update('bids',$my_data);

    }
    function get_all_bids($end=0,$start=0){
        $this->db->select('*')->from('bids')->limit($end,$start);
        $query=$this->db->get();
        return $query->result_array();
    }

    function get_bids_count(){
        $this->db->select('*')->from('bids');
        $query=$this->db->get();
        return $query->num_rows();
    }

    function del_bid($id){
        $this->db->where('bid_id',$id);
        $this->db->delete('bids');
        return "True";

    }
}