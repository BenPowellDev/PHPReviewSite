<?php

//Include our HTML Page Class
require_once("oo_page.inc.php");

class MasterPage
{
    //-------FIELD MEMBERS----------------------------------------
    private $_htmlpage;     //Holds our Custom Instance of an HTML Page
    private $_dynamic_1;    //Field Representing our Dynamic Content #1
    private $_dynamic_2;    //Field Representing our Dynamic Content #2
    private $_dynamic_3;    //Field Representing our Dynamic Content #3
    private $_game_ids;
    
    //-------CONSTRUCTORS-----------------------------------------
    function __construct($ptitle)
    {
        $this->_htmlpage = new HTMLPage($ptitle);
        $this->setPageDefaults();
        $this->setDynamicDefaults(); 
        $this->_game_ids = [1,2,3,4,5,6,7,8,9,10];
    }
    
    //-------GETTER/SETTER FUNCTIONS------------------------------
    public function getDynamic1() { return $this->_dynamic_1; }
    public function getDynamic2() { return $this->_dynamic_2; } 
    public function getDynamic3() { return $this->_dynamic_3; }
    public function setDynamic1($phtml) { $this->_dynamic_1 = $phtml; }
    public function setDynamic2($phtml) { $this->_dynamic_2 = $phtml; } 
    public function setDynamic3($phtml) { $this->_dynamic_3 = $phtml; }
    public function getPage(): HTMLPage { return $this->_htmlpage; } 
    
    //-------PUBLIC FUNCTIONS-------------------------------------
                   
    public function createPage()
    {
       //Create our Dynamic Injected Master Page
       $this->setMasterContent();
       //Return the HTML Page..
       return $this->_htmlpage->createPage();
    }
    
    public function renderPage()
    {
       //Create our Dynamic Injected Master Page
       $this->setMasterContent();
       //Echo the page immediately.
       $this->_htmlpage->renderPage();
    }
    
    public function addCSSFile($pcssfile)
    {
        $this->_htmlpage->addCSSFile($pcssfile);
    }
    
    public function addScriptFile($pjsfile)
    {
        $this->_htmlpage->addScriptFile($pjsfile);
    }
    
    //-------PRIVATE FUNCTIONS-----------------------------------    
    private function setPageDefaults()
    {
        $this->_htmlpage->setMediaDirectory("css","js","fonts","img","data");
        $this->addCSSFile("bootstrap.css");
        $this->addCSSFile("site.css");
        $this->addCSSFile("bootstrap-theme.css");
        $this->addScriptFile("jquery-2.2.4.js");
        $this->addScriptFile("bootstrap.js");
        $this->addScriptFile("holder.js");        
    }
    
    private function setDynamicDefaults()
    {
        $tcurryear = date("Y");
        //Set the Three Dynamic Points to Empty By Default.
        $this->_dynamic_1 = <<<JUMBO
<h1>Switch News</h1>
<h4>The home of all things Nintendo Switch!</h4>
JUMBO;
        $this->_dynamic_2 = "";
        $this->_dynamic_3 = <<<FOOTER
<p>Ben Powell - LJMU &copy; {$tcurryear}</p>
FOOTER;
    }
    
    private function setMasterContent()
    {
        $tlogin = "app_entry.php";
        $tlogout = "app_exit.php";
        $tentryhtml = <<<FORM
        <form id="signin" action="{$tlogin}" method="post" 
        class="navbar-form navbar-right" role="form">
           <div class="input-group">
               <span class="input-group-addon">
                <i class="glyphicon glyphicon-user"></i>
                </span>
               <input id="email" type="email" class="form-control" name="myname" value="" placeholder="">                                        
           </div>
           <button type="submit" class="btn btn-primary">Enter</button>
        </form>
FORM;
        
        $texithtml = <<<EXIT
        <a class="btn btn-info navbar-right" 
        href="{$tlogout}?action=exit">Exit</a>
EXIT;
        
        $tauth = isset($_SESSION["myuser"]) ? $texithtml : $tentryhtml;

        $tid = $this->_game_ids[array_rand($this->_game_ids,1)];        
        $tmasterpage = <<<MASTER
<div class="container">
	<div class="header clearfix">
		<nav>
		    {$tauth}
			<ul class="nav nav-pills pull-right">
            <a href="console.php" class="btn btn-dark" role="button">Console Info</a>
			<a href="ranking.php" class="btn btn-dark" role="button">Game Rankings</a>
            <a href="game.php?id={$tid}" class="btn btn-dark" role="button">Random Game</a>
            <a href="gamelist.php" class="btn btn-dark" role="button">All Games</a>
			<a href="form.php" class="btn btn-dark" role="button">Sign Up</a>
			</ul>
			<a href="index.php" class="btn btn-dark" role="button">Home</a>
		</nav>
	</div>
	<div class="jumbotron">
		{$this->_dynamic_1}
    </div>
	<div class="row details">
		{$this->_dynamic_2}
    </div>
    <footer class="footer">
		{$this->_dynamic_3}
	</footer>
</div>        
MASTER;
        $this->_htmlpage->setBodyContent($tmasterpage); 
    }
}

?>