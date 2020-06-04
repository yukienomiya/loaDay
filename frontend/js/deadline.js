// funzione chiamata al click sul bottone addDeadline
function saveDeadline(e) {
  //prendo i dati in input
  e.preventDefault();
  var deadlineDate = $("#deadlineDate").val();
  var generalDate = changeDateFormat(deadlineDate);
  var countdown = getCountdown(new Date(generalDate));
  var deadlineDescription = $("#deadlineDescription").val();

  // chiamata ajax per salvare la deadline del DB
  $.ajax({
    type: "POST",
    url: "../backend/addDeadline.php",
    data: "deadlineDate=" + deadlineDate + "&deadlineDescription=" + deadlineDescription,
    dataType: "html",

    success: function(response) {
      // chiudo il popup
      $("#newDeadline").modal('toggle');

      // template per la nuova deadline
      // response: ID della deadline, preso come risposta da addDeadline.php
      var newDeadline = `
      <!-- 0: countdown -->
      <div id="deadline-time" class="deadline-content deadline-time text-center text-justify">${countdown}</div>
      <!-- 1: descrizione -->
      <div id="deadline-text" class="deadline-content deadline-text text-center text-justify">${deadlineDescription}</div>
      <!-- 2: bottone DELETE (displayed on click) -->
      <button class="btn deadline-btn btn-sm">DELETE</button>
      <!-- 3: data deadline (hidden) -->
      <input name="deadlineDate" type="text" value="${generalDate}" hidden>
      <!-- 4: id deadline (hidden) -->
      <input name="deadlineID" type="text" value="${response}" hidden>
      `

      // creo e aggiungo la nuova deadline alla sezione
      var newDL = document.createElement("div");
      newDL.className = "col-10 deadline flex-column justify-content-center";
      newDL.innerHTML = newDeadline;

      $("#deadlinesList").prepend(newDL);

      // svuoto i campi input
      $("#newDeadlineForm").trigger("reset");
    },
    error: function() {
      alert("Il salvataggio non è andato a buon fine. Ritenta!");
    }
  });
}


// creo il countdown con queste determinate caratterisitche
function getCountdown(date) {
  countdown.setLabels(
    ' ms |s |M |H |DD ',
    ' ms |s |M |H |DD ',
    ' ',
    ' ',
    '');
  var timespan = countdown(
    new Date(), 
    date, 
    // vengono visualizzate tutte le unita tranne quelle elencate qui
    ~(countdown.DECADES | countdown.YEARS | countdown.MONTHS | countdown.WEEKS | countdown.MILLISECONDS)
  );
  return timespan.toString();
}

// trasforma una data sottoforma di stringa da questo formato: 30/06/2020 10:00
// a questo: June 30, 2020 10:00:00
function changeDateFormat(dateStr) {
  var el = dateStr.split(" ");
  var date = el[0];
  var time = el[1];
  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  var dateSplit = date.split("/");
  var day = dateSplit[0];
  var month = months[parseInt(dateSplit[1]) - 1];
  var year = dateSplit[2];
  var timeSplit = time.split(":");
  var hour = timeSplit[0];
  var minute = timeSplit[1];
  return month + " " + day + ", " + year + " " + hour + ":" + minute + ":" + "00";
}


// funzione chiamata ogni secondo per aggiornare i countdown
function updateCountdown() {
  //Prendo tutti i figli di deadlinesList e per ognuno aggiorno il countdown
  var dlList = Array.from(document.getElementById("deadlinesList").children);
  dlList.forEach(el => {
    var dlDate = new Date(el.children[3].value);
    var id = el.children[4].value;
    var currentDate = new Date();
    if (dlDate > currentDate) {
      var newCountdown = getCountdown(dlDate);
      el.children[0].textContent = newCountdown;
    }
    else {
      el.children[0].textContent = 'SCADUTO';
    }
  });
}


function resetDeadlineForm() {
  $("#newDeadlineForm").trigger("reset");
}

function getDeadlines() {
  $.ajax({
    type: "POST",
    url: "../backend/getDeadlines.php",
    success: function (result) {
      // result e' una stringa contenente un json array - ogni json obj rappresenta una deadline
      var cont = document.createElement("div");
      var rows = JSON.parse(result);
      rows.forEach(function(k) {
        var date = k['data'];
        var countdown = getCountdown(new Date(changeDateFormat(date)));
        var description = k['descr'];
        var id = k['id'];
        var newDeadline = `
        <!-- 0: countdown -->
        <div id="deadline-time" class="deadline-content deadline-time text-center text-justify">${countdown}</div>
        <!-- 1: descrizione -->
        <div id="deadline-text" class="deadline-content deadline-text text-center text-justify">${description}</div>
        <!-- 2: bottone DELETE (displayed on click) -->
        <button class="btn deadline-btn btn-sm">DELETE</button>
        <!-- 3: data deadline (hidden) -->
        <input name="deadlineDate" type="text" value="${date}" hidden>
        <!-- 4: id deadline (hidden) -->
        <input name="deadlineID" type="text" value="${id}" hidden>
        `

        var newDL = document.createElement("div");
        newDL.className = "col-10 deadline flex-column justify-content-center";
        newDL.innerHTML = newDeadline;

        cont.appendChild(newDL);
      });
      $("#deadlinesList").prepend(cont.innerHTML);
    },
    error: function() {
      alert("La pagina non si è caricata correttamente.")
    }
  });
}