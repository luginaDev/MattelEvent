<?php
include "connection.php";
include "header.php";
$data = new EventController;
$date = new DateTime();
/* for show data */
if(isset($_POST['save-user'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $created_at = date('Y-m-d H:i:s');
    $created_by = "LuginaDev";
   $response = $data->register($username, $password,$confirm_password,$created_at,$created_by);
   
}
$collectionUser  =  $data->showAllData('user');
?>
        <div class="page-wrapper">
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
            </nav>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-7 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Master User</h6>
                             
                                <div class="table-responsive">
                                    <table class="table table-responsive" id="master_employee">
                                        <thead>
                                            <tr>
                                               <th>Username</th>
                                                <th>Created At</th>
                                                <th>Created By</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($collectionUser  as $employee) : ?>
                                            <tr>
                                                <td><?= $employee['username']?></td>
                                                <td><?= $employee['created_at']?></td>
                                                <td><?= $employee['created_by'] ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">create new user</h6>
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" class="form-control" name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">confirm password </label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                        <span id='message'></span>
                                    </div>
                                    <div class="form-group">
                                       <button class="btn btn-primary" name="save-user">submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
                <p class="text-muted text-center text-md-left">Copyright © 2020 <a href="https://www.nobleui.com/" target="_blank">NobleUI</a>. All rights reserved</p>
                <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
            </footer>
        </div>
    </div>
                                               
    <?php include"footer.php"; ?>
    <script>
        $('#password, #confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
        } else 
            $('#message').html('Not Matching').css('color', 'red');
        });
    </script>