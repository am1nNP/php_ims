<?php
include "header.php";
include "../user/connection.php";
$id=$_GET["id"];
$firstname="";
$lastname="";
$businessname="";
$contact="";
$address="";
$city="";
$res=mysqli_query($link,"SELECT * FROM party_info WHERE id=$id");
while($row=mysqli_fetch_array($res)){
    $firstname=$row["firstname"];
    $lastname=$row["lastname"];
    $businessname=$row["businessname"];
    $contact=$row["contact"];
    $address=$row["address"];
    $city=$row["city"];
}
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
          <h5>ویرایش کردن مشتری </h5>
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
              <label class="control-label">نام کسب و کار :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="نام کسب و کار" name="businessname" value="<?=$businessname;?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">اطلاعات تماس</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="اطلاعات تماس"  name="contact" value="<?=$contact;?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">آدرس</label>
              <div class="controls">
                <textarea class="span11" name="address" id="" cols="30" rows="10"><?=$address;?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">شهر</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="شهر"  name="city" value="<?=$city;?>" required/>
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">بروزرسانی</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
              مشتری با موفقیت ویرایش شد!
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
mysqli_query($link,"UPDATE party_info SET firstname='$_POST[firstname]',lastname='$_POST[lastname]',businessname='$_POST[businessname]',contact='$_POST[contact]',address='$_POST[address]',city='$_POST[city]' WHERE id=$id")
or die(mysqli_error($link));
?>
<script type="text/javascript">
document.getElementById("success").style.display="block";
setTimeout(function(){
 window.location.href="add_new_party.php";
},1000);
</script>
<?php
}
?>
<!--end-main-container-part-->
<?php
include "footer.php";
?>