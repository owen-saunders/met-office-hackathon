// Daniel Shiffman
// http://codingtra.in
// http://patreon.com/codingtrain
// Code for: https://youtu.be/KkyIDI6rQJI

// Purple Rain
// (138, 43, 226)
// (230, 230, 250) // background

var drops = [];

function setup() {
  var wheight = window.innerHeight;
  var wwidth = window.innerWidth;

  createCanvas(wwidth, wheight);
  for (var i = 0; i < 500; i++) {
    drops[i] = new Drop();
  }
}

function draw() {
  background(230, 230, 250);
  for (var i = 0; i < drops.length; i++) {
    drops[i].fall();
    drops[i].show();
  }
}
