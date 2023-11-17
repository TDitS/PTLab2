<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    use RefreshDatabase;

    public function testMainPage() {
    $response = $this->get('/');
    $response->assertStatus(200);
    }

    public function testBuyPage() {
        $response = $this->get('/buy/1');
        $response->assertRedirect();
    }

    public function testBuyCheckFormSubmission() {
    $response = $this->post('/buy/check', [
    'name' => 'Иванов',
    'address' => 'ул. Ленина, д. 10'
    ]);
    $response->assertStatus(302);
    }
}
