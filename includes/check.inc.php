<?php 
session_start();
if(isset($_POST['submit'])){
    include 'dbh.inc.php';
       $uid = mysqli_real_escape_string($verb,$_POST['email']);
    
    $sql = "SELECT * FROM Aktivierung ORDER BY ID DESC LIMIT 1";
        $result = mysqli_query($verb, $sql);
        $resultCheck = mysqli_num_rows($result);
    
    
            if($row = mysqli_fetch_assoc($result)){
                if($row['Aktivierungscode'] == $_POST['Aktivierungscode']){
                    $sql = "UPDATE Aktivierung SET Aktiviert = 'Ja' ORDER BY ID DESC LIMIT 1";
                    mysqli_query($verb, $sql);
                    header("Location: ../login.php?login=success");
                    exit();   
                } else {
                        header("Location: ../check.php?login=error");
                        exit();
                        }
}
         
     }
