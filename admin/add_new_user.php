<?php
include "header.php";
include "../user/connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
        اضافه کردن کاربر</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid ">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span2l">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>اضافه کردن کاربر جدید</h5>
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
              <label class="control-label">نام کاربری :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="نام کاربری" name="username" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">رمزعبور</label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="رمز عبور"  name="password" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">عنوان را انتخاب کنید</label>
              <div class="controls">
                <select name="role" class="span11" required>
                    <option value="کاربر">کاربر</option>
                    <option value="ادمین">ادمین</option>
                </select>
            </div>
            </div>

            <div class="alert alert-danger" id="error" style="display:none">
              این نام کاربری وجود دارد.لطفا موارد دیگر را امتحان کنید
            </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">ذخیره</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
              کاربر با موفقیت اضافه شد!
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
                  <th>نام کاربری</th>
                  <th>عنوان</th>
                  <th>وضعیت</th>
                  <th>ویرایش</th>
                  <th>حذف</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $res=mysqli_query($link,"SELECT * FROM user_registration");
                while($row=mysqli_fetch_array($res)){
                    ?>
                <tr>
                  <td><?php echo $row["firstname"];?></td>
                  <td><?php echo $row["lastname"];?></td>
                  <td><?php echo $row["username"];?></td>
                  <td><?php echo $row["role"];?></td>
                  <td><?php echo $row["status"];?></td>
                  <td><center><a href="edit_user.php?id=<?=$row["id"];?>">ویرایش</a></center></td>
                  <td><center><a href="delete_user.php?id=<?=$row["id"];?>">حذف</a></center></td>
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
        $res=mysqli_query($link,"SELECT * FROM user_registration WHERE username='$_POST[username]'");
        $count=mysqli_num_rows($res);
        if($count>0){
            ?>
            <script type="text/javascript">
                document.getElementById("success").style.display="none";
                document.getElementById("error").style.display="block";
            </script>
            <?php
        }else{
           mysqli_query($link,"INSERT INTO user_registration VALUES(NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[role]','active')");
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