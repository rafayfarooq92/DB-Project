<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Unknown
 * Date: 11/21/13
 * Time: 5:30 AM
 * To change this template use File | Settings | File Templates.
 */
?>

<?php include_once "nav.php" ?>
<div class="home-page">
    <div class="container-fluid">
        <div class="spacer"></div>
        <div class="row-fluid" >
            <div class="span1">

            </div>
            <div class="span5">
                <div style="height: 100px;"></div>
                <img src="<?php echo base_url().'images/log.png'; ?>" />
            </div>

            <div class="span1">

            </div>

            <div class="span4">
                <div class="register" >
                    <h1>Register Now</h1>
                    <form method="post" action="">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <input type="text" name="fname" class="big-text-box" placeholder="Your First Name" >
                        </div>
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <input type="text"  name="lname" class="big-text-box" placeholder="Your Second Name" >
                        </div>
                        <div class="input-prepend">
                                <span class="add-on"><i class="icon-envelope"></i></span>
                                <input type="email" name="email" class="big-text-box" placeholder="Your Email" >
                        </div>
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-pencil"></i></span>
                                <input type="password" name="password" class="big-text-box" placeholder="Your Password" >
                        </div>
                        <label style="text-align: center;">Address</label>
                        <input type="text" name="country" class="medium-box" placeholder="Country" >
                        <input type="text"  name="city" class="medium-box" placeholder="City" >
                        <input type="text" name="zipcode" class="medium-box" placeholder="Zip Code" >
                        <input type="text" name="house" class="medium-box" placeholder="House #" >
                        <label style="text-align: center;">Payment Information</label>
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-shopping-cart"></i></span>
                            <input type="text" name="paypal" placeholder="PayPal" class="big-text-box" >
                        </div>
                        <input type="submit" name="submit" class="button-freelancer" value="Register as a freelancer" >
                        <input type="submit" name="submita" class="button-company"  value="Register as a company" >





                    </form>
                </div>
            </div>
            <Div class="span1">

            </Div>

        </div>

    </div>
</div>