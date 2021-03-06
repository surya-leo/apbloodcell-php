<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blood Discarded
            <small>Viewing Blood Discarded Reports</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url("admin/dashboard");?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="javascript:void(0);">Reports</a></li>
            <li class="active">Blood Discarded</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Blood Discarded Reports</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> 
                </div>
            </div>
            <div class="box-body">  
                 <form class="form-horizontal" method="post" action="">
                    <div class="form-group">
                        <label class="col-sm-2">From and To Date </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control pull-right daterange" placeholder="Date ..." name="datem" value_url="<?php echo base_url(); ?>admin/viewBloodDiscarded/" /> 
                        </div> 
                        <label class="col-sm-2">Blood Bank</label>
                        <div class="col-sm-4">
                            <select class="form-control searbloodbank_id" name="bloodbank_id" onchange="search_summary('<?php echo base_url(); ?>admin/viewBloodDiscarded/')">
                                <option value="">Select Blood Bank</option>
                                <option value="All">All Blood Bank</option>
                                <?php 
                                if(count($blood_bank) > 0){
                                    foreach ($blood_bank as $bb){
                                        ?>
                                        <option value="<?php echo $bb->bloodbank_id;?>"><?php echo $bb->bloodbank_name;?></option>
                                        <?php
                                    }
                                }
                                ?>
                                
                            </select>
                        </div>  
                    </div> 
                </form> 
                <div class="col-sm-12">
                    <div class="form-group pull-right"> 
                        <input type="text" id="FilterTextBox" name="FilterTextBox" class="form-control" placeholder="Search" onkeyup="searchFilter('','<?php echo base_url(); ?>admin/viewBloodDiscarded/')"/>
                    </div>
                </div>
                <div class="postList">  
                    <table class="table-striped table table-bordered">
                        <thead>
                            <tr> 
                                <?php if($this->session->userdata("login_type") != '5utype') {?>
                                <th>Blood Bank Name</th>
                                <?php } ?>
                                <th>Blood Unit Number</th>  
                                <th>Blood Group</th> 
                                <th>Component Type</th> 
                                <th>Expiry Date</th> 
                                <th>Reason</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if(count($view) > 0){
                            foreach ($view as $ve){
                                $venotes    =   $ve->notes; 
                                ?>  
                                <?php if($this->session->userdata("login_type") != '5utype') {?>
                                <td><?php echo $ve->bloodbank_name;?></td>
                                <?php } ?>
                                <td><?php echo $ve->blood_unit_num;?></td> 
                                <td><?php echo $ve->blood_group?></td>  
                                <td><?php echo $ve->component_type;?></td>
                                <td><?php echo $ve->expiry_date;?></td> 
                                <td><?php 
                                if($venotes != ''){
                                    echo $venotes;
                                }else{ ?>
                                    <a href="javascript:void(0);" class="btn btn-info btn-xs" data-toggle="modal" data-target="#reason_idyModal" onclick="reason_by('<?php echo $ve->inventory_id;?>')">Close</a>
                                <?php }
                                ?></td>  
                            </tr> 
                                <?php
                            }
                        }else{
                                echo "<tr><td colspan='5'>Blood Discarded details are not available</td></tr>";
                        }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr> 
                                <?php if($this->session->userdata("login_type") != '5utype') {?>
                                <th>Blood Bank Name</th>
                                <?php } ?>
                                <th>Blood Unit Number</th>  
                                <th>Blood Group</th> 
                                <th>Component Type</th> 
                                <th>Expiry Date</th> 
                                <th>Reason</th> 
                            </tr>
                        </tfoot>
                    </table>
                    <?php echo $this->ajax_pagination->create_links();?>
                </div>
            </div>
        </div>
    </section>
</div>