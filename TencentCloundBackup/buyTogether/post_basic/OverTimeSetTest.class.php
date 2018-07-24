<?php

/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/9
 * Time: 19:43
 */
use PHPUnit\Framework\TestCase;
require_once 'OverTimeSet.class.php';
class OverTimeSetTest extends TestCase
{
    public function testOverTimeSet()
    {
        $test = new OverTimeSet();
        $test->OverTimeSetTest(1);
    }
}