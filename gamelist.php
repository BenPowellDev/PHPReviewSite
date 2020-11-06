<?php 
//----Favicon Implementation-------------------------
echo '<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon"/>';

//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------
function createPage()
{
  
$tcontent = <<<PAGE
        <a href="game.php?id=1"> <img src="img/game/1.png" width="279" alt="1">
        <a href="game.php?id=2"> <img src="img/game/2.png" width="279" alt="2">
        <a href="game.php?id=3"> <img src="img/game/3.png" width="279" alt="3">
        <a href="game.php?id=4"> <img src="img/game/4.png" width="279" alt="4">
        <a href="game.php?id=5"> <img src="img/game/5.png" width="279" alt="5">
        <a href="game.php?id=6"> <img src="img/game/6.png" width="279" alt="6">
        <a href="game.php?id=7"> <img src="img/game/7.png" width="279" alt="7">
        <a href="game.php?id=8"> <img src="img/game/8.png" width="279" alt="8">
        <a href="game.php?id=9"> <img src="img/game/9.png" width="279" alt="9">
        <a href="game.php?id=10"> <img src="img/game/10.png" width="279" alt="10">
        <a href="game.php?id=11"> <img src="img/game/11.png" width="279" alt="11">
        <a href="game.php?id=12"> <img src="img/game/12.png" width="279" alt="12">
        <a href="game.php?id=13"> <img src="img/game/13.png" width="279" alt="13">
        <a href="game.php?id=14"> <img src="img/game/14.png" width="279" alt="14">
        <a href="game.php?id=15"> <img src="img/game/15.png" width="279" alt="15">
        <a href="game.php?id=16"> <img src="img/game/16.png" width="279" alt="16">
PAGE;
return $tcontent;
}

//----BUSINESS LOGIC---------------------------------
//Start up a PHP Session for this user.
session_start();

//Build up our Dynamic Content Items. 
$tpagetitle = "Full Games List";
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