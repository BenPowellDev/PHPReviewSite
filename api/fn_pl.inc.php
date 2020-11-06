<?php
require_once ("oo_bll.inc.php");
require_once ("oo_pl.inc.php");

// ----------NEWS ITEM RENDERING------------------------------------------
function renderNewsItemAsList(BLLNewsItem $pitem)
{
    $titemsrc = !empty($pitem->thumb_href) ? $pitem->thumb_href : "blank-thumb.jpg";
    $tnewsitem = <<<NI
		    <section class="list-group-item clearfix">
		        <div class="media-left media-top">
                    <img src="img/news/{$titemsrc}" width="100" />
                </div>
                <div class="media-body">
				<h4 class="list-group-item-heading">{$pitem->heading}</h4>
				<p class="list-group-item-text">{$pitem->tagline}</p>
				<a class="btn btn-xs btn-default" href="news.php?storyid={$pitem->id}">Read...</a>
				</div>
			</section>
NI;
    return $tnewsitem;
}

// ----------GAME RENDERING-----------------------------------------------
function renderGameOverview(BLLGame $pp)
{
    $timgref = "img/game/{$pp->id}.png";
    $timg = $timgref;
    $toverview = <<<OV
    <article class="row marketing">
        <div class="media-left">
            <img src="$timg" width="256" />
        </div>
        <div class="media-body">
            <div class="well">
                <h1>{$pp->name}</h1>
            </div>
            <ul class="nav nav-tabs">
            <li><a href="game.php?id={$pp->id}">Game Overview</a></li>
            <li><a href="review.php?id={$pp->id}">Reviews</a></li>
            <li><a href="purchase.php?id={$pp->id}">Purchase Links</a></li>
            </ul>
            <h4>Genre: {$pp->genre}</h4>
            <h4>Age Rating: {$pp->age}</h4>
            <h4>Average Review : {$pp->review}</h4>
            <h4>Average Price: {$pp->price}</h4>
            <h4>{$pp->description}</h4>
        </div>
 
    </article>
OV;
    return $toverview;
    
}
// ----------PURCHASE RENDERING--------------------------------------------
function renderPurchaseOverview(BLLPurchase $pu)
{
    $timgref = "img/game/{$pu->id}.png";
    $timg = $timgref;
    $toverview = <<<OV
    <article class="row marketing">
        <div class="media-left">
            <img src="$timg" width="256" />
        </div>
        <div class="media-body">
            <div class="well">
                <h1>{$pu->name}</h1>
            </div>
            <ul class="nav nav-tabs">
            <li><a href="game.php?id={$pu->id}">Game Overview</a></li>
            <li><a href="review.php?id={$pu->id}">Reviews</a></li>
            <li><a href="purchase.php?id={$pu->id}">Purchase Links</a></li>
            </ul>
            <h4>All links provided ship to the UK</h4>
            <h4><a href="{$pu->retail1}">Amazon UK</a></h4>
            <h4>{$pu->retail1pr}</h4>
            <h4><a href="{$pu->retail2}">Game UK</a></h4>
            <h4>{$pu->retail2pr}</h4>
            <h4><a href="{$pu->retail3}">Nintendo E-Shop UK</a></h4>
            <h4>{$pu->retail3pr}</h4>
        </div>
 
    </article>
OV;
    return $toverview;
    
}
// ----------REVIEW RENDERING---------------------------------------
function renderReviewOverview(BLLReview $pr)
{
    $timgref = "img/game/{$pr->id}.png";
    $timg = $timgref;
    $toverview = <<<OV
    <article class="row marketing">
        <div class="media-left">
            <img src="$timg" width="256" />
        </div>
        <div class="media-body">
            <div class="well">
                <h1>{$pr->name}</h1>
            </div>
            <ul class="nav nav-tabs">
            <li><a href="game.php?id={$pr->id}">Game Overview</a></li>
            <li><a href="review.php?id={$pr->id}">Reviews</a></li>
            <li><a href="purchase.php?id={$pr->id}">Purchase Links</a></li>
            </ul>
            <h3>{$pr->title}</h3>
            <h4>Our Rating: {$pr->rating}</h4>
            <h4>{$pr->body1}</h4>
            <h4>{$pr->body2}</h4>
            <h4><a href="{$pr->review1}">IGN's Review</a></h4>
            <h4><a href="{$pr->review2}">Gamespot's Review</a></h4>
            <h4><a href="{$pr->review3}">Metacritic's Review</a></h4>
            <a href="review_entry.php" class="btn btn-danger" role="button">Write a Review</a>
        </div>
 
    </article>
OV;
    return $toverview;
    
}
// ----------CONSOLE RENDERING--------------------------------------------
function renderConsoleSummary(BLLConsole $ps)
{
   $tshtml = <<<OVERVIEW
    <div class="well">
            <ul class="list-group">
                <li class="list-group-item">
                    Console Name: <strong>{$ps->name}</strong>
                </li>
                <li class="list-group-item">
                    Size: <strong>{$ps->size}</strong>
                </li>
                <li class="list-group-item">
                    Weight: <strong>{$ps->weight}</strong>
                </li>
                <li class="list-group-item">
                    Screen: <strong>{$ps->screen}</strong>
                </li>
                <li class="list-group-item">
                    CPU/GPU: <strong>{$ps->apu}</strong>
                </li>
                <li class="list-group-item">
                    Storage: <strong>{$ps->storage}</strong>
                </li>
                <li class="list-group-item">
                    Wireless: <strong>{$ps->wireless}</strong>
                </li>
                <li class="list-group-item">
                    Video Output: <strong>{$ps->vidoutput}</strong>
                </li>
                <li class="list-group-item">
                    Audio Output: <strong>{$ps->audoutput}</strong>
                </li>
                <li class="list-group-item">
                    Buttons: <strong>{$ps->buttons}</strong>
                </li>
                <li class="list-group-item">
                    USB: <strong>{$ps->usb}</strong>
                </li>
                <li class="list-group-item">
                    Battery Capacity: <strong>{$ps->battery}</strong>
                </li>
                <li class="list-group-item">
                Battery Life: <strong>{$ps->life}</strong>
            </li>
            </ul>
    </div>
OVERVIEW;
   return $tshtml;
}

