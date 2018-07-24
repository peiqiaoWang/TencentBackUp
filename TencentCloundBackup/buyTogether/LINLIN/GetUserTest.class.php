<?php

/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/9
 * Time: 20:01
 */
use PHPUnit\Framework\TestCase;
require_once 'GetUser.class.php';
class GetUserTest extends TestCase
{
    public function testGetUser()
    {
        $test = new GetUser();
        $test->getUserTest("linlin");
    }
}