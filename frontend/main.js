function getDate() {
  var week = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  var date = new Date();
  var weekDay = week[date.getDay()];
  var day = date.getDate().toString();
  var month = months[date.getMonth()];
  var year = date.getFullYear();
  document.getElementById('date').innerHTML = weekDay + ', ' + day + ' ' + month + ' ' + year;
}