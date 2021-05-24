<?php

class searchResultsCest
{
    // tests
    public function searchResultNumber(FunctionalTester $I)
    {
        $I->amOnPage('');
        $I->fillField('#search_query_top', 'Printed dress');
        $I->click('#searchbox > button');
        $I->seeNumberOfElements('//*[@id="center_column"]/ul/li', 5);
    }
}
