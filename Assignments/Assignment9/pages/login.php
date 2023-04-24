<?php
require_once 'classes/Pdo_methods.php';
require_once 'index.php';
class Admin extends PdoMethods {

    public function login($post){
    try {
            $pdo = new PdoMethods();
            $sql = "SELECT admin_status, admin_name FROM admins WHERE admin_email = :username AND admin_password = PASSWORD(:password)";
            $username = $_POST['username'];
            $password=$_POST['password'];
            
            $bindings = array(
                array(':username', $post['username'], 'str'),
                array(':password', $post['password'], 'str'),
            );
            
           // $stmt = $pdo->prepare($sql);

            $records = $pdo->selectBinded($sql, $bindings);
            //$records = $stmt->execute([$username, $password]);
            /** IF THERE WAS AN RETURN   ERROR STRING */

            
            /** */
            
                if(count($records)>0) {
                    /** IF THE PASSWORD IS NOT VERIFIED USING PASSWORD_VERIFY THEN RETURN FAILED, OTHERWISE RETURN SUCCESS, IF NO RECORDS ARE FOUND RETURN NO RECORDS FOUND. */
                        //var_dump($records);
                        $status = $records[0]['admin_status'];
                      
                     //   session_start();
                        $_SESSION['access'] = "accessGranted{username: $username, status: $status}";
                        $_SESSION['admin_status']=$status;
                        $name =  $records[0]['admin_name'];   
                        echo "NAME: $name";
                        $_SESSION['adminName']= $name;
                       // var_dump($name);
                       
                        return  $status;
                   
                } 
                else if(empty($post['username'])){
                    return "Email cannot be blank and must be written as a proper email";
                }
                else {
                    return "There was a problem logging in with those credentials";
                }
            
        }catch(PDOException $ex)
        {
            echo $ex;
        }
    }
}
$msg="";
if(isset($_POST['username']))
{
    $username = $_POST['username'];
    $password=$_POST['password'];

    $admin = new Admin ();
    $status =$admin->login ($_POST);

    if($status=="admin")
    {
        header("location:index.php?page=welcome");
    }
    else if ($status=="staff")
    {
        header("location:index.php?page=welcome");
    }else {
        $msg= "<h3><font color='red'>$status</font></h2>";
    }
    //die ("login: $username / $password");
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Login</title>
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <?php echo $msg;?>
        <form action="index.php?page=login" method="post">
            <input type='hidden' name='page' value="login"/>
            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" value="mdaida@admin.com" id="username" required>
             </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
             </div>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>