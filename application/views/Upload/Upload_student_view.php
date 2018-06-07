		
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Insert Student</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-body">
                <form action="<?php echo site_url('Upload_student/add_student/'.@$month_month_id);?>" method="post">
                    <table id="myTable">
                    </table>
                    <button type="submit" class="btn btn-md btn-primary">Save Student</button>
                </form>
    <br>
                    <button class="btn btn-md btn-primary" onclick="add_row()">+</button>
                    <button class="btn btn-md btn-primary" onclick="del_row()">-</button>
            </div>
        </div>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Month Title : <?php echo @$Month['Month_title']." วันเวลา: ".@$Month['Month_date'];?>
            </div>

            <div class="panel-body">
                <?php if($this->session->flashdata('status') != ""){?>
                    <?php echo $this->session->flashdata('status'); ?>
                <?php } ?>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Student status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach(@$Students_by_month as $row){?>   
                        <tr>
                            <td><?php echo $row['Student_name'];?></td>
                            <td>
                                <?php if($row['Student_status']== 0){ ?>
                                    <?php echo "ยังไม่ชำระเงิน"; ?>
                                <?php }else if($row['Student_status']== 1) {?>
                                    <?php echo "ชำระเงินแล้ว";?>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if($row['Student_status']== 0){?>
                                    <a href="<?php echo site_url('Upload_student/chang_status/'.$row['Student_id']."/".$month_month_id);?>" class="btn btn-info" role="button"> เปลี่ยนสถานะ</a>
                                <?php } ?>
                                    <a href="<?php echo site_url('Upload_student/destroty_student/'.$row['Student_id']."/".$month_month_id);?>" class="btn btn-danger" role="button"> ลบ</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>    
                </table>
            </div>
        </div>
    </div>
</div><!--/.row-->

<script>
function add_row() {
    var table = document.getElementById("myTable");
    count_rows = table.getElementsByTagName("tr").length;

    var row = table.insertRow(count_rows);
    var cell1 = row.insertCell(0);
   
    cell1.innerHTML = "<div class='form-group'><label>ชื่อ-นามสกุล</label><input class='form-control' type='text' name='student_name[]' required "+count_rows+"></div>";
}


function del_row(){
    var table = document.getElementById("myTable");
    count_rows = table.getElementsByTagName("tr").length;
    document.getElementById("myTable").deleteRow(count_rows-1);
}
</script>


</div><!--/.col-->

