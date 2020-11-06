<?php 
//----Favicon Implementation-------------------------
echo '<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon"/>';

//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{
    //Get the Data we need for this page

    $tconsole   = jsonLoadOneConsole(1);
    
    //Build the UI Components
    $tconsolehtml   = renderConsoleSummary($tconsole);

    //Construct the Page
$tcontent = <<<PAGE
    <div class="panel">
      <iframe width="1110" height="600"
        src="https://www.youtube.com/embed/gUEhQ65FOJ8">
        </iframe>
      <div class="panel-body">
        {$tconsolehtml}
       </div>
    </div>
</section>
     
PAGE;

return $tcontent;
}

//----BUSINESS LOGIC---------------------------------
//Start up a PHP Session for this user.
session_start();

//Build up our Dynamic Content Items. 
$tpagetitle = "Switch Information";
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