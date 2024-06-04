<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Inventaris</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="assets/style.css">

</head>



<body class="login-bg">
    <div class="container-fluid d-flex justify-content-center">

        <form class="login" method="POST" action="functions/auth.php">
            <div class="main">
                <div class="leading">
                    <img src="assets/dimensi.jpg" alt="" width="69px">
                </div>
                <div class="logo d-flex justify-content-center">Login</div>
               
            </div>
            

            <div class="input">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" >
            </div>
            <div class="input">
                <label  class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <button type="submit" class="btn btn-primary input" name="login">Submit</button>
        </form>
        
    </div>

</body>

</html>