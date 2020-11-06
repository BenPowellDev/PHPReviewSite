<?php

class BLLGame
{
    //-------CLASS FIELDS------------------
    public $id = null;
    public $name;
    public $age;
    public $genre;
    public $price;
    public $review;
    public $description;
    
    public function fromArray(stdClass $passoc)
    {
        foreach($passoc as $tkey => $tvalue)
        {
            $this->{$tkey} = $tvalue;
        }
    }
}

class BLLReview
{
    //-------CLASS FIELDS------------------
    public $id = null;
    public $title;
    public $rating;
    public $body1;
    public $body2;
    public $review1;
    public $review2;
    public $review3;
    
    public function fromArray(stdClass $passoc)
    {
        foreach($passoc as $tkey => $tvalue)
        {
            $this->{$tkey} = $tvalue;
        }
    }
}

class BLLPurchase
{
    //-------CLASS FIELDS------------------
    public $id = null;
    public $retail1;
    public $retail1pr;
    public $retail2;
    public $retail2pr;
    public $retail3;
    public $retail3pr;
    public $end;
    
    public function fromArray(stdClass $passoc)
    {
        foreach($passoc as $tkey => $tvalue)
        {
            $this->{$tkey} = $tvalue;
        }
    }
}

class BLLNewsItem 
{
    //-------CLASS FIELDS------------------
    public $id = null;
    public $heading;
    public $tagline;
    public $thumb_href;
    public $img_href;
    public $item_href;
    public $summary;
    public $content;
    
    public function fromArray(stdClass $passoc)
    {
        foreach($passoc as $tkey => $tvalue)
        {
            $this->{$tkey} = $tvalue;
        }
    }
}

class BLLConsole
{
    //-------CLASS FIELDS------------------
    public $id = null;
    public $name;
    public $size;
    public $weight;
    public $screen;
    public $apu;
    public $storage;
    public $wireless;
    public $vidoutput;
    public $audoutput;
    public $buttons;
    public $usb;
    public $battery;
    public $life;
    
    public function fromArray(stdClass $passoc)
    {
        foreach($passoc as $tkey => $tvalue)
        {
            $this->{$tkey} = $tvalue;
        }
    }
}

?>