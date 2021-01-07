window.onload = function(){
  make_get_request('scores.php?getScores=1');
}

function make_get_request(filename) {

  $.ajax({

    method: 'GET',
    url: filename,
    cache: false,
    success: function(data) {
      document.getElementById('text').innerHTML = data.split('\n').join('<br>');
     
    }
  });
}

function redirect(){
    window.location = 'welcome.php';
}

  let timeoutID = null;

function print() {
  make_get_request('scores.php?getScores=1');//appending a variable to the get request url
  timeoutID = setTimeout(print, 10000);
}

function stop_printing() {
  clearTimeout(timeoutID);
}
