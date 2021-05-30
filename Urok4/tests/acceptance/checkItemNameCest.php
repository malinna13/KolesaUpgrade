<?php

class checkItemNameCest
{
    // $ItemBlouseCss = '#homefeatured div.right-block a[title="Blouse"]';
    // $itemBlouseXPath = '//ul[@id="homefeatured"]//div[@class="right-block"]//a[@title="Blouse"]';
    // $itemToHoverCss = '#homefeatured li:nth-child(2) div.product-container';
    // $itemToHoverXPath = '//ul[@id="homefeatured"]/li[2]/div';
    // $quickViewButtonCss = '#homefeatured > li:nth-child(2) a.quick-view span';
    // $quickViewButtonXPath = '//ul[@id="homefeatured"]/li[2]//a[@class="quick-view"]/span';
    // $iFrameCss = 'div.fancybox-opened';
    // $iFrameXPath = '//div[@class="fancybox-wrap fancybox-desktop fancybox-type-iframe fancybox-opened"]';
    
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
        // wait for till the iframe loads 
        $I->waitForElementVisible('#index > div.fancybox-overlay.fancybox-overlay-fixed > div',30);
        // check the right item name
        $I->see('Blouse');

    }
}
