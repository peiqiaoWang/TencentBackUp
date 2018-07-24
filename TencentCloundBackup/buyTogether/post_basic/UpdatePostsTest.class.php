<?php

/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/9
 * Time: 20:05
 */
use PHPUnit\Framework\TestCase;
require_once 'UpdatePosts.class.php';
class UpdatePostsTest extends TestCase
{
    public function testUpdatePosts()
    {
        $test = new UpdatePosts();
        $test->updateTest("1","buysomething","","食品","bread",12.1,"piece",3,1,1,"willyoubuy","qq123321");
    }
}