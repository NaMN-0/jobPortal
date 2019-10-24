<?php

    require("db.php");
    $display = array("error"=>"", "success"=>"");

    $sql = "SELECT * FROM job";
    $result = mysqli_query($conn, $sql);
    $details = mysqli_fetch_all($result);
    $name = "";
    $lastName = "";
    $eMail = "";
    $lang1 = "";
    $lang2 = "";
    $lang3 = "";
    $lang4 = "";
    $xp = "";

    {

        if( (isset($_POST['submit'])) ){

            $flag = 1;

            if( (empty($_POST['name'])) ){
                $display['error'] = "Please fill the name field";
                $flag = 0;
            }
            else {
                $name = $_POST['name'];
            }
            
            if( (empty($_POST['lastName'])) ){
                $display['error'] = "Please fill last name field";
                $flag = 0;
            }
            else {
                $lastName = $_POST['lastName'];
            }

            if( (empty($_POST['eMail'])) ){
                $display['error'] = "Please fill email field";
                $flag = 0;
            }
            else {
                $eMail = $_POST['eMail'];
            }

            if( (empty($_POST['lang1'])) ){
                $display['error'] = "Please fill language field";
                $flag = 0;
            }
            else {
                $lang1 = $_POST['lang1'];
            }

            if( (empty($_POST['lang2'])) ){
                $display['error'] = "Please fill language field";
                $flag = 0;
            }
            else {
                $lang2 = $_POST['lang2'];
            }

            if( (empty($_POST['lang3'])) ){
                $display['error'] = "Please fill language field";
                $flag = 0;
            }
            else {
                $lang3 = $_POST['lang3'];
            }

            if( (empty($_POST['lang4'])) ){
                $display['error'] = "Please fill language field";
                $flag = 0;
            }
            else {
                $lang4 = $_POST['lang4'];
            }

            $xp = $_POST['xp'];

            // image upload

            if( (empty($_FILES['img']['name'])) ){
                $display['error'] = "Please upload your photo";
                $flag = 0;
            }
            else {
                $target = "imgs/".basename($_FILES['img']['name']);
                $img = $_FILES['img']['name'];
            }
    
            if($flag == 1){

                $row = count($details);
                $row = $row + 1;
                $sql = "INSERT INTO job (name, lastName, eMail, skill1, skill2, skill3, skill4, experience, row, image) VALUES ('$name','$lastName','$eMail','$lang1','$lang2','$lang3','$lang4','$xp','$row','$img')";
                mysqli_query($conn, $sql);   
                $display['success'] = "Success";
                move_uploaded_file($_FILES['img']['tmp_name'], $target);    

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

    <div class = "mainDiv">
        
        <form action="form1.php" method="POST" enctype="multipart/form-data">

            <div class="detail">
                <p class="margin">
                    First Name
                </p>
                <input class="margin" type="text" name = "name" value="">            
            </div>            

            <br><br>

            <div class="detail">
                <p class="margin">
                    Last Name
                </p>
                <input class="margin" type="text" name="lastName" value="">            
            </div>                

            <br>

            <div class="detail">
                <p class="margin">
                    E-mail
                </p>
                <input class="margin" type="email" name="eMail" value="">            
            </div>                

            <br>
            
            <div class="detail">
                <p class="margin">
                    Skill or Language
                </p>

                <select name="lang1" class="ddLanguage" label="Language" value="">
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

            <div class="detail">
                <p class="margin">
                    Skill or Language
                </p>

                <select name="lang2" class="ddLanguage" label="Language" value="">
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
            <div class="detail">
                <p class="margin">
                    Skill or Language
                </p>

                <select name="lang3" class="ddLanguage" label="Language" value="">
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
            <div class="detail">
                <p class="margin">
                    Skill or Language
                </p>

                <select name="lang4" class="ddLanguage" label="Language" value="">
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

            <div class="detail">
                <p class="margin">
                    Experience
                </p>
                <input class="margin" type="number" name="xp" min="0" max="50" value="0">            
            </div>                

            <br><br>

            <div class="detail">
                <p class="margin">
                    Upload Photo
                </p>

            </div>                

            <br>

            <input type="file" name="img" class="margin size">

            <br><br>

            <h4 class="error">
                <?php
                    echo($display['error']);
                ?>
            </h4>

            <h4 class="success">
                <?php
                    echo($display['success']);
                ?>
            </h4>

            <button class="button" value="submit" name="submit">
                Submit
            </button>

        </form>

    </div>

</body>
</html>
