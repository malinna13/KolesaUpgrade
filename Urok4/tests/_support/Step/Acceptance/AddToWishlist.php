<?php
namespace Step\Acceptance;
use Page\Acceptance\AccountPage;
use Page\Acceptance\LoginPage;
use Page\Acceptance\MainPage;
use Page\Acceptance\WishlistPage;

class AddToWishlist extends \AcceptanceTester
{
    
    public const PRODUCTS_NUM = 2;
    public function addProductToWishlist(){
        $I = $this;

        for($i = 1; $i<=self::PRODUCTS_NUM; $i++) {

            $I->waitForElement(sprintf(MainPage::$firstProductCard, $i));
            $I->moveMouseOver(sprintf(MainPage::$firstProductCard, $i));
            $I->waitForElementClickable(sprintf(MainPage::$quickViewButton, $i));
            $I->clickWithLeftButton(sprintf(MainPage::$quickViewButton, $i));
            $I->waitForElementVisible(MainPage::$modalWindow,30);
            $I->switchToIframe(MainPage::$iframeWindow);
            $I->clickWithLeftButton(MainPage::$addToWish);
            $I->waitForElementClickable(MainPage::$closeMessage);
            $I->click(MainPage::$closeMessage);
            $I->switchToIframe();
            $I->waitForElementClickable(MainPage::$closeiFrame);
            $I->click(MainPage::$closeiFrame);
            
        }
    }
}