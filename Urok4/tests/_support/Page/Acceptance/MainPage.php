<?php
namespace Page\Acceptance;
/**
 * Главная страница
 */
class MainPage
{
    /**
     * Урл главной страницы
     */
    public static $URL = '';
    
    /**
     * Селектор для меню Dresses
     */
    public static $menuDresses = '#block_top_menu > ul > li:nth-child(2)';
    
    /**
     * Селектор для подменю SummerDresses
     */
    public static $menuSummerDresses = '#block_top_menu > ul > li:nth-child(2) li:nth-child(3) > a';

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
