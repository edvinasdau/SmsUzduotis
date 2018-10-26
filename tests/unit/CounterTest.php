<?php

use PHPUnit\Framework\TestCase;
use App\Sms\Counter;

class CounterTest extends TestCase 
{
	public function testArrayOfSms()
	{
		$count = new Counter;

		$this->assertEquals([3,3,3,2,0.5], $count->count("input.json"));

	}

		public function testArrayOfSms6()
	{
		$count = new Counter;

		$this->assertEquals([3,3,0.5], $count->count("input6.json"));

	}

			public function testArrayOfSms11()
	{
		$count = new Counter;

		$this->assertEquals([3,3,3,3], $count->count("input11.json"));

	}

				public function testArrayOfSms15()
	{
		$count = new Counter;

		$this->assertEquals(null, $count->count("input15.json"));

	}

}