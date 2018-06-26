<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';





if(isset($_POST['submit'])){
    include_once 'dbh.inc.php';
        if(isset($_SESSION['shopping_cart'])){
            $benutzername = mysqli_real_escape_string($verb,$_SESSION['u_name']);
            $email = mysqli_real_escape_string($verb,$_SESSION['u_email']);
            $detail = mysqli_real_escape_string($verb,$_POST['detail']);
            //Keyversicherung
            $detail_total = mysqli_real_escape_string($verb,$_POST['detail_total']);
            $detail_total = $detail_total + 5;
            $quantity = mysqli_real_escape_string($verb,$_POST['quantity']);
 
                if($benutzername != NULL){
                    $count = count($_SESSION['shopping_cart']);
                        if(!empty($_SESSION['shopping_cart'])){
                            error_reporting(E_ALL ^ E_WARNING); 
                            $e_user = $_SESSION['u_name'];       
                            $e_detail = $_POST['detail'];
                            $e_total = $_POST['detail_total']+5;
                            $e_quantity = $_POST['quantity'];
                            
                                        // PHPMAILER
                                        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                                    
                                        //Server settings
                                        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                                        $mail->isSMTP();                                      // Set mailer to use SMTP
                                        $mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
                                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                                        $mail->Username = 'el_mario91@live.de';                 // SMTP username
                                        $mail->Password = 'peakey4web';                           // SMTP password
                                        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                                        $mail->Port = 587;                                    // TCP port to connect to

                                        //Recipients
                                        $mail->setFrom('el_mario91@live.de', 'PEAKEY');
                                        $mail->addAddress($_SESSION['u_email'], 'Joe User');     // Add a recipient
                                       //$mail->addAddress($_SESSION['u_email'], 'Joe User');     // Email Benachrichtigung bei Bestellung zB sales@peakey.de
                                        
                                        //Content
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = 'Bestellbestaetigung mit Vers.';
                                        $mail->Body    = 
                                            "<br> Hallo $e_user!!
                                            <br> Deine Bestellung bei PEAKey.de!: 
                                            <br><br>
                                            <hr>
                                            Produktbezeichnung: $e_detail
                                            <br>Anzahl: $e_quantity
                                           
                                            <br>Keyversicherung abgeschlossen!<hr><br>
                                            <br><b>Gesamt: $e_total EUR</b><br><br>
                                            <br> Vielen Dank und bis bald! 
                                            <br> Dein Peakey Team :)
                                            
                                            ";
                                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                                       $is_send = $mail->send();
                            
                            if ($is_send){
								echo '<meta http-equiv="refresh" content="0; URL=../danke.php">';
							}

                                 

                    
                            
                            $sql = "INSERT INTO orders (order_name, order_email, order_quantity,order_detail, order_total) VALUES ('$benutzername', '$email','$quantity','$detail','$detail_total');";
                            mysqli_query($verb, $sql);
                          
                            unset($_SESSION['shopping_cart']);
                            header("Location: ../danke.php?success1");
                            exit();
                        }
                    }
            
                    else{
                        header("Location: ../login.php?pleaseLogIn");
                        exit();
                    }

            }     
 }
