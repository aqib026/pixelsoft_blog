<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserModelTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUserCreate()
    {
        //create User
        $user = User::create(['name'=>'test','email'=>'testing@gmail.com','password'=>'secret']);
        // asset user has full name
        $this->assertEquals('test', $user->name);
    }
}
