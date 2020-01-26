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
    </div>

    <div class="container">
        <h1>Find Yo' Cyclone</h1>

        <!-- Creates the search bar and button -->

        <form class="dataTable" action="post.php" method="post">
          <input type="search" name="SID" id="searchBar" placeholder="What Yo' SID...">
          <input type="submit" value="Search">
        </form>

        <div class="map">
          <iframe width="75%" height="500px" src="./crimemap.html"></iframe>
        </div>
    </div>
  </body>
</html>
