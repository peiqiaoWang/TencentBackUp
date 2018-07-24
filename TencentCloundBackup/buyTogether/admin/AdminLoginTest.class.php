<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/9
 * Time: 15:48
 */
use PHPUnit\Framework\TestCase;
require_once 'AdminLogin.class.php';
class AdminLoginTest extends TestCase
{
    public function testAdminLogin()
    {
//        $this->assertTrue(true);
        $test = new AdminLogin();
        $test->adminLoginTest("b","b");
    }
}
?>