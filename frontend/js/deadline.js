//al click sul bottone addDeadline
function saveDeadline() {
  //prendo i dati in input
  var deadlineDate = $("#deadlineDate").val();
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
      <div id="deadline-time" class="deadline-content deadline-time text-center text-justify">${deadlineDate}</div>
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
