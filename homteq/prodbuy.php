<?php
    include("db.php"); //include db.php file to connect to DB   
    $pagename = "a smart buy for a smart home"; //Create and populate a variable called $pagename
    echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

    echo "<title>" . $pagename . "</title>"; //display name of the page as window title
    //retrieve the product id passed from previous page using the GET method and the $_GET superglobal variable
    //applied to the query string u_prod_id
    //store the value in a local variable called $prodid
    $prodid=$_GET['u_prod_id'];
    //display the value of the product id, for debugging purposes
    

    echo "<body>";

    include("headfile.html"); //include header layout file

    echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page
    echo "<p>Selected product Id: ".$prodid."</p>";

    //create a $SQL variable and populate it with a SQL statement that retrieves product details
    $SQL="select prodId, prodName, prodPicNameSmall, prodDescripShort, prodPrice from Product";
    //run SQL query for connected DB or exit and display error message
    $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));

    echo "<table style='border: 0px'>";
    //create an array of records (2 dimensional variable) called $arrayp.
    //populate it with the records retrieved by the SQL query previously executed. 
    //Iterate through the array i.e while the end of the array has not been reached, run through it
    while ($arrayp = mysqli_fetch_array($exeSQL)) {
        echo "<tr>";
        echo "<td style='border: 0px; text-align:center;'>";
        //display the small image whose name is contained in the array
        echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
        echo "<img src=images/" . $arrayp['prodPicNameSmall'] . " height=50% width=50%>";
        echo "</a>";
        echo "</td>";
        echo "<td style='border: 0px'>";
        echo "<h5>" . $arrayp['prodName'] . "</h5>"; //display product name as contained in the array
        echo "<p>".$arrayp['prodDescripnShort'];
        echo "<p>&pound".$arrayp['prodPrice'];
        echo "</tr>";
    }
    echo "</table>";


    include("footfile.html"); //include head layout

    echo "</body>";
?>