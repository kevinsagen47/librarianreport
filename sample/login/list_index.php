<?php
session_start();
//$_SESSION['permission']=0;

$pass = $_POST['pass'];

if($pass == "ab4321")
{
        $_SESSION['permission']=1;
        
        
}

if (isset($_SESSION['permission'])) {
        include("secretttlist0622.php");
}


//<meta name="viewport" content="user-scalable = yes">
//<meta name="viewport" content="width=device-width, initial-scale=1">

else
{ 

    if(isset($_POST))
    {   echo'
        <!DOCTYPE html>
        <html>
        <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <title>查詢系統</title>
        </head>
                <style>
        .container {
        height: 200px;
        position: relative;
        border: 3px solid green;
        }

        .center {
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        }
        </style>
        <body>
        <div class="w3-card-4 w3-container w3-center center" >
        <div style="text-align:center" class="w3-container w3-brown" style="width:600px">
          <h2>工讀生工作報告表查詢系統</h2>
        </div>
        <br>
        <br>
        
            

            <form method="POST" action="list_index.php">
            密碼: <input type="password" name="pass"></input><br/>
            <br><br>
            <input type="submit" name="submit" value="Go"></input>
            </form>
            <br>
    

    </div></body>
    </html>';}
}
?>
