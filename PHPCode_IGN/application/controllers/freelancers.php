<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Unknown
 * Date: 11/21/13
 * Time: 8:28 AM
 * To change this template use File | Settings | File Templates.
 */

class freelancers extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('freelancer');
        $this->load->model('project');
        $this->load->model('bid');
        $this->load->model('client');
    }
    function index(){
        $cur_id=$this->session->userdata('user_id');
        $cur_role=$this->session->userdata('is_admin');
        if($cur_id){
            $data=$this->freelancer->get_freelancer_by_id($cur_id);
            if(isset($_POST['update'])){
                $data=array(
                    'fname' => $_POST['fname'],
                    'lname' => $_POST['lname'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'moneyacc' => $_POST['moneyacc'],
                    'zipcode' => $_POST['zipcode'],
                    'houseno' => $_POST['houseno'],
                    'country' => $_POST['country'],
                    'city' => $_POST['city']
                );

                $this->freelancer->update_freelancer($cur_id,$data);
                $data['message']="Profile Has Been Update";
                if($cur_role==TRUE){
                    $this->load->view('header');
                    $this->load->view('freelancer_admin',$data);
                    $this->load->view('client_footer');
                }
                else{
                    $this->load->view('header');
                    $this->load->view('freelancer_main',$data);
                    $this->load->view('client_footer');
                }
            }
            else if($cur_role == TRUE){
                $this->load->view('header');
                $this->load->view('freelancer_admin',$data);
                $this->load->view('client_footer');
            }
            else{
                $this->load->view('header');
                $this->load->view('freelancer_main',$data);
                $this->load->view('client_footer');
            }
        }
        else{
            redirect(base_url().'index.php/main/logout');
        }
    }


    function show_projects($start=0){
        $cur_id=$this->session->userdata('user_id');
        $cur_role=$this->session->userdata('is_admin');
        if($cur_id){
            $data=$this->freelancer->get_freelancer_by_id($cur_id);
            /*if($cur_role == TRUE){
                $data['projects']=$this->project->get_all_projects(5,$start);
                $this->load->library('pagination');
                $config['base_url']=base_url().'index.php/freelancers/show_projects';
                $config['total_rows']=$this->project->get_project_count();
                $config['per_page']=5;
                $this->pagination->initialize($config);
                $data['pages']=$this->pagination->create_links();

                $this->load->view('header');
                $this->load->view('admin_nav');

                $this->load->view('show_projects',$data);
                $this->load->view('client_footer');
            }
            else{*/
                $data['projects']=$this->project->get_all_projects(5,$start);
                $this->load->library('pagination');
                $config['base_url']=base_url().'index.php/freelancers/show_projects';
                $config['total_rows']=$this->project->get_project_count();
                $config['per_page']=5;
                $this->pagination->initialize($config);
                $data['pages']=$this->pagination->create_links();

                $this->load->view('header');
            if($cur_role == TRUE){
                $this->load->view('admin_nav');
            }else{
                $this->load->view('freelancer_nav');

            }
                $this->load->view('show_projects',$data);
                $this->load->view('client_footer');
            //}
        }
        else{
            redirect(base_url().'index.php/main/logout');
        }

    }
    function all_clients($start=0,$message=""){
        $cur_id=$this->session->userdata('user_id');
        $cur_role=$this->session->userdata('is_admin');
        if($cur_id){
            $data=$this->freelancer->get_freelancer_by_id($cur_id);
            if($cur_role == TRUE){
                $data['freelancers']=$this->client->get_all_clients(5,$start);
                $this->load->library('pagination');
                $config['base_url']=base_url().'index.php/freelancers/all_clients';
                $config['total_rows']=$this->client->get_clients_count();
                $config['per_page']=5;
                $this->pagination->initialize($config);
                $data['pages']=$this->pagination->create_links();
                $data['message']=$message;
                $this->load->view('header');
                $this->load->view('admin_nav');

                $this->load->view('show_clients',$data);
                $this->load->view('client_footer');
            }
            else{
                redirect(base_url().'index.php/main/logout');
            }
        }
        else{
            redirect(base_url().'index.php/main/logout');
        }

    }
    function delete_client($id){
        $message=$this->client->del_client($id);
        redirect(base_url().'index.php/freelancers/all_clients/0/'.$message);
    }

    function all_bids($start=0,$message=""){
        $cur_id=$this->session->userdata('user_id');
        $cur_role=$this->session->userdata('is_admin');
        if($cur_id){
            $data=$this->freelancer->get_freelancer_by_id($cur_id);
            if($cur_role == TRUE){
                $data['freelancers']=$this->bid->get_all_bids(5,$start);
                $this->load->library('pagination');
                $config['base_url']=base_url().'index.php/freelancers/all_bids';
                $config['total_rows']=$this->bid->get_bids_count();
                $config['per_page']=5;
                $this->pagination->initialize($config);
                $data['pages']=$this->pagination->create_links();
                $data['message']=$message;
                $this->load->view('header');
                $this->load->view('admin_nav');

                $this->load->view('show_all_bids',$data);
                $this->load->view('client_footer');
            }
            else{
                redirect(base_url().'index.php/main/logout');
            }
        }
        else{
            redirect(base_url().'index.php/main/logout');
        }

    }
    function delete_bid($id){
        $message=$this->bid->del_bid($id);
        redirect(base_url().'index.php/freelancers/all_bids/0/'.$message);
    }
    function all_freelancers($start=0,$message=""){
        $cur_id=$this->session->userdata('user_id');
        $cur_role=$this->session->userdata('is_admin');
        if($cur_id){
            $data=$this->freelancer->get_freelancer_by_id($cur_id);
            if($cur_role == TRUE){
                $data['freelancers']=$this->freelancer->get_all_freelancers(5,$start);
                $this->load->library('pagination');
                $config['base_url']=base_url().'index.php/freelancers/all_freelancers';
                $config['total_rows']=$this->freelancer->get_freelancer_count();
                $config['per_page']=5;
                $this->pagination->initialize($config);
                $data['pages']=$this->pagination->create_links();
                $data['message']=$message;
                $this->load->view('header');
                $this->load->view('admin_nav');

                $this->load->view('show_freelancers',$data);
                $this->load->view('client_footer');
            }
            else{
                redirect(base_url().'index.php/main/logout');
            }
        }
        else{
            redirect(base_url().'index.php/main/logout');
        }

    }
    function delete_freelancer($id){
        $message=$this->freelancer->del_freelancer($id);
        redirect(base_url().'index.php/freelancers/all_freelancers/0/'.$message);
    }
    function show_project($pid,$start=0){
        $cur_id=$this->session->userdata('user_id');
        $cur_role=$this->session->userdata('is_admin');
        if($cur_id){
            $data['current_user']=$this->freelancer->get_freelancer_by_id($cur_id);

            if(isset($_POST['submit_bid'])){
                $_POST['active']="on";
                if($_POST['active']=="on"){
                    $_POST['active']="true";
                }
                else{
                    $_POST['active']="false";
                }
                $sub=array(
                    'pid' => $pid,
                    'User_ID'=>$cur_id,
                    'purposed_amount'=>$_POST['purposed_amount'],
                    'link'=>$_POST['link'],
                    'active'=>$_POST['active'],
                    'user_claim'=>$_POST['user_claim']

                );

                if($this->bid->place_bid($sub))
                {

                    $data['message']="You have successfully placed your bid.";

                }
                else{
                    $data['message']="Some error occured while placing your bid.";
                }
            }
           /* if($cur_role == TRUE){
                $this->load->view('header');
                $this->load->view('freelancer_admin',$data);
                $this->load->view('client_footer');
            }
            else{*/
                $data['project']=$this->project->get_project($pid);
               /* $data['project_owner']=$this->project->get_company_details($pid);
                print_r($data['project_owner']);*/
                $data['bids']=$this->bid->get_bids($pid);


                /*$data['ans']=$this->freelancer->get_user_name_for_bid($pid);
                print_r($data['ans']);*/
                $this->load->view('header');
                if($cur_role == TRUE){
                    $this->load->view('admin_nav');
                }else{
                    $this->load->view('freelancer_nav');

                }
                $this->load->view('show_project',$data);
                $this->load->view('client_footer');
          //  }
        }
        else{
            redirect(base_url().'index.php/main/logout');
        }

    }


    function my_bids($start=0){
        $cur_id=$this->session->userdata('user_id');
        $cur_role=$this->session->userdata('is_admin');
        if($cur_id){
            $this->load->library('pagination');
            $config['base_url']=base_url().'index.php/freelancers/my_bids';
            $config['total_rows']=$this->bid->count_user_bids($cur_id);
            $config['per_page']=10;
            $this->pagination->initialize($config);
            $data['pages']=$this->pagination->create_links();

            $data['current_user']=$this->freelancer->get_freelancer_by_id($cur_id);
            if($cur_role == TRUE){
                $this->load->view('header');
                $this->load->view('freelancer_admin',$data);
                $this->load->view('client_footer');
            }
            else{

                $data['my_bids']=$this->bid->get_all_from_user($cur_id,10,$start);
                $this->load->view('header');
                $this->load->view('show_bids',$data);
                $this->load->view('client_footer');
            }
        }
        else{
            redirect(base_url().'index.php/main/logout');
        }

    }




}