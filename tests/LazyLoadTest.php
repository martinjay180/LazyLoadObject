<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHLAK\Config\Config;
use LazyLoadObject\LazyLoadObject;

class LLO_a extends LazyLoadObject {

}

class LLO_b extends LazyLoadObject {

}

final class LazyLoadTest extends TestCase
{
    public function testLazyLoad()
    {
        $inst = LazyLoadObject::Instance();
        $this->assertInstanceOf(LazyLoadObject::class, $inst);
    }

    public function testTwoLazyObjects(){
        $inst_a = LLO_a::Instance();
        $inst_b = LLO_b::Instance();
        $this->assertInstanceOf(LLO_a::class, $inst_a);
        $this->assertInstanceOf(LLO_b::class, $inst_b);
    }
}
