<?php
    session_start();
    include('dbconnect.php'); 

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
    <link rel="stylesheet" href="./css/login-style.css" />

    <title>Light Up | Home</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-primary flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 head-icon" href="index.php">
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
      <ul class="nav member-nav">
        <li class="nav-item member-nav-item">
          <a class="nav-link member-nav-link login-mem-nav" href="login.php">Login</a>
        </li>
        <li class="nav-item member-nav-item">
          <p class="nav-link member-nav-link">|</p>
        </li>
        <li class="nav-item member-nav-item">
          <a class="nav-link member-nav-link signup-mem-nav" href="signup.php"
            >Sign Up</a
          >
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <main>
          <h2 class="login-head">LOGIN</h2>
          <hr />
          <form action="login_db.php" method="post">
            <div class="fill-box">
              <span class="title Username">Username</span>
              <div class="col-4 col-offset-4 user-input">
                <div class="input-group mb-3">
                  <input
                    type="text" name="username"
                    class="form-control"
                    placeholder="Username"
                    aria-label="Username"
                    aria-describedby="basic-addon1"
                  />
                </div>
              </div>
              <span class="title Password">Password</span>
              <div class="col-4 col-offset-4 user-input">
                <div class="input-group mb-3">
                  <input
                    type="password" name="password"
                    class="form-control"
                    placeholder="6-20 Character"
                    aria-label="6-20 Character"
                    aria-describedby="basic-addon1"
                  />
                </div>
              </div>
              <?php if (isset($_SESSION['error'])) : ?>
                <div style="width: 92%;
                            margin: 0px auto;
                            padding: 10px;
                            border: 1px solid #a94442;
                            color: #a94442;
                            background: #f2dede;
                            border-radius: 5px;
                            text-align: center;">
                  <h5>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                  </h5>
                </div>
              <?php endif ?>

              <button type="submit" name="login_user" class="btn btn-primary btn-lg btn-login">
                LOGIN
              </button>
              <span class="gosignup"
                >Don't have any account?<a href="signup.php" class="click-to-signup"
                  >Click here.</a
                ></span
              >
            </div>
          </form>
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

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
