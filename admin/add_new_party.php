<?php
include "header.php";
include "../user/connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
        اضافه کردن مشتری</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid ">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span2l">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>اضافه کردن مشتری جدید</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" name="form1" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">نام :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="نام" name="firstname" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">نام خانوادگی :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="نام خانوادگی" name="lastname" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">نام کسب و کار :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="نام کسب و کار" name="businessname" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">اطلاعات تماس</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="اطلاعات تماس"  name="contact" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">آدرس</label>
              <div class="controls">
                <textarea class="span11" name="address" id="" cols="30" rows="10"></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">شهر</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="شهر"  name="city" required/>
              </div>
            </div>
            <div class="alert alert-danger" id="error" style="display:none">
              این نام کاربری وجود دارد.لطفا موارد دیگر را امتحان کنید
            </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">ذخیره</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
              مشتری با موفقیت اضافه شد!
            </div>

          </form>
        </div>
        
      </div>
      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>نام</th>
                  <th>نام خانوادگی</th>
                  <th>نام کسب و کار</th>
                  <th>اطلاعات تماس</th>
                  <th>آدرس</th>
                  <th>شهر</th>
                  <th>ویرایش</th>
                  <th>حذف</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $res=mysqli_query($link,"SELECT * FROM party_info");
                while($row=mysqli_fetch_array($res)){
                    ?>
                <tr>
                  <td><?php echo $row["firstname"];?></td>
                  <td><?php echo $row["lastname"];?></td>
                  <td><?php echo $row["businessname"];?></td>
                  <td><?php echo $row["contact"];?></td>
                  <td><?php echo $row["address"];?></td>
                  <td><?php echo $row["city"];?></td>
                  <td><center><a href="edit_party.php?id=<?=$row["id"];?>">ویرایش</a></center></td>
                  <td><center><a href="delete_party.php?id=<?=$row["id"];?>">حذف</a></center></td>
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
           mysqli_query($link,"INSERT INTO party_info VALUES(NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[businessname]','$_POST[contact]','$_POST[address]','$_POST[city]')")
           or die(mysqli_error($link));
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
?>
<!--end-main-container-part-->
<?php
include "footer.php";
?>