<?php

/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/9
 * Time: 19:43
 */
use PHPUnit\Framework\TestCase;
require_once 'FinishPosts.class.php';
class FinishPostsTest extends TestCase
{
    public function testFinishPosts()
    {
        $test = new FinishPosts();
        $test->finishTest(1);
    }
}