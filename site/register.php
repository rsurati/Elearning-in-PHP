<?php require './header.php';?>

     <div class="container col-lg-6 col-md-6 col-sm-10">

       <div class="card card-register mx-auto mt-5">

           <div class="card-header"><h5>Register an Account</h5></div>

         <div class="card-body">

           <form method="post" action="register.php">


             <div class="form-group">

               <div class="form-row">

                 <div class="col-md-12">

                   <label for="exampleInputName">Username</label>

                   <input class="form-control" type="text"   name="username" value="" >

                 </div>

               </div>

             </div>

             <div class="form-group">

               <label for="exampleInputEmail1">Email address</label>

               <input class="form-control"  type="email"  name="email" required>

             </div>

             <div class="form-group">

               <div class="form-row">

                 <div class="col-md-6">

                   <label for="exampleInputPassword1">Password</label>

                   <input class="form-control"  type="password" name="password_1" >

                 </div>

                <div class="col-md-6">

                   <label for="exampleInputPassword1">Confirm Password</label>

                   <input class="form-control"  type="password" name="password_2" >

                 </div>

               </div>

             </div>

              <button type="submit" class="btn btn-primary btn-block" name="reg_user">Register</button>

           </form>

           <div class="text-center">

               <a class="d-block small mt-3" href="loginpage.php">Login Page</a>

           <!--- <a class="d-block small" href="forgot-password.html">Forgot Password?</a>-->

           </div>

         </div>

       </div>

     

     <!-- Bootstrap core JavaScript-->
     
     <?php
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $usname=$_POST['username'];
            $password=$_POST['password_1'];
            $password_2=$_POST['password_2'];
            $email=$_POST['email'];
            if($usname!=null && $password!=null && $email!=null && $password_2!=null)
            {
                if($password==$password_2)
                {
                    try{
                        require_once 'dbconnect.php';

                        $sql = "INSERT INTO `user`(`User_Name`, `User_Email`, `User_Password`) VALUES ('$usname','$email','$password')";

                       
                        $flag=$conn->exec($sql);
                      

                        if ($flag == TRUE) {
                            echo '<div class="alert alert-success" role="alert">New User created successfully</div>';
                        }
                        else {
                            echo '<div class="alert alert-warning" role="alert">New User can not created successfully</div>';
                        }
                        
                    }
                    catch (PDOException $e)
                    {
                        echo "Error: " . $sql . "<br>" . $e->getMessage();
                    }
                    $conn=null;
                }
                else
                {
                    echo '<div class="alert alert-warning" role="alert">Enter same value of password and confirm password</div>';
                }
            }
            else 
            {
                echo '<div class="alert alert-warning" role="alert">Enter All Data </div>';
            }
        }
     ?>
 </div>
<?php require './footer.php';?>