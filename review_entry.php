<?php
//----Favicon Implementation-------------------------
echo '<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon"/>';

// ----INCLUDE APIS------------------------------------
include ("api/api.inc.php");

// ----PAGE GENERATION LOGIC---------------------------
function createFormPage()
{ 
    $tcontent = <<<PAGE
    <form class="form-horizontal">
	<fieldset>
		<!-- Form Name -->
		<legend>Write a Review</legend>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="squadno">Review Title</label>
			<div class="col-md-4">
				<input id="squadno" name="squadno" type="text" placeholder=""
					class="form-control input-md" required=""> <span class="help-block">Enter
					the Review Title</span>
			</div>
		</div>
		
		<!-- Select Basic -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="pos">Score</label>
			<div class="col-md-4">
				<select id="pos" name="pos" class="form-control">
					<option value="1">1 Star</option>
					<option value="2">2 Star</option>
					<option value="3">3 Star</option>
					<option value="4">4 Star</option>
					<option value="5">5 Star</option>
				</select>
                <span class="help-block">Select the Game's Score</span>
			</div>
		</div>

		<!-- Textarea -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="bio">Review Text</label>
			<div class="col-md-4">
				<textarea class="form-control" rows="10" id="bio" name="bio"></textarea>
                <span class="help-block">Your Review</span>
			</div>
		</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="form-sub">Submit Form</label>
  <div class="col-md-4">
    <button id="form-sub" name="form-sub" type="submit" class="btn btn-danger">Submit Review</button>
  </div>
</div>
	</fieldset>
</form>
PAGE;
    return $tcontent;
}

// ----BUSINESS LOGIC---------------------------------

session_start();
$tpagecontent = "";

if(appFormMethodIsPost())
{
    //Capture the Bio Data
    $tbio = appFormProcessData($_REQUEST["bio"]  ?? "");
    //Map the Form Data
        
    $tvalid = true;
    //TODO:  PUT SERVER-SIDE VALIDATION HERE
    
    if($tvalid)
    {
        
    } 
    else 
    {
        $tdest = appFormActionSelf();
        $tpagecontent = <<<ERROR
                         <div class="well">
                            <h1>Form was Invalid</h1>
                            <a class="btn btn-warning" href="{$tdest}">Try Again</a>
                         </div>
ERROR;
    }
}
else
{
    //This page will be created by default.
    $tpagecontent = createFormPage();
}
$tpagetitle = "Write a Review";
$tpagelead = "";
$tpagefooter = "";

// ----BUILD OUR HTML PAGE----------------------------
// Create an instance of our Page class
$tpage = new MasterPage($tpagetitle);
// Set the Three Dynamic Areas (1 and 3 have defaults)
if (! empty($tpagelead))
    $tpage->setDynamic1($tpagelead);
$tpage->setDynamic2($tpagecontent);
if (! empty($tpagefooter))
    $tpage->setDynamic3($tpagefooter);
    // Return the Dynamic Page to the user.
$tpage->renderPage();

?>