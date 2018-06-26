<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


if(isset(   $_POST['submit']))
{
    include_once 'dbh.inc.php';
    $benutzername = mysqli_real_escape_string($verb,$_POST['username']);
    $email = mysqli_real_escape_string($verb,$_POST['email']);
    $passwort = mysqli_real_escape_string($verb,$_POST['password']);
    $passwort_wiederholen = mysqli_real_escape_string($verb,$_POST['password_repeat']);
    //Fehlerbehebung
    //Prüfe leere Felder
        if(empty($benutzername) || empty($email) ||empty($passwort) ||empty($passwort_wiederholen) )
        {
            header("Location: ../registrierung.php?signup=empty");
            exit();
        }
            else 
            {
            // Prüfe ob Eingabe gültig ist
                if(!preg_match("/^[a-zA-Z]*$/", $benutzername))
                    {
                    header("Location: ../registrierung.php?signup=invalidUsername");
                    exit();
                    }
                    else
                    {
                //Prüfe ob Email gültig ist
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                            {
                            header("Location: ../registrierung.php?signup=invalidEmail");
                            exit();
                            }
                        else
                        {
                            $sql = "SELECT * FROM users WHERE user_name='$benutzername'";
                            $erg = mysqli_query($verb,$sql);
                            $pruefeErg = mysqli_num_rows($erg);
                            if($pruefeErg > 0)
                            {
                                header("Location: ../registrierung.php?signup=usertaken");
                                exit();
                            } 
                            else 
                                {
                        //Passwort Verschlüsselung
                                    if($passwort == $passwort_wiederholen)
                                            {
                                            $encrypted_password = password_hash($passwort, PASSWORD_DEFAULT);

                                            //EMAIL VERSAND

                                            $user = $_POST['username'];
                                            $TableAktivierung = "Aktivierung";
                                            $Erstellt = date("Y-m-d H:i:s");
                                            $Aktivierungscode = rand(1, 99999999);

                                            $no = "nein";
                                            $sqli = "INSERT INTO Aktivierung (Aktivierungscode, Erstellt, EMail, Aktiviert) VALUES ('$Aktivierungscode', '$Erstellt', '$email', '$no');";
                                             mysqli_query($verb, $sqli);
                                            
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
                                        $mail->addAddress($_POST['email'], 'Joe User');     // Add a recipient

                                        
                                        //Content
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = 'Dein PEAKey!';
                                        $mail->Body    = 
                                            "<br> Hallo $user, :)!
                                            <br> Dein Anmeldecode lautet wie folgt: 
                                            <br><br>
                                            <hr>
                                            <b>Key</b>
                                           
                                            <br>$Aktivierungscode<hr><br>
                                            <br><br><br>
                                            <br> Klicke auf den Link --> http://localhost/myweb/webshop/check.php um deine Anmeldung abzuschließen!
                                            <br> Dein Peakey Team
                                            
                                            ";
                                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                                       $is_send = $mail->send();
                            
                            if ($is_send){
								echo '<meta http-equiv="refresh" content="0; URL=../check.php">';
							}


                                        
                                    //Einfügen des Benutzers
                                    $sql = "INSERT INTO users (user_name, user_email, user_password) VALUES ('$benutzername', '$email', '$encrypted_password');";
                                    mysqli_query($verb, $sql);
                                    header("Location: ../check.php?signup=check");
                                    exit();
                                }
                                }
    
    
                                    
                        }
                    
                    }
            }
}
