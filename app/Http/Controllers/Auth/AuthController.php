<?php

namespace App\Http\Controllers\Auth;
use Auth;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
   
    
    // public function authenticate()
    // {
    //     $email = Auth::email();
    //     // $password = Auth::password();
    //     echo( $email);
    //     if (Auth::attempt(['email' => $email, 'password' => $password])) {
    //         // Authentication passed...
    //         return redirect()->intended('dashboard');
    //     }
    // }
    public function authenticate(Request $request)
    {
    //    $credentials = array(
    //         'email' => $request->get('email'),
    //         'password' => $request->get('password'),
           
    //         // 'active' => 1
    //     );
    // echo $_POST['email'];
    if (!empty($_POST['email']) 

    && !empty($_POST['password'])) {
        $username='kin.channarith';
        $password=$request->get('password');
        $server = '10.0.13.3';
        $domain = '@smart.local';
        $port   = 389;
        
        $ldap_connection = ldap_connect($server, $port);
            if (! $ldap_connection)
            {
                        //header("location: index.php");
                $error = 'LDAP SERVER CONNECTION FAILED';
            }
        // Help talking to AD
        ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, 0);	
        $ldap_bind = ldap_bind($ldap_connection, $username.$domain, $password);
        
        
        if ($ldap_bind)
                                {

                               
                                     if ($username=='kin.channarith' || $username=='leng.chisokagna' || $username=='bou.sreyngim')
                                    // if ($username=='sreng.sokchea')
                                     {

                                        // $stid =  oci_parse($conn, "select * from TBL_FTM_LOGIN_USER  WHERE username='$username' and password='$password'");
                                        // oci_execute($stid);
                                        
                                        // while (($rows = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                        //     // Use the uppercase column names for the associative array indices
                                
                                         @$_SESSION['user_login'] = "1";
                                        // @$_SESSION['user_id']=$rows[0];
                                        @$_SESSION['user_name']=$username;

                                        header('Location: form.php');
                                        
                                       // }
                                        $error = 'Sucess';
                                        
                                      }
                                   // $error = 'Sucess';
                                }
        else
                                {
                                //header("location: index.php");
                                // $error = 'LDAP BINDING FAILED';
                                // echo "<script type='text/javascript'>alert('$error');</script>";

                                  $_SESSION["login_status"] = "1";
                                    header('Location: login.php');
                                }	
                    
                    ldap_close($ldap_connection);	
                   echo $error;

                


               
            }
            else{
                  $_SESSION["login_status"] = "2";
                echo 'Empty username or password';
                header('Location: login.php');
            }





        // normal authentication
        // if (Auth::attempt($credentials)) 
        // {
        //     return redirect()->intended('dashboard');
        // }
        // else
        // {
        //     // if fails
        // }
    }
}
