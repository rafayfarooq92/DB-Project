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
        <div class="spacer"></div>
        <div class="row-fluid " >
            <div class="span2">

            </div>
            <div class="span8">
                <div class="round-ball">
                    Bids On Your Projects
                </div>
                <br><br>
                <div class="table_bg">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Posted On</th>
                            <th>Category</th>
                            <th>Total Bids</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($bids as $row){
                            ?>
                            <tr>
                                <td><a href='<?php echo base_url().'index.php/clients/single_project_bid/'.$row['pid']; ?>'><?php echo $row['title']; ?></a></td>
                                <td><?php echo $row['data_time']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php print_r($this->bid->count_total_bids($row['pid']));  ?></td>

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