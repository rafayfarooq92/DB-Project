<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Unknown
 * Date: 11/21/13
 * Time: 8:28 AM
 * To change this template use File | Settings | File Templates.
 */

class clients extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('client');
        $this->load->model('project');
        $this->load->model('bid');

    }
    function client_first($data2){
        $cur_id=$this->session->userdata('user_id');
        if($cur_id){
            $data=$this->client->get_client_by_id($cur_id);
            if(isset($_POST['step1'])){
                $company_type=$_POST['company_type'];
                $this->client->set_company_type($data2,$company_type);
                redirect(base_url().'index.php/clients/client_second/'.$data2);
            }
            else{
                $this->load->view('header');
                $this->load->view('client_step_one',$data);
                $this->load->view('client_footer');
            }
        }
        else{
            redirect(base_url().'index.php/main/logout');
        }
    }
    function client_second($data2){
        $cur_id=$this->session->userdata('user_id');
        if($cur_id){
            $data=$this->client->get_client_by_id($cur_id);
            //print_r($data);
           if(isset($_POST['step2'])){
                $emp=$_POST['empno'];
                $this->client->set_empno($data2,$emp);
                redirect(base_url().'index.php/clients/client_third/'.$data2);
            }
            else{
                $this->load->view('header');
                $this->load->view('client_step_two',$data);
                $this->load->view('client_footer');
            }
        }
        else{
            redirect(base_url().'index.php/main/logout');
        }
    }
    function  client_third($data2){
        $cur_id=$this->session->userdata('user_id');
        if($cur_id){
            $data=$this->client->get_client_by_id($cur_id);
           // print_r($data);
            if(isset($_POST['step3'])){
                $company_name=$_POST['name_company'];
                $this->client->set_cname($data2,$company_name);
                redirect(base_url().'index.php/clients/index');
            }
            else{
                $this->load->view('header');
                $this->load->view('client_step_three',$data);
                $this->load->view('client_footer');
            }
        }
        else{
            redirect(base_url().'index.php/main/logout');
        }

    }
    function index(){
        $cur_id=$this->session->userdata('user_id');
        if($cur_id){

            $data=$this->client->get_client_by_id($cur_id);
            if(isset($_POST['update'])){
                $data=array(
                    'fname' => $_POST['fname'],
                    'lname' => $_POST['lname'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'companyname' => $_POST['companyname'],
                    'companyrelated' => $_POST['companyrelated'],
                    'empno' => $_POST['empno'],
                    'moneyacc' => $_POST['moneyacc'],
                    'zipcode' => $_POST['zipcode'],
                    'houseno' => $_POST['houseno'],
                    'country' => $_POST['country'],
                    'city' => $_POST['city']
                );
                $this->client->update_client($cur_id,$data);
                redirect(base_url().'index.php/clients/index');
            }
            else{
            $this->load->view('header');
            $this->load->view('client_main',$data);
            $this->load->view('client_footer');
            }
        }
        else{
            redirect(base_url().'index.php/main/logout');
        }
    }

    function post_project(){
        $cur_id=$this->session->userdata('user_id');
        if($cur_id){
            $data=$this->client->get_client_by_id($cur_id);
            if(isset($_POST['post_pro'])){
                $newData=array(
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'category' => $_POST['category'],
                    'estimated_amount' => $_POST['estimated_amount'],
                    'company_id' => $cur_id
                );
                $insert_id=$this->project->new_project($newData);
                if($insert_id){
                    $data['message']="New Project Successfully Posted.";
                }
                else{
                    $data['message']="Project Posting Failed.";
                }
                $this->load->view("header");
                $this->load->view("post_project",$data);
                $this->load->view("client_footer");
            }
            else{
                $data['message']=NULL;
                $this->load->view("header");
                $this->load->view("post_project",$data);
                $this->load->view("client_footer");
            }
        }
        else{
            redirect(base_url().'index.php/main/logout');
        }

    }



    function get_my_project($start=0){
        $cur_id=$this->session->userdata('user_id');
        if($cur_id){
            $data['projects']=$this->project->get_user_projects(5,$start,$cur_id);
            $this->load->library('pagination');
            $config['base_url']=base_url().'index.php/clients/get_my_project';
            $config['total_rows']=$this->project->get_user_projects_counts($cur_id);
            $config['per_page']=5;
            $this->pagination->initialize($config);
            $data['pages']=$this->pagination->create_links();
            $this->load->view("header");
            $this->load->view("projects-table",$data);
            $this->load->view("footer");
        }
        else{
            redirect(base_url().'index.php/main/logout');
        }
    }

    function edit_project($pid){
        $cur_id=$this->session->userdata('user_id');
        if($cur_id){
            $data['proj']=$this->project->get_user_project($pid);
            if(isset($_POST['update_proj'])){

                $newData=array(

                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'category' => $_POST['category'],
                    'estimated_amount' => $_POST['estimated_amount']

                );
                $this->project->edit_a_project($pid,$newData);
                $data['proj']=array(

                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'category' => $_POST['category'],
                    'estimated_amount' => $_POST['estimated_amount'],
                    'message' => "Project successfully edited."
                );
                $data['message']=" ";
                $this->load->view("header");
                $this->load->view("project-edit",$data);
                $this->load->view("footer");

            }
            else{
                $data['message']=NULL;
                $this->load->view("header");
                $this->load->view("project-edit",$data);
                $this->load->view("footer");

            }

        }
        else{
            redirect(base_url().'index.php/main/logout');
        }
    }


    function get_my_bids($start=0){
        $cur_id=$this->session->userdata('user_id');
        if($cur_id){
            $data['bids']=$this->project->get_user_projects(5,$start,$cur_id);

            $this->load->library('pagination');
            $config['base_url']=base_url().'index.php/clients/get_my_bids';
            $config['total_rows']=$this->project->get_project_count_by_user($cur_id);
            $config['per_page']=5;
            $this->pagination->initialize($config);
            $data['pages']=$this->pagination->create_links();

            $this->load->view("header");
            $this->load->view("project_bids",$data);
            $this->load->view("footer");



        }
        else{
            redirect(base_url().'index.php/main/logout');
        }
    }

    function single_project_bid($pid,$start=0){
        $cur_id=$this->session->userdata('user_id');
        if($cur_id){
            $data['bid']=$this->bid->get_bids_by_project(3,$start,$pid);

            $this->load->library('pagination');
            $config['base_url']=base_url().'index.php/clients/single_project_bid/'.$pid;
            $config['total_rows']=$this->bid->get_bids_count_by_project($pid);
            $config['per_page']=3;
            $this->pagination->initialize($config);
            $data['pages']=$this->pagination->create_links();

            $this->load->view("header");
            $this->load->view("project_bid",$data);
            $this->load->view("footer");



        }
        else{
            redirect(base_url().'index.php/main/logout');
        }
    }
    function approve_bid($id,$pid){
        $cur_id=$this->session->userdata('user_id');
        if($cur_id){
            $this->bid->mark_bid_approved($id);
            /*   echo "<pre>";
               print_r($data['bid']);
               echo "</pre>";*/

            redirect(base_url().'index.php/clients/single_project_bid/'.$pid);



        }
        else{
            redirect(base_url().'index.php/main/logout');
        }
    }
}