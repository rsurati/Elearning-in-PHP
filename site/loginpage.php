<!DOCTYPE html>

<?php require 'header.php';?>
<div class="container col-lg-6 col-md-6 col-sm-6">
    <div class="card mt-5">
        <div class="card-header">
            <nav class="nav" style="font-weight: bold;">
                <a class="nav-link active" href="../home.html"><h4>Home</h4></a>
                <a class="nav-link " href="register.php" ><h4>Register</h4></a>
            </nav>
        </div>
        <div class="card-body">
            <form method="post">
                
                <div class="form-group">

                    <label for="exampleInputName">User Name</label>

                    <input class="form-control" id="exampleInputName" type="text" name="uname" value="" >

                </div>
                <div class="form-group">

                    <label for="exampleInputPassword">Password</label>

                    <input class="form-control" id="exampleInputPassword" type="password" name="pass" value="" >

                </div>
                <button type="submit" class="btn btn-primary btn-block" value="LOGIN">LOGIN</button>
            </form>  
            <br>
            <?php error_reporting(0);
                                    if(isset($_GET['Error']))
                                    {
                                    echo '<div class="alert alert-danger">'.$_GET['Error'].'</div> ';}?> 
        </div>
        <div class="container"><a href="forgot.php">Forgot Password?</a></div><br>
    </div>

        <?php
    require_once  'dbconnect.php';
    session_start();
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $user=$_POST['uname'];
        $pass=$_POST['pass'];
        $flag=FALSE;
        if($user!=null && $pass!=null)
        {
            try 
            {
                $b="select * from user";
                $stmt = $conn->prepare($b);
                $stmt->execute();
                $users = $stmt->fetchAll();
                foreach($users as $data)
                {
                    if($data['User_Name']==$user && $data['User_Password']==$pass)
                    {
                        if($data['User_Role']=='user')
                        {
                        $_SESSION['user']=$user;
                        header('Location:User/User_Topic.php');
                        break;
                        }
                        else if($data['User_Role']=='manager')
                        {
                        $_SESSION['manager']=$user;
                        header('Location:Manager/Manager_Dashboard.php');
                        break;
                        }
                        else if($data['User_Role']=='admin')
                        {
                        $_SESSION['admin']=$user;
                        header('Location:Admin/Admin_Dashboard.php');
                        break;
                        }
                    }
                    else
                    {
                        header('Location:loginpage.php?Error=Please enter valid User name and Password');
                    }
                                                                                                        
                }            
                         
                
                    
               
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
            $conn=NULL;
        }
        else
        {
            echo '<div class="alert alert-warning" role="alert">Enter All Data </div>';
        }
     }
?>
        
    
</div>


<?php require 'footer.php';?>