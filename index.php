<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="styleSheet.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/p5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/addons/p5.dom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/addons/p5.sound.min.js"></script>
    <script src="popup.js"></script>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="rain">
      <script src="sketch.js"></script>
      <script src="drop.js"></script>

    <div class="container">
      <h1>Find Yo' Cyclone</h1>

      <!-- Creates the search bar and button -->
      <div class="dataTable">
        <input type="search" name="search" id="searchBar" placeholder="Where Yo' Cyclone...">
        <button onclick="searchItem(document.getElementById('searchBar').value)">	&#128269;</button>
      </div>

      <div class="dataTable">
        <button onclick="popfunc()">Hello</button>
      </div>

      <div class="map">
        <iframe width="75%" height="500px" src="./crimemap.html"></iframe>
      </div>

      <p id="test">Test</p>
      <div class="key">
        <p style="border: 3px solid black;">This will be the key</p>
      </div>
    </div>
    </div>
  </body>
</html>
