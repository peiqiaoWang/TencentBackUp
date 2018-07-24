<?php

/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/9
 * Time: 19:45
 */
use PHPUnit\Framework\TestCase;
require_once 'MyPosts.class.php';
class MyPostsTest extends TestCase
{
    public function testMyPosts()
    {
        $test = new MyPosts();
        $test->myTest("linlin","正在进行");
    }
}