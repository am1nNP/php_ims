<?php
include "header.php";
include "../user/connection.php";
$id=$_GET["id"];
$full_name="";
$bill_type="";
$date="";
$bill_no="";
$res=mysqli_query($link,"SELECT * FROM billing_header WHERE id=$id");
while($row=mysqli_fetch_array($res)){
    $full_name=$row["full_name"];
    $bill_type=$row["bill_type"];
    $date=$row["date"];
    $bill_no=$row["bill_no"];
}

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="demo.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            جزییات پرداختی</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>لیست  جزییات</h5>
             </div>
             <table class="table table-bordered">
            <tr>
                <td>عدد پرداختی</td>
                <td><?=$bill_no;?></td>
            </tr>
            <tr>
                <td>نام کامل</td>
                <td><?=$full_name;?></td>
            </tr>
            <tr>
                <td>نوع پرداختی</td>
                <td><?=$bill_type;?></td>
            </tr>
            <tr>
                <td>تاریخ پرداختی</td>
                <td><?=$date;?></td>
            </tr>             
        </table>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>نام کمپانی</th>
                <th>نام محصول</th>
                <th>واحد محصول</th>
                <th>اندازه بسته بندی</th>
                <th>قیمت</th>
                <th>موجودی</th>
                <th>کل</th>
            </tr>
            <?php
            $total=0;
            $res=mysqli_query($link,"SELECT * FROM billing_details WHERE bill_id=$id");
            while($row=mysqli_fetch_array($res)){
                echo"<tr>";
                echo"<td>";echo $row["product_company"];echo"</td>";
                echo"<td>";echo $row["product_name"];echo"</td>";
                echo"<td>";echo $row["product_unit"];echo"</td>";
                echo"<td>";echo $row["packing_size"];echo"</td>";
                echo"<td>";echo $row["price"];echo"</td>";
                echo"<td>";echo $row["qty"];echo"</td>";
                echo"<td>";echo ($row["price"]*$row["qty"]);echo"</td>";
                echo"</tr>";
                $total=$total+($row["price"]* $row["qty"]);
            }
            ?>
        </table>
        <div align="right" style="font-weight: bold;">
            مجموع کل:<?php echo $total;?>
        </div>
            </div>
    </div>
</div>
<!--end-main-container-part-->
<?php
include "footer.php";
?>