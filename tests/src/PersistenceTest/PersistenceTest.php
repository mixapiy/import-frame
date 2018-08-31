<?php
namespace ImportFrameTest\PersistenceTest;

use ImportFrame\Persistence\Persistence;
use ImportFrameTest\Dummys\DummyData;

class PersistenceTest extends \PHPUnit_Framework_TestCase
{
    public function test_Run_sequence()
    {
        $mock = $this->getMockBuilder(Persistence::class)
            ->setMethods(['setContext','beforeRun','doRun','afterRun', 'getResult'])
            ->getMockForAbstractClass();
        $mock->expects($this->at(0))
            ->method('setContext');
        $mock->expects($this->at(1))
            ->method('beforeRun');
        $mock->expects($this->at(2))
            ->method('doRun');
        $mock->expects($this->at(3))
            ->method('afterRun');
        $mock->expects($this->at(4))
            ->method('getResult');
        $mock->run(new DummyData());
    }
}
