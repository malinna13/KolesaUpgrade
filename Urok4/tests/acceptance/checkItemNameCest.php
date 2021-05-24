<?php

class checkItemNameCest
{
  
    // tests
    public function openCorrectItem(AcceptanceTester $I)
    {
        // open page http://automationpractice.com/index.php
        $I->amOnPage('');
        // find Blouse item 
        $I->seeElement('#homefeatured > li:nth-child(2) > div > div.right-block > h5 > a', ['title'=>'Blouse']);
        // hover coursor over item
        $I->moveMouseOver('#homefeatured > li:nth-child(2) > div');
        // click button Quick view
        $I->clickWithLeftButton('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view > span');
        // wait for till the modal window loads 
        $I->waitForElementVisible('#index > div.fancybox-overlay.fancybox-overlay-fixed > div',30);
        // check the right item name
        $I->see('Blouse');

    }
}
