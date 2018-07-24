<?php

/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/9
 * Time: 19:34
 */
use PHPUnit\Framework\TestCase;
require_once 'ReportMessage.class.php';
class ReportMessageTest extends TestCase
{
    public function testReportMessage()
    {
        $test = new ReportMessge();
        $test->reportMessageTest(8);
    }
}