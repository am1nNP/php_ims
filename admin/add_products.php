<?php
include "header.php";
include "../user/connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
        اضافه کردن محصول</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid ">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span2l">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>اضافه کردن محصول جدید</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" name="form1" method="POST" class="form-horizontal">           
          <div class="control-group">
              <label class="control-label"> کمپانی را انتخاب کنید:</label>
              <div class="controls">
                <select class="span11" name="company_name" id="">
                    
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
              <div class="controls">
              <input type="text" class="span11" placeholder="نام محصول" name="product_name" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"> واحد را انتخاب کنید:</label>
              <div class="controls">
                <select class="span11" name="unit" id="">
                    <?php
                    $res=mysqli_query($link,"SELECT * FROM units");
                    while($row=mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $row['unit'];?>"><?php echo $row['unit'];?></option>
                        <?php                                          
                         }
                    ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"> اندازه بسته بندی را وارد کنید:</label>
              <div class="controls">
              <input type="text" class="span11" placeholder="اندازه بسته بندی" name="packing_size" required/>
              </div>
            </div>

            <div class="alert alert-danger" id="error" style="display:none">
              این  محصول وجود دارد.لطفا موارد دیگر را امتحان کنید
            </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">ذخیره</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
              محصول با موفقیت اضافه شد!
            </div>

          </form>
        </div>
        
      </div>
      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>شناسه</th>
                  <th>نام کمپانی</th>
                  <th>نام محصول</th>
                  <th>واحد</th>
                  <th>اندازه محصول</th>
                  <th>ویرایش</th>
                  <th>حذف</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $res=mysqli_query($link,"SELECT * FROM products");
                while($row=mysqli_fetch_array($res)){
                    ?>
                <tr>
                
                  <td><?php echo $row["id"];?></td>
                  <td><?php echo $row["company_name"];?></td>
                  <td><?php echo $row["product_name"];?></td>
                  <td><?php echo $row["unit"];?></td>
                  <td><?php echo $row["packing_size"];?></td>
                  <td><center><a style="color:#00A86B;font-weight:bolder;" href="edit_products.php?id=<?=$row["id"];?>">ویرایش</a></center></td>
                  <td><center><a style="color:#880808ed;font-weight:bolder;" href="delete_products.php?id=<?=$row["id"];?>">حذف</a></center></td>
                  
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

<?php
    if(isset($_POST['submit1'])){
        $count=0;
        $res=mysqli_query($link,"SELECT * FROM products WHERE company_name='$_POST[company_name]' && product_name='$_POST[product_name]' && unit='$_POST[unit]' && packing_size='$_POST[packing_size]'")or die(mysqli_error($link));
        $count=mysqli_num_rows($res);
        if($count>0){
            ?>
            <script type="text/javascript">
                document.getElementById("success").style.display="none";
                document.getElementById("error").style.display="block";
            </script>
            <?php
        }else{
           mysqli_query($link,"INSERT INTO products VALUES(NULL,'$_POST[company_name]','$_POST[product_name]','$_POST[unit]','$_POST[packing_size]')")or die(mysqli_error($link));
           ?>
           <script type="text/javascript">
               document.getElementById("error").style.display="none";
               document.getElementById("success").style.display="block";
               setTimeout(function(){
                window.location.href=window.location.href;
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