<?php
namespace Page\Acceptance;

/**
 * класс для главной страницы хабра
 */
class HabrMainPage
{
    // url главной страницы хабра
    public static $URL = '';

    //Селектор меню разделов
    public static $menuLink = '//*[@id="navbar-links"]/li[%d]';

    //Селектор заголовка категории
    public static $categoryTitle = '//div[contains(text(), "%s")]';
    
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
