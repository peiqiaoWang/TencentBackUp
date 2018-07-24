<?php

/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/9
 * Time: 19:54
 */
use PHPUnit\Framework\TestCase;
require_once 'UpdateUser.class.php';
class UpdateUserTest extends TestCase
{
    public function testUpdateUser()
    {
        $test = new UpdateUser();
        $test->templateTest("linlin","boy","boss","1995-04-09","fzu","cs","","say:yes");
    }
}