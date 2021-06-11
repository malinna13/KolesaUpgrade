<?php
namespace Page\Acceptance;

class WishlistPage
{
    /**
     * урл страницы избранных товаров
     */
    public static $URL = 'index.php?fc=module&module=blockwishlist&controller=mywishlist';

    /**
     * локатор кнопки Удалить из избранного
     */
    public static $deleteWishlistButton = '//a[@class="icon"]';

     /**
     * локатор кнопки Sign out
     */
    public static $signOutButton = '//a[@class="logout"]';
    

    /**
     * локатор количества товаров в избранных
     */
    public static $wishlistQty = '//div[@id="block-history"]//*/td[2]';
   
    
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
