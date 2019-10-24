<?php

    require("db.php");


        $sql = "SELECT * FROM job";
        $result = mysqli_query($conn, $sql);
        $details = mysqli_fetch_all($result);
        $xp = "";
        $skill = "";
        $a = array();

            if( (isset($_GET['submit'])) ){
            
                $xp = $_GET['xp'];
                $skill = $_GET['skill'];

    
                for($i=0;$i<count($details);$i++){
                    
                    if($details[$i][8] >= $xp){
                    
                        if(($details[$i][4] == $skill) || ($details[$i][5] == $skill) || ($details[$i][6] == $skill) || ($details[$i][7] == $skill)) {

                            array_push($a, ($details[$i][9]));            
                        
                        }
                    
                    }

                }
            
            }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Job Portal</title>
</head>
<body>

    <div class="header">

        <div class="headerContents">
            <p>Job Portal</p>
        </div>
        
    </div>

    <div class="divCon">
        <div class = "mainDiv div1">
            
            <form action="form2.php" method="GET">

                <div class="detail">
                    <p class="margin">
                        Minimum Experience
                    </p>
                    <input class="margin" type="number" name="xp" min="0" max="50" value="0">            
                </div>              

                <br><br>

                <div class="detail">
                    <p class="margin">
                        Skill
                    </p>

                    <select name="skill" class="ddLanguage" label="Language" value="">
                        <option value="" >--Language--</option>
                        <option value="html">HTML</option>
                        <option value="css">CSS</option>
                        <option value="js">Javascript</option>
                        <option value="php">PHP</option>
                        <option value="python">Python</option>
                        <option value="java">Java</option>
                        <option value="design">Designing</option>
                    </select>
                </div>                

                <br><br>

                <button class="button btn1" value="submit" name="submit">
                    Submit
                </button>

            </form>

        </div>

        <div class="mainDiv">
            <h2>List of Applicants</h2>
            <hr>
                <?php

                    $j=0;

                    if( (isset($_GET['submit'])) ){
                        foreach ($a as $x){
                ?>
                <a href="#<?php echo ("id" . $x) ?>">
                    <?php
                        echo($details[$x-1][1] . ' ' . $details[$x-1][2]);                    
                    ?>
                </a>
                <h1>
                    <?php
                        echo("Experience : " . $details[$x-1][8] . " years.");                    
                    ?>
                </h1>

                <hr>
                
                <br>
                <?php   
                        }     
                    }
                ?>
            </a>

        </div>

    </div>

    <?php
        foreach($a as $x){
    ?>

    <div class="mainDiv"
    id = "<?php echo ("id" . $x) ?>">

        <img src="<?php echo "imgs/" . $details[$x-1][10] ?>" alt="image" class="dp">
        <h1>
            <?php
                echo("Name of the candidate: " . $details[$x-1][1] . ' ' . $details[$x-1][2]);                    
            ?>
        </h1>
        <h1>
            <?php
                echo("E-Mail id: " . $details[$x-1][3]);                    
            ?>
        </h1>
        <h1>
            <?php
                echo("Experience : " . $details[$x-1][8] . " years");                    
            ?>
        </h1>
        <h1>
            <?php
                echo("Skills : " . $details[$x-1][4] . ", " . $details[$x-1][5] . ", " . $details[$x-1][6] . ", " . $details[$x-1][7]);                    
            ?>
        </h1>
    </div>

    <?php
        }
    ?>

</body>
</html>


