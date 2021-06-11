<?php
namespace Page\Acceptance;
/**
 * Страница категории Summer Dresses
 */
class SearchPage
{
    /**
     * url страницы категории Summer Dresses
     */
    public static $URL = '/index.php?id_category=11&controller=category';

    /**
     *селектор включенного режима grid
     */
    public static $gridView = '#grid,li.selected';

    /**
     * селектор блока продуктов в виде grid
     */
    public static $gridViewProducts = '#center_column > ul.grid';

    /**
     *селектор кнопки режима list
     */
    public static $listView = '#list a';

    /**
     * селектор блока продуктов в виде list
     */
    public static $listViewProducts = '#center_column > ul.list';
   
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
