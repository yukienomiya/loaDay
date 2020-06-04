function saveTask(e) {
  e.preventDefault();
  var taskDescription = $("#taskDescription").val();
  var taskCategory = $("#taskCategory").val();

  $.ajax({
    type: "POST",
    url: "../backend/addTask.php",
    data: "taskDescription=" + taskDescription + "&taskCategory=" + taskCategory,
    dataType: "html",

    success: function(response) {
      var newTask = `
      <div class="row task-content">
        <input type="text" name="taskID" value="${response}" hidden>
        <input type="checkbox" class="task-cb" name="taskCB" onclick="completeTask()">
        <div class="col-11 text-justify text-break task-cb-label">${taskDescription}</div>
        <button class="btn task-delete-btn" onclick="deleteTask()"><i class="fa fa-times"></i></button>
      </div>
      `
      // creo e aggiungo la nuova deadline alla sezione
      var newT = document.createElement("li");
      newT.className = "list-group-item task";
      newT.innerHTML = newTask;

      var taskList;
      if (taskCategory == "oggi") {
        taskList = document.getElementById("todayTaskSection");
        $("#todayTaskSection").prepend(newT);
      } else if (taskCategory == "domani") {
        taskList = document.getElementById("tomorrowTaskSection");
        $("#tomorrowTaskSection").prepend(newT);
      } else {
        taskList = document.getElementById("somedayTaskSection");
        $("#somedayTaskSection").prepend(newT);
      }
      if (taskList.childElementCount == 2 && taskList.lastElementChild.id == "noTask") {
        $(taskList.lastElementChild).remove();
      }

      // svuoto i campi input
      $("#addTaskForm").trigger("reset");
      $("#taskCategory").prop('selectedIndex', 0);
    },
    error: function () {
      alert("Il salvataggio non è andato a buon fine. Ritenta!");
    }
  });
}

function deleteTask() {
  // controllo che l'event.target sia il bottone e non l'icona
  var p = event.target.parentElement;
  if (event.target.tagName == 'I') {
    p = event.target.parentElement.parentElement;
  }
  var taskID = p.firstElementChild.value;
  $.ajax({
    url: "../backend/deleteTask.php",
    type: "POST",
    data: "taskID=" + taskID,
    success: function () {
      var taskList = p.parentElement.parentElement;
      // elimina il task dalla pagina
      $(p.parentElement).remove();
      if (taskList.childElementCount == 0) {
        var noTaskElement = document.createElement("LI");
        noTaskElement.className = "list-group-item task";
        noTaskElement.id = "noTask";
        var content = `
        <div class="row task-content">
          <div class="col-11 no-tasks">
          Nessun task in programma</div>
        </div>
        `;
        noTaskElement.innerHTML = content;
        taskList.appendChild(noTaskElement)
      }
    },
    error: function () {
      alert("L'eliminazione non è andata a buon fine. Ritenta!");
    }
  });
}

function completeTask() {
  var taskCB = event.target;
  var completed = 0;
  if (taskCB.checked) {
    completed = 1;
  }
  var p = taskCB.parentElement;
  var taskID = p.firstElementChild.value;
  var taskText = p.children[2];
  
  // ajax call
  $.ajax({
    url: "../backend/completeTask.php",
    type: "POST",
    data: "taskID=" + taskID + "&taskCompleted=" + completed,
    success: function () {
      if (taskCB.checked) {
        taskText.classList.add("completedTask");
      } else {
        taskText.classList.remove("completedTask");
      }

      $.ajax({
        url: "../backend/getTasks.php",
        type: "POST",
        success: function () {
          $("#refresh").load(location.href+" #refresh>*","");
        },
        error: function () {
          alert("Non sono riuscito ad aggiornare la progress-bar.");
        }
      });
    },
    error: function () {
      alert("Il completamento non è andato a buon fine. Ritenta!");
    }
  });
}

function refreshPBar() {
  
}