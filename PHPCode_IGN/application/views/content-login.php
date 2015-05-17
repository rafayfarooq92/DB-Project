<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Unknown
 * Date: 11/21/13
 * Time: 7:23 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<?php include_once "nav.php" ?>
<div class="home-page">
    <div class="container-fluid">
        <div class="spacer"></div>
        <div class="row-fluid " >
            <div class="span4">

            </div>
            <div class="span4">
                <img src="<?php echo base_url().'images/log.png'; ?>" />
                <div class="login" >
                    <h1>Login</h1>
                    <form method="post" action="">
                        <div class="input-prepend little_more">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <input type="email" name="email" class="big-text-box" >
                        </div>
                        <div class="input-prepend little_more">
                            <span class="add-on"><i class="icon-pencil"></i></span>
                            <input type="password" name="password" class="big-text-box" >
                        </div>
                        <input type="submit" name="submit" class="button-freelancer" value="Login as a freelancer" >
                        <input type="submit" name="submita" class="button-company"  value="Login as a company" >





                    </form>
                </div>
            </div>
            <div class="span4">

            </div>

        </div>

    </div>
</div>