<?php 
session_start();
include "connection.php";
//http://153.12.3.190/ Back
$data =  new EventController;
$date = new DateTime();
    if(isset($_GET['username'])){
        $_SESSION['username'] = $_GET['username'];
    }
 
$collectionEvent =  $data->selectWhere('contect', 'status', 'Active');
$collectionEmployee = "this is only for trigger";
if(isset($_POST['btn-find-employee']))
{
    $KPK = $_POST['KPK'];
    foreach($collectionEvent as $event){
        $event_active = $event['id'];
    }
    $collectionEmployee = $data->selectWhere2('employee', 'KPK', $KPK, 'event_id', $event_active);
    
}

if(isset($_POST['btn-submitted-employee']))
{
    $KPK = $_POST['KPK'];
    $created_at = date('Y-m-d H:i:s');
    $username = $_SESSION['username'];
    $values = "CREATED_AT='$created_at', DESCRIPTION='Registered',INPUTTED_BY='$username' ";
    $response = $data->update('employee', $values, 'KPK', $KPK);
}

if(isset($_POST['btn-login'])){
    $username= $_POST['username'];
    $password= $_POST['password'];
    $response = $data->login($username,$password);
    if($response['response'] == "positive"){
        $_SESSION['username'] = $username;
        $_SESSION['login'] = 'login';
    }
}


?>
<!doctype html>
<html lang="en">
<!-- http://153.12.3.190/ -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
       <?php foreach($collectionEvent as $event)  :?>
    
        body {
            background: url("img/<?=$event['image_of_content']?>") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            }
        <?php endforeach?>    
    </style>
    <title>MATTEL EVENT </title>
</head>

<body>

       <button class="btn btn-lg btn-dark" style="margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);" onclick="showForm()">Show Form</button>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Include the Dark theme -->

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <!-- first step -->
    
        <script>
       function showForm()
        {
            (async() => {
            Swal.fire({
                title: 'INPUT KPK',
                html: `<form action="" method="post">
                     <input type="text" id="login" class="swal2-input" name="KPK" placeholder="KPK">
                     <a href="http://153.12.3.190/Employee/Dashboard" class="btn btn-success">Back</a>
                     <button class="btn btn-lg btn-primary" name="btn-find-employee" type="submit">Check</button> </form>`,
                showCancelButton: false,
                showConfirmButton: false,
                
                focusConfirm: false,
                preConfirm: () => {

                }
            }).then((result) => {

            })
        })() 
        }
    </script>


    <?php if(empty($collectionEmployee)) : ?>
    <script>
        
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: `<form action="" method="post" id="data-has-already">
                        <p class="card-description">Data  not found or not have access</p>
                     
                    </form>`,
            timer:1500,
            showConfirmButton: false,
            timerProgressBar: true,
            willOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                            b.textContent = Swal.getTimerLeft()
                        }
                    }
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
                $('#data-has-already').submit();
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
               
                $('#data-has-already').submit();
            }
        })
    </script>

    <?php else :?>
    <script>
        (async() => {
            Swal.fire({
                title: 'INPUT KPK',
                html: `<form action="" method="post">
            <input type="text" id="login" class="swal2-input" name="KPK" placeholder="KPK">
            <a href="http://153.12.3.190/Employee/Dashboard" class="btn  btn-lg btn-success">Back</a>
            <button class="btn btn-lg btn-primary" name="btn-find-employee" type="submit">Check</button> </form>`,
                showCancelButton: false,
                showConfirmButton: false,
                
                focusConfirm: false,
                preConfirm: () => {

                }
            }).then((result) => {

            })
        })()
    </script>
    <?php endif; ?>






    <?php if($collectionEmployee != "this is only for trigger") : ?>
    <?php foreach($collectionEmployee as $employee) : ?>

    <!-- if the data has been submiited -->
    <?php if($employee['DESCRIPTION'] == "Registered") : ?>
    <script>
        Swal.fire({
            title: '<?= $employee["KPK"]  ?> ',

            html: `<form action="" method="post" id="data-has-already">
                        <p class="card-description"><?= $employee["EMPLOYEE_NAME"]  ?> <br> already registered at <br> <?= $employee["CREATED_AT"]  ?></p>
                        <input type="hidden" id="login" class="swal2-input" name="KPK" value="<?=  $employee["KPK"] ?>" placeholder="KPK">
                      
                        </form>`,
            imageUrl: "../assets/images/employee/<?=  $employee["KPK"]?>.jpg",
            imageWidth: 200,
            imageHeight: 200,
            imageAlt: 'Custom image',
            timer:1500,
            showConfirmButton: false,
            timerProgressBar: true,
            willOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                            b.textContent = Swal.getTimerLeft()
                        }
                    }
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
               
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
                $('#data-has-already').submit();
            }
        })
    </script>
    <?php else : ?>
    <!-- if the data has not been submiited -->
    <script>
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({




            title: '<?= $employee["KPK"]  ?>',
            html: `
                        <p class="text-description"> <?= $employee["EMPLOYEE_NAME"] ?> </p>
       
                    `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, submit it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                 Swal.fire({


               
                    title: 'Success!',
                    html: `<form action="" method="post" id="give-access">
                        <p class="text-description"> <?= $employee["EMPLOYEE_NAME"] ?> Successfully Submitted. </p>
                        <input type="hidden" id="login" class="swal2-input" name="KPK" value="<?=  $employee["KPK"] ?>" placeholder="KPK">
                        <input type="hidden" name="btn-submitted-employee"></form>`,
                   
                    showConfirmButton: true,
                   
                   
                    
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    
                        $('#give-access').submit();
                   
                })

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                showForm();
            }
        })

        function closeSwall() {
            swal.close();
        }
    </script>
    <?php endif ?>

    <?php endforeach; ?>

    <?php endif; ?>
   

    
</body>

</html>