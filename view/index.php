<?php
session_start();

include "connection.php";
include "header.php";
$data = new EventController;
/* for show data  http://153.12.3.190/*/
$collectionEvent = $data->showAllData('contect');
$data_where = $data->selectWhere('contect','status', 'active');
foreach ($data_where as $where){
    $where_event_id =$where['id']; 
}

$collectionEmployee = $data->selectWhere2('employee','DESCRIPTION', 'Registered','event_id', $where_event_id);
$collectionEmployeeNotConfirmed  = $data->selectWhere2('employee','DESCRIPTION', '','event_id', $where_event_id);
$countEmployee = $data->selectCount('employee','event_id', $where_event_id);
foreach($countEmployee as $totalEmployee){
   $dataTotalEmployee =  $totalEmployee['COUNT(*)'];
}
$countEmployeeNotConfirmed = $data->select2CountNotEqual('employee', 'DESCRIPTION', '','event_id', $where_event_id);
$countEmployeeConfirmed = $data->select2CountNotEqual('employee', 'DESCRIPTION', 'Registered','event_id', $where_event_id);
    /* for insert data */
    if(isset($_POST['btn-simpan'])){
        // $values = "status='non-active'";
        // $response = $data->updateAll("contect", $values);
        $background = $_FILES['image_of_content'];

        $response = $data->validateImage();
        $event_name  = $_POST['event_name'];
        $status = $_POST['status'];
        if($status == "active"){
             $values = "status='non-active'";
             $data->updateAll("contect", $values);
        }
        if($response['types'] == "true"){
            $values = "'', '$response[image]', '$event_name', '$status' ";
        }
        $response = $data->insert('contect', $values);
        echo "<meta http-equiv='refresh' content='0'>";
    }
    if(isset($_POST['btn-update-event'])){
        $values = "status='non-active'";
        $response = $data->updateAll("contect", $values);
        $background =  $_FILES['image_of_content']['name'];
        $event_name  = $_POST['event_name'];
        $id_event = $_POST['id_event'];
        $status = $_POST['status'];
        if($background == ""){
            $values = "event_name='$event_name', status='$status' ";
            
        }else{
            $response = $data->validateImage();
            $values = "image_of_content ='$response[image]', event_name='$event_name', status='$status' ";
        }
        $response = $data->update("contect", $values,'id', $id_event);
        echo "<meta http-equiv='refresh' content='0'>";
    }

    if(isset($_POST['btn-reset-data'])){
     $response =   $data->deleteEventActive('employee', 'event_id',  $where_event_id);
        echo "<meta http-equiv='refresh' content='0'>";
    }
