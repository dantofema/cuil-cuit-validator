<?php

namespace Tests;

use Dantofema\CuilValidator\Cuil;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Dantofema\CuilValidator\Cuil
 */
class CuilTest extends TestCase
{
    /** @test * */
    public function it_valid_cuil ()
    {
        $this->assertTrue(Cuil::validate('20246165220'));
    }

    /** @test * */
    public function it_invalid_cuil ()
    {
        $this->assertFalse(Cuil::validate('20'));
        $this->assertFalse(Cuil::validate('20246165220920246165220'));
        $this->assertFalse(Cuil::validate('20246165221'));
        $this->assertFalse(Cuil::validate('30246165220'));
        $this->assertFalse(Cuil::validate('21246165220'));
        $this->assertFalse(Cuil::validate('20246105220'));
        $this->assertFalse(Cuil::validate('20-24610522-0'));
    }

    /** @test * */
    public function it_clean ()
    {
        $this->assertTrue(Cuil::validate('20-24616522-0'));
        $this->assertTrue(Cuil::validate('20/24616522/0'));
        $this->assertTrue(Cuil::validate('20*24616522*0'));
        $this->assertTrue(Cuil::validate('20*24616-522*0'));
        $this->assertTrue(Cuil::validate('2/0*2-4&616-522*0'));
        $this->assertTrue(Cuil::validate('20x24616522x0'));
    }
}

