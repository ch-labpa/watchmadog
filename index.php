<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>WatchMaDog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400"> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  <link rel="stylesheet" href="css/fontawesome-all.min.css">
  <link rel="stylesheet" href="css/tooplate-style.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/userhandler.js"></script>
</head>
<body>
  <div class="tm-main">
    <div class="h-25 tm-welcome-section">
      <div class="container tm-navbar-container">
        <div class="row">
          <div class="col-12">
            <nav class="navbar navbar-expand-sm">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a href="#" onclick="openModal()" class="nav-link tm-nav-link">Log In / Sign up</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <div class="container text-center tm-welcome-container">
        <div class="tm-welcome">
          <img src="img/logo.png" alt="Logo">
          <p class="tm-site-description">Whether you are willing to sit pets or need someone to look after yours, <br> all can be found right here.</p>
        </div>
      </div>
    </div> <!-- end welcome section -->

    <div class="container">
      <div class="tm-search-form-container">
        <form id ="location" action="index.html" method="GET" class="form-inline tm-search-form">
            <div class="form-group tm-search-box">
              <p>Pets</p>
              <div class="custom-control custom-switch custom-switch-lg">
                <input type="checkbox" class="custom-control-input" id="customSwitch5">
                <label class="custom-control-label" for="customSwitch5"></label>
              </div>
              <p>Pet sitter</p>
              <input type="text" name="keyword" class="form-control tm-search-input" placeholder="Search by province...">
              <a href="#" class="tm-search-submit">Search</a>
            </div>
        </form>
        </div>
        
        <h2 class="mt-5">Feed</h2>
          <div style="margin-left: 0;" class="row">
              <div class="sidebar col-3 tm-bg-gray">
                      <select id="owner-sitter" class="form-control">
                          <option id="toHide" value="">What are you looking for?</option>
                          <option value="Pet">Pet</option>
                          <option value="Pet-sitter">Pet-sitter</option>
                      </select>
                      <div id="filter">
                          <form id="petForm" method="post">
                              <div id="petFilter">
                                <br>
                                  <div id="petType" class='form-check form-check-group'>
                                      <label for="dog" style='padding: 0 5px 0 0 !important'>Dog</label>
                                      <input class='pt' type="checkbox" value="dog" name="pet[]">
                                      <label for="cat" style='padding: 0 5px 0 0 !important'>Cat</label>
                                      <input class='pt' type="checkbox" value="cat" name="pet[]">
                                  </div>
                                  <br>
                                  <div id="petSize" class='form-check form-check-group'>
                                      <label for="small" style='padding: 0 5px 0 0 !important'>Small</label>
                                      <input class="sizeTypeBox" type="checkbox" value="small" name="size[]">
                                      <label for="medium" style='padding: 0 5px 0 0 !important'>Medium</label>
                                      <input class="sizeTypeBox" type="checkbox" value="medium" name="size[]">
                                      <label for="dobigg" style='padding: 0 5px 0 0 !important'>Big</label>
                                      <input class="sizeTypeBox" type="checkbox" value="large" name="size[]">
                                  </div>
                                  <br>
                                  <div>
                                    <button class="btn btn-primary" id="petSub" type="submit">Submit</button>
                                  </div>
                                </div>
                          </form>
                          <form id="petsitterForm" method="post">
                              <div id="petsitterFilter">
                                  <br>
                                  <p id="par">Max Price </p>
                                  <input id="priceSlide" name="price" type="range" min="0" max="30" value="0" onchange="updateTextInput(this.value)">
                                  <div>
                                    <br>
                                  <button class="btn btn-primary" id="petsitterSub" type="submit" style="">Submit</button>
                                </div>
                                </div>
                          </form>
                    </div>
            </div>
        <div class="col-9">
          <div class="media-boxes">
            <div class="media">
              <img src="img/dog1.jpg" alt="Image" class="mr-3" style='width:auto;height:140px;'>
              <div class="media-body tm-bg-gray">
                <div class="tm-description-box">
                  <h5 class="tm-text-blue">Vivamus eget urna vitae ante</h5>
                  <p class="mb-0"><a href="https://plus.google.com/+tooplate" target="_parent">Tooplate</a>. Thank you.</p>
                </div>
                <div class="tm-buy-box">
                  <a href="#" class="tm-bg-blue tm-text-white tm-buy">Hourly <br> rate</a>
                  <span class="tm-text-blue tm-price-tag">$5</span>
                </div>
              </div>
            </div>

            <div class="media">
              <img src="img/cat1.jpg" alt="Image" class="mr-3" style="width:auto;height:140px;">
              <div class="media-body tm-bg-pink-light">
                <div class="tm-description-box">
                  <h5 class="tm-text-pink">Proin fermentum sapien sed nisl</h5>
                  <p class="mb-0"></p>
                </div>
                <div class="tm-buy-box">
                  <a href="#" class="tm-bg-pink tm-text-white tm-buy">Hourly <br> rate</a>
                  <span class="tm-text-pink tm-price-tag">$7</span>
                </div>
              </div>
            </div> 
        </div>
    </div> <!-- .container -->
  </div> <!-- .main -->
  <footer>
  </footer>
  <div class="modal-overlay">
        <div class="ls-box">
            <div class="tab-menu">
                <a class="active logintab">Log in</a>
                <a class="signuptab">Sign up</a>
            </div>
            <div class="tab active" tab-number="1">
                <div class="heading">
                    <h3>Log in<span>Using your WatchMaDog account</span></h3>
                </div>
                
                <form id="loginform" action="" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Email" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" />
                    </div>
                    <p class="warning-text"></p>
                    <div class="btn-component">
                        <button type="submit" class="btn btn-secondary">Log in</button>
                        <a class="forgot-password" href="#">Forgot password?</a>
                    </div>
                </form>
            </div>
            <div class="tab" tab-number="2">
                <div class="heading">
                    <h3>Sign up <span>Using your email</span></h3>
                </div>
                
                <form id="signupform" action="" method="post">
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Name" />
                        </div>
                        <div class="col">
                            <label for="surname">Surname</label>
                            <input class="form-control" type="text" name="surname" placeholder="Surname" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="emailsu">Email</label>
                            <input class="form-control" type="email" name="emailsu" placeholder="Email" />
                        </div>
                        <div class="col">
                            <label for="phone">Phone number</label>
                            <input class="form-control" type="tel" name="phone" placeholder="Phone number" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="passwordsu">Password</label>
                            <input class="form-control" type="password" name="passwordsu" placeholder="Password" />
                        </div>
                        <div class="col">
                            <label for="confirmpassword">Confirm password</label>
                            <input class="form-control" type="password" name="confirmpassword" placeholder="Confirm password" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="region">Region</label>
                            <select id="region" class="form-control">
                                <option selected>Choose one...</option>
                                <option value="Abruzzo">Abruzzo</option>
                                <option value="Basilicata">Basilicata</option>
                                <option value="Calabria">Calabria</option>
                                <option value="Campania">Campania</option>
                                <option value="Emilia-Romagna">Emilia-Romagna</option>
                                <option value="Friuli-Venezia Giulia">Friuli-Venezia Giulia</option>
                                <option value="Lazio">Lazio</option>
                                <option value="Liguria">Liguria</option>
                                <option value="Lombardia">Lombardia</option>
                                <option value="Marche">Marche</option>
                                <option value="Molise">Molise</option>
                                <option value="Piemonte">Piemonte</option>
                                <option value="Puglia">Puglia (Apulia)</option>
                                <option value="Sardegna">Sardegna (Sardinia)</option>
                                <option value="Sicialia">Sicialia (Sicily)</option>
                                <option value="Toscana">Toscana (Tuscany)</option>
                                <option value="Trentino-Alto Adige">Trentino-Alto Adige (Trentino-South Tyrol)</option>
                                <option value="Umbria">Umbria</option>
                                <option value="Valle d'Aosta">Valle d'Aosta (Aosta Valley)</option>
                                <option value="Veneto">Veneto</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="birthyear">Specify your birth year</label>
                            <input class="col-lg-4 form-control" type="text" pattern="[0-9]" name="birthyear" maxlength="4" minlength="4" placeholder="eg: 1990">
                        </div>
                        <div class="col">
                            <legend class="col-form-label">Signing up as...</legend>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Options" id="optionPet" value="pet">
                                <label class="form-check-label" for="">Pet</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Options" id="optionPetSitter" value="petsitter">
                                <label class="form-check-label" for="">Pet sitter</label>
                            </div>
                        </div>
                    </div>
                    <p class="warning-text"></p>
                    <div class="btn-component">
                        <button type="submit" class="btn btn-secondary nextbtn">Next</button>
                    </div>
                </form>
            </div>
            <div class="tab" tab-number="3">
                <div class="heading">
                    <h3>Sign up <span>Fill in with your Pet's info</span></h3>
                </div>
                <form id="dogstep" action="" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Pet's name</label>
                            <input class="form-control" type="text" name="petname" placeholder="Pet's name" />
                        </div>
                        <div class="col">
                            <label for="pet">Are they a pup or kitty?</label>
                            <select id="pet" name="pet" class="form-control">
                                <option selected>Choose one...</option>
                                <option value="dog">Dog</option>
                                <option value="cat">Cat</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <legend class="col-form-label">Upload a profile picture of your pet</legend>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="petpic">
                            <label style="color: #b4b4b4; padding: .375rem .7rem" class="custom-file-label" for="customFile">Choose a profile picture</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="size">Size</label>
                        <select id="size" name="size" class="form-control">
                            <option selected>Choose one...</option>
                            <option value="small">Small 1-10 lbs</option>
                            <option value="medium">Medium 10-30 lbs</option>
                            <option value="big">Big 30+ lbs</option>
                        </select>
                    </div>
                    <div class="form-row optional pet">
                        <label for="hrpet">Max price</label>
                        <input type="range" min="5" max="30" value="18" class="slider" id="hrpet" name="hrpet">
                        <p>$<span id="hrpetop">15</span></p>
                    </div>
                    <div class="btn-component">
                        <p>By clicking "Sign up" you agree to WatchMaDog's Terms of Use.</p>
                        <button type="submit" class="btn btn-secondary nextbtn">Sign up</button>
                    </div>
                </form>
            </div>
            <div class="tab" tab-number="4">
                <div class="heading">
                    <h3>Sign up <span>Time to fill in the gaps</span></h3>
                </div>
                <form id="dogsitterstep" action="" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col">
                            <legend class="col-form-label">Upload a profile picture</legend>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="petsitterpic">
                                <label style="color: #b4b4b4; padding: .375rem .7rem" class="custom-file-label" for="customFile">Choose a profile picture</label>
                            </div>
                        </div>
                        <div class="col">
                            <label for="pettosit">What do you prefer to sit?</label>
                            <select id="pettosit" name="pettosit" class="form-control">
                                <option selected>Choose one...</option>
                                <option value="dog">Dogs</option>
                                <option value="cat">Cats</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row optional pet">
                        <label for="hrpetsitter">Hourly rate</label>
                        <input type="range" min="5" max="30" value="18" class="slider" id="hrpetsitter" name="hrpetsitter">
                        <p>$<span id="hrpetop">15</span></p>
                    </div>
                    <div class="btn-component">
                        <p>By clicking "Sign up" you agree to WatchMaDog's Terms of Use.</p>
                        <button type="submit" class="btn btn-primary nextbtn">Sign up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
