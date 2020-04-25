var currentPlaylist = [];
var shufflePlaylist = [];
var tempPlaylist = [];
var audioElement;
var mouseDown = false;
var currentIndex = 0;
var repeat = false;
var shuffle = false;
var userLoggedIn;
var timer;

function openPage(url) {

  if(timer != null) {
    clearTimeout(timer);
  }

  if(url.indexOf("?") == -1) {
    url = url + "?";
  }

  var encodedUrl = encodeURI(url + "&userLoggedIn=" + userLoggedIn);
  $("#mainContent").load(encodedUrl);
  $("body").scrollTop(0);
  history.pushState(null, null, url);
}

function createPlaylist() {
  var popup = prompt("Please enter the name of your playlist");

  if(popup != null) {
    $.post("includes/handlers/ajax/createPlaylist.php", { name: popup, username: userLoggedIn })
    .done(function(error) {

      if(error != "") {
        alert(error);
        return;
      }
      //do something when ajax returns
      openPage("yourMusic.php");
    });
  }
}

function deletePlaylist(playlistId) {
  var prompt = confirm("Are you sure you want to delete this playlist?");

  if(prompt) {
    $.post("includes/handlers/ajax/deletePlaylist.php", { playlistId: playlistId })
    .done(function(error) {

      if(error != "") {
        alert(error);
        return;
      }
      //do something when ajax returns
      openPage("yourMusic.php");
    });
  }
}

function showOptionsMenu(button) {
  var menu = $(".optionsMenu");
  var menuWidth = menu.width();

  var scrollTop = $(window).scrollTop(); //Distance from top of window to top of document
  var elementOffset = $(button).offset().top; //Distance from top of docuement

  var top = elementOffset - scrollTop;
  var left = $(button).position().left;

  menu.css({ "top": top + "px", "left": left - menuWidth + "px", "display": "inline" })
}

function formatTime(seconds) {
  var time = Math.round(seconds);
  var minutes = Math.floor(time / 60); //Rounds down
  var seconds = time - (minutes * 60);

  var extraZero = (seconds < 10) ? "0" : "";

  return minutes + ":" + extraZero + seconds;
}

function updateTimeProgressBar(audio) {
  $(".progressTime.current").text(formatTime(audio.currentTime));
  $(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));

  var progress = audio.currentTime / audio.duration * 100;
  $(".playBackBar .progress").css("width", progress + "%");
}

function updateVolumeProgressBar(audio) {
  var volume = audio.volume * 100;
  $(".volumeBar .progress").css("width", volume + "%");
}

function playFirstSong() {
  setTrack(tempPlaylist[0], tempPlaylist, true);
}

function Audio() {

  this.currentlyPlaying;
  this.audio = document.createElement('audio');

  this.audio.addEventListener("ended", function() {
    console.log("ended!");
    nextSong();
  });

  this.audio.addEventListener("canplay", function() {
    //'this' refers to the object that the event was called on
    var duration = formatTime(this.duration);
    $(".progressTime.remaining").text(duration);
  });

  this.audio.addEventListener("timeupdate", function() {
    if(this.duration) {
      updateTimeProgressBar(this);
    }
  })

  this.audio.addEventListener("volumechange", function() {
    updateVolumeProgressBar(this);
  })

  this.setTrack = function(track) {
    this.currentlyPlaying = track;
    this.audio.src = track.path;
  }

  this.play = function() {
    this.audio.play();
  }

  this.pause = function() {
    this.audio.pause();
  }

  this.setTime = function(seconds) {
    this.audio.currentTime = seconds;
  }

}