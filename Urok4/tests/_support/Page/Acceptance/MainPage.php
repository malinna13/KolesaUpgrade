<?php
namespace Page\Acceptance;

class MainPage
{
    /**
     * урл главной страницы магазина
    */ 
    public static $URL = '';

    /**
     * локатор кнопки входа sign in
    */ 
    public static $signInButton = '//a[@class="login"]';
    
    /**
     * локатор товара
    */ 
    public static $firstProductCard = '//*[@id="homefeatured"]/li[%s]/div';
   
    /**
     * локатор quick view
    */ 
    public static $quickViewButton = '//*[@id="homefeatured"]/li[%s]/div/div[1]//a[2]';

    /**
     * локатор модального окна карточки товара
    */ 
    public static $modalWindow = '//*[@id="index"]//div[contains(@class, "fancybox-opened")]';

     /**
     * локатор iframe
    */ 
    public static $iframeWindow = '//*[@class="fancybox-iframe"]';

    /**
     * локатор кнопки добавления в избранные
    */ 
    public static $addToWish = '//a[@id="wishlist_button"]';

    /**
     * локатор кнопки входа в личный кабинет
    */ 
    public static $myAccount = '//a[@class="account"]';
    
    /**
     * локатор кнопки закрытия всплывающего окна с сообщением Added to your wishlist.
    */ 
    public static $closeMessage = '//*[@id="product"]/div[2]/div/div/a';

    /**
     * локатор кнопки закрытия iframe.
    */ 
    public static $closeiFrame = 'a.fancybox-item';
    
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
