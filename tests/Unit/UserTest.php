<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $db_get=DB::select('select * from users where id = 1');
        $db_get_email = ucfirst($db_get[0]->email);

        $model_get=User::find(1);
        $model_get_email=$model_get->email;
        $this->assertEquals($db_get_email, $model_get_email);
    }
}
