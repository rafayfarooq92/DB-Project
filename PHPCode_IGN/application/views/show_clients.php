<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Unknown
 * Date: 11/22/13
 * Time: 11:11 PM
 * To change this template use File | Settings | File Templates.
 */

?>


<style>

</style>
<div class="client-first-page">
    <div class="container-fluid">
        <div class="spacer">

        </div>
        <div class="row-fluid " >
            <div class="span2">

            </div>
            <div class="span8">
                <div class="round-ball">
                    All Companies
                </div>
                <br><br>
                <?php if($message){
                    ?>
                    <div class="message">
                        <?php
                        echo "The company has been deleted successfully.";
                        ?>
                    </div>
                <?php } ?>
                <br>
                <div class="table_bg">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Owner Name</th>
                            <th>Email</th>
                            <th>Company Name</th>
                            <th>About Company</th>
                            <th>Delete</th>


                        </tr>
                        </thead>

                        <?php
                        foreach($freelancers as $row){
                            ?>
                            <tr>
                                <td><?php echo $row['fname'] . ' ' .$row['lname']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['companyname']; ?></td>
                                <td><?php echo $row['companyrelated']; ?></td>
                                <td><a href="<?php echo base_url().'index.php/freelancers/delete_client/'.$row['id']; ?>">Delete</a> </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>

                </div>
                <?php
                echo $pages;
                ?>
            </div>
            <div class="span2">

            </div>

        </div>

    </div>
</div>