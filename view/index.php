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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                
                                <div class="btn-group-md">
                                    <button class="btn btn-warning">Reset Data</button>
                                    <button class="btn btn-primary mr-2">Upload Data</button>
                                    <button class="btn btn-success mr-2">Download Data</button>
                                </div>   
                            </div>
                              
                              
                        
                            <div class="card-body">
                              
                                        <div class="row">
                                            <div class="col-6">
                                                <div id="g4" class="gauge"></div> 
                                            </div>
                                            <div class="col-6">
                                                <div id="g3" class="gauge"></div>         
                                            </div>
                                        </div>
                                             
                                   
                              
                                            
                               
                                                              
                                   
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                          
        
                                    <input placeholder="Type KPK and hit ENTER" type="" id="input_filter" name="" class="form-control">
                                    <input type="hidden" name="" id="event_filter_id" value="<?= $where_event_id ?>">
                        
                            </div>
                            <div class="card-body">
                                
                                <table class="table table-borderless table-hover">
                                    <tr>
                                        <td>KPK</td>
                                        <th id="display_kpk"></th> 
                                    </tr>
                                    <tr>
                                        <td>EMPLOYEE NAME</td>
                                        <th id="display_name"></th>
                                    </tr>
                                    <tr>
                                        <td>EVENT NAME</td>
                                        <th id="display_event"></th>
                                    </tr>
                                    <!-- for display event  -->
                                    <p style="display: none;" id="event_active"><?php
                                    foreach($data_where as $data){
                                        echo $data['event_name'];
                                      }?></p>
                                    
                                    <!-- end display -->
                                    <tr>
                                        <td>STATUS</td>
                                        <th class="text-success" id="display_status"></th>
                                    </tr>
                                    <tr>
                                        <td>REGISTERED BY</td>
                                        <th id="display_registered"></th>
                                    </tr>
                                    <tr>
                                        <td>REGISTERED AT</td>
                                        <th id="display_registered_by"></th>
                                    </tr>

                                </table>
                                <div class="btn-group-md">
                                <button class="btn btn-success  mr-2" id="button_Register">
                                    Register
                                </button>
                                <button class="btn btn-primary " id="button_Unregistered">
                                    Unregister
                                </button>   
                                </div>
                                
                            </div>
                        </div>
                         
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Master Event</h6>
                                <div class="">
                                    <table class="table table-responsive" id="table-events">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <button class="btn btn-icon btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"><i data-feather="plus" ></i> </button></th>
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
                                            <button class="btn btn-primary" type="button" id="btn-reset-data" name="" onclick="deleteEvent()">Reset data</button>
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
   <script src="https://cdn.jsdelivr.net/npm/chartjs-gauge@0.3.0/dist/chartjs-gauge.min.js"></script>

     <script>
    /** Random integer  */
    function getRandomInt(min, max) {
      return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    document.addEventListener("DOMContentLoaded", function (event) {


      var g4 = new JustGage({
        id: "g4",
                value: 1024,
                min: 0,
                max: 8555,
                title: "Target",
                pointer: true,
                
      relativeGaugeSize: true,
        pointerOptions: {
                toplength: 10,
                bottomlength: 10,
                bottomwidth: 2,
                color: '#8e8e93'
            },
                label: "",
                displayRemaining: true
      });


      var g4 = new JustGage({
        id: 'g3',
        value: 70,
        min: 0,
        max: 100,
        symbol: '%',
        displayRemaining: true,
        relativeGaugeSize: true,
        pointer: true,
      
        pointerOptions: {
                toplength: 10,
                bottomlength: 10,
                bottomwidth: 2,
                color: '#8e8e93'
            },
        gaugeWidthScale: 0.1,
        counter: true
      });

      document.getElementById('gauge_refresh').addEventListener('click', function () {
      
        g4.refresh(getRandomInt(0, 100));
      });
    });
  </script>



   <script type="text/javascript">

       $('#input_filter').keypress(function (e) {
        var get_event_id = $('#event_filter_id').val();
        var get_kpk = $(this).val();

        
        if (e.which == 13) {
             $.ajax({
              url: "http://153.12.3.190:8080/app/view/api_event?event_id",
              type: "get", //send it through get method
              data: { 
                event_id: get_event_id, 
                kpk: get_kpk
              },
              success: function(response) {
                console.log(JSON.parse(response))
                var event_name = $('#event_active').text();
                $.each(JSON.parse(response), function( k, v ) {
                  

                  $('#display_kpk').text(v.KPK);
                  $('#display_event').text(event_name);
                  
                  $('#display_name').text(v.EMPLOYEE_NAME);
                  if(v.CREATED_AT == "0000-00-00 00:00:00"){
                    $('#display_status').removeClass('text-success');
                    $('#display_status').addClass('text-danger');
                    $('#display_status').text("Unregistered");
                    $('#display_registered_by').text("-");
                    $('#display_registered').text("-")

                    $('#button_Unregistered').attr('disabled', true);
                    $('#button_Register').attr('disabled', false);

                  }else{
                    $('#display_status').removeClass('text-danger');
                    $('#display_status').addClass('text-success');
                    $('#display_status').text(v.DESCRIPTION);
                    $('#display_registered_by').text(v.CREATED_AT);
                    $('#display_registered').text(v.INPUTTED_BY)
                    $('#button_Unregistered').attr('disabled', false);
                    $('#button_Register').attr('disabled', true)
                  }
                 
                  
                });
                 
              },
              error: function(xhr) {
                //Do Something to handle error
              }
            });

         }

        });




       // var ctx = $('#myChart');
       // var myChart = new Chart(ctx, {
       //      type: 'gauge',
       //            data: {
       //              datasets: [{
       //                value: 0.5,
       //                minValue: 0,
       //                data: [1, 2, ],
       //                backgroundColor: ['#66AB8C', '#FF533D'],
       //              }]
       //            },
       //            options: {
       //              needle: {
       //                radiusPercentage: 2,
       //                widthPercentage: 3.2,
       //                lengthPercentage: 80,
       //                color: 'rgba(0, 0, 0, 1)'
       //              },
       //              valueLabel: {
       //                display: true,
       //                formatter: (value) => {
       //                  return '$' + Math.round(value);
       //                },
       //                color: 'rgba(255, 255, 255, 1)',
       //                backgroundColor: 'rgba(0, 0, 0, 1)',
       //                borderRadius: 1,
       //                padding: {
       //                  top: 1,
       //                  bottom: 1
       //                }
       //              }
       //            }
       //  });


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