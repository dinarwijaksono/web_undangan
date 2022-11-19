<?php

namespace Tests\Feature;

use App\Services\Order_service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class OrderService_Test extends TestCase
{
    private $order_service;

    public function setUp(): void
    {
        parent::setUp();

        $this->order_service = $this->app->make(Order_service::class);
    }


    public function test_addFailedLinkDuplicate()
    {
        $time = round(microtime(true) * 1000);
        $result = $this->order_service->add('damayanti_dinar', 'damayanti_dinar', $time);

        $this->assertFalse($result['isSuccess']);
        $this->assertEquals($result['message'], 'Link sudah di gunakan.');
    }



    public function test_addSuccess()
    {
        $time = round(microtime(true) * 1000);
        $result = $this->order_service->add('damayanti_dinar', 'damayanti_dinar', $time);

        $this->assertTrue($result['isSuccess']);
        $this->assertDatabaseHas('orders', ['order_from' => 'damayanti_dinar']);
    }



    public function test_getByLink()
    {
        $order = DB::table('orders')->select('link_locate')->first();
        $result = $this->order_service->getByLink($order->link_locate);

        $this->assertTrue($result->isNotEmpty());
    }

    public function test_getByCode()
    {
        $order = DB::table('orders')->select('code', 'link_locate')->first();
        $result = $this->order_service->getByCode($order->code);

        print_r($result->link_locate);

        $this->assertTrue(!empty($result));
    }


    public function test_updateFailedLinkUsSpaces()
    {
        $order = $this->order_service->getAll()->first();
        $code = $order->code;

        $time = time() * 1000;
        $result = $this->order_service->update($code, "dinar damayanti", "dinar damayanti", $time);

        $this->assertFalse($result['isSuccess']);
        $this->assertEquals($result['message'], "Link tidak boleh mengunakan spasi.");
    }


    public function test_updateFailedLinkHasExis()
    {
        $order = $this->order_service->getAll()->first();
        $code = $order->code;

        $time = time() * 1000;
        $result = $this->order_service->update($code, "dinar damayanti", "damayanti12334", $time);

        $this->assertFalse($result['isSuccess']);
        $this->assertEquals($result['message'], "Link sudah di gunakan.");
    }

    public function test_noChanges()
    {
        $order = $this->order_service->getAll()->first();
        $code = $order->code;

        $result = $this->order_service->update($code, $order->order_from, $order->link_locate, $order->expired);

        $this->assertFalse($result['isSuccess']);
        $this->assertEquals($result['message'], "Anda tidak melakukan perubahan apapun.");
    }

    public function test_updateSuccess()
    {
        $order = $this->order_service->getAll()->first();
        $code = $order->code;

        $time = time() * 1000;
        $result = $this->order_service->update($code, "dinar damayanti", "damayanti1998", $time);

        $this->assertTrue($result['isSuccess']);
        $this->assertDatabaseHas('orders', ['link_locate' => 'damayanti1998']);
    }
}
