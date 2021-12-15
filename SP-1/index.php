<?php
  session_start();
  
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
      crossorigin="anonymous"
    />
    <!--Boxicons-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />
    <!--Custom Css-->
    <link rel="stylesheet" href="./css/index-style.css" />

    <title>Light Up | Home</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-primary flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 head-icon" href="#">
        <i class="bi bi-lightbulb"></i>
        <span>Light Up</span>
      </a>
      <input
        type="text"
        class="form-control form-control-primary search-box"
        placeholder="Search..."
      />
      <button
        type="button"
        class="btn btn-light btn-outline-primary search-btn"
      >
        Search
        <i class="bi bi-search"></i>
      </button>
      <?php if (isset($_SESSION['username'])) : ?>
      <ul class="nav float-end member-nav">
        <li class="nav-item member-nav-item">
          <p class="nav-link member-nav-link"><strong><?php echo $_SESSION['username']; ?></strong></p>
        </li>
        <li class="nav-item member-nav-item">
          <p class="nav-link member-nav-link">|</p>
        </li>
        <li class="nav-item member-nav-item">
          <p class="nav-link member-nav-link"><strong><a href="index.php?logout='1'" style="color: red;">Logout</a></strong></p>
        </li>
      </ul>
      <?php endif ?>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 bg-light sidebar">
          <div class="left-sidebar">
            <ul class="nav flex-column sidebar-nav">
              <li class="nav-item sidebar-nav-item">
                <a
                  class="nav-link sidebar-nav-link"
                  href="#"
                  id="statics-nav-btn"
                >
                  <i class="bi bi-chevron-right"></i>
                  <span>Home</span>
                </a>
              </li>
              <li class="nav-item sidebar-nav-item">
                <a
                  class="nav-link sidebar-nav-link"
                  href="statics.html"
                  id="statics-nav-btn"
                >
                  <i class="bi bi-chevron-right"></i>
                  <span>Statics</span>
                </a>
              </li>

              <li class="nav-item sidebar-nav-item">
                <a
                  class="nav-link sidebar-nav-link"
                  href="profile.html"
                  id="profile-nav-btn"
                >
                  <i class="bi bi-chevron-right"></i>
                  <span>Profile</span>
                </a>
              </li>
              <li class="nav-item sidebar-nav-item">
                <a
                  class="nav-link sidebar-nav-link"
                  href="setting.html"
                  id="setting-nav-btn"
                >
                  <i class="bi bi-chevron-right"></i>
                  <span>Setting</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <main
          role="main"
          onLoad="renderTime();"
          class="col-md-9 ml-sm-auto col-lg-10 px-4"
        >
          <div class="container-fluid">
            <h3>Home</h3>
            <hr />
            <div class="table-responsive">
              <table class="table table-dark table-stat-home">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Devices Name</th>
                    <th scope="col">Devices Status</th>
                    <th scope="col">Usage</th>
                    <th scope="col">Time</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Project Manager</td>
                    <td>asd</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>JS developer</td>
                    <td>asd</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>Bird</td>
                    <td>Back-end developer</td>
                    <td>asd</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Martin</td>
                    <td>Smith</td>
                    <td>Back-end developer</td>
                    <td>asd</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Kate</td>
                    <td>Mayers</td>
                    <td>Scrum master</td>
                    <td>asd</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <h3>Usage</h3>
            <hr />
            <div id="clockDisplay" class="timebox"></div>
            <div class="row">
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Monday</h5>
                    <p class="card-des">Pattern#1125</p>
                    <p class="card-text">
                      Donec nec justo eget felis facilisis fermentum. Aliquam
                      porttitor mauris sit amet orci. Aenean dignissim
                      pellentesque felis.
                    </p>
                    <a href="#" class="link-primary">Details</a>
                    <hr />
                    <button class="btn btn-primary">Select</button>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Monday</h5>
                    <p class="card-des">Pattern#1125</p>
                    <p class="card-text">
                      Donec nec justo eget felis facilisis fermentum. Aliquam
                      porttitor mauris sit amet orci. Aenean dignissim
                      pellentesque felis.
                    </p>
                    <a href="#" class="link-primary">Details</a>
                    <hr />
                    <button class="btn btn-primary">Select</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript" src="./js/index.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
