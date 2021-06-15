<?php

use App\Models\Item;
use Illuminate\Http\Response;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\WithoutMiddleware;

class ApiTest extends TestCase
{
    use WithoutMiddleware, DatabaseMigrations;
    //TODO extender alcance de las pruebas y análisis de covertura
    public function testList()
    {
        $this->get("/api/list")
            ->assertResponseStatus(Response::HTTP_OK);
    }

    public function testShow()
    {
        \App\Models\Item::factory()->count(4)->create();
        $item = Item::first();

        $this->get("/api/show/{$item->id}")
            ->assertResponseStatus(Response::HTTP_OK);
    }

    public function testUpdate()
    {
        \App\Models\Item::factory()->count(4)->create();
        $item = Item::first();

        $this->put("/api/update/{$item->id}", ['status' => 'available'])
            ->assertResponseStatus(Response::HTTP_OK);
    }

    public function testDelete()
    {
        \App\Models\Item::factory()->count(4)->create();
        $item = Item::first();

        $this->delete("/api/delete/{$item->id}")
            ->assertResponseStatus(Response::HTTP_OK);
    }
}
