<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Unknown
 * Date: 11/22/13
 * Time: 11:11 PM
 * To change this template use File | Settings | File Templates.
 */

?>

<?php include_once "client_nav.php" ?>
<style>

</style>
<div class="client-first-page">
    <div class="container-fluid">
        <div class="spacer">

        </div>
        <div class="row-fluid" >
            <div class="span2">

            </div>
            <div class="span8">
                <div class="round-ball">
                    Bids On This Project
                </div>
                <br><br>
                <div class="table_bg">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Bid Amount</th>
                            <th>Posted On</th>
                            <th>User Claim</th>
                            <th>Related Work</th>
                            <th>Approve</th>



                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($bid as $row){
                            ?>
                            <tr>
                                <td><?php echo $row['purposed_amount']; ?></td>
                                <td><?php echo $row['date_time']; ?></td>
                                <td><?php echo $row['user_claim']; ?></td>
                                <td><?php echo $row['link'];  ?></td>
                                <td><?php if($row['approved']==0){
                                        echo "<a href='".base_url().'index.php/clients/approve_bid/'.$row['bid_id'].'/'.$row['pid']."'>Approve It</a>";
                                    }else{
                                        echo "<a href=''>Disapprove It</a>";
                                    }?></td>


                            </tr>
                        <?php

                        }
                        ?>

                        </tbody>
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