<?php

class LoginTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testLogin()
	{
		$crawler = $this->client->request('GET', '/users/login');

        $this->assertViewHas('email');
        $this->assertViewHas('password');

		$crawler = $this->client->request('POST', '/users/login');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

}
