<?php
include "header.php";
include "../user/connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
        اضافه کردن خرید</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid ">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span2l">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>اضافه کردن خرید جدید</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" name="form1" method="POST" class="form-horizontal">           
          <div class="control-group">
              <label class="control-label"> کمپانی را انتخاب کنید:</label>
              <div class="controls">
                <select class="span11" name="company_name" id="company_name" onchange="select_company(this.value)">
                    <option>select</option>
                    <?php
                    $res=mysqli_query($link,"SELECT * FROM company_name");
                    while($row=mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $row['company_name'];?>"><?php echo $row['company_name'];?></option>
                        <?php
                    }
                    ?>
                </select>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label"> نام محصول را وارد کنید:</label>
              <div class="controls" id="product_name_div">
              <select class="span11" name="product_name">
                    <option value="">select</option>
                </select>              
            </div>
            </div>

            <div class="control-group">
              <label class="control-label"> واحد را انتخاب کنید:</label>
              <div class="controls" id="unit_div">
                <select class="span11">
                <option value="">select</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"> اندازه بسته بندی را وارد کنید:</label>
              <div class="controls" id="packing_size_div">
              <select class="span11">
                <option value="">select</option>
                </select>
              </div>
            </div>

            
            <div class="control-group">
              <label class="control-label">  تعداد را وارد کنید:</label>
              <div class="controls">
              <input type="text" class="span11" placeholder="تعداد را وارد کنید" name="qty" value="0" required/>                
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">  قیمت را وارد کنید:</label>
              <div class="controls">
              <input type="text" class="span11" placeholder="قیمت را وارد کنید" name="price" value="0" required/>                
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"> مشتری را انتخاب کنید:</label>
              <div class="controls">
                <select class="span11" name="party_name">
                <?php
                    $res=mysqli_query($link,"SELECT * FROM party_info");
                    while($row=mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $row['businessname'];?>"><?php echo $row['businessname'];?></option>
                        <?php
                    }
                    ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"> روش پرداخت را انتخاب کنید:</label>
              <div class="controls">
                <select class="span11" name="purchase_type">
                <option value="">select</option>
                <option value="cash">cash</option>
                <option value="credit-card">credit-card</option>
                <option value="papal">papal</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">  قیمت را وارد کنید:</label>
              <div class="controls">
              <input type="date" class="span11" placeholder="YYYY-MM-dd" name="expire_date" required pattern="\d{4}-\y{2}-\d{4}"/>                
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">ذخیره</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
              خرید با موفقیت اضافه شد!
            </div>

          </form>
        </div>
        
      </div>
      
      
    </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    function select_company(company_name){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange= function (){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById("product_name_div").innerHTML=xmlhttp.responseText;
            } 
        };
        xmlhttp.open("GET","forajax/load_product_using_company.php?company_name="+company_name,true);
        xmlhttp.send();
    }

    function select_product(product_name,company_name){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange= function (){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById("unit_div").innerHTML=xmlhttp.responseText;
            } 
        };
        xmlhttp.open("GET","forajax/load_unit_using_products.php?product_name="+product_name+"&company_name="+company_name,true);
        xmlhttp.send();
    }

    function select_unit(unit,product_name,company_name){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange= function (){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                document.getElementById("packing_size_div").innerHTML=xmlhttp.responseText;
            } 
        };
        xmlhttp.open("GET","forajax/load_packingsize_using_unit.php?unit="+unit+"&product_name="+product_name+"&company_name="+company_name,true);
        xmlhttp.send();
}
</script>

<?php
    if(isset($_POST['submit1'])){
      mysqli_query($link,"INSERT INTO purchase_master VALUES(NULL,'$_POST[company_name]','$_POST[product_name]','$_POST[unit]'
      ,'$_POST[packing_size]','$_POST[qty]','$_POST[price]','$_POST[party_name]','$_POST[purchase_type]','$_POST[expire_date]')")or die(mysqli_error($link));
      $count=0;
      $res=mysqli_query($link,"SELECT * FROM stock_master WHERE product_company='$_POST[company_name]' && product_name='$_POST[product_name]'
      && product_unit='$_POST[unit]'")or die(mysqli_error($link));
      $count=mysqli_num_rows($res);

      if($count==0){
        mysqli_query($link,"INSERT INTO stock_master VALUES(NULL,'$_POST[company_name]','$_POST[product_name]'
        ,'$_POST[unit]','$_POST[packing_size]','$_POST[qty]','0')")or die(mysqli_error($link));
      }
      else{
        mysqli_query($link,"UPDATE stock_master SET product_qty=product_qty+'$_POST[qty]' WHERE product_company='$_POST[company_name]' && product_name='$_POST[product_name]'
        && product_unit='$_POST[unit]'")or die(mysqli_error($link));
      }
      ?>
      <script type="text/javascript">
        document.getElementById("success").style.display="block";
      </script>
      <?php
  }
?>
<!--end-main-container-part-->
<?php
include "footer.php";
?>