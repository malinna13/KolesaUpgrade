<?php
namespace Page\Acceptance;

class LoginPage
{
    /**
     * урл страницы авторизации
     */
    public static $URL = 'index.php?controller=authentication&back=my-account';

    /**
     * локатор поля для ввода почты
     */
    public static $email = '//*[@id="email"]';

    /**
     * локатор поля для ввода пароля
     */
    public static $password = '//*[@id="passwd"]';

    /**
     * локатор кнопки sign in
     */
    public static $signInButton = '//*[@id="SubmitLogin"]';
   

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

}
