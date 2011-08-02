<?php
/****************************************************************************
* todoyu is published under the BSD License:
* http://www.opensource.org/licenses/bsd-license.php
*
* Copyright (c) 2011, snowflake productions GmbH, Switzerland
* All rights reserved.
*
* This script is part of the todoyu project.
* The todoyu project is free software; you can redistribute it and/or modify
* it under the terms of the BSD License.
*
* This script is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the BSD License
* for more details.
*
* This copyright notice MUST APPEAR in all copies of the script.
*****************************************************************************/

/**
 * Test for: TodoyuAdminManager
 *
 * @package		Todoyu
 * @subpackage	AdminManager
 */
class TodoyuAdminManagerTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var Array
	 */
	private $array;


	protected $testModuleKeys;


	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() {
			// Keys of sysmanager modules
		$this->testModuleKeys	= array('extensions', 'records', 'rights', 'config', 'unittest');
	}



	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() {

	}



	/**
	 * Test add module
	 *
	 * @todo	implement	testAddModule()
	 */
	public function testAddModule() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}



	/**
	 * Test getActiveModule
	 */
	public function testGetActiveModule() {
		$activeModule	= TodoyuAdminManager::getActiveModule();

		$expected	= 'unittest';
		$this->assertEquals($expected, $activeModule);
	}



	/**
	 * Test getModules
	 */
	public function testGetModules() {
		$activeModules	= TodoyuAdminManager::getModules();

			// Assert modules present at all
		$expected	= 'array';
		$this->assertType($expected, $activeModules);

			// Assert at least 5 modules (of sysmanager, which unittest is one of) present
		$amountModules	= sizeof($activeModules);
		$this->assertTrue($amountModules > 4);

			// Assert presence of sysmanager module keys
		$reformConfig	= array('key'	=> 'key');
		$index	= 'key';
		$moduleKeys		= TodoyuArray::reformWithFieldAsIndex($activeModules, $reformConfig, false, $index);

		foreach($this->testModuleKeys as $expectedModuleKey) {
			$this->assertArrayHasKey($expectedModuleKey, $moduleKeys);
		}

			// Assert config of each module to contain: key, label and render callback
		foreach($activeModules as $activeModule) {
			$expected	= 'array';
			$this->assertType($expected, $activeModule);

			$this->assertArrayHasKey('key', $activeModule);
			$this->assertArrayHasKey('label', $activeModule);
			$this->assertArrayHasKey('render', $activeModule);
		}
	}



	/**
	 * Test getModuleRenderFunction
	 */
	public function testGetModuleRenderFunction() {
		foreach($this->testModuleKeys as $moduleKey) {
			$renderFunction	= TodoyuAdminManager::getModuleRenderFunction($moduleKey);

			$this->assertNotNull($renderFunction);

			$pattern	= '/Todoyu.{3,50}\:\:.{3,50}/';
			$this->assertRegExp($pattern, $renderFunction);
		}
	}



	/**
	 * Test checking whether the key belongs to a registered module
	 */
	public function testIsModule() {
			// Check sysmanager modules
		foreach($this->testModuleKeys as $moduleKey) {
			$this->assertTrue(TodoyuAdminManager::isModule($moduleKey));
		}

			// Check bogus module to fail verification
		$bogusModuleKey	= 'definitelynomodulekey';
		$this->assertFalse(TodoyuAdminManager::isModule($bogusModuleKey));
	}

}

?>