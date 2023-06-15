<?php
include "header.php";
include "../user/connection.php";
$id=$_GET["id"];
$companyname="";
$productname="";
$unit="";
$packingsize="";
$res=mysqli_query($link,"SELECT * FROM products WHERE id=$id");
while($row=mysqli_fetch_array($res)){
    $companyname=$row["company_name"];
    $productname=$row["product_name"];
    $unit=$row["unit"];
    $packingsize=$row["packing_size"];
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
        ویرایش کردن محصول</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid ">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span2l">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>ویرایش کردن محصول جدید</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" name="form1" method="POST" class="form-horizontal">           
          <div class="control-group">
              <label class="control-label"> کمپانی را انتخاب کنید:</label>
              <div class="controls">
                <select class="span11" name="company_name" id="">
                    
                    <?php
                    $res=mysqli_query($link,"SELECT * FROM company_name");
                    while($rows=mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $rows['company_name'];?>"><?=$rows['company_name'];?></option>
                        <?php
                    }
                    ?>
                </select>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label"> نام محصول را وارد کنید:</label>
              <div class="controls">
              <input type="text" class="span11" placeholder="نام محصول" name="product_name" value="<?=$productname;?>" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"> واحد را انتخاب کنید:</label>
              <div class="controls">
                <select class="span11" name="unit" id="">
                    <?php
                    $res=mysqli_query($link,"SELECT * FROM units");
                    while($rows=mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $rows['unit'];?>"><?=$rows['unit'];?></option>
                        <?php                                          
                         }
                         
                    ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"> اندازه بسته بندی را وارد کنید:</label>
              <div class="controls">
              <input type="text" class="span11" placeholder="اندازه بسته بندی" name="packing_size" value="<?=$packingsize;?>" required/>
              </div>
            </div>

            <div class="alert alert-danger" id="error" style="display:none">
              این  محصول وجود دارد.لطفا موارد دیگر را امتحان کنید
            </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">ذخیره</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
              محصول با موفقیت ویرایش شد!
            </div>

          </form>

        </div>
        
      </div>
    </div>
        </div>

    </div>
</div>
<?php
    if(isset($_POST['submit1'])){
        var_dump($_POST['product_name']);
        $count=0;
        $res=mysqli_query($link,"SELECT * FROM products WHERE company_name='$_POST[company_name]' && product_name='$_POST[product_name]' && unit='$_POST[unit]' && packing_size='$_POST[packing_size]'")
        or die(mysqli_error($link));
        $count=mysqli_num_rows($res);
        if($count>0){
            ?>
            <script type="text/javascript">
                document.getElementById("success").style.display="none";
                document.getElementById("error").style.display="block";
            </script>
            <?php
        }else{
            
            mysqli_query($link,"UPDATE products SET company_name='$_POST[company_name]',product_name='$_POST[product_name]',unit='$_POST[unit]',packing_size='$_POST[packing_size]' WHERE id=$id")or die(mysqli_error($link));
            ?>
           <script type="text/javascript">
               document.getElementById("error").style.display="none";
               document.getElementById("success").style.display="block";
               setTimeout(function(){
                window.location="add_products.php";
               },1000);
          </script>
           <?php
        }
    }
?>

<!--end-main-container-part-->
<?php
include "footer.php";
?>