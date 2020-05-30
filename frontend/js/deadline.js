//al click sul bottone addDeadline
function saveDeadline(e) {
  //prendo i dati in input
  e.preventDefault();
  var deadlineDate = $("#deadlineDate").val();
  var generalDate = changeDateFormat(deadlineDate);
  var t = getCountdown(new Date(generalDate));
  var deadlineDescription = $("#deadlineDescription").val();

  //chiamata ajax per salvare la dl del DB
  $.ajax({
    type: "POST",
    url: "../../backend/addDeadline.php",
    data: "deadlineDate=" + deadlineDate + "&deadlineDescription=" + deadlineDescription,
    dataType: "html",

    success: function(response) {
      // chiudo il popup
      $("#newDeadline").modal('toggle');

      // template per la nuova deadline
      var newDeadline = `
      <div id="deadline-time" class="deadline-content deadline-time text-center text-justify">${t}</div>
      <div id="deadline-text" class="deadline-content deadline-text text-center text-justify">${deadlineDescription}</div>
      <button class="btn deadline-btn btn-sm">DELETE</button>
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