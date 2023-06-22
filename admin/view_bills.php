<?php
include "header.php";
include "../user/connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            لیست پرداخت</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>لیست پرداختی ها</h5>
             </div>
             <table class="table table-bordered">
            <tr>
                <th>عدد پرداختی</th>
                <th>نام کامل</th>
                <th>نوع پرداخت</th>
                <th>تاریخ پرداختی</th>
                <th>کل پرداختی</th>
                <th>دیدن جزییات</th>               
            </tr>
            <?php
            $res=mysqli_query($link,"SELECT * FROM billing_header order by id desc");
            while($row=mysqli_fetch_array($res)){
                echo"<tr>";
                echo"<td>";echo $row["bill_no"];echo"</td>";
                echo"<td>";echo $row["full_name"];echo"</td>";
                echo"<td>";echo $row["bill_type"];echo"</td>";
                echo"<td>";echo $row["date"];echo"</td>";
                echo"<td>";echo get_total($row["id"],$link);echo"</td>";
                echo"<td>";?><a href="view_bill_details.php?id=<?= $row["id"];?>" style="color: blue;">دیدن جزییات </a><?php echo"</td>";
                echo"</tr>";
            }
            ?>
        </table>
            </div>
    </div>
</div>
<?php
function get_total($bill_id,$link){
    $total=0;
    $res=mysqli_query($link,"SELECT * FROM billing_details WHERE bill_id=$bill_id");
    while($row=mysqli_fetch_array($res)){
        $total=$total+($row["price"] * $row["qty"]);
    }
    return $total;
}
?>
<!--end-main-container-part-->
<?php
include "footer.php";
?>