<?php
/**
 * Класс для проверки количества результатов поиска
 */
class searchResultsCest
{
    $searchInputCss = '#search_query_top';
    $searchInputXPath = '//input[@id="search_query_top"]';
    $searchButtonCss = '#searchbox > button';
    $searchButtonXPath = '//button[@name="submit_search"]';
    $searchResultsCss = '#center_column > ul > li';
    $searchResultsXPath = '//div[@id="center_column"]/ul/li'; 
    
    // tests

    /**
     * Проверка количества результатов поиска
     */

    public function searchResultNumber(FunctionalTester $I)
    {
        // open page http://automationpractice.com/index.php
        $I->amOnPage('');
        // fill search field with "Printed dress"
        $I->fillField('#search_query_top', 'Printed dress');
        // click Search button
        $I->click('#searchbox > button');
        // check if number of search result is 5
        $I->seeNumberOfElements('//*[@id="center_column"]/ul/li', 5);
    }
}
