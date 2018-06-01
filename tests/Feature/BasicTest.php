<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Box;

class BasicTest extends TestCase
{
    protected $box;

    public function setBox($fill){
        $this->box = new Box($fill);
    }
    public function getBox(){
        return $this->box;
    }
    public function testHasCar(){
        $this->setBox(['cat', 'car', 'toy', 'ball','remote']);
        $this->assertTrue($this->getBox()->has('car'));
    }
    public function testHasBall(){
        $this->setBox(['cat', 'car', 'toy', 'ball','remote']);
        $this->assertFalse($this->getBox()->has('bal'));
    }
    public function testTakeOneFromTheBox(){
        $this->setBox([
            'torch'
        ]);

        $this->assertEquals('torch', $this->getBox()->takeOne());
        $this->assertNull($this->getBox()->takeOne());
    }
}
