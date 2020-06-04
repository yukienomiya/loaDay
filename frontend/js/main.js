// creo la stringa contenente la data di oggi (mostrata sulla home page, sopra la progress bar)
function getDate() {
  var week = ["Domenica", "Lunedì", "Martedì", "Mercoledì", "Giovedì", "Venerdì", "Sabato"];
  var months = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];
  var date = new Date();
  var weekDay = week[date.getDay()];
  var day = date.getDate().toString();
  var month = months[date.getMonth()];
  var year = date.getFullYear();
  document.getElementById('date').innerHTML = weekDay + ', ' + day + ' ' + month + ' ' + year;
}
