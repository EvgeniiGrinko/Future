<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    private $contact;

    public function setUp(): void
    {
        parent::setUp();
        
         $this->contact = Contact::create([
            'fio' => 'Kate Portland',
            'phone' => 90,
            'email' => 'waq@sed.it',
         ]);
    }

    public function test_fetch_all_contacts()
    {
        $response = $this->getJson(route('contacts.index'))->json();

        $this->assertEquals(1, count($response));
        $this->assertEquals('Kate Portland', $response[0]['fio']);
    }

    public function test_fetch_single_contact()
    {
        $response = $this->getJson(route('contact.show', $this->contact->id))
            ->assertOk()
            ->json();

        $this->assertEquals($response['fio'], $this->contact->fio);
    }

    public function test_store_new_contact()
    {
        $contact = Contact::factory()->make();
        $response = $this->postJson(route('contact.store'), $contact->toArray())
            ->assertCreated()
            ->json();

        $this->assertEquals($contact->fio, $response['fio']);
        $this->assertDatabaseHas('contacts', ['fio' => $contact->fio]);
    }


    public function test_delete_contact()
    {
        $this->deleteJson(route('contact.destroy', $this->contact->id))
            ->assertNoContent();

        $this->assertDatabaseMissing('contacts', ['fio' => $this->contact->fio]);
    }

    public function test_update_todo_list()
    {
        $this->postJson(route('contact.update', $this->contact->id), ['fio' => 'updated name'])
            ->assertOk();

        $this->assertDatabaseHas('contacts', ['id' => $this->contact->id, 'fio' => 'updated name']);
    }
}