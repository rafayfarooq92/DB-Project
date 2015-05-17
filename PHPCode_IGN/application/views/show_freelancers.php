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
                    All Freelancers
                </div>
                <br><br>
                <div class="table_bg">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registered On</th>
                            <th>Delete</th>


                        </tr>
                        </thead>

                        <?php
                        foreach($freelancers as $row){
                            ?>
                            <tr>
                                <td><?php echo $row['fname'] . ' ' .$row['lname']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['datereg']; ?></td>
                                <td><a href="<?php echo base_url().'index.php/freelancers/delete_freelancer/'.$row['id']; ?>">Delete</a> </td>
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