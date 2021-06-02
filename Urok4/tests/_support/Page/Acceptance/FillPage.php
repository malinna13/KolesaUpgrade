<?php
namespace Page\Acceptance;

/**
 * PageObject для страницы формы
 */
class FillPage
{
    /**
     * локатор поля имени
     */
    public static $firstName = '//*[@id="firstName"]';
    
    /**
     * локатор поля фамилии
     */
    public static $lastName = '//*[@id="lastName"]';

    /**
     * локатор поля e-mail
     */
    public static $email = '//*[@id="input_38"]';

    /**
     * локатор поля phone
     */
    public static $phone = '//*[@id="phoneNumber"]';

     /**
     * локатор поля address
     */
    public static $address = '//*[@id="address"]';

    /**
     * локатор поля city
     */
    public static $city = '//*[@id="city"]';

     /**
     * локатор поля state
     */
    public static $state = '//*[@id="state"]';

     /**
     * локатор поля zip
     */
    public static $zip = '//*[@id="postal"]';
    
    /**
     * локатор радио-кнопки оплаты картой
     */
    public static $paymentTypeCard = '//*[@id="input_32_paymentType_credit"]';

    /**
     * локатор поля имени на карте
     */
    public static $cardfirstName = '//*[@id="input_32_cc_firstName"]';
    
    /**
     * локатор поля фамилии на карте
     */
    public static $cardlastName = '//*[@id="input_32_cc_lastName"]';

     /**
     * локатор поля номера карты
     */
    public static $cardNumber = '//*[@id="input_32_cc_number"]';
    
    /**
     * локатор поля защитного кода карты
     */
    public static $cardcvv = '//*[@id="input_32_cc_ccv"]';
    
    /**
     * локатор поля месяца срока действия карты
     */
    public static $cardMonth = '//*[@id="input_32_cc_exp_month"]';

    /**
     * локатор поля года срока действия карты
     */
    public static $cardYear = '//*[@id="input_32_cc_exp_year"]';

      /**
     * локатор кнопки регистрации
     */
    public static $registerButton = '//*[@id="input_36"]';



    /**
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

}