?>

        <div class="page-wrapper">
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
            </nav>
            <div class="page-content">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">Welcome to Event Report</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">
                                    Summurize for Mask Distribution Batch 2
                                </h6>
                                <div class="btn-group-md">
                                    <button class="btn btn-success">Download Data</button>
                                    <button class="btn btn-primary">Upload Data</button>
                                    <button class="btn btn-danger">Reset Data</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart" width="400" height="350"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">
                                    Realtime Data Checking
                                </h6>
        
                                    <input placeholder="Type KPK and hit ENTER" type="" name="" class="form-control">
                        
                            </div>
                            <div class="card-body">
                                
                                <table class="table table-borderless table-hover">
                                    <tr>
                                        <td>KPK</td>
                                        <th>: I00073</th> 
                                    </tr>
                                    <tr>
                                        <td>EMPLOYEE NAME</td>
                                        <th>: M LUGINA N</th>
                                    </tr>
                                    <tr>
                                        <td>EVENT NAME</td>
                                        <th>: MASK DISTRIBUTION BATCH 2</th>
                                    </tr>
                                    <tr>
                                        <td>STATUS</td>
                                        <th class="text-success">:REGISTERED</th>
                                    </tr>
                                    <tr>
                                        <td>REGISTERED BY</td>
                                        <th>: I00073</th>
                                    </tr>
                                    <tr>
                                        <td>REGISTERED AT</td>
                                        <th>: I00073</th>
                                    </tr>

                                </table>
                                <button class="btn btn-danger float-right">
                                    Unregister
                                </button>
                            </div>
                        </div>
                         <div class="card mt-2">
                            <div class="card-body">
                                <h6 class="card-title">Master Event</h6>
                                <div class="">
                                    <table class="table table-responsive" id="table-events">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <button class="btn btn-icon btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal"><i data-feather="plus" ></i> </button></th>
                                                <th>Event Image</th>
                                                <th>Event Title</th>
                                              
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($collectionEvent as $event) : ?>
                                            <tr>
                                                <td>
                                                  <!--   <button class="btn btn-primary btn-icon" data-toggle="modal" data-target="#exampleModal<?= $event['id'] ?>"><i data-feather="edit"></i></button> -->

                                                    <div class="dropdown mb-2">
                                                        <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                            <a class="dropdown-item d-flex align-items-center"  data-toggle="modal" data-target="#exampleModal<?= $event['id'] ?>"href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                                                           
                                                            <a class="dropdown-item d-flex align-items-center"   data-toggle="modal" data-target="#upload-resource<?= $event['id'] ?>" href="#"><i data-feather="upload" class="icon-sm mr-2"></i> <span class="">Upload data</span></a>
                                                        </div>
                                                     </div>
                                                </td>
                                                <td><img src="img/<?= $event['image_of_content'] ?>" alt="" width="400" height="400"></td>
                                                
                                                <?php if($event['status'] == "active") : ?>
                                                    <td class="bg-success text-white">
                                                    <?= $event['event_name'] ?>
                                                </td>
                                                <?php  elseif($event['status'] =="Non-Active") :  ?>
                                                   <td>
                                                    <?= $event['event_name'] ?>
                                                </td>
                                                <?php else:?>
                                                  <td>
                                                    <?= $event['event_name'] ?>
                                                </td>
                                                <?php  endif;  ?>    
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?= $event['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Event <?= $event['event_name'] ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post" enctype="multipart/form-data">
                                                                <input type="hidden" name="id_event" value="<?= $event['id'] ?>">
                                                                <div class="form-group">
                                                                    <label for="">Event Name</label>
                                                                    <input type="text" value="<?= $event['event_name'] ?>" name="event_name" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">status</label>
                                                                    <select name="status" id="" class="form-control">
                                                                        <option value="active">Active</option>
                                                                        <option value="non-active">Non-Active</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Background</label>
                                                                    <input type="file" class="form-control" name="image_of_content">
                                                                </div>
                                                           
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="btn-update-event" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="modal fade" id="upload-resource<?= $event['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Upload Master Data Employee for <?= $event['event_name'] ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="upload-resource" method="post" enctype="multipart/form-data">
                                                                
                                                                <div class="form-group">
                                                                    <label for="">Make Sure that type of file is Ms.Excel</label>
                                                                    <input type="file" class="form-control" name="filepegawai">
                                                                </div>
                                                                <input type="hidden" name="EVENT_ID" value="<?= $event['id'] ?>">

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="btn-simpan" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Create new data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="">Event Name</label>
                                                                    <input type="text" value="" name="event_name" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">status</label>
                                                                    <select name="status" id="" class="form-control">
                                                                        <option value="active">Active</option>
                                                                        <option value="non-active">Non-Active</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Background</label>
                                                                    <input type="file" class="form-control" name="image_of_content">
                                                                </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="btn-simpan" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    

               <!--  <div class="row">

                    <div class="col-md-8 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Registered <button class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#uploadUnregistered">Upload Registered Data</button></h6> 
                                <div class="modal fade" id="uploadUnregistered" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        ...
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <?php foreach($countEmployeeConfirmed  as $count) : ?>
                                <p class="card-description">
                                 <?= $count['COUNT(*)'] ?> out of <?= $dataTotalEmployee ?>
                                </p>
                                <?php endforeach ?>
                                <div class="table-responsive">
                                    <table class="table table-responsive" id="master_employee">
                                        <thead>
                                            <tr>
                                                <th>KPK</th>
                                                <th>Employee Name</th>
                                                <th>Date Input</th>
                                                <th>Description</th>
                                                <th>Registered By</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($collectionEmployee  as $employee) : ?>
                                            <tr>
                                                <td><?= $employee['KPK']?></td>
                                                <td><?= $employee['EMPLOYEE_NAME']?></td>
                                                <td><?= $employee['CREATED_AT'] ?></td>
                                                <td><?= $employee['DESCRIPTION'] ?>
                                                <td><?= $employee['INPUTTED_BY'] ?>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Unregistered</h6>
                                <?php foreach($countEmployeeNotConfirmed as $count) : ?>
                                <p class="card-description">
                                 <?= $count['COUNT(*)'] ?> out of <?= $dataTotalEmployee ?>
                                </p>
                                <?php endforeach ?>
                                <div class="table-responsive">
                                    <table class="table table-responsive" id="master_employee_unconfirm">
                                        <thead>
                                            <tr>
                                                <th>KPK</th>
                                                <th>Employee Name</th>
                                                                                     </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($collectionEmployeeNotConfirmed   as $employee) : ?>
                                            <tr>
                                                <td><?= $employee['KPK']?></td>
                                                <td><?= $employee['EMPLOYEE_NAME']?></td>
                                              
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div class="btn-group float-right">
                                       <form method="post"  action="" id="form-delete-event">
                                            <input type="hidden" name="btn-reset-data">
                                            <button class="btn btn-danger" type="button" id="btn-reset-data" name="" onclick="deleteEvent()">Reset data</button>
                                       </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 stretch-card mt-4">
                       
                    </div>
                   
                </div> -->
            </div>
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
                <p class="text-muted text-center text-md-left">Copyright © 2021 <a href=""target="_blank">Lugina Dev</a>. All rights reserved</p>
                <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
            </footer>
        </div>
    </div>
                                              
    <?php include"footer.php"; ?>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script type="text/javascript">
       var ctx = $('#myChart');
       var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Unregistered', 'Registered'],
                datasets: [{
                    label: '# of Votes',
                    data: [7579, 760],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                       
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                       
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


       // var ctx = $('#RegisteringMember');
       // var myChart = new Chart(ctx, {
       //      type: 'bar',
       //      data: {
       //          labels: ['M Lugina N', 'Mba Yana', 'Mas Deni'],
       //          datasets: [{
       //              label: '# of Votes',
       //              data: [779, 760, 800],
       //              backgroundColor: [
       //                  'rgba(255, 99, 132, 0.2)',
       //                  'rgba(255, 206, 86, 0.2)',
       //                  'rgba(54, 162, 235, 0.2)'
                       
       //              ],
       //              borderColor: [
       //                  'rgba(255, 99, 132, 1)',
       //                  'rgba(255, 206, 86, 0.2)',
       //                  'rgba(54, 162, 235, 1)'
                       
       //              ],
       //              borderWidth: 1
       //          }]
       //      },
       //      options: {
       //          scales: {
       //              y: {
       //                  beginAtZero: true
       //              }
       //          }
       //      }
       //  });
   </script>