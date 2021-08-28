<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>ADMIN HRA</title>
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
    <!-- end plugin css -->
    <!-- common css -->
    <link href="../assets/plugins/datatables-net/dataTables.bootstrap4.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">


    <link href="../css/app.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- end common css -->
    <style type="text/css">
        .size-3 {
            width: 148%;
        }
    </style>

</head>

<body data-base-url="">

    <script src="../assets/js/spinner.js"></script>
    <div class="main-wrapper" id="app">
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                  Admin<span>HRA</span>
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
                       
                        <li class="nav-item ">
                            <a href="http://153.12.3.190/Employee/Dashboard"
                                class="nav-link">
                                <i class="link-icon" data-feather="clock"></i>
                                <span class="link-title">Attendance</span>
                            </a>
                        </li>
                       
                        <li class="nav-item ">
                            <a href="http://153.12.3.190/Employee/Dashboard"
                                class="nav-link">
                                <i class="link-icon" data-feather="clock"></i>
                                <span class="link-title">Attendance Master</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="http://153.12.3.190/Employee/Dashboard" class="nav-link">
                                <i class="link-icon" data-feather="calendar"></i>
                                <span class="link-title">Calendar</span>
                            </a>
                        </li>
                     
                    </li>
                    
                        <li class="nav-item nav-category">Admin Area</li>
                        
                        <div class="nav-item ">
                            <a href="http://153.12.3.190/Employee/Dashboard" class="nav-link">
                                <i class="link-icon" data-feather="git-pull-request"></i>
                                <span class="link-title">Hierarchy</span>
                            </a>
                        </div>
                        <div class="nav-item ">
                            <a href="http://153.12.3.190/Employee/Dashboard" class="nav-link">
                                <i class="link-icon" data-feather="external-link"></i>
                                <span class="link-title">Leave Management</span>
                            </a>
                        </div>

                        <div class="nav-item ">
                            <a href="http://153.12.3.190/Employee/Dashboard" class="nav-link">
                                <i class="link-icon" data-feather="check-square"></i>
                                <span class="link-title">Leave Balanced</span>
                            </a>
                        </div>
                        <div class="nav-item ">
                        <a href="http://153.12.3.190/Employee/Dashboard" class="nav-link">
                            <i class="link-icon" data-feather="check-square"></i>
                            <span class="link-title">Report</span>
                        </a>
                    </div>
                    
                        <li class="nav-item nav-category">My Team Area</li>
                        <div class="nav-item ">
                            <a href="http://153.12.3.190/Employee/Dashboard" class="nav-link">
                                <i class="link-icon" data-feather="layers"></i>
                                <span class="link-title">Leave Requisition</span>
                            </a>
                        </div>
                   
                        <li class="nav-item nav-category">ESS</li>
                    
                        <li class="nav-item ">
                            <a href="http://153.12.3.190/Employee/Dashboard" class="nav-link">
                                <i class="link-icon" data-feather="log-out"></i>
                                <span class="link-title">Leave Request</span>
                            </a>
                        </li>
                   
                        <li class="nav-item">
                            <a href="http://153.12.3.190/Employee/Dashboard" class="nav-link">
                                <i class="link-icon" data-feather="tag"></i>
                                <span class="link-title">Duty Allowance </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://153.12.3.190/Employee/Dashboard" class="nav-link">
                                <i class="link-icon" data-feather="user-plus"></i>
                                <span class="link-title">Personal Requisition </span>
                            </a>
                        </li>
                    
                        <li class="nav-item nav-category">DMS</li>
                  
                    <li class="nav-item ">
                     
                        <li class="nav-item">
                            <a href="http://153.12.3.190/Employee/Dashboard" class="nav-link ">
                                <i class="link-icon" data-feather="database"></i>
                                <span class="link-title"> Master Data</span></a>
                        </li>
                        
                        <li class="nav-item ">
                            <a href="http://153.12.3.190/Employee/Dashboard" class="nav-link">
                                <i class="link-icon" data-feather="edit-3"></i>
                                <span class="link-title">Management Staff</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://153.12.3.190/Employee/Dashboard" class="nav-link ">
                                <i class="link-icon" data-feather="users"></i>
                                <span class="link-title"> Employee Profile</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="http://153.12.3.190/Employee/Dashboard" class="nav-link ">
                                <i class="link-icon" data-feather="bar-chart-2"></i>
                                <span class="link-title"> Employee Dashboard</span></a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="http://153.12.3.190/Employee/Dashboard" class="nav-link">
                                <i class="link-icon" data-feather="grid"></i>
                                <span class="link-title">
                                    Organizational Management</span></a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="http://153.12.3.190/Employee/Dashboard" class="nav-link "> <i class="link-icon"
                                    data-feather="printer"></i>
                                <span class="link-title"> KPK Management</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="http://153.12.3.190/Employee/Dashboard" class="nav-link "> <i class="link-icon"
                                    data-feather="printer"></i>
                                <span class="link-title"> Internship Management</span></a>
                        </li>
                       
                    </li>
                   
                        <li class="nav-item nav-category">Others</li>
                   
                        <li class="nav-item">
                            <a href="http://153.12.3.190:8080/app/view/announcement" class="nav-link "> <i class="link-icon" data-feather="clipboard"></i>
                                <span class="link-title">
                                    HR Practice </span></a>
                        </li>
                   
                        <li class="nav-item">
                            <a href="http://153.12.3.190:8080/app/view/Event" class="nav-link "><i class="link-icon" data-feather="bell"></i>
                                <span class="link-title"> Mattel Event</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="http://153.12.3.190:8080/app/view/Index" class="nav-link "><i class="link-icon" data-feather="bell"></i>
                                <span class="link-title">Event Report</span></a>
                        </li>
                    
                        <li class="nav-item">
                            <a href="" class="nav-link "><i class="link-icon" data-feather="crop"></i>
                                <span class="link-title"> RAR Image(On Progress)</span></a>
                        </li>
                    
                        <li class="nav-item">
                            <a href="/Role/Index" class="nav-link "><i class="link-icon" data-feather="layers"></i>
                                <span class="link-title">Role Management</span></a>
                        </li>
                 
                    </li>
                    <li class="nav-item nav-category">
                        Uniform Management
                       
                            <li class="nav-item">
                                <a href="/Admin/ManageKios" class="nav-link "><i class="link-icon"
                                        data-feather="shopping-bag"></i>
                                    <span class="link-title">Uniform Management</span></a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="/Uniform/Index" class="nav-link "><i class="link-icon" data-feather="bar-chart-2"></i>
                                    <span class="link-title">Uniform Distribution</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="/Uniform/Index" class="nav-link "><i class="link-icon" data-feather="refresh-cw"></i>
                                    <span class="link-title">Uniform Inventory</span></a>
                            </li> -->
                      
                        <!-- <li class="nav-item">
                            <a href="/Uniform/Index" class="nav-link "><i class="link-icon" data-feather="user-plus"></i>
                                <span class="link-title">Uniform Registration (Alpha)</span></a>
                        </li> -->
                        <li class="nav-item">
                            <a href="/Uniform/NewSystem" class="nav-link "><i class="link-icon"
                                    data-feather="user-plus"></i>
                                <span class="link-title">Uniform Registration (Beta)</span></a>
                        </li>
                            
                            <li class="nav-item">
                                <a href="/Uniform/Others" class="nav-link "><i class="link-icon" data-feather="book-open"></i>
                                    <span class="link-title">Uniform(Others)</span></a>
                            </li>
                           
                    </li>
                </ul>
            </div>
        </nav>