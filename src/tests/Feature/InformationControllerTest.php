<?php

namespace Tests\Feature;

use App\Models\AdminUser;
use App\Models\Information;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InformationControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $user = factory(AdminUser::class)->create();
        $response = $this->actingAs($user, 'admin')->get(route('admin.information.create'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.information.create');
    }

    public function testStore()
    {
        $user = factory(AdminUser::class)->create();
        $releaseDate = Carbon::now();
        $data = [
            'user_id' => $user->id,
            'title' => 'こんにちは',
            'content' => 'よろしくお願いします',
            'release_date' => $releaseDate,
        ];
        $response = $this->actingAs($user, 'admin')->post(route('admin.information.store'), $data);
        $response->assertStatus(302);
        $this->assertDatabaseHas('information', $data);
    }

    public function testEdit()
    {
        $user = factory(AdminUser::class)->create();
        $information = factory(Information::class)->create();

        $response = $this->actingAs($user, 'admin')->get(route('admin.information.edit', $information->id));
        $response->assertStatus(200);
        $response->assertViewIs('admin.information.edit');
    }

    public function testUpdate()
    {
        $user = factory(AdminUser::class)->create();
        $information = factory(Information::class)->create();
        $oneMonthLater = Carbon::now()->addMonth();
        $data = [
            'title' => 'テスト編集',
            'content' => 'テスト編集',
            'release_date' => $oneMonthLater,
        ];
        $response = $this->actingAs($user, 'admin')->put(route('admin.information.update', $information->id), $data);
        $response->assertStatus(302);
        $this->assertDatabaseHas('information', $data);
    }

    public function testDelete()
    {
        $user = factory(AdminUser::class)->create();
        $information = factory(Information::class)->create();
        $response = $this->actingAs($user, 'admin')->delete(route('admin.information.delete', $information->id));
        $response->assertStatus(302);
        $this->assertSoftDeleted($information);
    }

    public function testIndex()
    {
        $user = factory(AdminUser::class)->create();
        $information = factory(Information::class)->create();
        $response = $this->actingAs($user, 'admin')->get(route('admin.information.index'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.information.index');
        $response->assertSee($information->title);
        $response->assertSee($information->content);
        $response->assertSee($information->release_date->format('Y/m/d'));
    }
}
