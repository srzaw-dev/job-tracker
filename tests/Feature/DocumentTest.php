<?php

use App\Models\User;
use App\Models\Document;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

it('can upload document', function () {
    Storage::fake('s3');

    $this->post(route('documents.store'), [
        'file' => UploadedFile::fake()->create('cv.pdf', 100, 'application/pdf'),
        'name' => 'My CV',
        'type' => 'cv',
    ])->assertRedirect();

    expect(Document::count())->toBe(1);
});

it('cannot delete another users document', function () {
    $other = User::factory()->create();
    $document = Document::factory()->create(['user_id' => $other->id]);

    $this->delete(route('documents.destroy', $document))
        ->assertForbidden();
});