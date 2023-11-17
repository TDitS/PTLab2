<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\PriceModel;
use App\Models\OrderModel;

class MainControllerTest extends TestCase {
    use RefreshDatabase; // Это позволит нам использовать временную базу данных для тестов

    public function testMainPageDisplaysPrices() {
    // Создадим тестовые данные во временной базе данных
    PriceModel::factory()->create(['name' => 'Товар 1', 'price' => 100, 'count' => 5]);
    PriceModel::factory()->create(['name' => 'Товар 2', 'price' => 200, 'count' => 3]);

    $response = $this->get('/');
    $response->assertStatus(200);
    $response->assertSee('Товар 1');
    $response->assertSee('Товар 2');
    $response->assertSee('100');
    $response->assertSee('200');
    $response->assertSee('5');
    $response->assertSee('3');
    }

    public function testBuyProductWithValidId() {
    $product = PriceModel::factory()->create(['count' => 3]);

    $response = $this->get('/buy/'.$product->id);
    $response->assertStatus(200);
    $response->assertSee('Купить товар');
    }

    public function testBuyProductWithInvalidId() {
    $response = $this->get('/buy/999'); // Предполагаем, что товара с ID=999 не существует
    $response->assertStatus(302); // Проверяем, что происходит перенаправление на другую страницу
    }

    //public function testBuyCheckFormSubmission() {
    //$product = PriceModel::factory()->create(['count' => 1]);

    //$response = $this->post('/buy/check', [
    //'product_id' => $product->id,
    //'name' => 'Иванов',
    //'address' => 'ул. Пушкина, д. 10'
    //]);
    //$response->assertStatus(302); // Проверяем, что происходит перенаправление после отправки формы
    // }
}
