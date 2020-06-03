<?php 
  session_start();
  if (isset($_SESSION['email'])) {
  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <title>loaDay</title>
      <script src="node_modules/jquery/dist/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="main.css">
      <link rel="stylesheet" type="text/css" href="style.css">
      <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
      <script type="text/javascript" src="js/deadline.js"></script>
      <script type="text/javascript" src="js/task.js"></script>

      <script src="node_modules/countdown/countdown.js"></script>
      <script type="text/javascript" src="node_modules/moment/min/moment-with-locales.min.js"></script>
      <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
      <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

      <script>
        $(function () {
          $("#navbar").load("components/navbar.html");
          $("#deadlines").load("components/deadlines.html");
          $("#footer").load("components/footer.html");
        });

        $(document).ready(function () {
          $("#addTaskForm").submit(function (e) {
            saveTask(e);
          });
        });
      </script>
    </head>

    <body onload=getDate()>
      <div id="navbar"></div>

      <div class="container content">

        <h2 id="date"></h2>
        <div class="row">
          <progress id="bar" value="23" max="100" class="col-lg-11 col-md-12"></progress>
          <h2 class="col-lg-1 d-none d-lg-block bar-text">23%</h2>
        </div>

        <div class="row">
          <div class="col-lg-8 col-sm-12 sections">
            <div>
              <form id="addTaskForm" method="POST">
                <div class="input-group first-section">
                  <input name="taskDescription" id="taskDescription" type="text" class="form-control" aria-label="Text input with segmented dropdown button"
                    placeholder="Inserisci un nuovo task" required>
                  <div class="input-group-append">
                    <select name="taskCategory" id="taskCategory" class="form-control not-roundedL no-shadow" required>
                      <option value="none" selected disabled hidden>Categoria</option>
                      <option value="oggi">Oggi</option>
                      <option value="domani">Domani</option>
                      <option value="in futuro">In Futuro</option>
                    </select>
                    
                    <button name="addTaskButton" type="submit" class="btn btn-outline-secondary roundedR">SALVA</button>
                  </div>
                </div>
              </form>
              <p class="bg-primary text-white section-title">OGGI</p>
              <ul class="list-group section-content" id="todayTaskSection">
                
              </ul>

              <p class="bg-secondary text-white section-title">DOMANI</p>
              <ul class="list-group section-content" id="tomorrowTaskSection">
                <li class="list-group-item task">
                  <div class="row task-content">
                    <input type="checkbox" id="task1" class="task-cb">
                    <div class="col-11 text-justify text-break task-cb-label" for="task1">
                      Task 1 di domani</div>
                    <button class="btn task-delete-btn"><i class="fa fa-times"></i></button>
                  </div>
                </li>
                <li class="list-group-item task">
                  <div class="row task-content">
                    <input type="checkbox" id="task2" class="task-cb">
                    <div class="col-11 text-justify text-break task-cb-label" for="task2">
                      Task 2 di domani</div>
                    <button class="btn task-delete-btn"><i class="fa fa-times"></i></button>
                  </div>
                </li>
              </ul>

              <p class="bg-grey text-white section-title">IN FUTURO</p>
              <ul class="list-group section-content" id="somedayTaskSection">
                <li class="list-group-item task">
                  <div class="row task-content">
                    <input type="checkbox" id="task1" class="task-cb">
                    <div class="col-11 text-justify text-break task-cb-label" for="task1">
                      Task 1 boh</div>
                    <button class="btn task-delete-btn"><i class="fa fa-times"></i></button>
                  </div>
                </li>
                <li class="list-group-item task">
                  <div class="row task-content">
                    <input type="checkbox" id="task2" class="task-cb">
                    <div class="col-11 text-justify text-break task-cb-label" for="task2">
                      Task 2 di domani</div>
                    <button class="btn task-delete-btn"><i class="fa fa-times"></i></button>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-lg-4 col-md-12">
            <div id="deadlines"></div>
          </div>

        </div>
      </div>
      <div id="footer"></div>
    </body>
  </html>
<?php }
  else {
    header('HTTP/1.1 401 Unauthorized');
    exit;
  }
?>