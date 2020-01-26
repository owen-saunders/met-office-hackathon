<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="styleSheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
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
    </div>

    <div class="container">
      <div class="header">
        <h1>Find Yo' Cyclone</h1>
      </div>
      <!-- Creates the search bar and button -->

      <form class="dataTable" action="post.php" method="post">
        <div class="search-box">
          <input type="text" name="SID" placeholder=" "/><span></span>
        </div>
            <script src="./script.js"></script>
      </form>

      <div class="map">
        <iframe width="80%" height="500px" src="./MapExample.html"></iframe>
      </div>
    </div>
  </body>
</html>
