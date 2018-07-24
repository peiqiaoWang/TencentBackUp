<?php

/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/9
 * Time: 18:41
 */
use PHPUnit\Framework\TestCase;
require_once 'ReportIgnore.class.php';
class ReportIgnoreTest extends Testcase
{
    public function testReportIgnore()
    {
        $test = new ReportIgnore();
        $test->ignoreTest(3);
    }
}