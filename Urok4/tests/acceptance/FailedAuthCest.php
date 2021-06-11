<?php

use Page\Acceptance\LoginPage;

/**
 * Класс для проверки логина заблокированным пользователем
 */
class FailedAuthCest
{
    /**
     * Проверяет закрытие блока с ошибкой при неудачной авторизации
     */
    public function lockedUserLogin(AcceptanceTester $I)
    {
        $loginPage = new LoginPage($I);
        $I->amOnPage(LoginPage::$URL);
        $I->fillField(LoginPage::$loginInput, LoginPage::USERNAME);
        $I->fillField(LoginPage::$passwordInput, LoginPage::PASSWORD);
        $I->click(LoginPage::$loginButton);
        $I->see(LoginPage::LOCKED_USER_MESSAGE);
        $loginPage->clickErrorButton();
        $I->dontSee(LoginPage::LOCKED_USER_MESSAGE);
    }
}
