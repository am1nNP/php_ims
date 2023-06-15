<?php
include "header.php";
include "../user/connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
          انبار</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid ">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span2l">
      <div class="widget-box">
      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>شناسه</th>
                  <th>نام محصول کمپانی</th>
                  <th>نام محصول</th>
                  <th>واحد محصول</th>
                  <th>موجودی محصول</th>
                  <th>قیمت فروش محصول</th>
                  <th>ویرایش</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $count=0;
                $res=mysqli_query($link,"SELECT * FROM stock_master");
                while($row=mysqli_fetch_array($res)){
                    $count=$count+1;
                    ?>
                <tr>
                
                  <td><?php echo $count;?></td>
                  <td><?php echo $row["product_company"];?></td>
                  <td><?php echo $row["product_name"];?></td>
                  <td><?php echo $row["product_unit"];?></td>
                  <td><?php echo $row["product_qty"];?></td>
                  <td><?php echo $row["product_selling_price"];?></td>
                  <td><center><a style="color:#00A86B;font-weight:bolder;" href="edit_stock_master.php?id=<?=$row["id"];?>">ویرایش</a></center></td>                  
                </tr>
                    <?php
                }
                ?>
              </tbody>
            </table>
          </div>
      
    </div>
        </div>

    </div>
</div>

<!--end-main-container-part-->
<?php
include "footer.php";
?>