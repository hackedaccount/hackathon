window.AudioContext = window.AudioContext || window.webkitAudioContext;
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia;
window.URL = window.URL || window.webkitURL;
navigator.getUserMedia =
  navigator.getUserMedia ||
  navigator.webkitGetUserMedia ||
  navigator.mozGetUserMedia ||
  navigator.msGetUserMedia;
let audioContext;

let spet1;
let spet1_length;
let spet2;
let spet2_length;
var media = [
  {
    file: "media/aphex_twins_equation.mp3",
    // slice: { start: 320000, end: 340000 }
    slice: { start: 0, end: 30000 }
  },
  {
    file: "media/ethos_final_hope.mp3",
    // slice: { start: 50000, end: 170000 }
    slice: { start: 0, end: 30000 }
  }
];

function init() {
  try {
    audioContext = new AudioContext();
  } catch (e) {
    alert("No web audio support in this browser!");
  }

  analyzesource();
}

function analyzesource() {
  let spectro = Spectrogram(document.getElementById("canvas"), {
    canvas: {
      width: function() {
        return window.innerWidth;
      },
      height: 300
    },
    audio: {
      enable: true
    },
    colors: function(steps) {
      var baseColors = [
        [0, 0, 255, 1],
        [0, 255, 255, 1],
        [0, 255, 0, 1],
        [255, 255, 0, 1],
        [255, 0, 0, 1]
      ];
      var positions = [0, 0.15, 0.3, 0.5, 0.75];

      var scale = new chroma.scale(baseColors, positions).domain([0, steps]);

      var colors = [];

      for (var i = 0; i < steps; ++i) {
        var color = scale(i);
        colors.push(color.hex());
      }

      return colors;
    }
  });
window['sp1'] = spectro;
  playSong(media[1], spectro);
  let intr = window.setInterval(check, 10);

  function check() {
    if (spectro._audioEnded) {
      spet1 = spectro.finalres;
      spet1_length = spectro._finalres_length      
      clearInterval(intr);
      origianlfile();
    }
  }
}

function origianlfile() {
  let spectro = Spectrogram(document.getElementById("canvas2"), {
    canvas: {
      width: function() {
        return window.innerWidth;
      },
      height: 300
    },
    audio: {
      enable: true
    },
    colors: function(steps) {
      var baseColors = [
        [0, 0, 255, 1],
        [0, 255, 255, 1],
        [0, 255, 0, 1],
        [255, 255, 0, 1],
        [255, 0, 0, 1]
      ];
      var positions = [0, 0.15, 0.3, 0.5, 0.75];

      var scale = new chroma.scale(baseColors, positions).domain([0, steps]);

      var colors = [];

      for (var i = 0; i < steps; ++i) {
        var color = scale(i);
        colors.push(color.hex());
      }

      return colors;
    }
  });
  window['sp2'] = spectro
  playSong(media[1], spectro);
  let intr = window.setInterval(check, 10);

  function check() {
    if (spectro._audioEnded) {
      spet2 = spectro.finalres;
      spet2_length = spectro._finalres_length
      clearInterval(intr);
      comapre();
    }
  }
}

function loadMedia(selectedMedia, callback) {
  var request = new XMLHttpRequest();
  request.open("GET", selectedMedia.file, true);
  request.responseType = "arraybuffer";

  request.onload = function() {
    audioContext.decodeAudioData(request.response, function(buffer) {
      console.log(buffer);
      var slice = selectedMedia.slice;
      AudioBufferSlice(buffer, slice.start, slice.end, function(error, buf) {
        callback(buf);
      });
    });
  };

  request.send();
}

function selectMedia() {
  songButton.disabled = false;
  selectedMedia = media[songSelect.value];
}

function playSong(selectedMedia, spectro) {
  loadMedia(selectedMedia, function(songBuffer) {
    spectro.connectSource(songBuffer, audioContext);
    spectro.start();
  });
}

window.addEventListener("load", init, false);

// let intr = window.setInterval(check, 500);

// function check() {
//   if (spectro._audioEnded) {
//     console.log(spectro.finalres);
//     clearInterval(intr);
//   }
// }

function comapre() {
  let to = 0;  
      for (let i = 0; i < spet2_length; i++) {
    let a = spet1[i];
    let b = spet2[i];
    console.log(a);
    console.log(b);
    for(let x = 0; x< a.length;x++)
    {
      for(let y = 0; y < b.length; y++)
      {
        if((a[x] != 0 && b[y] != 0) && (a[x] == b[y]))
        {
          to++
        }
      }
    }
  }
let total = spet2_length * spet2[0].length;
console.log(total)
console.log(to)

}
