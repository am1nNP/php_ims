<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP IMS</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/fullcalendar.css"/>
    <link rel="stylesheet" href="css/matrix-style.css"/>
    <link rel="stylesheet" href="css/matrix-media.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/jquery.gritter.css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>


<div id="header">

    <h2 style="color: white;position: absolute">
        <a href="dashboard.html" style="color:white; margin-left: 30px; margin-top: 40px">داشبورد</a>
    </h2>
</div>



<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class="dropdown" id="profile-messages">
            <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i
                    class="icon icon-user"></i> <span class="text">کاربر</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i> پروفایل کاربری</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-check"></i> ماموریت های من</a></li>
                <li class="divider"></li>
                <li><a href="login.html"><i class="icon-key"></i> خروج</a></li>
            </ul>
        </li>


    </ul>
</div>

<!--sidebar-menu-->
<div id="sidebar">
    <ul>
        <li class="active">
            <a href="demo.php"><i class="icon icon-home"></i><span>داشبورد</span></a>
        </li>

        <li class="">
            <a href="./add_new_user.php"><i class="icon icon-user"></i><span>اضافه کردن کاربر جدید</span></a>
        </li>
        <li class="">
            <a href="./add_new_unit.php"><i class="icon icon-user"></i><span>اضافه کردن واحد جدید</span></a>
        </li>
        <li class="">
            <a href="./add_new_party.php"><i class="icon icon-user"></i><span>اضافه کردن مشتری جدید</span></a>
        </li>
        <li class="">
            <a href="./add_company.php"><i class="icon icon-user"></i><span> اضافه کردن کمپانی جدید</span></a>
        </li>
        <li class="">
            <a href="./add_products.php"><i class="icon icon-user"></i><span>اضافه کردن محصول جدید</span></a>
        </li>
        <li class="">
            <a href="./purchase_master.php"><i class="icon icon-user"></i><span>خرید</span></a>
        </li>
        <li class="">
            <a href="./sales_master.php"><i class="icon icon-user"></i><span>فروش</span></a>
        </li>
        <li class="">
            <a href="./stock_master.php"><i class="icon icon-user"></i><span>انبار</span></a>
        </li>
        <li class="">
            <a href="./view_bills.php"><i class="icon icon-user"></i><span>لیست فروش </span><span
                class="label label-important">New</span></a></a>
        </li>
    </ul>
</div>
<!--sidebar-menu-->
<div id="search">

        <a href="index.php" style="color:white"><i class="icon icon-share-alt"></i><span>خروج</span></a>

</div>