<?php

class searchResultsCest
{
    // tests
    public function searchResultNumber(FunctionalTester $I)
    {
        // open page http://automationpractice.com/index.php
        $I->amOnPage('');
        // fill search field with "Printed dress"
        $I->fillField('#search_query_top', 'Printed dress');
        // click Search button
        $I->click('#searchbox > button');
        // check if number of search result equals 5
        $I->seeNumberOfElements('//*[@id="center_column"]/ul/li', 5);
    }
}
