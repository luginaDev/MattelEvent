<?php

$server = 'localhost';
$username = 'root';
$password  = "" ;
$db = 'event_at_mattel';
$connection  =  mysqli_connect($server, $username, $password, $db);
//deleteEventActive
date_default_timezone_set('Asia/Jakarta');
//update
class EventController
{
    function showAllData($table)
    {
        global $connection;
        $sql    =  "SELECT * FROM $table ";
        $query  = mysqli_query($connection,$sql);
        $data   = [];
        while($bigData = mysqli_fetch_assoc($query))
        {
            $data[] = $bigData;
        }
        return $data;
    }

    function showAll($table)
    {
        global $connection;
        $sql    =  "SELECT * FROM $table WHERE status='active'";
        $query  = mysqli_query($connection,$sql);
        $data   = [];
        while($bigData = mysqli_fetch_assoc($query))
        {
            $data[] = $bigData;
        }
        return $data;
    }
    public function select2CountNotEqual($table,$where,$whereValues,$where2,$whereValues2)
    {
        global $connection;
        $sql  = "SELECT COUNT(*) FROM $table WHERE $where = '$whereValues' AND $where2= '$whereValues2'";
        $query = mysqli_query($connection, $sql);
        while($bigData = mysqli_fetch_assoc($query))
        {
            $data[] = $bigData;
        }
      
        return $data;
    }

    public function selectCount($table,$where2,$whereValues2)
    {
        global $connection;
        $sql  = "SELECT COUNT(*) FROM $table WHERE $where2= '$whereValues2'";
        $query = mysqli_query($connection, $sql);
        while($bigData = mysqli_fetch_assoc($query))
        {
            $data[] = $bigData;
        }
      
        return $data;
    }
    
    public function selectCountNotEqual($table,$whereValues)
    {
        global $connection;
        $sql  = "SELECT COUNT(*) FROM $table WHERE $whereValues = '$whereValues' ";
        $query = mysqli_query($connection, $sql);
        while($bigData = mysqli_fetch_assoc($query))
        {
            $data[] = $bigData;
        }
      
        return $data;
    }

    public function validateImage(){
        global $connection;
        $name 		= $_FILES['image_of_content']['name'];
        $ukuranFile = $_FILES['image_of_content']['size'];
        $error 		= $_FILES['image_of_content']['error'];
        $tmpName 	= $_FILES['image_of_content']['tmp_name'];
        $folder = 'img/';
        $extensiGambar 		= explode('.', $name);
        $namaGambar 		= $extensiGambar[0];
        $ekstensiBelakang 	= strtolower(end($extensiGambar));
        $ekstensi 			= ['jpg','jpeg','png','gif','pdf'];
        $error 				= array();

        if (in_array($ekstensiBelakang, $ekstensi) === false) {
            return ['response' => 'negative', 'alert' => 'Gambar hanya boleh menggunakan ekstensi jpg,jpeg,png'];
        }

        if ($ukuranFile > 4000000) {
            return ['response' => 'negative', 'alert' => 'Ukuran gambar terlalu besar'];
        }

        if (empty($errors)) {
            if (!file_exists('img')) {
                mkdir('img', 0563);
            }

        }
        $name = random_int(1, 999);
        $name = time() . $name . "." . $ekstensiBelakang;
        move_uploaded_file($tmpName, $folder . $name);

        return ['types' => 'true', 'image' => $name];
    }

    
    public function insert($table, $values)
    {
        global $connection;
        $sql   = "INSERT INTO $table VALUES($values)";
        $query = mysqli_query($connection, $sql);
        if($query)
        {
            return ['response' => 'positive', 'alert'=> 'Berhasil Menambahkan data'];
        }else
        {
            return ['response' => 'negative', 'alert' => 'Gagal Menambahkan data'];
        }
    }

    public function deleteEventActive($table,$where, $whereValues){
        global $connection;
        $sql = "DELETE FROM employee WHERE event_id='$whereValues'";
        $query = mysqli_query($connection, $sql);
        if($query){
                return ['response'=>'positive', 'alert'=>'Berhasil Hapus Data'];
        }else{
                return ['response'=>'negative', 'alert'=>'Gagal Hapus Data'];
        }
    }

