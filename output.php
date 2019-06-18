<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Building Peace</title>
    
    <link rel="stylesheet" href="main.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Spectral:400,400i" rel="stylesheet">
    
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
            
</head>
<body>
    
    <p>Entries so far:</p>
    
    <div class="rule"></div>
    
    <div class="entries">
    

        <?php
        $servername = "localhost";
        $username = "simonsweeney";
        $password = "";
        $dbname = "peace";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "SELECT * FROM Entries ORDER BY id DESC";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
        
            while($row = $result->fetch_assoc()) {
                $date = $row["reg_date"];
                $date = date("G:i, d.m.Y", strtotime($date));
        
                echo "<div class='entry' data-wght=" . $row["val"] . ">" . $row["word"] . "<sup>[" . $date . "]</sup></div>";
            }
            
        } else {
            echo "theres bloody nowt";
        }
        $conn->close();
        ?>


    </div>

    <a class="back" href="/">Back</a>




<script>

// 139 - 80 = 59
// input range for screen is 0, dWidth
// output range for variable is 0, 59
// (59/dWidth)*mouse

$(document).ready(function(){
    
    // var dWidth = $(document).width();
    // console.log(dWidth); 
    
    $('input.val').on('input', function () {
        $('.form').css({"font-variation-settings": "\'wght\'" + $(this).val()});
    });
     


    // $(document).on('mousemove', function (event) {
    //     var mouse = event.pageX;
        
    //     var val = (59/dWidth) * (mouse);
    //     val = val + 80;
    //     console.log(val);
    //     var styles = {"font-variation-settings": "\'wght\'" + val};
    //     $('.form').css(styles);
    // })

    $('.entry').each(function(){
        var wght = $(this).data('wght');
        var styles = {"font-variation-settings": "\'wght\'" + wght};
        $(this).css(styles);
        console.log(wght);
    });

})


</script>

</body>
</html>