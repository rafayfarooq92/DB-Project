<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Unknown
 * Date: 11/23/13
 * Time: 4:11 AM
 * To change this template use File | Settings | File Templates.
 */
class projects extends CI_Controller{
    function __Construct(){
        parent::__Construct();
        $this->load->model('project');
    }
    function edit_project($pid){
        $this->project->edit_project($pid);

    }
    function delete_project($pid){
        $this->project->delete_project($pid);
        redirect(base_url().'index.php/clients/get_my_project');
    }

}