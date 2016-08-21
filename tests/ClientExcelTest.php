<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientExcelTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
//     public function testExample()
//     {
//         $this->assertTrue(true);
//     }
	public function test_it_can_create_new_client()
	{
		$this->visit('/client-excel/create')
		->type('Tej Shrestha', '#name')
		->type('helloteju96@gmail.com', 'email')
		->type('M', 'gender')
		->type('9849301505', 'phone')
		->type('Tinkunay, Kathmandu', 'adress')
		->type('nationality', 'Nepal')
		->type('1986-08-13', 'date_of_birth')
		->type('BA', 'education')
		->type('phone', 'preferred_contact')
		->press('Create')
		->see('Sucessfully Created!')
		->onPage('client-excel');
	}
}
