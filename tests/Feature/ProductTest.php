<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /** @test */
    public function it_should_store_in_database()
    {
        $this->json('POST', 'api/produtos/', [
            'name' => 'Product Name',
            'color' => 'Red',
            'size' => 'M',
            'value' => '1235.24',
        ])->assertStatus(201);
    }

    /** @test */
    public function it_should_be_a_valid_size()
    {
        $this->json('POST', 'api/produtos/', [
            'name' => 'Notebook',
            'color' => 'Yellow',
            'size' => 'G',
            'value' => 20,
        ])->assertStatus(201);

        $this->json('POST', 'api/produtos/', [
            'name' => 'Notebook',
            'color' => 'Yellow',
            'size' => 'Y',
            'value' => 20,
        ])->assertStatus(422);
    }

    /** @test */
    public function product_value_is_postive()
    {
        $this->json('PUT', 'api/produtos/1', [
            'name' => 'Notebook',
            'color' => 'Yellow',
            'size' => 'G',
            'value' => 220,
        ])->assertStatus(200);

        $this->json('PUT', 'api/produtos/1', [
            'name' => 'Notebook',
            'color' => 'Yellow',
            'size' => 'G',
            'value' => -20,
        ])->assertStatus(422);
    }
}
