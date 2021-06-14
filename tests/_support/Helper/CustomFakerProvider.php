<?php
namespace Helper;

use Faker\Provider\Base;

class CustomFakerProvider extends Base
{
    /**
     * возвращает рандомный номер карты из данных
     */
    public function getCCNumber()
    {
        $arr = array( '4569457865231254', '1234654125637854', '7894561232145896', '5412563258745698');
        shuffle($arr);
        return($arr[0]);   
    }
}
