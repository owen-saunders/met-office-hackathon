<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="styleSheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/p5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/addons/p5.dom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/addons/p5.sound.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="popup.js"></script>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="rain">
      <script src="sketch.js"></script>
      <script src="drop.js"></script>
      <input type="button" onclick="start();" value="Start Rain">
    </div>

    <div class="container">
      <div class="header">
        <h1>Find Yo' Cyclone</h1>
      </div>
      <!-- Creates the search bar and button -->

      <form class="dataTable" action="post.php" id="postform">
        <div class="search-box">
          <input type="text" name="SID" placeholder=" "/><span></span>
        </div>
            <script src="./script.js"></script>
      </form>

      <div class="map">
        <iframe width="80%" height="500px" src="./2019364S19060.html"></iframe>
      </div>

      <div id="cyclone-data"></div>
    
      </div>

      <script>
        // Attach a submit handler to the form
        $( "#postform" ).submit(function( event ) {
        
          // Stop form from submitting normally
          event.preventDefault();
        
          // Get some values from elements on the page:
          var $form = $( this ),
            term = $form.find( "input[name='SID']" ).val(),
            url = "post.php";
        
          // Send the data using post
          var posting = $.post( url, { SID: term } );
        
          // Put the results in a div
          posting.done(function( data ) {
            var content = $( data ).find( "#content" );
            $( "#cyclone-data" ).empty().append( content );
          });
        });
        </script>
  </body>
</html>
