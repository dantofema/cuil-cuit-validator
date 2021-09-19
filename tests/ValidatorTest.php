<?php

namespace Tests;

use Dantofema\CuilValidator\Validator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Dantofema\CuilValidator\Validator
 */
class ValidatorTest extends TestCase
{
    /** @test * */
    public function it_valid_cuil ()
    {
        $this->assertTrue(Validator::validate('20246165220'));
    }

    /** @test * */
    public function it_invalid_cuil ()
    {
        $this->assertFalse(Validator::validate('20'));
        $this->assertFalse(Validator::validate('20246165220920246165220'));
        $this->assertFalse(Validator::validate('20246165221'));
        $this->assertFalse(Validator::validate('30246165220'));
        $this->assertFalse(Validator::validate('21246165220'));
        $this->assertFalse(Validator::validate('20246105220'));
        $this->assertFalse(Validator::validate('20-24610522-0'));
    }

    /** @test * */
    public function it_clean ()
    {
        $this->assertTrue(Validator::validate('20-24616522-0'));
        $this->assertTrue(Validator::validate('20/24616522/0'));
        $this->assertTrue(Validator::validate('20*24616522*0'));
        $this->assertTrue(Validator::validate('20*24616-522*0'));
        $this->assertTrue(Validator::validate('2/0*2-4&616-522*0'));
        $this->assertTrue(Validator::validate('20x24616522x0'));
    }
}

