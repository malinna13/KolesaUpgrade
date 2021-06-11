<?php

use Codeception\Example;
use Faker\Factory;
use Helper\CustomFakerProvider;
/**
 * Класс для работы с юзером
 */
class UsersCest
{
    /**
     * Тест на создание, изменение, удаление юзера
     * @group test1
     */
    public function checkUserCreate(\FunctionalTester $I)
    {
        $faker  =   Factory::create();
        $faker  ->  addProvider(new CustomFakerProvider($faker));
       
        $defaultSchema = [
        '_id'   =>  'string',
        'email' =>  'string',
        'name'  =>  'string',
        'owner' =>  'string'
        ];
       
        $userData = [
            'email' => $faker->email,
            'owner' => 'malinna13',
            'job'   => $faker->company,
            'name'  => $faker->firstName
        ];
                       
        $I -> haveHttpHeader('Content-Type', 'application/json');
        $I -> sendPost('human', $userData);
        $I -> seeResponseCodeIsSuccessful();
        $I -> seeResponseContainsJson(['status' => 'ok']);
        
        //сохраняем _id созданного юзера
        $user_id    =   $I->grabDataFromResponseByJsonPath('_id')[0]; 
        $url        =   'human?_id=%s';

        $I -> sendGet('people', ['owner' => 'malinna13']);
        $I -> seeResponseMatchesJsonType($defaultSchema);
        $I -> sendPut(sprintf($url,$user_id),['name'=>'nonono']);
        $I -> seeResponseContainsJson(['nModified' => '1']);
        $I -> sendGet('people', ['owner' => 'malinna13']);
        $I -> seeResponseContainsJson(['name' => 'nonono']);
        $I -> sendDelete(sprintf($url,$user_id));
        $I -> seeResponseContainsJson(['deletedCount' => '1']);
        $I -> sendGet('people', ['owner' => 'malinna13']);
        $I -> dontSeeResponseContainsJson(['name' => 'nonono']);

    }
    /**
     * Проверяем негативный сценарий на создание пользователя без имейла и без owner
     * @group test4
     * @dataProvider getDataForCreateUserNegative
     * @param Example $data
     */
    public function checkUnableUserWithoutOwner(\FunctionalTester $I, Example $data)
    {
        $faker  =   Factory::create();
        $faker  ->  addProvider(new CustomFakerProvider($faker));
        $owner  =   $faker->userName;
        $email  =   $faker->email;

        $I -> haveHttpHeader('Content-Type', 'application/json');
        $I -> sendPost('human', [
                'email' => $data['email'] ? $email : null,
                'owner' => $data['owner'] ? $owner : null,
                'name' => $faker->name
                 ]);
        $I -> seeResponseContainsJson($data['errortext']);
    }
    protected function getDataForCreateUserNegative()
    {
            return [
                [
                    'email'     => true,
                    'owner'     => false,
                    'errortext' => ['message' => "Что-то пошло не так, проверьте поля: email, name, owner. p.s. учимся на своих ошибках"]
                ],
                [
                    'email'     => false,
                    'owner'     => true,
                    'errortext' => ['message' => "email не передан"]
                ]
                ];
    }
}