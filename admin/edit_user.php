<?php
include "header.php";
include "../user/connection.php";
$id=$_GET["id"];
$firstname="";
$lastname="";
$username="";
$password="";
$status="";
$role="";
$res=mysqli_query($link,"SELECT * FROM user_registration WHERE id=$id");
while($row=mysqli_fetch_array($res)){
    $firstname=$row["firstname"];
    $lastname=$row["lastname"];
    $username=$row["username"];
    $password=$row["password"];
    $status=$row["status"];
    $role=$row["role"];
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            خانه</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span2l">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>ویرایش کردن کاربر</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" name="form1" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">نام :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="نام" name="firstname" value="<?=$firstname;?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">نام خانوادگی :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="نام خانوادگی" name="lastname" value="<?=$lastname;?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">نام کاربری :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="نام کاربری" name="username" value="<?=$username;?>" readonly/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">رمزعبور</label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="رمز عبور"  name="password" value="<?=$password;?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">عنوان را انتخاب کنید</label>
              <div class="controls">
                <select name="role" class="span11">
                    <option  value="کاربر">کاربر</option>
                    <option  value="ادمین">ادمین</option>
                </select>
            </div>
            <div class="control-group">
              <label class="control-label">وضعیت را انتخاب کنید</label>
              <div class="controls">
                <select name="status" class="span11">
                    <option  value="فعال">فعال</option>
                    <option  value="راکد">راکد</option>
                </select>
            </div>
            </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">بروزرسانی</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
              کاربر با موفقیت ویرایش شد!
            </div>

          </form>
        </div>
        </div>

    </div>
</div>
<?php
if(isset($_POST['submit1'])){
mysqli_query($link,"UPDATE user_registration SET firstname='$_POST[firstname]',lastname='$_POST[lastname]',password='$_POST[password]',role='$_POST[role]',status='$_POST[status]' WHERE id=$id")
or die(mysqli_error($link));
?>
<script type="text/javascript">
document.getElementById("success").style.display="block";
setTimeout(function(){
 window.location.href="add_new_user.php";
},1000);
</script>
<?php
}
?>
<!--end-main-container-part-->
<?php
include "footer.php";
?>