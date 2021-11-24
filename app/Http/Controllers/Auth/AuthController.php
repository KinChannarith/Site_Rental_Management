<?php

namespace App\Http\Controllers\Auth;
use Auth;

use DB;
use App\Models\User;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
   
    
    // public function authenticate()
    // {
    //     $name = Auth::name();
    //     // $password = Auth::password();
    //     echo( $email);
    //     if (Auth::attempt(['name' => $name, 'password' => $password])) {
    //         // Authentication passed...
    //         return redirect()->intended('site-rental-monthly/Index');
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
    if (!empty($_POST['username']) 
    && !empty($_POST['password'])) {
        $username=$request->get('username');
        $password=$request->get('password');
        $server = '10.0.13.3';
        $domain = '@smart.local';
        $port   = 389;
        
        $ldap_connection = ldap_connect($server, $port);
            if (! $ldap_connection)
            {
                header("location: index.php");
               
                $error = 'LDAP SERVER CONNECTION FAILED';
            }
        // Help talking to AD
        ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, 0);	
        
        
        try{
            $ldap_bind = ldap_bind($ldap_connection, $username.$domain, $password);
        
        } catch (\Exception $e) {
            // return back()->withInput()
            // ->with('error',$e->getMessage());
            return back()->withInput()
            ->with('error',"Incorrect username and password.");
        }
        
        if ($ldap_bind)
                                {
                                    //add to user create 
                                    $user  = new User();
                                    $user->name=$username;
                                    $user->save();
                                    //get the user back for username
                                    $last_user = DB::table('users')->latest('created_at')->first();
                                    Auth::loginUsingId($last_user->id);
                                    //end 
                                    $lower_username = strtolower($username);
                                    

                                   
                                     if ($lower_username=='kin.channarith' || $lower_username=='leng.chisokagna' || $lower_username=='bou.sreyngim')
                                    // if ($username=='sreng.sokchea')
                                     {
                                        echo "Able to bind";

                                        // $stid =  oci_parse($conn, "select * from TBL_FTM_LOGIN_USER  WHERE username='$username' and password='$password'");
                                        // oci_execute($stid);
                                        
                                        // while (($rows = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                        //     // Use the uppercase column names for the associative array indices
                                        session_start();
                                         $_SESSION['user_login'] = "1";
                                        // @$_SESSION['user_id']=$rows[0];
                                        $_SESSION['username']=$username;
                                        
                                        // dd($_SESSION['username']);
                                        
                                        
                                        // header('Location: form.php');
                                        return redirect()->route('site-rental-payment.Index');
                                        
                                       // }
                                        $error = 'Sucess';
                                        
                                      }
                                      echo "out of condition";
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
                //    echo $error;

                


               
            }
            else{
                  $_SESSION["login_status"] = "2";
                echo 'Empty username or password';
                header('Location: login.php');
            }





        //normal authentication
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
