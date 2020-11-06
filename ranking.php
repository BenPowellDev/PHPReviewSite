<?php 
//----Favicon Implementation-------------------------
echo '<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon"/>';

//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------
function createPage()
{
    //Content Classes via XML and JSON
    $tarticles = xmlLoadAll("data/xml/articles-index.xml","PLHomeArticle","Article");
    
    //Get the News Item Array
    $tnilist = jsonLoadAllNewsItems();
    $ttest = true;
    
    //Create the News Items for Article 2.
    $tnews = "";
    $tcount = 0;
    foreach($tnilist as $tni)
    {
        $tnews.=renderNewsItemAsList($tni);
        $tcount++;
    }   
    
    //$tarticles[1]->content = $tnews;
        
    //Build the Articles
    $tarticlehtml = "";
    foreach($tarticles as $ta)
    {
        $tarticlehtml .= renderUIHomeArticle($ta);
    }    
$tcontent = <<<PAGE
        <div class="row">
            <h1>Game Rankings</h1> 
        </div>
        <div class="row details">
        <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Game</th>
            <th scope="col">Genre</th>
            <th scope="col">Recommendation Score</th>
          </tr>
        </thead>
        <tbody>
          <tr data-href="index.php/">
            <th scope="row">1</th>
            <td>The Legend of Zelda: Breath Of The Wild</td>
            <td>Action-Adventure</td>
            <td>5</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Animal Crossing: New Horizons</td>
            <td>Survival/Casual</td>
            <td>5</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Smash Bros: Ultimate</td>
            <td>Fighter</td>
            <td>5</td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Splatoon 2</td>
            <td>Shooter</td>
            <td>4.1</td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>Pokemon Sword</td>
            <td>Pet Battle</td>
            <td>4</td>
          </tr>
          <tr>
            <th scope="row">6</th>
            <td>Mario Kart 8: Deluxe</td>
            <td>Racing</td>
            <td>4</td>
          </tr>
          <tr>
            <th scope="row">7</th>
            <td>Super Mario Odyssey</td>
            <td>Adventure</td>
            <td>5</td>
          </tr>
          <tr>
            <th scope="row">8</th>
            <td>Super Mario Maker 2</td>
            <td>Platformer</td>
            <td>4.6</td>
          </tr>
          <tr>
            <th scope="row">9</th>
            <td>Minecraft</td>
            <td>Survival/Adventure</td>
            <td>4.1</td>
          </tr>
          <tr>
            <th scope="row">10</th>
            <td>The Legend of Zelda: Link's Awakening</td>
            <td>Action/Adventure</td>
            <td>5</td>
          </tr>
          <tr>
            <th scope="row">11</th>
            <td>Super Mario Party</td>
            <td>Party Games</td>
            <td>4.8</td>
          </tr>
          <tr>
            <th scope="row">12</th>
            <td>Luigi's Mansion</td>
            <td>Childish Horror</td>
            <td>4.6</td>
          </tr>
          <tr>
            <th scope="row">13</th>
            <td>Stardew Valley</td>
            <td>Survival/Farming</td>
            <td>4</td>
          </tr>
          <tr>
            <th scope="row">14</th>
            <td>Untitled Goose Game</td>
            <td>Comedy</td>
            <td>5</td>
          </tr>
          <tr>
            <th scope="row">15</th>
            <td>Human: Fall Flat</td>
            <td>Teamwork/Comedy</td>
            <td>4.2</td>
          </tr>
          <tr>
            <th scope="row">16</th>
            <td>Super Mario Bros. U Deluxe</td>
            <td>Platformer</td>
            <td>4.5</td>
          </tr>
        </tbody>
      </table>
    </div>
PAGE;
return $tcontent;
}

//----BUSINESS LOGIC---------------------------------
//Start up a PHP Session for this user.
session_start();

//Build up our Dynamic Content Items. 
$tpagetitle = "Game Rankings";
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