<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{

    //Применение временной базы данных для тестов
    use RefreshDatabase;

    //Тест отображения главной страницы с применением временной БД
    public function testMainPageDisplaysPrices() {
        // Создадим тестовые данные во временной базе данных
        \App\Models\PriceModel::factory()->create(['name' => 'Товар 1', 'price' => 100, 'count' => 5]);
        \App\Models\PriceModel::factory()->create(['name' => 'Товар 2', 'price' => 200, 'count' => 3]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Товар 1');
        $response->assertSee('Товар 2');
        $response->assertSee('100');
        $response->assertSee('200');
        $response->assertSee('5');
        $response->assertSee('3');
    }

    //Тест отображения страницы покупки при наличии товара
    public function testBuyProductWithValidId() {
        $product = \App\Models\PriceModel::factory()->create(['count' => 3]);

        $response = $this->get('/buy/'.$product->id);
        $response->assertStatus(200);
        $response->assertSee('Отправить');
    }

    //Тест отсутствия возможности отображения страницы при покупке товара, который закончился
    public function testBuyProductWithInvalidId() {
        $product = \App\Models\PriceModel::factory()->create(['count' => 0]);

        $response = $this->get('/buy/'.$product->id);
        $response->assertStatus(302);
    }

    //Тест отображения несуществующего товара и его перенаправление на гл. страницу
    public function testBuyProductWithNonExistentId() {
        $response = $this->get('/buy/99999999');
        $response->assertStatus(302);
    }

    //Тест открытия главной страницы
    public function testExample() {
        $response = $this->get('/');
        $response->assertOk();
    }

    //Тест на проверку формы покупки
    public function testBuyCheckFormSubmission() {
        $response = $this->post('/buy/check', [
            'name' => 'Артём',
            'address' => 'Михайловка'
        ]);
        $response = $this->get('/');
        $response->assertOk();
    }

    //Тест на валидацию некорректно введенных данных в форму покупки
    public function testValidateFiledBuyCheckFormSubmission() {
        $response = $this->post('/buy/check', [
            'name' => '',
            'address' => '123 Main St',
            'product_id' => 1,
        ]);

        $response->assertSessionHasErrors(['name']);
    }
}
