<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');//Prueba
            $table->json('property_type');//{"id":8,"name":"Departamento"},
            $table->json('transaction_type');//{"id": 2,"name":"Venta"}
            $table->json('currency');//{"id":2,"name":"$"}
            $table->string('address');//"Luro"
            $table->string('address_ number');//"3009",
            $table->string('google_map_data');
            $table->json('city');//{"id":569943,"name":"Mar del Plata"},
            $table->json('state');//{"id":1818,"name":"Buenos Aires"},
            $table->json('country');//{"id":5,"name":"Argentina"},
            $table->string('neighborhood');//"Centro",
            $table->integer('rooms');//2,
            $table->integer('bedrooms');//2,
            $table->integer('bathrooms');//1,
            $table->integer('garages');//1,
            $table->integer('m2');//300,
            $table->integer('m2_covered');//300,
            $table->integer('year');//1998,
            $table->integer('price');//1000000,
            $table->json('amenities');
            //[{"code":"balcony","name":"Balc\u00f3n", "group":"Ambientes"},{"code":"natural_gas","name":"Gas
            //natural","group":"Servicios"},{"code":"loft","name":"Altillo","group":"Ambientes"},{"code":"allow_pets","name":"Acepta
            //mascotas","group":"Adicionales"},{"code":"fixed_covered_garage","name":"Cochera fija cubierta","group":"Servicios"}],
            $table->json('images');//[]
            $table->string('status');//"available",
            $table->json('payment');//["Acepta permuta"],
            $table->json('disposition');//[]
            $table->json('tags');//["A estrenar","Apto cr\u00e9dito"]}
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
