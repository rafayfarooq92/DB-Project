<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Unknown
 * Date: 11/21/13
 * Time: 5:50 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<div  class="navbar navbar-fixed-top  navbar-inverse">
   <Div class="navbar-inner">
    <nav class="container" >
        <ul class="nav">
            <li><a href="<?php echo base_url().'index.php/clients/index'; ?>" >Profile</a></li>
            <li><a href="<?php echo base_url().'index.php/main/logout'; ?>" >Logout</a></li>
            <li><a href="<?php echo base_url().'index.php/clients/post_project' ?>" >Post New Project</a></li>
            <li><a href="<?php echo base_url().'index.php/clients/get_my_project' ?>" >My Projects</a></li>
            <li><a href="<?php echo base_url().'index.php/clients/get_my_bids' ?>" >Bids On My Project</a></li>

        </ul>
    </nav>
   </Div>
</div>
