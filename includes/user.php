<!DOCTYPE html>
<?php
	 header("Access-Control-Allow-Origin: *");
   include("conn.php");
   session_start();
?>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <title>Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="tm-main" style="background-color: #8AE9C1;">
          <div class="container tm-navbar-container">
              <div class="col-xl-12">
                <nav class="navbar navbar-expand-sm">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a href="index.php" class="nav-link tm-nav-link tm-text-white active">Home</a>
                    </li>
                  </ul>
                </nav>
                <div class="col-sm-10" style="height: 110px;!important"><h1>Welcome "name"!</h1></div> <!-- If doable-->
            </div>
          </div>
    </div>
    <div style="height:50px;"></div>
<!-- petsitter info: -->
<div class="container bootstrap snippet">
    <div class="row">
    </div>
    <div class="row">
  		<div class="col-sm-5">
      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Change picture</h6>
        <input type="file" class="text-center center-block file-upload">
      </div></hr><br>
      </div><!--/col-3-- $_SESSION['ut']='p'> -->
      <? if (1!==1) {echo '<div id="petinfo" class="col-sm-5">
          <form class="form" action="##" method="post" id="registrationForm">
            <div class="form-group">
              <div class="col-m-9">
                  <label for="edit_pet"><h4>Edit Pet Name</h4></label>
                  <input type="text" class="form-control" name="edit_pet" id="edit_pet" placeholder="Enter new pet name" title="edit_pet">
                  <label for="edit_date"><h4>Edit Year of Birth</h4></label>
                  <input type="number" class="form-control" name="edit_date" id="edit_date" value="2020" min="1920" max="2020">
                  <label for="edit_size"><h4>Edit Pet Size</h4></label><br>
                  <input type="radio" id="small" name="size" value="small">
                  <label for="small">Small</label><br>
                  <input type="radio" id="med" name="size" value="med">
                  <label for="med">Medium</label><br>
                  <input type="radio" id="big" name="size" value="big">
                  <label for="big">Big</label><br>
                  <div class="col-xs-12">
                  <br>
                  <button class="btn btn-success pull-right" type="submit"></i>Update</button>
                  </div>
              </div>
            </div>
          </form></div>';} else {echo '<div id="petinfo" class="col-sm-5">
          <form class="form" action="##" method="post" id="registrationForm">
            <div class="form-group">
              <div class="col-m-9">
                  <label for="edit_pet"><h4>Edit Pet Name</h4></label>
                  <input type="text" class="form-control" name="edit_pet" id="edit_pet" placeholder="Enter new pet name" title="edit_pet">
                  <label for="edit_date"><h4>Edit Year of Birth</h4></label>
                  <input type="number" class="form-control" name="edit_date" id="edit_date" value="2020" min="1920" max="2020">
                  <label for="edit_size"><h4>Edit Pet Size</h4></label><br>
                  <input type="radio" id="small" name="size" value="small">
                  <label for="small">Small</label><br>
                  <input type="radio" id="med" name="size" value="med">
                  <label for="med">Medium</label><br>
                  <input type="radio" id="big" name="size" value="big">
                  <label for="big">Big</label><br>
                  <div class="col-xs-12">
                  <br>
                  <button class="btn btn-success pull-right" type="submit"></i>Update</button>
                  </div>
              </div>
            </div>
          </form>
      </div>';} ?>
      <div id="petsitterinfo" class="col-sm-5">
      <form class="form" action="##" method="post" id="registrationForm">
            <div class="form-group">
              <div class="col-m-9">
                  <label for="edit_pet"><h4>Edit Name</h4></label>
                  <input type="text" class="form-control" name="edit_pet" id="edit_pet" placeholder="Enter new pet name" title="edit_pet">
                  <label for="edit_pet"><h4>Edit Surname</h4></label>
                  <input type="text" class="form-control" name="edit_pet" id="edit_pet" placeholder="Enter new pet name" title="edit_pet">
                  <label for="edit_date"><h4>Edit Year of Birth</h4></label>
                  <input type="number" class="form-control" name="edit_date" id="edit_date" value="2020" min="1920" max="2020">
                  <label for="edit_date"><h4>Edit Price</h4></label>
                  <input type="number" class="form-control" name="edit_date" id="edit_date" value="0" min="0" max="30">
                  <div class="col-xs-12">
                  <br>
                  <button class="btn btn-success pull-right" type="submit"></i>Update</button>
                  </div>
              </div>
            </div>
          </form>
      </div>
    </div>
               
</div>
</body>
</html>