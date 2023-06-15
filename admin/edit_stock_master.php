<?php
include "header.php";
include "../user/connection.php";
$id=$_GET["id"];
$product_company="";
$product_name="";
$product_unit="";
$product_qty="";
$product_selling_price="";
$res=mysqli_query($link,"SELECT * FROM stock_master WHERE id=$id");
while($row=mysqli_fetch_array($res)){
    $product_company=$row["product_company"];
    $product_name=$row["product_name"];
    $product_unit=$row["product_unit"];
    $product_qty=$row["product_qty"];
    $product_selling_price=$row["product_selling_price"];
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
        ویرایش کردن انبار</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid ">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span2l">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>ویرایش کردن موجودی انبار</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" name="form1" method="POST" class="form-horizontal">           
          <div class="control-group">
              <label class="control-label">   کمپانی محصول را انتخاب کنید:</label>
              <div class="controls">
              <input type="text" class="span11" placeholder="نام محصول" name="product_company" value="<?=$product_company;?>" readonly/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label"> نام محصول را وارد کنید:</label>
              <div class="controls">
              <input type="text" class="span11" placeholder="نام محصول" name="product_name" value="<?=$product_name;?>" readonly/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"> واحد محصول را انتخاب کنید:</label>
              <div class="controls">
              <input type="text" class="span11" placeholder="نام محصول" name="product_unit" value="<?=$product_unit;?>" readonly/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">   موجودی محصول را وارد کنید:</label>
              <div class="controls">
              <input type="text" class="span11" placeholder="اندازه بسته بندی" name="product_qty" value="<?=$product_qty;?>" readonly/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">   قیمت فروش محصول را وارد کنید:</label>
              <div class="controls">
              <input type="text" class="span11" placeholder="اندازه بسته بندی" name="product_selling_price" value="<?=$product_selling_price;?>" required/>
              </div>
            </div>

            <div class="alert alert-danger" id="error" style="display:none">
              این  محصول وجود دارد.لطفا موارد دیگر را امتحان کنید
            </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">ذخیره</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
              انبار با موفقیت ویرایش شد!
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
           mysqli_query($link,"UPDATE stock_master SET product_selling_price='$_POST[product_selling_price]' WHERE id=$id")or die(mysqli_error($link));
            ?>
           <script type="text/javascript">
               document.getElementById("success").style.display="block";
               setTimeout(function(){
                window.location="stock_master.php";
               },1000);
          </script>
           <?php
        }
?>

<!--end-main-container-part-->
<?php
include "footer.php";
?>