    public function update($table,$value, $where, $whereValues)
    {
        global $connection;
        $sql =  "UPDATE $table SET $value WHERE $where ='$whereValues' ";
        $query = mysqli_query($connection, $sql);
        if($query){
            return ['response' => 'positive', 'alert'=> 'Berhasil Update data'];
        }else{
            return ['response' => 'negatives', 'alert'=> 'Gagal Update data'];
        }
    }

    public function updateAll($table,$values)
    {
        global $connection;
        $sql =  "UPDATE $table SET $values WHERE status='active'";
        $query = mysqli_query($connection, $sql);
        if($query){
            return ['response' => 'positives', 'alert'=> 'Berhasil Update data'];
        }else{
            return ['response' => 'negatives', 'alert'=> 'Gagal Update data'];
        } 
    }

    public function selectWhere($table, $where, $whereValues)
    {
        global $connection;
        $sql 			= "SELECT * FROM $table WHERE $where='$whereValues' ";
        $query 			= mysqli_query($connection, $sql);
        $data   = [];
        while($bigData = mysqli_fetch_assoc($query))
        {
            $data[] = $bigData;
        }
        return $data;
    } 


    public function selectWhere2($table, $where, $whereValues, $where2, $whereValues2)
    {
        global $connection;
        $sql            = "SELECT * FROM $table WHERE $where = '$whereValues' AND $where2 = '$whereValues2'";
        $query          = mysqli_query($connection, $sql);
        $data   = [];
        while($bigData = mysqli_fetch_assoc($query))
        {
            $data[] = $bigData;
        }
        return $data;
    } 

     public function selectWhereCustome($table, $where, $whereValues)
    {
        global $connection;
        $sql            = "SELECT * FROM $table WHERE $where='$whereValues' ORDER BY ID DESC ";
        $query          = mysqli_query($connection, $sql);
        $data   = [];
        while($bigData = mysqli_fetch_assoc($query))
        {
            $data[] = $bigData;
        }
        return $data;
    } 




    public function login($username, $password)
	{
	    global $connection;

	    $sql   = "SELECT * FROM user WHERE username ='$username'";
	    $query = mysqli_query($connection, $sql);
	    $rows  = mysqli_num_rows($query);
	    $assoc = mysqli_fetch_assoc($query);
	    if ($rows > 0) {
	        if ($assoc['password'] == md5($password)) {
	            return ['response' => 'positive', 'alert' => 'Berhasil Login'];
	        } else {
	        return ['response' => 'negative', 'alert' => 'Password Salah'];
	        }
	        } else {

	        return ['response' => 'negative', 'alert' => 'Username atau Password Salah'];
	     }
     }
     




     public function register($username, $password, $confirm_password, $created_at,$created_by)
	    {
	    	global $connection;
	        $sql   = "SELECT * FROM user WHERE username = '$username'";
	        $query = mysqli_query($connection, $sql);

	        $rows = mysqli_num_rows($query);

	        if (strlen($username) < 6) {
	            return ['response' => 'negative', 'alert' => 'username minimal 6 Huruf'];
	        }

	        if ($rows == 0) {
	            $username = strtolower(htmlspecialchars($username));
	            $password = htmlspecialchars($password);
	            $confirm_password  = htmlspecialchars($confirm_password);

	            if ($password == $confirm_password) {
	                $password = MD5($password);
	                $sql      = "INSERT INTO user VALUES('$username','$password','$created_at','$created_by')";
	                $query    = mysqli_query($connection, $sql);
	                if ($query) {
	                    return ['response' => 'positive', 'alert' => 'Registrasi Berhasil'];
	                } else {
	                    return ['response' => 'negative', 'alert' => 'Registrasi Error'];
	                }
	            } else {
	                return ['response' => 'negative', 'alert' => 'Password Tidak Cocok'];
	            }

	        } else if ($rows == 1) {

	            return ['response' => 'negative', 'alert' => 'Username telah digunakan'];
	        }

    	}


        /* rest api  */

        public function getJsonEmployee()
        {
            global $connection;
            $sql = "SELECT *  FROM EMPLOYEE";
            $sql2 = "SELECT COUNT(*) as x FROM employee WHERE DESCRIPTION <> 'Confirmed' ";
            $query = mysqli_query($connection, $sql);

            $data = [];
          
            foreach ($query as $row) {
            $data[] = $row;
            }
       
            return json_encode($data);
        }

}



