<?php
$winner = 'n';
$box = array('','','','','','','','','');  // tic tac toe grid for X & O
if (isset($_POST["nextBtn"]))
    {
        $box[0] = $_POST["box0"];
        $box[1] = $_POST["box1"];
        $box[2] = $_POST["box2"];
        $box[3] = $_POST["box3"];
        $box[4] = $_POST["box4"];
        $box[5] = $_POST["box5"];
        $box[6] = $_POST["box6"];
        $box[7] = $_POST["box7"];
        $box[8] = $_POST["box8"];

        if(($box[0] == 'x' && $box[1] == 'x' && $box[2] == 'x')  || ($box[3] == 'x' && $box[4] == 'x' && $box[5] == 'x') || ($box[6] == 'x' && $box[7] == 'x' && $box[8] == 'x') || ($box[0] == 'x' && $box[3] == 'x' && $box[6] == 'x')  || ($box[1] == 'x' && $box[4] == 'x' && $box[7] == 'x') || ($box[2] == 'x' && $box[5] == 'x' && $box[8] == 'x') || ($box[0] == 'x' && $box[4] == 'x' && $box[8] == 'x') || ($box[2] == 'x' && $box[4] == 'x' && $box[6] == 'x') )
        {
            $winner = 'x';
            echo "<h1>Congrats you won!</h1>";
        }

        $blank = 0;
        for ($i = 0; $i <= 8 ; $i++)
        {
            if($box[$i] == '')
            {
                $blank = 1;
            }
        }
        if($blank == 1)
        {
            $i = rand() % 8;
            while($box[$i] != '')
            {
                $i = rand() % 8;
            }
            $box[$i] = 'o';
            if(($box[0] == 'o' && $box[1] == 'o' && $box[2] == 'o')  || ($box[3] == 'o' && $box[4] == 'o' && $box[5] == 'o') || ($box[6] == 'o' && $box[7] == 'o' && $box[8] == 'o') || ($box[0] == 'o' && $box[3] == 'o' && $box[6] == 'o')  || ($box[1] == 'o' && $box[4] == 'o' && $box[7] == 'o') || ($box[2] == 'o' && $box[5] == 'o' && $box[8] == 'o') || ($box[0] == 'o' && $box[4] == 'o' && $box[8] == 'o') || ($box[2] == 'o' && $box[4] == 'o' && $box[6] == 'o') )
            {
                $winner = 'o';
                echo "<h1>O is the winner!</h1>";
            }
            
        }
        else if ($winner == 'n')
        {
            $winner = 't';
            echo "<h1>It's a tie!</h1>";
        }
    }
?>
<html>
<head>
    <title>Tic Tac Toe</title>
    <style>
    body {
        background: url(pattern.png);
        text-align: center;
    }
        #btn{
        width: 280px;
        margin-top: 20px;
        padding: 22px;
        font-weight: bold;
        font-size: 1rem;
        background-color: rgb(255, 189, 67);
        border-radius: 30px;
        box-shadow: 1px 1px 3px black;
    }
    #input{
        border-radius: 50px;
        border: 3px solid black;
        width: 150px;
        height: 120px;
        text-align: center;
        margin: 6px;
        font-size: 45px;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.637);
        background-color: rgb(255, 208, 208);
    }
    </style>
</head>
<body>
    <img src="vs.png" alt="banner" style="width:800px;height:200px;">
    <div style="margin:0 auto;width:75%;text-align:center;">
        <form name = "ticktactoe" method = "post" action = "index.php">
            <?php
                for($i = 0; $i <=8; $i++)
                {
                    printf('<input type = "text" id = "input" name = "box%s" value = "%s">', $i, $box[$i]);
                    if ($i == 2 || $i == 5 || $i == 8){
                    print("<br>");
                    }
                }
                if($winner == 'n')
                {
                    print('<input type = "submit" name = "nextBtn" value = "OPPONENTS TURN" id = "btn">');
                }
                else
                {
                    print('<input type = "button" name = "newgamebtn" value = "Play Again" id = "btn" onclick = "window.location.href=\'index.php\'">');
                }
    
            ?>
        </form>
    </div>
</body>
</html>