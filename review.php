<?php
//----Favicon Implementation-------------------------
echo '<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon"/>';

// ----INCLUDE APIS------------------------------------
include ("api/api.inc.php");

// ----PAGE GENERATION LOGIC---------------------------
function createPage($previews)
{
    $tgameprofile = "";
    foreach($previews as $tp)
    {
        $tgameprofile .= renderReviewOverview($tp);
    }
    $tcontent = <<<PAGE
      {$tgameprofile}
PAGE;
    return $tcontent;
    
}

// ----BUSINESS LOGIC---------------------------------
// Start up a PHP Session for this user.
session_start();

$treviews = [];
$tname = $_REQUEST["name"] ?? "";
$tid = $_REQUEST["id"] ?? -1;

//Handle our Requests and Search for Games using different methods
if (is_numeric($tid) && $tid > 0) 
{
    $treview = jsonLoadOneReview($tid);
    $treviews[] = $treview;
} 
else if (!empty($tname)) 
{
    //Filter the name
    $tname = appFormProcessData($tname);
    $tgamelist = jsonLoadAllReview();
    foreach ($tgamelist as $tp)
    {
        if (strtolower($tp->lastname) === strtolower($tname)) 
        {
            $tplayers[] = $tp;
        }
    }
}

//Page Decision Logic - Have we found a game?  
//Doesn't matter the route of finding them
if (count($treviews)===0) 
{
    appGoToError();
} 
else
{
    //We've found our game
    $tpagecontent = createPage($treviews);
    $tpagetitle = "Reviews";
    // ----BUILD OUR HTML PAGE----------------------------
    // Create an instance of our Page class
    $tpage = new MasterPage($tpagetitle);
    $tpage->setDynamic2($tpagecontent);
    $tpage->renderPage();
}
?>