<?php 
    session_start();
    include('dbconnect.php'); 
    include('data.php');
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
    <link rel="stylesheet" href="./css/statics-style.css" />

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
                  href="index.php"
                  id="statics-nav-btn"
                >
                  <i class="bi bi-chevron-right"></i>
                  <span>Home</span>
                </a>
              </li>
              <li class="nav-item sidebar-nav-item">
                <a
                  class="nav-link sidebar-nav-link"
                  href="statics.php"
                  id="statics-nav-btn"
                >
                  <i class="bi bi-chevron-right"></i>
                  <span>Statics</span>
                </a>
              </li>
              <li class="nav-item sidebar-nav-item">
                <a
                  class="nav-link sidebar-nav-link"
                  href="profile.php"
                  id="profile-nav-btn"
                >
                  <i class="bi bi-chevron-right"></i>
                  <span>Profile</span>
                </a>
              </li>
              <li class="nav-item sidebar-nav-item">
                <a
                  class="nav-link sidebar-nav-link"
                  href="setting.php"
                  id="setting-nav-btn"
                >
                  <i class="bi bi-chevron-right"></i>
                  <span>Setting</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <h3>Statics</h3>
          <hr />
          <div class="chart-container">
              <canvas id="myChart" width="300" height="100"></canvas>

              <!-- JQuery -->
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
              <!-- ChartJS -->
              <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
              
              <script>
                  var ctx = document.getElementById("myChart");
                  var myChart = new Chart(ctx, {
                      //type: 'bar',
                      //type: 'line',
                      type: 'pie',
                      data: {
                          labels: <?=json_encode($labels)?>,
                          datasets: [{
                              label: 'Report',
                              data: <?=json_encode($data, JSON_NUMERIC_CHECK);?>,
                              backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)'
                              ],
                              borderColor: [
                                  'rgba(255,99,132,1)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)'
                              ],
                              borderWidth: 0
                          }]
                      },
                      options: {
                          scales: {
                              yAxes: [{
                                  ticks: {
                                      beginAtZero:true
                                  }
                              }]
                          },
                          responsive: true,
                          title: {
                              display: true,
                              text: 'Favorite Color'
                          }
                      }
                  });
              </script>
          </div>


          <h3>Invoice</h3>
          <hr />
          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Invoice #184382</h5>
                  <p class="card-text">
                    Donec nec justo eget felis facilisis fermentum. Aliquam
                    porttitor mauris sit amet orci. Aenean dignissim
                    pellentesque felis.
                  </p>
                  <a href="#" class="btn btn-primary">Print</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Invoice #184386</h5>
                  <p class="card-text">
                    Donec nec justo eget felis facilisis fermentum. Aliquam
                    porttitor mauris sit amet orci. Aenean dignissim
                    pellentesque felis.
                  </p>
                  <a href="#" class="btn btn-primary">Print</a>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Invoice #184389</h5>
                  <p class="card-text">
                    Donec nec justo eget felis facilisis fermentum. Aliquam
                    porttitor mauris sit amet orci. Aenean dignissim
                    pellentesque felis.
                  </p>
                  <a href="#" class="btn btn-primary">Print</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Invoice #184391</h5>
                  <p class="card-text">
                    Donec nec justo eget felis facilisis fermentum. Aliquam
                    porttitor mauris sit amet orci. Aenean dignissim
                    pellentesque felis.
                  </p>
                  <a href="#" class="btn btn-primary">Print</a>
                </div>
              </div>
            </div>
          </div>
          <h3>Invoice</h3>
          <hr />
          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Invoice #184382</h5>
                  <p class="card-text">
                    Donec nec justo eget felis facilisis fermentum. Aliquam
                    porttitor mauris sit amet orci. Aenean dignissim
                    pellentesque felis.
                  </p>
                  <a href="#" class="btn btn-primary">Print</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Invoice #184386</h5>
                  <p class="card-text">
                    Donec nec justo eget felis facilisis fermentum. Aliquam
                    porttitor mauris sit amet orci. Aenean dignissim
                    pellentesque felis.
                  </p>
                  <a href="#" class="btn btn-primary">Print</a>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Invoice #184389</h5>
                  <p class="card-text">
                    Donec nec justo eget felis facilisis fermentum. Aliquam
                    porttitor mauris sit amet orci. Aenean dignissim
                    pellentesque felis.
                  </p>
                  <a href="#" class="btn btn-primary">Print</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Invoice #184391</h5>
                  <p class="card-text">
                    Donec nec justo eget felis facilisis fermentum. Aliquam
                    porttitor mauris sit amet orci. Aenean dignissim
                    pellentesque felis.
                  </p>
                  <a href="#" class="btn btn-primary">Print</a>
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

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
