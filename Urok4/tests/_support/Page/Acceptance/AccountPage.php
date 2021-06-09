<?php
namespace Page\Acceptance;

class AccountPage
{
     /**
     * урл страницы пользователя
     */
    public static $URL = 'index.php?controller=my-account';

    /**
     * локатор кнопки избранного my wishlists
     */
    public static $myWishlists = '//a[@title="My wishlists"]';



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
