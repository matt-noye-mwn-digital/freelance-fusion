<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class LeadTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_lead_successfully()
    {
        // Create user and assign admin role
        $admin = User::factory()->create();
        Role::create(['name' => 'admin']);
        $admin->assignRole('admin');

        // Simulate admin login
        $this->actingAs($admin);

        // Define lead data
        $leadData = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'full_name' => 'John Doe',
            'company_name' => 'Doe Inc',
            'email' => 'john.doe@doe.inc',
            'phone' => '1234567890',
            'website' => 'doe.inc',
            'position' => 'CEO',
            'value' => 1000,
            'address_line_one' => '123 Main St',
            'address_line_two' => 'Suite 100',
            'city' => 'Anytown',
            'state' => 'NY',
            'zip_postcode' => '12345',
            'country' => 'USA',
            'status' => 'new',
            'lead_source' => 'website'
        ];

        // Post request to store lead
        $response = $this->post(route('admin.leads.store'), $leadData);

        // Assert the response redirects (302) after successful lead creation
        $response->assertStatus(302);

        // Optional: Assert the redirect location (e.g., after successful creation)
        // $response->assertRedirect(route('admin.leads.index'));

        // Assert the lead is created in the database
        $this->assertDatabaseHas('leads', ['email' => $leadData['email']]);
    }
}
