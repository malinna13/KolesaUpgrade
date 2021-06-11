<?php

namespace Tests\Acceptance;
use Faker\Factory;
use Helper\CustomFakerProvider;
use Page\Acceptance\FillPage;

/**
 * Класс для тестирования формы
 */
class fillFormCest
{
    /**
     * Проверка заполнения полей с помощью фейкера
     * @group test2
     */
    public function checkFillForm (\AcceptanceTester $I)
    {
        $faker = Factory::create();
        $faker->addProvider(new CustomFakerProvider($faker));

        $name = $faker->firstName;
        $lastName = $faker->lastName;
        $email = $faker->email;
        $phone = $faker->phoneNumber;
        $address = $faker->address;
        $city = $faker->city;
        $state = $faker->state;
        $zip = $faker->postcode;
        $ccFirstName = $faker->firstName;
        $ccLastName = $faker->lastName;
        $ccNumber = $faker->getCCNumber();
        $ccCVV = $faker->numberBetween(111, 999);
        
        $I->amOnPage('');
        $I->fillField(FillPage::$firstName, $name);
        $I->fillField(FillPage::$lastName, $lastName);
        $I->fillField(FillPage::$email, $email);
        $I->fillField(FillPage::$phone, $phone);
        $I->fillField(FillPage::$address, $address);
        $I->fillField(FillPage::$city, $city);
        $I->fillField(FillPage::$state, $state);
        $I->fillField(FillPage::$zip, $zip);
        $I->click(FillPage::$paymentTypeCard);
        $I->fillField(FillPage::$cardfirstName, $ccFirstName);
        $I->fillField(FillPage::$cardlastName, $ccLastName);
        $I->fillField(FillPage::$cardNumber, $ccNumber);
        $I->fillField(FillPage::$cardcvv, $ccCVV);
        $I->selectOption(FillPage::$cardMonth, 'October');
        $I->selectOption(FillPage::$cardYear, '2025');
        $I->wait(20);
        $I->click(FillPage::$registerButton);
        $I->waitForText('Good job');
    }
}