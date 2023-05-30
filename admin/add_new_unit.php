<?php
include "header.php";
include "../user/connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
        اضافه کردن واحد</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid ">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span2l">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>اضافه کردن واحد جدید</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" name="form1" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">نام واحد:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="نام واحد" name="unitname" required/>
              </div>
            </div>
            

            <div class="alert alert-danger" id="error" style="display:none">
              این نام واحد وجود دارد.لطفا موارد دیگر را امتحان کنید
            </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">ذخیره</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
              واحد با موفقیت اضافه شد!
            </div>

          </form>
        </div>
        
      </div>
      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>شناسه</th>
                  <th>نام واحد</th>
                  <th>ویرایش</th>
                  <th>حذف</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $res=mysqli_query($link,"SELECT * FROM units");
                while($row=mysqli_fetch_array($res)){
                    ?>
                <tr>
                
                  <td><?php echo $row["id"];?></td>
                  <td><?php echo $row["unit"];?></td>
                  <td><center><a style="color:#00A86B;font-weight:bolder;" href="edit_unit.php?id=<?=$row["id"];?>">ویرایش</a></center></td>
                  <td><center><a style="color:#880808ed;font-weight:bolder;" href="delete_unit.php?id=<?=$row["id"];?>">حذف</a></center></td>
                  
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
        $res=mysqli_query($link,"SELECT * FROM units WHERE unit='$_POST[unitname]'")or die(mysqli_error($link));
        $count=mysqli_num_rows($res);
        if($count>0){
            ?>
            <script type="text/javascript">
                document.getElementById("success").style.display="none";
                document.getElementById("error").style.display="block";
            </script>
            <?php
        }else{
           mysqli_query($link,"INSERT INTO units VALUES(NULL,'$_POST[unitname]')");
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