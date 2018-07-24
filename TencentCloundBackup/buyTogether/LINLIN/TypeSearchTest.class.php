<?php

/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/9
 * Time: 19:49
 */
use PHPUnit\Framework\TestCase;
require_once 'TypeSearch.class.php';
class TypeSearchTest extends TestCase
{
    public function testTypeSearch()
    {
        $test = new TypeSearch();
        $test->typeTest("食品",0,5);
    }
}