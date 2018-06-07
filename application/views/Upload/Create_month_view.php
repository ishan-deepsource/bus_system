		
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Month</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Create Month
                    </button>
                </div>

                <div class="panel-body">
                    <?php if($this->session->flashdata('status') != ""){?>
                        <?php echo $this->session->flashdata('status'); ?>
                    <?php } ?>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Month Title</th>
                                <th>Month Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach(@$Months as $row){?>

                            <tr>
                                <td><?php echo $row['Month_title'];?></td>
                                <td><?php echo $row['Month_date'];?></td>
                                <td>
                                <a href="<?php echo site_url('Upload_student/edit_form/'.$row['Month_id']);?>" class="btn btn-warning" role="button"> Edit</a>
                                <a href="<?php echo site_url('Upload_student/destroty/'.$row['Month_id']);?>" class="btn btn-danger" role="button"> Delete</a>
                                <a href="<?php echo site_url('Upload_student/student_list/'.$row['Month_id']);?>" class="btn btn-info" role="button"> Insert Student</a>
                                </td>
                            </tr>

                            <?php } ?>
                        </tbody>    
                    </table>
                </div>
            </div>
        </div>
    </div><!--/.row-->


</div><!--/.col-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <?php if(@$status == "edit"){?>

        <form action="<?php echo site_url('Upload_student/edit_month/'.@$Month['Month_id']);?>" method="post">

    <?php } else {?>

        <form action="<?php echo site_url('Upload_student/create_month');?>" method="post">

    <?php } ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Month</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label>Month Title</label>
                        <input type="text" class="form-control" name="Month_title" placeholder="กรุณากรอก" value="<?php echo @$Month['Month_title'];?>">
                    </div>
                    <div class="form-group">
                        <label>Month Date</label>
                        <input type="date" class="form-control" name="Month_date" placeholder="กรุณากรอก" value="<?php echo @$Month['Month_date'];?>">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Month</button>
            </div>
        </div>
    </form>
  </div>
</div>
    