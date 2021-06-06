<?php

use Page\Acceptance\AccountPage;
use Page\Acceptance\LoginPage;
use Page\Acceptance\MainPage;
use Page\Acceptance\WishlistPage;

/**
 * Класс проверки добавления товара в избранное
 */

class FavouritesCest
{
    public const PRODUCTS_NUM = 2;

    /**
     * авторизация на сайте
     */
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('');
        $I->click(MainPage::$signInButton);
        $I->fillField(LoginPage::$email, 'malinna13@gmail.com');
        $I->fillField(LoginPage::$password, '12345');
        $I->click(LoginPage::$signInButton);

    }
   
    /**
     * Проверка количества добавленных в избранные
     */
    public function addingToWishlist(\Step\Acceptance\AddToWishlist $I)
    {
        $I->amOnPage('');
        // добавляем товары в избранные
        $I->addProductToWishlist();
        $I->amOnPage('');
        $I->click(MainPage::$myAccount);
        $I->seeInCurrentUrl(AccountPage::$URL);
        $I->click(AccountPage::$myWishlists);
        $I->seeInCurrentUrl(WishlistPage::$URL);

        $qty = $I->grabTextFrom(WishlistPage::$wishlistQty);
        $I->assertEquals(self::PRODUCTS_NUM, $qty, 'Checks that we see correct number of items in wishlist');
    }
     /**
     * очистка избранных и разлогин
     */
    public function _after(AcceptanceTester $I)
    {
        $I->click(WishlistPage::$deleteWishlistButton);
        $I->acceptPopup();
        $I->click(WishlistPage::$signOutButton);
    }
}
