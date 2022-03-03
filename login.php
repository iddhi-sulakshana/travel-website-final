<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FontAwesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Link -->
    <link rel="stylesheet" href="css/login.css">
    <title>Login and Registration</title>
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title"> Login</span>


                <form action="#">
                    <div class="input-field">
                        <input type="text" name="email" placeholder="Enter your email" required>
                        <i class="far fa-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="password" placeholder="Enter your password" required>
                        <i class="fas fa-lock icon"></i>
                        <i class="far fa-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>

                        <a href="#"class="text">Forgot password?</a>


                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Login">
                        
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member? 
                        <a href="#" class="text signup-link">Signup now</a>
                    </span><br>
                    <span class="text">
                        <a href="index.php" class="text login-link">Go Back</a>
                    </span>
                </div>
            </div>

            <!-- Registration Form -->

            <div class="form Signup">
                <span class="title">Registration</span>

                <form action="#">
                    <div class="input-field">
                        <input type="text" name="name" placeholder="Enter your name" required>
                        <i class="far fa-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="email" placeholder="Enter your email" required>
                        <i class="far fa-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="password" placeholder="Create password" required>
                        <i class="fas fa-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="password" placeholder="Confrim password" required>
                        <i class="fas fa-lock icon"></i>
                        <i class="far fa-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="signCheck">
                            <label for="signCheck" class="text">Remember me</label>
                        </div>

                        <a href="#"class="text">Forgot password?</a>


                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Register">
                        
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already have an account?
                        <a href="#" class="text login-link">Login now</a>
                    </span><br>
                    <span class="text">
                        <a href="index.php" class="text login-link">Go Back</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <script src="js/login.js"></script>
</body>
</html>