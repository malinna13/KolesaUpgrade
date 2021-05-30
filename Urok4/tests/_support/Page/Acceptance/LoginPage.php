<?php
namespace Page\Acceptance;
/**
 * Страница для авторизации
 */
class LoginPage
{
   /**
    * Юзернейм заблокированного пользователя
    */
    public const USERNAME = 'locked_out_user';

    /**
    * Стандартный пароль для успешной авторизации
    */
    public const PASSWORD = 'secret_sauce';

    /**
    * Текст ошибки авторизации заблокированным пользователем
    */
    public const LOCKED_USER_MESSAGE = 'Epic sadface: Sorry, this user has been locked out.';

    /**
     * Урл страницы авторизации
     */
    public static $URL = '';

    /**
     * Селектор для поля ввода логина
     */
    public static $loginInput = '#user-name';

    /**
     * Селектор для поля ввода пароля
     */
    public static $passwordInput = '#password';

    /**
     * Селектор для кнопки логина
     */
    public static $loginButton = '#login-button';

     /**
     * Селектор для кнопки закрытия окна об ошибке авторизации
     */
    public static $errorMessageButton = '#login_button_container div.error-message-container.error button';
   
     /**
     * Объект тестера
     * 
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    /**
     * Метод констуктор
     */
    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

    /**
     * Нажимает кнопку закрытия блока ошибки
     */
    public function clickErrorButton()
    {
        $this->acceptanceTester->click(self::$errorMessageButton);
    }

   
}