if(isset($_POST['submit2'])){
    include_once 'dbh.inc.php';
        if(isset($_SESSION['shopping_cart'])){
            $benutzername = mysqli_real_escape_string($verb,$_SESSION['u_name']);
            $email = mysqli_real_escape_string($verb,$_SESSION['u_email']);
            $detail = mysqli_real_escape_string($verb,$_POST['detail']);
            $detail_total = mysqli_real_escape_string($verb,$_POST['detail_total']);
            $quantity = mysqli_real_escape_string($verb,$_POST['quantity']);
                if($benutzername != NULL){
                    $count = count($_SESSION['shopping_cart']);
                        if(!empty($_SESSION['shopping_cart'])){
                                $sql = "INSERT INTO orders (order_name, order_email, order_quantity,order_detail, order_total) VALUES ('$benutzername', '$email','$quantity','$detail','$detail_total');";
                                mysqli_query($verb, $sql);
                                error_reporting(E_ALL ^ E_WARNING); 
                                 $e_user = $_SESSION['u_name'];       
                            $e_detail = $_POST['detail'];
                            $e_total = $_POST['detail_total'];
                            $e_quantity = $_POST['quantity'];
                            
                                        // PHPMAILER
                                        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                                    
                                        //Server settings
                                        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                                        $mail->isSMTP();                                      // Set mailer to use SMTP
                                        $mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
                                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                                        $mail->Username = 'el_mario91@live.de';                 // SMTP username
                                        $mail->Password = 'peakey4web';                           // SMTP password
                                        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                                        $mail->Port = 587;                                    // TCP port to connect to

                                        //Recipients
                                        $mail->setFrom('el_mario91@live.de', 'PEAKEY');
                                        $mail->addAddress($_SESSION['u_email'], 'Joe User');     // Add a recipient

                                        
                                        //Content
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = 'Bestellbestaetigung ohne Vers';
                                        $mail->Body    = 
                                            "<br> Hallo $e_user!!
                                            <br> Deine Bestellung bei PEAKey.de!: 
                                            <br><br>
                                            <hr>
                                            Produktbezeichnung: $e_detail
                                            <br>Anzahl: $e_quantity
                                           
                                            <br>Keyversicherung nicht abgeschlossen!<hr><br>
                                            <br><b>Gesamt: $e_total</b><br><br>
                                            <br> Vielen Dank und bis bald! 
                                            <br> Dein Peakey Team :)
                                            
                                            ";
                                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                                       $is_send = $mail->send();
                            
                            if ($is_send){
								echo '<meta http-equiv="refresh" content="0; URL=../danke.php">';
							}

                                 
                            
                            
                            
                            
                                unset($_SESSION['shopping_cart']);
                                header("Location: ../danke.php?success2");
                                exit(); 
                            }
                    }
            
                            else{
                                header("Location: ../login.php?pleaseLogIn");
                                exit(); 
                                }

                        }
}
if(isset($_POST['submit3'])){
    include_once 'dbh.inc.php';
        if(isset($_SESSION['u_name'])){
            $benutzername = mysqli_real_escape_string($verb,$_SESSION['u_name']);
            $email = mysqli_real_escape_string($verb,$_SESSION['u_email']);
            $detail = mysqli_real_escape_string($verb,$_POST['detail']);
            $quantity = mysqli_real_escape_string($verb,$_POST['quantity']);
            $total = mysqli_real_escape_string($verb,$_POST['total']);
            $sql = "INSERT INTO orders (order_name, order_email, order_quantity,order_detail, order_total) VALUES ('$benutzername', '$email','$quantity','$detail','$total');";
            mysqli_query($verb, $sql);
            error_reporting(E_ALL ^ E_WARNING); 
                 $e_user = $_SESSION['u_name'];       
                            $e_detail = $_POST['detail'];
                            $e_total = $_POST['total'];
                            $e_quantity = $_POST['quantity'];
                            
                                        // PHPMAILER
                                        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                                    
                                        //Server settings
                                        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                                        $mail->isSMTP();                                      // Set mailer to use SMTP
                                        $mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
                                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                                        $mail->Username = 'el_mario91@live.de';                 // SMTP username
                                        $mail->Password = 'peakey4web';                           // SMTP password
                                        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                                        $mail->Port = 587;                                    // TCP port to connect to

                                        //Recipients
                                        $mail->setFrom('el_mario91@live.de', 'PEAKEY');
                                        $mail->addAddress($_SESSION['u_email'], 'Joe User');     // Add a recipient

                                        
                                        //Content
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = 'Bestellbestaetigung repeat';
                                        $mail->Body    = 
                                            "<br> Hallo $e_user!!
                                            <br> Deine Bestellung bei PEAKey.de!: 
                                            <br><br>
                                            <hr>
                                            Produktbezeichnung: $e_detail
                                            
                                           
                                            <br>Diese Bestellung wurde erneut getaetigt!<hr><br>
                                            <br><b>Gesamt: $e_total</b><br><br>
                                            <br> Vielen Dank und bis bald! 
                                            <br> Dein Peakey Team :)
                                            
                                            ";
                                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                                         $is_send = $mail->send();
                            
                            if ($is_send){
								echo '<meta http-equiv="refresh" content="0; URL=../danke.php">';
							}

                                 

                                        header("Location: ../danke.php?success3");                
                                        exit();  
                                     }
                                     else{
                                         header("Location: ../login.php?pleaseLogIn");
                                         exit();
                                        }

                            }
