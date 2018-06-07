		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Student</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Address Student
            </div>
            <?php if(@$status == "edit"){?>

                <form action="<?php echo site_url('Address/edit/'.$Address['Address_id']);?>" method="post">

            <?php }else {?>

                <form action="<?php echo site_url('Address/add_address');?>" method="post">

            <?php } ?>

            <div class="panel-body">
                <?php if($this->session->flashdata('status') != ""){?>
                    <?php echo $this->session->flashdata('status'); ?>
                <?php } ?>
                <div class="form-group">
					<label>Student name</label>
					<input class="form-control" name="address_student_name" placeholder="กรุณากรอก" value="<?php echo @$Address['Address_Student_name'];?>">
                </div>
                <div class="form-group">
					<label>Telephone</label>
					<input class="form-control" name="address_telephone" placeholder="กรุณากรอก" value="<?php echo @$Address['Address_telephone'];?>">
                </div>
                <div class="form-group">
					<label>Address</label>
                    <textarea class="form-control" rows="3" name="address_name"><?php echo @$Address['Address_name'];?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
				<button type="reset" class="btn btn-default">Reset</button>
            </div>
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Student List
            </div>
            <div class="panel-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Telephone</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($Addresss as $row){?>   
                        <tr>
                            <td><?php echo $row['Address_Student_name'];?></td>
                            <td><?php echo $row['Address_telephone'];?></td>
                            <td><?php echo $row['Address_name'];?></td>
                            <td>    
                                <a href="<?php echo site_url('Address/edit_form/'.$row['Address_id']);?>" class="btn btn-warning" role="button"> Edit</a>
                               
                                <a href="<?php echo site_url('Address/destory/'.$row['Address_id']);?>" class="btn btn-danger" role="button"> Delete</a>
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
    