<?php

namespace ImportFrameTest\ImporterTest;

use ImportFrame\API\API;
use ImportFrame\Converter\Converter;
use ImportFrame\Data\IData;
use ImportFrame\Importer\Importer;
use ImportFrame\Strategy\Strategy;
use ImportFrameTest\Dummys\DummyData;

class ImporterTest extends \PHPUnit_Framework_TestCase
{

    protected function getMockElementImporter($class, $methodName,IData $context, IData $returnData)
    {
        $mock = $this->getMockBuilder($class)->setMethods([$methodName])->getMockForAbstractClass();
        $mock->expects($this->once())
            ->method($methodName)
            ->with($this->equalTo($context))
            ->will($this->returnValue($returnData));
        return $mock;

    }

    public function test_run_sequence_calls()
    {
       $context = new DummyData(3);
       $returnData = new DummyData(4);

       $mockAPI = $this->getMockElementImporter(API::class, 'run', $context, $returnData);
       $mockConverter = $this->getMockElementImporter(Converter::class, 'run', $returnData, $context);
       $mockStrategy = $this->getMockElementImporter(Strategy::class, 'run', $context, $returnData);


       $importer = new Importer($mockAPI, $mockStrategy, $mockConverter);
       $this->assertInstanceOf(IData::class, $importer->run($context));
    }
}
