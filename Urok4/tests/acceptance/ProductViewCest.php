<?php

use Page\Acceptance\MainPage;
use Page\Acceptance\SearchPage;

/**
 * Класс для проверки смены раскладки результатов поиска
 */
class ProductViewCest
{
  

    /**
     * Проверяет смену раскладки продуктов с grid на list
     */
    public function productViewChange(AcceptanceTester $I)
    {
        $I->amOnPage(MainPage::$URL);
        $I->moveMouseOver(MainPage::$menuDresses);
        $I->click(MainPage::$menuSummerDresses);
        $I->seeInCurrentUrl(SearchPage::$URL);
        $I->seeElement(SearchPage::$gridView);
        $I->seeElement(SearchPage::$gridViewProducts);
        $I->click(SearchPage::$listView);
        $I->seeElement(SearchPage::$listViewProducts);
    }
}
