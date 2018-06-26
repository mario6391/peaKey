<?php 
session_start();
if(isset($_POST['submit'])){
    include 'dbh.inc.php';
    $uid = mysqli_real_escape_string($verb,$_POST['uid']);
    $pwd = mysqli_real_escape_string($verb,$_POST['pwd']);
    
// Fehlerbehebung    
    // Leere Felder
    if(empty($uid) || empty($pwd)){
         header("Location: ../index.php?login=empty");
        exit();
    } 
    else{
        $sql = "SELECT * FROM users WHERE user_name='$uid'";
        $result = mysqli_query($verb, $sql);
        $resultCheck = mysqli_num_rows($result);
            // Tippfehler
            if($resultCheck <1){
                header("Location: ../login.php?error=UserVertippt?");
                exit();
            }
            else{
                if($row = mysqli_fetch_assoc($result)){
                    // Passwort verschlüsselt aus der DB
                    $hashed_password = $row['user_password'];
                        // verify Funktion für die Verschlüsselungsaufhebung
                        if( password_verify($pwd, $hashed_password)){ 
                            // SESSIONS setzen
                            $_SESSION['u_id'] = $row['user_id'];
                            $_SESSION['u_name'] = $row['user_name'];
                            $_SESSION['u_email'] = $row['user_email'];
                            header("Location: ../index.php?login=success");
                            exit();   
                        }
                        else{
                            header("Location: ../login.php?login=error=PasswortVertippt?");
                            exit();
                            }
                        }
                    }
                }
                                }else{
                                    header("Location: ../index.php?login=error");
                                    exit();
            }