function renderUITabs(array $ptabs, $ptabid)
{
    $count = 0;
    $ttabnav = "";
    $ttabcontent = "";
    
    foreach ($ptabs as $ttab) {
        $tnavactive = "";
        $ttabactive = "";
        if ($count === 0) {
            $tnavactive = " class=\"active\"";
            $ttabactive = " active in";
        }
        $ttabnav .= "<li{$tnavactive}><a href=\"#{$ttab->tabid}\" data-toggle=\"tab\">{$ttab->tabname}</a></li>";
        $ttabcontent .= "<article class=\"tab-pane fade{$ttabactive}\" id=\"{$ttab->tabid}\">{$ttab->content}</article>";
        $count ++;
    }
    
    $ttabhtml = <<<HTML
        <ul class="nav nav-tabs">
        {$ttabnav}
        </ul>
    	<div class="tab-content" id="{$ptabid}">
			  {$ttabcontent}
		</div>
HTML;
    return $ttabhtml;
}

function renderUIHomeArticle(PLHomeArticle $phome, $pwidth = 6)
{
    $thome = <<<HOME
    <article class="col-lg-{$pwidth}">
		<h2>{$phome->heading}</h2>
		<h4>
			<span class="label label-success">{$phome->tagline}</span>
		</h4>
		<div class="home-thumb">
			<img src="img/{$phome->storyimg_href}" />
		</div>
		<div>
		  <strong>
			{$phome->summary}
		  </strong>
		</div>
        <div>
		    {$phome->content}
        </div>
        <div class="options details">
			<a class="btn btn-info" href="{$phome->link}">{$phome->linktitle}</a>
        </div>
	</article>
HOME;
    return $thome;
}
?>