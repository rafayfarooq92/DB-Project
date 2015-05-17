<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Unknown
 * Date: 11/21/13
 * Time: 4:51 AM
 * To change this template use File | Settings | File Templates.
 */
class main extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('freelancer');
        $this->load->model('client');
    }
    function index()
    {
        if(isset($_POST['submit'])){
            $data['fname']=$_POST['fname'];
            $data['lname']=$_POST['lname'];
            $data['email']=$_POST['email'];
            $data['password']=$_POST['password'];
            $data['country']=$_POST['country'];
            $data['city']=$_POST['city'];
            $data['zipcode']=$_POST['zipcode'];
            $data['houseno']=$_POST['house'];
            $data['moneyacc']=$_POST['paypal'];

           // print_r($data);
            $this->freelancer->create_freelancer($data);
            $cur_user=$this->freelancer->get_freelancer($data['email'],$data['password']);
            $newdata = array(
                'user_id'  => $cur_user['id'],
                'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
            //print_r($cur_user);
          //  echo "<a href=".base_url().'index.php/freelancers/freelancer_first/'.$cur_user['id']." >Login </a>";
            redirect(base_url().'index.php/freelancers/index/');
        }
        else if(isset($_POST['submita'])){
            $data['fname']=$_POST['fname'];
            $data['lname']=$_POST['lname'];
            $data['email']=$_POST['email'];
            $data['password']=($_POST['password']);
            $data['country']=$_POST['country'];
            $data['city']=$_POST['city'];
            $data['zipcode']=$_POST['zipcode'];
            $data['houseno']=$_POST['house'];
            $data['moneyacc']=$_POST['paypal'];
            $this->client->create_client($data);
            $cur_user=$this->client->get_client($data['email'],$data['password']);
            $newdata = array(
                'user_id'  => $cur_user['id'],
                'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
            redirect(base_url().'index.php/clients/client_first/'.$cur_user['id']);
        }
        $this->session->sess_destroy();
        $cur_id=$this->session->userdata('user_id');

        if(!$cur_id){
            $this->load->view('header');
            $this->load->view('content');
            $this->load->view('footer');
        }
        else{
            redirect(base_url().'index.php/main/');
        }

    }
    function aboutus()
    {
        $cur_id=$this->session->userdata('user_id');

        if(!$cur_id){
            $this->load->view('header');
            $this->load->view('content-about');
            $this->load->view('footer');
        }
        else{
            redirect(base_url().'index.php/main/');
        }

    }
    function contactus(){
        $cur_id=$this->session->userdata('user_id');

        if(!$cur_id){
            $this->load->view('header');
            $this->load->view('content-contact');
            $this->load->view('footer');
        }
        else{
            redirect(base_url().'index.php/main/');
        }

    }

    function login(){
        $cur_id=$this->session->userdata('user_id');

        if(!$cur_id){
            if(isset($_POST['submit'])){
                $data=$this->freelancer->get_freelancer_add_info($_POST['email'],$_POST['password']);

                if($data['id']==2){
                    $newdata = array(
                        'user_id'  => $data['id'],
                        'logged_in' => TRUE,
                        'is_admin' => TRUE
                    );
                }
                else{
                    $newdata = array(
                        'user_id'  => $data['id'],
                        'logged_in' => TRUE
                    );
                }

                $this->session->set_userdata($newdata);
                redirect(base_url().'index.php/freelancers/index/');
            }
            else if(isset($_POST['submita']))
            {
                $data=$this->client->get_client_add_info($_POST['email'],$_POST['password']);
                $newdata = array(
                    'user_id'  => $data['id'],
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($newdata);
                redirect(base_url().'index.php/clients/index');
            }
            else{
            $this->load->view('header');
            $this->load->view('content-login');
            $this->load->view('footer');
            }
        }
        else{
            redirect(base_url().'index.php/main/');
        }

    }
    function check()
    {
        $cur_user=$this->freelancer->get_freelancer('osamization@gmail.com','testuser');
        echo ($cur_user['id']);
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}