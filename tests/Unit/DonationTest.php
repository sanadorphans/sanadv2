<?php

namespace Tests\Unit;

use App\Models\Donation;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Request;

class ExampleTest extends TestCase
{
/**
 * Test the success endpoint.
 *
 * @return void
 */
public function testSuccess(): void
{
    // Test case 1: Test success scenario with a valid donation ID
    $donationId = 1;
    $donationRequest = new Request(['donation_id' => $donationId]);
    $response = $this->post('/success', $donationRequest);

    // Assert that the response has the view data 'title' with the value 'Donate Now'
    $this->assertResponseHasViewData($response, 'title', __('lang.donate_now'));

    // Assert that the response has the model Donation with the attribute 'transaction_number' set to the donation ID
    $this->assertResponseHasModel($response, Donation::class, 'transaction_number', $donationId);

    // Test case 2: Test validation error handling when donation ID is missing
    $donationRequest = new Request([]);
    $response = $this->post('/success', $donationRequest);

    // Assert that the response has validation errors for the 'donation_id' field
    $this->assertSessionHasErrors($response, ['donation_id']);

    // Test case 3: Test error handling when donation with the given ID is not found
    $nonExistentDonationId = 999;
    $donationRequest = new Request(['donation_id' => $nonExistentDonationId]);
    $response = $this->post('/success', $donationRequest);

    // Assert that the response has a status code of 404
    $this->assertResponseStatus($response, 404);
}

private function assertResponseHasViewData($response, $key, $value)
{
    $this->assertTrue($response->viewData()->has($key));
    $this->assertEquals($value, $response->viewData()->get($key));
}

private function assertResponseHasModel($response, $modelClass, $attribute, $value)
{
    $this->assertInstanceOf($modelClass, $response->viewData()->get($attribute));
    $this->assertEquals($value, $response->viewData()->get($attribute)->$attribute);
}

private function assertSessionHasErrors($response, $keys)
{
    $this->assertTrue($response->session()->hasErrors($keys));
}

private function assertResponseStatus($response, $status)
{
    $this->assertEquals($status, $response->status());
}
}



