<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHLAK\Config\Config;
use LazyLoadObject\LazyLoadObject;

class LLO_a extends LazyLoadObject {

    var $ts;

    public function Setup(){
        $this->ts = time();
    }
}

class LLO_b extends LazyLoadObject {

}

final class LazyLoadTest extends TestCase
{
    // Tests that the base class instantiates and returns an instance of the object.
    public function testLazyLoad()
    {
        $inst = LazyLoadObject::Instance();
        $this->assertInstanceOf(LazyLoadObject::class, $inst);
    }

    // Tests that successive calls to Instance() return only one instance of the object by comparing the timestamp
    public function testOneLoad(){
        $inst_a = LLO_a::Instance();
        sleep(2);
        $inst_b = LLO_a::Instance();
        $this->assertEquals($inst_a->ts, $inst_b->ts);
        //echo $inst_a->ts;
    }

    // Tests that two different subclasses remain different subclasses. First iteration didn't create instance of second subclass.
    public function testTwoLazyObjects(){
        $inst_a = LLO_a::Instance();
        $inst_b = LLO_b::Instance();
        $this->assertInstanceOf(LLO_a::class, $inst_a);
        $this->assertInstanceOf(LLO_b::class, $inst_b);
    }
}
