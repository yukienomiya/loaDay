<?php 
  session_start();
  if(isset($_SESSION['email']))
  {
    // carica i task dell'utente
    require('../backend/getTasks.php');
    // elimina dal db le deadline scadute
    require('../backend/deleteOldDeadline.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>loaDay - Home Page</title>
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
      <div id="refresh" class="row">
        <progress id="bar" value="<?= $percentuale ?>" max="100" class="mb-3 col-lg-11 col-md-12"></progress>
        <h2 class="col-lg-1 d-none d-lg-block bar-text"><?= $percentuale ?>%</h2>
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
              <?php
                if(mysqli_num_rows($todayTasks))
                {
                  while($row = mysqli_fetch_row($todayTasks))
                  {
              ?>
                    <li class="list-group-item task">
                      <div class="row task-content">
                        <input type="text" name="taskID" value="<?= $row[0] ?>" hidden>
                        <input type="checkbox" class="task-cb" name="taskCB" onclick="completeTask()" <?php if($row[2] == 1) echo 'checked' ?>>
                        <div class="col-11 text-justify text-break task-cb-label <?php if($row[2] == 1) echo 'completedTask' ?>">
                          <?= $row[1] ?>
                        </div>
                        <button class="btn task-delete-btn" onclick="deleteTask()"><i class="fa fa-times"></i></button>
                      </div>
                    </li>
              <?php 
                  }
                }
                if(!(mysqli_num_rows($todayTasks)))
                {
              ?>
                  <li id="noTask" class="list-group-item task">
                  <div class="row task-content">
                    <div class="col-11 no-tasks">
                      Nessun task in programma
                    </div>
                  </div>
                  </li>
              <?php
                }
              ?>
            </ul>

            <p class="bg-secondary text-white section-title">DOMANI</p>
            <ul class="list-group section-content" id="tomorrowTaskSection">
              <?php
                if(mysqli_num_rows($tomorrowTasks))
                {
                  while($row = mysqli_fetch_row($tomorrowTasks))
                  {
              ?>
                    <li class="list-group-item task">
                      <div class="row task-content">
                        <input type="text" name="taskID" value="<?= $row[0] ?>" hidden>
                        <input type="checkbox" class="task-cb" name="taskCB" onclick="completeTask()" <?php if($row[2] == 1) echo 'checked' ?>>
                        <div class="col-11 text-justify text-break task-cb-label <?php if($row[2] == 1) echo 'completedTask' ?>">
                          <?= $row[1] ?>
                        </div>
                        <button class="btn task-delete-btn" onclick="deleteTask()"><i class="fa fa-times"></i></button>
                      </div>
                    </li>
              <?php 
                  }
                }
                else 
                { 
              ?>
                  <li id="noTask" class="list-group-item task">
                    <div class="row task-content">
                      <div class="col-11 no-tasks">
                        Nessun task in programma
                      </div>
                    </div>
                  </li>
              <?php
                }
              ?>
            </ul>

            <p class="bg-grey text-white section-title">IN FUTURO</p>
            <ul class="list-group section-content" id="somedayTaskSection">
              <?php
                if(mysqli_num_rows($futureTasks))
                {
                  while($row = mysqli_fetch_row($futureTasks))
                  {
              ?>
                    <li class="list-group-item task">
                      <div class="row task-content">
                        <input type="text" name="taskID" value="<?= $row[0] ?>" hidden>
                        <input type="checkbox" class="task-cb" name="taskCB" onclick="completeTask()" <?php if($row[2] == 1) echo 'checked' ?>>
                        <div class="col-11 text-justify text-break task-cb-label <?php if($row[2] == 1) echo 'completedTask' ?>">
                          <?= $row[1] ?>
                        </div>
                        <button class="btn task-delete-btn" onclick="deleteTask()"><i class="fa fa-times"></i></button>
                      </div>
                    </li>
              <?php 
                  }
                }
                else
                { 
              ?>
                  <li id="noTask" class="list-group-item task">
                    <div class="row task-content">
                      <div class="col-11 no-tasks">
                      Nessun task in programma</div>
                    </div>
                  </li>
              <?php
                }
              ?>
            </ul>
          </div>
        </div>

        <div class="col-lg-4 col-md-12">
          <div id="deadlines">
            
          </div>
        </div>

      </div>
    </div>
    <div id="footer"></div>
  </body>
</html>

<?php
  }
  else {
    header("location: index.php");
    exit;
  }
?>