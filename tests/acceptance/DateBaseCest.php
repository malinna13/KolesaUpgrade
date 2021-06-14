<?php

class DateBaseCest
{
    public const USERS_NUM = 10;    
    protected $data;
    public $users = array();
    public $killed = array();
    public $saved = array();

    public function _before(AcceptanceTester $I)
    {
       /**
        * Создаем 10 пользователей, проверяем их наличие в базе и сохраняем их данные в массив users
        */
        for($i = 1; $i<=self::USERS_NUM; $i++) {
            $faker  =   $I->getFaker();
    
            $this   ->  data = [
                'job'               => $faker -> company,
                'email'             => $faker -> email,
                'name'              => $faker -> name,
                'owner'             => 'malinna13',
                'canBeKilledBySnap' => $faker -> boolean(25)
            ];
    
            $I -> haveInCollection('people', $this->data);
            $I -> seeInCollection('people',$this->data);

            $user = $I -> grabFromCollection('people',$this->data);
            array_push($this->users, $user);
                       
        }
    }

    /**
     * Проверяем отображение юзеров на странице и удаление через признак canBeKilledBySnap
     */
    public function snapKillTest(AcceptanceTester $I)
    {
       
        $I -> amOnPage('/?owner=malinna13');
        $I -> wait(3);

        //проверяем отображение каждого юзера
        foreach($this->users as $value) {
            $I -> see($value ['name']);
        }  

        $I -> click('//*[@id="snap"]');
        $I -> wait(3);
        
        //собираем в массив killed юзеров, которые должны быть удалены, в массив saved, которые остаются по признаку canBeKilledBySnap
        foreach($this->users as $snap) {
        if ($snap['canBeKilledBySnap']== true)
         {
            array_push($this->killed, $snap);
         }  else  {
            array_push($this->saved, $snap);
         }   
        }

        //проверяем, что все юзеры из killed больше не отображаются
        foreach($this->killed as $val) {
        $I -> dontSee($val ['name']);
        }
        //проверяем, что все юзеры из saved видны
        foreach($this->saved as $val) {
            $I -> see($val ['name']);
        }

        //проверяем удаление из базы killed юзеров
        $I->dontSeeInCollection('people', $this->killed);
}
}