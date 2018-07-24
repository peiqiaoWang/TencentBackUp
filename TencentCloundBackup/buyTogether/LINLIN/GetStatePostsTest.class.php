<?php

/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/14
 * Time: 22:00
 */
use PHPUnit\Framework\TestCase;
require_once 'GetStatePosts.class.php';
class GetStatePostsTest extends TestCase
{
    public function testGetStatePosts()
    {
        $test = new GetStatePosts();
        $test->getPosts("linlin",1);
    }
}