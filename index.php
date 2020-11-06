<?php 
//----Favicon Implementation-------------------------
echo '<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon"/>';

//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------
function createPage()
{
  
$tcontent = <<<PAGE

        <div class="row">
        <h1>Top Games this Month</h1> 
        </div>
        
        <div class="row details">
        <a href="game.php?id=1"> <img src="img/game/1.png" width="279" alt="BOTW">
        <a href="game.php?id=2"> <img src="img/game/2.png" width="279" alt="ACNH">
        <a href="game.php?id=9"> <img src="img/game/9.png" width="279" alt="MC">
        <a href="game.php?id=15"> <img src="img/game/15.png" width="279" alt="HFF">
        </div>
        <iframe width="1124" height="600"
        src="https://www.youtube.com/embed/iPyVuJXGDaQ">
        </iframe>
   
PAGE;
return $tcontent;
}

//----BUSINESS LOGIC---------------------------------
//Start up a PHP Session for this user.
session_start();

//Build up our Dynamic Content Items. 
$tpagetitle = "Home Page";
$tpagelead  = "";
$tpagecontent = createPage();
$tpagefooter = "";

//----BUILD OUR HTML PAGE----------------------------
//Create an instance of our Page class
$tpage = new MasterPage($tpagetitle);
//Set the Three Dynamic Areas (1 and 3 have defaults)
if(!empty($tpagelead))
    $tpage->setDynamic1($tpagelead);
$tpage->setDynamic2($tpagecontent);
if(!empty($tpagefooter))
    $tpage->setDynamic3($tpagefooter);
//Return the Dynamic Page to the user.    
$tpage->renderPage();
?>