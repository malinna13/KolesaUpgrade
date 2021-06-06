<?php

namespace Tests\Acceptance;

use Codeception\Example;
use Page\Acceptance\HabrMainPage;

/**
 * Класс для тестирования меню категорий
 * @group test
 */
class CategoriesCest
{
    /**
     * Проверяет открытие категорий меню
     * @group test
     * @param Example $data
     * @dataProvider getDataForCategory
     */
    public function openRandomCategories(\AcceptanceTester $I, Example $data)
    {
        $I->amOnPage(HabrMainPage::$URL);
       // $I->waitForElementClickable(sprintf(HabrMainPage::$menuLink);
        $I->click(sprintf(HabrMainPage::$menuLink, $data['category']));
        $I->seeInCurrentUrl($data['url']);
        $I->seeElement(sprintf(HabrMainPage::$categoryTitle, $data['title']));
    }

    protected function getDataForCategory()
    {
        $arr = array( ['category' => 2, 'url' => 'develop', 'title' => 'Разработка'],
        ['category' => 3, 'url' => 'admin', 'title' => 'Администрирование'],
        ['category' => 4, 'url' => 'design', 'title' => 'Дизайн'],
        ['category' => 5, 'url' => 'management', 'title' => 'Менеджмент'],
        ['category' => 6, 'url' => 'marketing', 'title' => 'Маркетинг'],
        ['category' => 7, 'url' => 'popsci', 'title' => 'Научпоп']);
        shuffle($arr);
        return(array_slice($arr, 0, 2));      
    }
}