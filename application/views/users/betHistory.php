<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Bet History
        </h1>
    </section>
    <section class="content">
        <!-- <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addPayment"><i class="fa fa-plus"></i> Add Payment</a>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <!-- <th><?=$this->lang->line('betDate')?></th> -->
                                <th>User</th>
                                <th>Teams</th>
                                <th>Stake</th>
                                <th>Odds</th>
                                <th>Profit</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                            <?php
                                foreach($bets as $bet){
                            ?>
                            <tr>
                                <td><?=$bet->username?></td>
                                <td><?=$bet->team1?><br>---<br><?=$bet->team2?></td>
                                <td>$<?=$bet->stake?></td>
                                <td><?=$bet->odds?></td>
                                <td>$<?=$bet->profit?></td>
                                <td><?=$bet->createdDate?></td>
                                <td><?=$bet->status?></td>
                            </tr>
                            <?php } ?>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>