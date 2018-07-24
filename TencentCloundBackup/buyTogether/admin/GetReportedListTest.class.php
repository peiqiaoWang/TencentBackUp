<?php

/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/9
 * Time: 18:23
 */
use PHPUnit\Framework\TestCase;
require_once 'GetReportedList.class.php';
class GetReportedListTest extends TestCase
{
    public function testGetReported()
    {
        //        $this->assertTrue(true);
        $test = new GetReportedList();
        $test->getListTest(1,3);
    }
}
?>
