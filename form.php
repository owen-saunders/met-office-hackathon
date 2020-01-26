<html>
<body>
    <div id="addstockbox" class="wrap extrawrap manage-box">
    <div class="panel-body">
        <form action="post.php" method="POST">

        <label for="stockname">SID:</label>
        <div class="container text-box">
            <input type="text" name="SID" placeholder="Enter SID...">
        </div>

        
            <input class="btn submitbutton" type="submit" value="Add">
        
        </form>

        <div class="container" >
            <a class="btn submitbutton" onclick="document.getElementById('addstockbox').style.display='none'" style="color:white;">Back</a>
        </div>
    </div>
    </div>
</body>
</html>