<?php
    session_start();
    if (isset($_SESSION['user'])) $auth = true;
    else $auth = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>WatchMaDog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400"> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  <link rel="stylesheet" href="css/fontawesome-all.min.css">
  <link rel="stylesheet" href="css/main.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/userhandler.js"></script>
</head>
<body>
  <div class="navbar-mobile">
    <img src="img/logo.png" alt="Watchmadog">
    <ul class="navbar-nav ml-auto">
      <?php if (!$auth) { ?>
        <li class="nav-item">
          <a href="#" onclick="openModal()" class="nav-link tm-nav-link">Log In / Sign up</a>
        </li>
        <?php } else { ?>
        <li class="nav-item">
          <a href="profile.php" class="nav-link tm-nav-link"><i class="fas fa-user"></i> My Profile</a>
        </li>
        <li class="nav-item">
        <a href="includes/logout.php" class="nav-link tm-nav-link"><i class="fas fa-sign-out-alt"></i> Log out</a>
        </li>
        <?php } ?>
      </ul>
  </div>
  <div class="tm-main">
    <div class="h-25 tm-welcome-section">
      <div class="container tm-navbar-container">
        <div class="row">
          <div class="col-12">
            <nav class="navbar navbar-expand-sm">
              <ul class="navbar-nav ml-auto">
              <?php if (!$auth) { ?>
                <li class="nav-item">
                  <a href="#" onclick="openModal()" class="nav-link tm-nav-link">Log In / Sign up</a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                  <a href="profile.php" class="nav-link tm-nav-link"><i class="fas fa-user"></i> My Profile</a>
                </li>
                <li class="nav-item">
                <a href="includes/logout.php" class="nav-link tm-nav-link"><i class="fas fa-sign-out-alt"></i> Log out</a>
                </li>
                <?php } ?>
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
        <form id="search" action="" method="GET" class="form-inline tm-search-form">
            <div class="form-group switch">
              <p>Pets</p>
              <div class="custom-control custom-switch custom-switch-lg">
                <input type="checkbox" class="custom-control-input" id="mode">
                <label class="custom-control-label" for="mode"></label>
              </div>
              <p>Pet sitter</p>
            </div>
            <div class="autocomplete form-group flex-fill">
              <input type="text" name="keyword" class="form-control tm-search-input" id="search-input" placeholder="Search by province...">
            </div>
            <a href="#" class="tm-search-submit">Search</a>
        </form>
      </div>
    </div>
      
      <div class="container">
          <div style="margin-left: 0;" class="row main">
              <div class="sidebar col-3 tm-bg-gray">
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
                                  <div class="form-row optional pet">
                                    <label for="hrpetsitterfilter">Hourly rate</label>
                                    <input onchange="updateTextInput(this.value)" type="range" min="5" max="30" value="18" class="slider" id="hrpetsitterfilter" name="hrpetsitterfilter">
                                    <p>$<span id="hrpetfilterop">15</span></p>
                                  </div>
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
                            <label for="province">Province</label>
                            <select name="province" id="province" class="form-control">
                                <option selected>Choose one...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="birthyear">Specify your birth year</label>
                            <input class="col-lg-4 form-control" type="number" name="birthyear" maxlength="4" minlength="4" placeholder="eg: 1990">
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
                            <input type="file" class="custom-file-input" name="file">
                            <label style="color: #b4b4b4; padding: .375rem .7rem" class="custom-file-label" for="petpic">Choose a profile picture</label>
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
                                <input type="file" class="custom-file-input" name="file">
                                <label style="color: #b4b4b4; padding: .375rem .7rem" class="custom-file-label" for="petsitterpic">Choose a profile picture</label>
                            </div>
                        </div>
                        <div class="col">
                            <label for="pettosit">What do you prefer to sit?</label>
                            <select id="pettosit" name="pettosit" class="form-control">
                                <option selected>Choose one...</option>
                                <option value="dog">Dogs</option>
                                <option value="cat">Cats</option>
                                <option value="both">Both</option>
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
    <script>
      function autocomplete(inp, arr) {
        var currentFocus;

        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;

            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;

            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");

            this.parentNode.appendChild(a);

            for (i = 0; i < arr.length; i++) {

            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {

                b = document.createElement("DIV");

                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);

                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";

                b.addEventListener("click", function(e) {

                    inp.value = this.getElementsByTagName("input")[0].value;

                    closeAllLists();
                });
                a.appendChild(b);
            }
            }
        });
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                currentFocus++;
                addActive(x);
            } else if (e.keyCode == 38) {
                currentFocus--;
                addActive(x);
            } else if (e.keyCode == 13) {
                e.preventDefault();
                if (currentFocus > -1) {
                    if (x) x[currentFocus].click();
                }
            }
        });
        function addActive(x) {
            if (!x) return false;
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }
        function closeAllLists(elmnt) {
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }
    var provinces = [
      'Agrigento',
      'Alessandria',
      'Ancona',
      'Aosta',
      'Arezzo',
      'Ascoli Piceno',
      'Asti',
      'Avellino',
      'Bari',
      'Barletta-Andria-Trani',
      'Belluno',
      'Benevento',
      'Bergamo',
      'Biella',
      'Bologna',
      'Bolzano',
      'Brescia',
      'Brindisi',
      'Cagliari',
      'Caltanissetta',
      'Campobasso',
      'Carbonia-Iglesias',
      'Caserta',
      'Catania',
      'Catanzaro',
      'Chieti',
      'Como',
      'Cosenza',
      'Cremona',
      'Crotone',
      'Cuneo',
      'Enna',
      'Fermo',
      'Ferrara',
      'Firenze',
      'Foggia',
      'Forlì-Cesena',
      'Frosinone',
      'Genova',
      'Gorizia',
      'Grosseto',
      'Imperia',
      'Isernia',
      'La Spezia',
      'L\'Aquila',
      'Latina',
      'Lecce',
      'Lecco',
      'Livorno',
      'Lodi',
      'Lucca',
      'Macerata',
      'Mantova',
      'Massa-Carrara',
      'Matera',
      'Messina',
      'Milano',
      'Modena',
      'Monza e della Brianza',
      'Napoli',
      'Novara',
      'Nuoro',
      'Olbia-Tempio',
      'Oristano',
      'Padova',
      'Palermo',
      'Parma',
      'Pavia',
      'Perugia',
      'Pesaro e Urbino',
      'Pescara',
      'Piacenza',
      'Pisa',
      'Pistoia',
      'Pordenone',
      'Potenza',
      'Prato',
      'Ragusa',
      'Ravenna',
      'Reggio Calabria',
      'Reggio Emilia',
      'Rieti',
      'Rimini',
      'Roma',
      'Rovigo',
      'Salerno',
      'Medio Campidano',
      'Sassari',
      'Savona',
      'Siena',
      'Siracusa',
      'Sondrio',
      'Taranto',
      'Teramo',
      'Terni',
      'Torino',
      'Ogliastra',
      'Trapani',
      'Trento',
      'Treviso',
      'Trieste',
      'Udine',
      'Varese',
      'Venezia',
      'Verbano-Cusio-Ossola',
      'Vercelli',
      'Verona',
      'Vibo Valentia',
      'Vicenza',
      'Viterbo',
    ];
    autocomplete(document.getElementById('search-input'), provinces);
    console.log(provinces)
    $.each(provinces, function(i, v){
      var $option = $('<option>').val(v).text(v);
      $('#province').append($option);
    })
  </script>
</body>
</html>
