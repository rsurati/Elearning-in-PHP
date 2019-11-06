<!DOCTYPE html>

<?php require 'header.php';?>
<div class="container col-lg-6 col-md-6 col-sm-6">
    <div class="card mt-5">
        <div class="card-header">
            <nav class="nav" style="font-weight: bold;">
                <a class="nav-link active" href="../home.html"><h4>Home</h4></a>
                <a class="nav-link " href="register.php" ><h4>Register</h4></a>
                <a class="nav-link " href="loginpage.php" ><h4>Login</h4></a>
            </nav>
        </div>
        <div class="card-body">
            <form method="post">
            
                <div class="form-group">

                    <label for="exampleInputName">User Name</label>

                    <input class="form-control" id="exampleInputName" type="text" name="uname" value="" >

                </div>
                <div class="form-group">

                    <label for="">Email</label>

                    <input class="form-control" id="" type="email" name="email" value="" >

                </div>
                <div class="form-group">

                    <label for="">Password to Chanege</label>

                    <input class="form-control" id="" type="password" name="pass" >

                </div>
                <button type="submit" class="btn btn-primary btn-block" value="Submit">Submit</button>
            </form>  
            <br>
          
        </div>
    </div>

        <?php
    require_once  'dbconnect.php';
    session_start();
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $user=$_POST['uname'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $flag=FALSE;
        if($user!=null && $email!=null && $pass!=null)
        {
            try 
            { 
                $b="select * from user";
                $stmt = $conn->prepare($b);
                $stmt->execute();
                $users = $stmt->fetchAll();
                foreach($users as $data)
                {
                    if($data['User_Name']==$user && $data['User_Email']==$email)
                    {
                        $stmt=$conn->prepare("UPDATE user SET User_Password='".$pass."' WHERE User_ID=".$data["User_ID"]);
                        
                       if($stmt->execute())
                       {
                        header('Location:loginpage.php?Error=password changed');
                        }
                        else
                        {
                         header('Location:loginpage.php?Error=Please enter valid User name and Password');
                        }
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