<?php
session_start();
require_once 'Michelf/Parsedown.php';
// use Michelf\Markdown, Michelf\SmartyPants;

$Parsedown  = new Parsedown;

if(isset($_GET['kpk'])){
    $_SESSION['username'] = $_GET['kpk'];  
}

if(isset($_SESSION['username']) ){
    $author= $_SESSION['username'];
}else{
  echo "<script> window.location.assign('http://153.12.3.190')</script>";
}

include "connection.php";
$data = new EventController;
/* for show data */
$collectionEvent = $data->showAll('announcement');
    if(isset($_POST['simpan-data'])){
        $title = $_POST['Title'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $description = $_POST['description'];
        $notes = $_POST['notes'];
        $parent_id = rand ( 10000 , 99999 );
        $id = '';
        $response = $data->validateImage();
        $status =  $_POST['status'];
        $category = $_POST['category'];
        $created_at = date("Y-m-d");
        $updated_at = date("Y-m-d");
        $values = "'', '$title', '$start_date', '$end_date','$status','$description','$notes','$category', '$response[image]','$parent_id', '$created_at', '','$author',''  ";
       $response = $data->insert('announcement', $values);
       //var_dump($response);
       echo "<meta http-equiv='refresh' content='0'>";
    }
    if(isset($_POST['update-data'])){
        $title = $_POST['Title'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $description = $_POST['description'];
        $background =  $_FILES['image_of_content']['name'];
        $notes = $_POST['notes'];
        $parent_id = $_POST['parent_id'];
        $status =  $_POST['status'];
        $up_document = $_POST['up_document'];
        $category = $_POST['category'];
        $id = $_POST['id'];
        $created_at = date("Y-m-d");
        $created_at_past = $_POST['created_at'];
        $updated_at = date("Y-m-d");
        $created_by = $_POST['created_by'];
        if($background == ""){
            $values = "title='$title', start_date='$start_date', end_date='$end_date',status='non-active',description='$description',notes='$notes',category='$category',parent_id='$parent_id',updated_at='$updated_at',updated_by='$author' ";

            $values2 ="'', '$title', '$start_date', '$end_date','active','$description','$notes','$category','$up_document', '$parent_id','$created_at_past','$updated_at','$created_by','$author' ";
        }else{
            $response = $data->validateImage();
            $values = "title='$title', start_date='$start_date', end_date='$end_date',status='non-active',description='$description',notes='$notes',category='$category',parent_id='$parent_id', up_document='$response[image]',updated_at='$updated_at',updated_by='$author' ";


            $values2 ="'', '$title', '$start_date', '$end_date','active','$description','$notes','$category','$response[image]', '$parent_id','$created_at_past','$updated_at','$created_by','$author' ";
        }

        if($end_date == ""){
            $end_date = date("Y-m-d");
        }

        $values3 ="status='non-active'";
        $values4 ="end_date='$end_date',status='non-active'";
        $data->update('announcement', $values4,'id',$id);
        $data->update('announcement', $values3,'parent_id',$parent_id);
        $data->update('announcement', $values,'id',$parent_id);
        $response = $data->insert('announcement', $values2);
        echo "<meta http-equiv='refresh' content='0'>";
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard - HRA Devoleved by </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="_token" content="r0jm9Q0QbgITp1DcHcjKFqH5SWUojoCavOOjQpPs">
    <link rel="shortcut icon" href="../favicon.ico">
    <!-- plugin css -->
    <link href="../assets/fonts/feather-font/css/iconfont.css" rel="stylesheet" />
    <link href="../assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" />
    <link href="../assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/plugins/datatables-net/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <link href="../css/app.css" rel="stylesheet" />
    <style>
        @media (min-width: 576px) {
  .modal-dialog { max-width: none; }
}

.modal-dialog {
  width: 98%;
  height: 92%;
  padding: 0;
}

.modal-content {
  height: 99%;
}
      .CodeMirror, .CodeMirror-scroll {
             min-height: 120px;
             max-height: 120px;
        }
        .red {
            color: #ff2a00
        }
        
        .orange {
            color: #ff5900
        }
        
        .yellow {
            color: #ffee00;
        }
        
        .purple {
            color: #e3308f;
        }
        
        .high_purple {
            color: #6200d9;
        }
        
        .blue_sky {
            color: #0089d9;
        }

        .btn-custom {
            width: 180px !important;
        }
    </style>
</head>

<body data-base-url="">
    <script src="../assets/js/spinner.js"></script>
    <div class="main-wrapper" id="app">
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                    <img src="../assets/images/Mattel_logo.png" alt="" width="45" height="45">
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">
                    <li class="nav-item nav-category">Main</li>
                    <li class="nav-item ">
                        <a href="http://153.12.3.190/Employee/Dashboard" class="nav-link">
                            <i class="link-icon" data-feather="grid"></i>
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Attendance Management</li>
                    <li class="nav-item ">
                        <a href="http://153.12.3.190/Employee/Attendance" class="nav-link">
                            <i class="link-icon" data-feather="clock"></i>
                            <span class="link-title">Attendance</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="http://153.12.3.190/PublicHoliday/Index" class="nav-link">
                            <i class="link-icon" data-feather="calendar"></i>
                            <span class="link-title">Calendar</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="http://153.12.3.190/Employee/Leave" class="nav-link">
                            <i class="link-icon" data-feather="log-out"></i>
                            <span class="link-title">Leave Request <i class="link-icon text-warning" data-feather="info"></i></span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="link-icon" data-feather="tag"></i>
                            <span class="link-title">Duty Allowance <i class="link-icon text-warning" data-feather="info"></i></span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#email" role="button" aria-expanded="false" aria-controls="email">
                            <i class="link-icon" data-feather="folder"></i>
                            <span class="link-title">DMS</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse " id="email">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="http://153.12.3.190/Admin/Allemployee">Master Data</a>
                                </li>
                                <li class="nav-item">
                                    <a href="http://153.12.3.190/Admin/Details?q=<?= $author?>" class="nav-link ">Employee Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a href="http://153.12.3.190/Departements/Index" class="nav-link">Organizational Management</a>
                                </li>
                                <li class="nav-item">
                                    <a href="http://153.12.3.190/Employee/Detailkpk" class="nav-link ">KPK Management</a>
                                </li>
                                <li class="nav-item">
                                    <a href="http://153.12.3.190/Internships/Index" class="nav-link ">Internship Management</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-category">Content Management</li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="link-icon" data-feather="list"></i>
                            <span class="link-title">News <i class="link-icon text-danger" data-feather="x"></i></span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Others</li>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="email">
                            <i class="link-icon" data-feather="folder"></i>
                            <span class="link-title">Others</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse " id="emails">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="http://153.12.3.190:8080/app/view/announcement?kpk=<?= $author?>">HR Practice</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link ">Mattel Event</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link ">RAR Image(On Progress)</a>
                                </li>
                                <li class="nav-item">
                                    <a href="http://153.12.3.190/Admin/ManageKios" class="nav-link">Kios Management</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <nav class="settings-sidebar">
            <div class="sidebar-body">
                <a href="#" class="settings-sidebar-toggler">
                    <i data-feather="settings"></i>
                </a>
                <h6 class="text-muted">Sidebar:</h6>
                <div class="form-group border-bottom">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
                            Light
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
                            Dark
                        </label>
                    </div>
                </div>
            </div>
        </nav>
        <div class="page-wrapper">
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="font-weight-medium ml-1 mr-1">English</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="languageDropdown">
                                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ml-1"> English </span></a>
                                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ml-1"> French </span></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-apps">
                            <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="bell"></i>
                                <div class="indicator">
                                    <div class="circle"></div>
                                </div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="appsDropdown">
                                <div class="dropdown-header d-flex align-items-center justify-content-between">
                                    <p class="mb-0 font-weight-medium">Web Apps</p>
                                    <a href="javascript:;" class="text-muted">Edit</a>
                                </div>
                                <div class="dropdown-body">
                                    <div class="d-flex align-items-center apps">
                                        <a href="../apps/chat.html"><i data-feather="message-square" class="icon-lg"></i>
                                            <p>Chat</p>
                                        </a>
                                        <a href="../apps/calendar.html"><i data-feather="calendar" class="icon-lg"></i>
                                            <p>Calendar</p>
                                        </a>
                                        <a href="../email/inbox.html"><i data-feather="mail" class="icon-lg"></i>
                                            <p>Email</p>
                                        </a>
                                        <a href="profile.html"><i data-feather="instagram" class="icon-lg"></i>
                                            <p>Profile</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                    <a href="javascript:;">View all</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-profile">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/images/faces/face1.jpg" alt="profile">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <div class="dropdown-header d-flex flex-column align-items-center">
                                    <div class="figure mb-3">
                                        <img src="../assets/images/faces/face1.jpg" alt="">
                                    </div>
                                    <div class="info text-center">
                                        <p class="name font-weight-bold mb-0">Amiah Burton</p>
                                        <p class="email text-muted mb-3">amiahburton@gmail.com</p>
                                    </div>
                                </div>
                                <div class="dropdown-body">
                                    <ul class="profile-nav p-0 pt-3">
                                        <li class="nav-item">
                                            <a href="profile.html" class="nav-link">
                                                <i data-feather="user"></i>
                                                <span>Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:;" class="nav-link">
                                                <i data-feather="edit"></i>
                                                <span>Edit Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="http://153.12.3.190" class="nav-link">
                                                <i data-feather="log-out"></i>
                                                <span>Log Out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="page-content">
                <!-- Page content here -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">
                                    HR Practice
                                    <br>
                                    <br>
                                    <button class=" btn  btn-success btn-custom" data-toggle="modal" data-target=".bd-example-modal-xl">
                                        ADD NEW DATA
                                    </button>
                                    <!-- Extra large modal -->
                                    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-title">ADD NEW</div>
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-2 col-form-label">Title</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="" name="Title">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-2 col-form-label">start date</label>
                                                                <div class="col-sm-8">
                                                                    <input type="date" class="form-control" id="start_date" name="start_date">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <button type="button" id="start_date" onclick="resetStartDate()" class="btn btn-danger">reset start date</button>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-2 col-form-label">end date</label>
                                                                <div class="col-sm-8">
                                                                    <input type="date" class="form-control" id="end_date" min="" name="end_date">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <button type="button" id="" onclick="resetEndDate()" class="btn btn-danger">reset end date</button>
                                                                </div>
                                                            </div>
                                                            <fieldset class="form-group">
                                                                <div class="row">
                                                                    <legend class="col-form-label col-sm-2">Status</legend>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-check form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" class="form-check-input" name="status" id="status" value="active" checked="">
                                                                                Active
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" class="form-check-input" name="status" id="status value=" non-active">
                                                                                Non-Active
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-2 col-form-label">Description</label>
                                                                <div class="col-sm-10">
                                                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-2 col-form-label">Notes</label>
                                                                <div class="col-sm-10">
                                                                    <textarea name="notes" id="notes" cols="30" rows="5" class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-2 col-form-label">Category</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="category" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-2 col-form-label">Upload document</label>
                                                                <div class="col-sm-10">
                                                                    <input type="file" name="image_of_content" id="" class="custom-file-input">
                                                                    <label class="custom-file-label" for="exampleInputFile">
                                                                        Select file...
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-10">
                                                                    <button type="submit" name="simpan-data" class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="law">
                                        <thead>
                                            <tr>
                                                 <th>Action</th> 
                                                <th>Title</th>
                                                <th>start date</th>
                                                <th>end date</th>
                                                <th>status</th>
                                                <th>category</th>
                                                <th>created by</th>
                                                <th>modify by</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($collectionEvent as $value) : ?>
                                            <tr>
                                                <!-- <td>
                                                    <button type="button" class="btn btn-icon-text btn-success btn-custom  mb-2 mr-3"   data-toggle="modal" data-target=".bd-example-modal-edit<?= $value['id']?>"><i class="btn-icon-prepend" data-feather="edit"></i>Edit data</button>

                                                    <button type="button" id="btn-show" class="btn btn-icon-text btn-custom btn-primary mb-2"  data-toggle="modal" data-target=".bd-example-modal-show<?= $value['id']?>"><i class="btn-icon-prepend" data-feather="eye"></i>Detail Data</button>

                                                    <?php if($value['up_document']  == null || $value['up_document'] == "" ) :?>
                                                        <br>
                                                     <button type="button" id="btn-show" class="btn btn-icon-text btn-custom btn-danger "  ><i class="btn-icon-prepend" data-feather="download"></i>Download</button>
                                                <?php else : ?>

                                                    <a href="img/<?=$value['up_document'] ?>" download class="btn btn-custom btn-sm btn-danger">download document</a>
                                                      <br>
                                                <?php endif; ?>
                                                    <a href="detail-ann?parent_id=<?= $value['parent_id'] ?>"  class="btn btn-icon-text btn-info btn-custom ml-3"  ><i class="btn-icon-prepend" data-feather="activity"></i>Historical</a>
                                                      <br>
                                                </td> --> 
                                               <td>
                                                    <input type="radio" name="check"  class="form-check" id="active-action-button" value="<?= $value['id'] ?>"
                                                    onclick="getData(<?= $value['id'] ?>)">
                                                </td> 

                                                <td>
                                                <button type="button" id="btn-show<?=$value['id']?>" name="btn-shows" class="btn btn-icon-text btn-custom btn-default" data-toggle="modal" 
                                                        data-target=".bd-example-modal-show<?= $value['id']?>"
                                                        ></i>
                                                        <?= $value['title'] ?></button>
                                                </td>

                                                <td>
                                                    <?= $value['start_date'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['end_date'] ?>
                                                </td>
                                                <?php if($value['status'] == "active") : ?>
                                                <td class="bg-success text-white">
                                                    <?= $value['status'] ?>
                                                </td>
                                                <?php else : ?>
                                                <td class="">
                                                    <?= $value['status'] ?>
                                                </td>
                                                <?php endif ?>
                                                <td>
                                                    <?= $value['category'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['created_by'] ?> <br> At
                                                    <?= $value['created_at'] ?>
                                                </td>
                                                <?php if( $value['modify_by'] == "" ): ?>
                                                <td></td>
                                                <?php else: ?>
                                                <td>
                                                    <?= $value['modify_by'] ?> <br>At
                                                    <?= $value['updated_at'] ?>
                                                </td>
                                                <?php endif ?>
                                            </tr>
                                            <div class="modal fade bd-example-modal-edit<?= $value['id'] ?>" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                                <?= $value['title'] ?>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card-body">
                                                                <form action="" method="post" enctype="multipart/form-data">
                                                                    <div class="form-group row">
                                                                        <label for="" class="col-sm-2 col-form-label">Title</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control" id="" value="<?= $value['title'] ?>" name="Title">
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="created_by" value="<?= $value['created_by'] ?>">
                                                                    <input type="hidden" name="created_at" value="<?= $value['created_at'] ?>">
                                                                    <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                                                    <input type="hidden" name="parent_id" value="<?= $value['parent_id'] ?>">
                                                                    <input type="hidden" name="up_document" value="<?= $value['up_document'] ?>">
                                                                    <div class="form-group row">
                                                                        <label for="" class="col-sm-2 col-form-label">start date</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="date" class="form-control" value="<?= $value['start_date'] ?>" id="start_date" name="start_date">
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <button type="button" id="start_date" onclick="resetStartDate()" class="btn btn-danger">reset start date</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="" class="col-sm-2 col-form-label">end date</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="date" class="form-control" value="<?= $value['end_date'] ?>" id="end_date" min="<?= $value['start_date'] ?>" name="end_date">
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <button type="button" id="" onclick="resetEndDate()" class="btn btn-danger">reset end date</button>
                                                                        </div>
                                                                    </div>
                                                                    <fieldset class="form-group">
                                                                        <div class="row">
                                                                            <legend class="col-form-label col-sm-2">Status</legend>
                                                                            <div class="col-sm-10">
                                                                                <?php if($value['status'] == 'active') : ?>
                                                                                <div class="form-check form-check-inline">
                                                                                    <label class="form-check-label">
                                                                                        <input type="radio" class="form-check-input" name="status" id="status" value="active" checked="">
                                                                                        Active
                                                                                    </label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <label class="form-check-label">
                                                                                        <input type="radio" class="form-check-input" name="status" id="status value=" non-active">
                                                                                        Non-Active
                                                                                    </label>
                                                                                </div>
                                                                                <?php else :?>
                                                                                <div class="form-check form-check-inline">
                                                                                    <label class="form-check-label">
                                                                                        <input type="radio" class="form-check-input" name="status" id="status" value="active">
                                                                                        Active
                                                                                    </label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <label class="form-check-label">
                                                                                        <input type="radio" class="form-check-input" name="status" id="status value=" non-active" checked="">
                                                                                        Non-Active
                                                                                    </label>
                                                                                </div>
                                                                                <?php endif ?>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <div class="form-group row">
                                                                        <label for="" class="col-sm-2 col-form-label">Description</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea name="description" id="descriptions" cols="30" rows="10" class="form-control"><?= $value['description'] ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="" class="col-sm-2 col-form-label">Notes</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea name="notes" id="note" cols="30" rows="5" class="form-control"><?= $value['notes'] ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="" class="col-sm-2 col-form-label">Category</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" name="category" class="form-control" value="<?= $value['category'] ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="" class="col-sm-2 col-form-label">Upload document</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="file" name="image_of_content" id="" class="custom-file-input">
                                                                            <label class="custom-file-label" for="exampleInputFile">
                                                                                Select file...
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-10">
                                                                            <button type="submit" name="update-data" class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade bd-example-modal-show<?= $value['id'] ?>  modal-show" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog  modal-xl modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <center>
                                                            <h4 class="card-description mt-2">
                                                                <?=  $value['title']?>
                                                            </h4>
                                                        </center>
                                                        <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <div class="modal-body">
                                                            <?php $collectionEvent = $data->selectWhereCustome('announcement','parent_id',$value['parent_id']); ?>
                                                            <?php foreach( $collectionEvent as $detail  ) : ?>
                                                            <div class="col-xl-12 email-content mt-1" style="border-style: solid; border-color: #737373">
                                                                <div class="perfect-scrollbar-example">
                                                                    <div class="email-head">
                                                                        <?php if($detail['status'] == "active") : ?>
                                                                        <div class="email-head-subject ">
                                                                            <div class="title d-flex align-items-center justify-content-between">
                                                                                <div class="d-flex align-items-center">
                                                                                    <a class="active" href="#"><span class="icon"><i data-feather="star" class="text-primary-muted"></i></span></a>
                                                                                    <span class=" text-success">
                                                                                        <?= $detail['title'] ?> (Active)</span>
                                                                                </div>
                                                                                 <div class="icons">
                                                                                    <button type="button" class="btn btn-icon-text btn-lg btn-outline-default" onclick="closeModal()"  id="btn-edit" data-toggle="modal" data-target=".bd-example-modal-edit<?= $detail['id']?>"><i class="btn-icon-prepend" data-feather="edit"></i></button>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php else: ?>
                                                                        <div class="email-head-subject ">
                                                                            <div class="title d-flex align-items-center justify-content-between">
                                                                                <div class="d-flex align-items-center">
                                                                                    <a class="active" href="#"><span class="icon"><i data-feather="star" class="text-primary-muted"></i></span></a>
                                                                                    <span class="">
                                                                                        <?=  $detail['title'] ?></span>
                                                                                </div>
                                                                                <div class="icons">
                                                                                 
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php endif ?>
                                                                    </div>
                                                                    <div class="email-body ">
                                                                        <p class="lead">Description</b>:</p>
                                                                        <br>
                                                                        <p class="lead" id="description_detail<?= $value['id'] ?>">
                                                                            <h6 class="card-description" style="font-size: 20px; text-align: justify;">
                                                                                <?= $Parsedown->text($detail['description']) ?>
                                                                            </h6>
                                                                        </p>
                                                                        <br>
                                                                        <p class="lead">Notes</b></b>:</p>
                                                                        <br>
                                                                        <p class="lead" id="notes_detail<?= $value['id'] ?>">
                                                                            <h6 class="card-description" style="font-size: 20px; text-align: justify;">
                                                                                <?= $Parsedown->text($detail['notes']) ?>
                                                                            </h6>
                                                                        </p>
                                                                        <br>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="email-head-sender d-flex align-items-right justify-content-end flex-wrap ">
                                                                        <div class="card text-dark bg-light  float-right">
                                                                            <div class="card-body">
                                                                                <p class="lead badge badge-pill badge-default" style="font-size: 15px">  <i data-feather="user" class="mr-2"></i>created by
                                                                            <?= $detail['created_by'] ?> at
                                                                            <?= $detail['created_at'] ?>
                                                                              </p>
                                                                          
                                                                            <br>
                                                                                <p class="lead badge badge-pill badge-default" style="font-size: 15px">  <i data-feather="edit" class="mr-2"></i>modify by 
                                                                            <?= $detail['created_by'] ?> at
                                                                            <?= $detail['updated_at'] ?>
                                                                              </p>
                                                                       
                                                                      
                                                                            </div>
                                                                        </div>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php endforeach ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                 <?php endforeach; ?>
                                        </tbody>
                                    </table>


                                          <button type="button" class="btn btn-icon-text btn-success btn-custom  mb-2 mr-3"   data-toggle="modal" id="btn-edit-data" data-target=""><i class="btn-icon-prepend" data-feather="edit"></i>Edit data</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  Page end  end-->
            </div>
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between ">
                <p class="text-muted text-center text-md-left ">Copyright © 2020 <a href=" " target="_blank ">HRD</a>. All rights reserved</p>
                <p class="text-muted text-center text-md-left mb-0 d-none d-md-block ">Handcrafted With <i class="mb-1 text-primary ml-1 icon-small "></i></p>
            </footer>
        </div>
    </div>
    <!-- base js -->
    <script src="../js/app.js "></script>
    <script src="../js/js/tinymce/tinymce.min.js "></script>
    <script src="../assets/plugins/feather-icons/feather.min.js "></script>
    <script src="../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js "></script>
    <script src="../assets/js/template.js "></script>
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js "></script>
    <!-- plugin js -->
    <script src="../assets/plugins/jquery-steps/jquery.steps.min.js "></script>
    <!-- end plugin js -->
    <script src="../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js "></script>
    <script src="../assets/plugins/datatables-net/jquery.dataTables.js"></script>
    <script src="../assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../assets/js/wizard.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/mark.min.js" integrity="sha512-5CYOlHXGh6QpOFA/TeTylKLWfB3ftPsde7AnmhuitiTX4K5SqCLBeKro6sPS8ilsz1Q4NRx3v8Ko2IBiszzdww==" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
    <script>
    tinymce.init({
         mode : "textareas",
         height: 400,

    });
    </script>
   
    <script type="text/javascript">
    $('.modal-dialog').draggable({
        handle: ".modal-header"
    });

        function closeModal(){
            $(".modal-show").modal("hide");
        }

    
    // triger the button
    $("button[name=btn-shows]").click(function() {
        // get the id of the button
        var id = this.id;
        // join the deatil id with button id to get value from db
        var getDes = '#description_detail' + id.replace('btn-show', '');

        // join the detail id with button id to get value from db but without #
        var getDes2 = 'description_detail' + id.replace('btn-show', '');
        // get id then conce

        //  create variable to get value from db
        var getDescription = $(getDes).html();
        // alert(getDescription)
        // mark the value
        document.getElementById(getDes2).innerHTML = marked(getDescription);


        var getNot = '#notes_detail' + id.replace('btn-show', '');
        var getNot2 = 'notes_detail' + id.replace('btn-show', '');
        //  create variable to get value from db
        var getNote = $(getNot).html();

        // mark the value
        document.getElementById(getNot2).innerHTML = marked(getNote);


        console.log($('.markeds').html());

    });
    </script>
    <script>
    $('#law').DataTable();
    </script>
    <script>
    $('#start_date').change(function() {
        $('#end_date').attr('min', $('#start_date').val());

    });

    function resetEndDate() {
        $("input[id=end_date]").val("")
    }

    function resetStartDate() {
        $("input[id=start_date]").val("")
    }
    </script>
    <!--  <script>
    $('textarea').each(function() {
        var simplemde = new SimpleMDE({
            element: this,
            tabSize: 2,
        });
        simplemde.render();
    })
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <?php
      if(isset($response) && @$response['response'] == "negative") { ?>
    <script>
    swal('Error', '<?php echo $response['
        alert '] ?>', 'error');
    </script>
    <?php }else if(isset($response) && @$response['response'] == "positive"){ ?>
    <script>
    swal({
        title: "Berhasil",
        text: "",
        type: "success",
        showCancelButton: false,
        confirmButtonText: "Yes",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        if (isConfirm) {
            window.location.href = "<?php echo $response['redirect'] ?>";
        }
    });
    </script>
    <?php } ?>


    <script type="text/javascript">
        



        function getData(id)
        {
            var addnewclass='.bd-example-modal-edit'+id;
            $('#btn-edit-data').addClass(addnewclass);
            $('#btn-edit-data').attr('data-target',addnewclass);

        }


    </script>
</body>

</html>