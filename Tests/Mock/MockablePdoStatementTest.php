<?php 

namespace Naldz\PdoMock\Tests\Mock;

use Naldz\PdoMock\Mock\MockablePdoStatement; 

class MockablePdoStatementTest extends \PHPUnit_Framework_TestCase
{

	public function testInterface()
	{
		$mockableStmtClass = new \ReflectionClass('\Naldz\PdoMock\Mock\MockablePdoStatement');
		$mockableStmtClassMethods = $mockableStmtClass->getMethods(\ReflectionMethod::IS_PUBLIC);
		$mockableStmtClassMethodNames = array();

		foreach ($mockableStmtClassMethods as $index => $method) {
			$mockableStmtClassMethodNames[] = $method->getName();
		}
		asort($mockableStmtClassMethodNames);
		$mockableStmtClassMethodNames = array_values($mockableStmtClassMethodNames);

		$pdoStmtClass = new \ReflectionClass('\PDOStatement');
		$pdoStmtClassMethods = $pdoStmtClass->getMethods(\ReflectionMethod::IS_PUBLIC);
		$pdoStmtClassMethodNames = array();

		foreach ($pdoStmtClassMethods as $index => $method) {
			$pdoStmtClassMethodNames[] = $method->getName();
		}
		asort($pdoStmtClassMethodNames);
		$pdoStmtClassMethodNames = array_values($pdoStmtClassMethodNames);

		$this->assertEquals($mockableStmtClassMethodNames, $pdoStmtClassMethodNames);
	}

}