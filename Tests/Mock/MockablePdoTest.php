<?php 

namespace Naldz\PdoMock\Tests\Mock;

use Naldz\PdoMock\Mock\MockablePdo; 

class MockablePdoTest extends \PHPUnit_Framework_TestCase
{
	public function testInterface()
	{
		$mockablePdoClass = new \ReflectionClass('\Naldz\PdoMock\Mock\MockablePdo');
		$mockablePdoClassMethods = $mockablePdoClass->getMethods(\ReflectionMethod::IS_PUBLIC);
		$mockablePdoClassMethodNames = array();

		foreach ($mockablePdoClassMethods as $index => $method) {
			$mockablePdoClassMethodNames[] = $method->getName();
		}
		asort($mockablePdoClassMethodNames);
		$mockablePdoClassMethodNames = array_values($mockablePdoClassMethodNames);

		$pdoClass = new \ReflectionClass('\PDO');
		$pdoClassMethods = $pdoClass->getMethods(\ReflectionMethod::IS_PUBLIC);
		$pdoClassMethodNames = array();

		foreach ($pdoClassMethods as $index => $method) {
			$pdoClassMethodNames[] = $method->getName();
		}
		asort($pdoClassMethodNames);
		$pdoClassMethodNames = array_values($pdoClassMethodNames);

		$this->assertEquals($mockablePdoClassMethodNames, $pdoClassMethodNames);
	}

}