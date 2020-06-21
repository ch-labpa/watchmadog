<!DOCTYPE html>
<html lang="en">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="css/user.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">        
    <link rel="stylesheet" href="css/bootstrap.min.css">                                            
    <link rel="stylesheet" href="css/fontawesome-all.min.css">                                      
    <link rel="stylesheet" href="css/tooplate-style.css">
    
      <title>User Profile</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body>
<style> body {background: #5fe1aa;} </style>
    <div class="tm-main">

        <div class="tm-welcome-section">
          <div class="container tm-navbar-container">
              <div class="col-xl-12">
                <nav class="navbar navbar-expand-sm">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a href="home.html" class="nav-link tm-nav-link tm-text-white active">Home</a>
                    </li>
                    <li class="nav-item">
                      <a href="login.php" class="nav-link tm-nav-link tm-text-white">SignIn</a>
                    </li>
                    <li class="nav-item">
                      <a href="login.php" class="nav-link tm-nav-link tm-text-white">SignUp</a>
                    </li>
                  </ul>
                </nav>
            </div>
          </div>
          </div>
    </div>


<hr>
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1>Welcome "name"!</h1></div> <!-- If doable-->
    </div>
    <div class="row">
  		<div class="col-sm-3">
              

      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block file-upload">
      </div></hr><br>
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
        <hr>
          <form class="form" action="##" method="post" id="registrationForm">
            <div class="form-group">
              <div class="col-m-9">
                  <label for="edit_name"><h4>Edit First Name</h4></label>
                  <input type="text" class="form-control" name="edit_name" id="edit_name" placeholder="Enter new first name" title="edit_name">
                  <label for="edit_name"><h4>Edit Last Name</h4></label>
                  <input type="text" class="form-control" name="edit_name" id="edit_name" placeholder="Enter new last name" title="edit_name">
                  <label for="edit_date"><h4>Edit Date of Birth</h4></label>
                  <input type="date" class="form-control" name="edit_date" id="edit_date" value="2020-06-22"
                  min="1950-01-01" max="2020-06-22">

                  <label for="edit_pet"><h4>Edit Pet Name</h4></label>
                  <input type="text" class="form-control" name="edit_pet" id="edit_pet" placeholder="Enter new pet name" title="edit_pet">
                  <label for="edit_size"><h4>Edit Pet Size</h4></label><br>
                  <input type="radio" id="small" name="size" value="small">
                  <label for="small">Small</label><br>
                  <input type="radio" id="med" name="size" value="med">
                  <label for="med">Medium</label><br>
                  <input type="radio" id="big" name="size" value="big">
                  <label for="big">Big</label><br>
                  <div class="col-xs-12">
                  <br>
                  <button class="btn btn-lg btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                  <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                  </div>
              </div>
            </div>
          </form>
        <hr>
      </div>
    </div>
               
</div>
</body>
</html>