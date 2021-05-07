<?php

namespace Tests\Feature;

use App\Models\Costumers;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /** @test */
    public function it_should_store_in_database()
    {
        $this->json('POST', 'api/clientes/', [
            'name' => 'Ryan Silva',
            'document' => '09876543212',
            'gender' => 'M',
            'email' => 'ryan@teste.com',
        ])->assertStatus(201);
    }

    /** @test */
    public function it_should_document_is_unique()
    {
        $costumer = DB::table('costumers')->first();

        $this->json('POST', 'api/clientes/', [
            'name' => 'Ryan Silva',
            'document' => $costumer->document,
            'gender' => 'M',
            'email' => 'ryan@teste.com',
        ])->assertStatus(422);
    }

    /** @test */
    public function it_should_be_a_valid_gender()
    {
        $this->json('POST', 'api/clientes/', [
            'name' => 'Ryan Silva',
            'document' => '1234567890',
            'gender' => 'H',
            'email' => 'ryan@teste.com',
        ])->assertStatus(422);

        $this->json('POST', 'api/clientes/', [
            'name' => 'Ryan Silva',
            'document' => '1234567890',
            'gender' => 'M',
            'email' => 'ryan@teste.com',
        ])->assertStatus(201);
    }

    /** @test */
    public function name_field_is_required()
    {
        $this->json('POST', 'api/clientes/', [
            'name' => 'Teste',
            'document' => '1234567890',
            'gender' => 'M',
            'email' => 'ryan@teste.com',
        ])->assertStatus(201);

        $this->json('POST', 'api/clientes/', [
            'document' => '1234567890',
            'gender' => 'M',
            'email' => 'ryan@teste.com',
        ])->assertStatus(422);
    }
}
