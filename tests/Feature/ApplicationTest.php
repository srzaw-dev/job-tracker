<?php

use App\Models\User;
use App\Models\Application;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

it('can view applications list', function () {
    $this->get(route('applications.index'))
        ->assertOk();
});

it('can create application', function () {
    $this->post(route('applications.store'), [
        'company_name' => 'Google',
        'role' => 'Developer',
        'status' => 'applied',
        'date_applied' => now()->toDateString(),
        'is_open' => true,
    ])->assertRedirect(route('applications.index'));

    expect(Application::count())->toBe(1);
});

it('cannot view another users application', function () {
    $other = User::factory()->create();
    $application = Application::factory()->create(['user_id' => $other->id]);

    $this->get(route('applications.show', $application))
        ->assertForbidden();
});

it('can update application status', function () {
    $application = Application::factory()->create(['user_id' => $this->user->id]);

    $this->put(route('applications.update', $application), [
        'company_name' => $application->company_name,
        'role' => $application->role,
        'status' => 'interview',
        'date_applied' => $application->date_applied->toDateString(),
        'is_open' => true,
    ])->assertRedirect();

    expect($application->fresh()->status)->toBe('interview');
});

it('can delete application', function () {
    $application = Application::factory()->create(['user_id' => $this->user->id]);

    $this->delete(route('applications.destroy', $application))
        ->assertRedirect();

    expect(Application::count())->toBe(0);
});