<?php

use App\User;

beforeEach(function (){
    $this->users = User::factory()->create();
});

it('failed access show users page without login', function (){
    $response = $this->get(route('admin.users.show', $this->users->id));

    $response->assertStatus(302);
    $response->assertRedirect('login');
});

it('can access show users page as an Admin', function () {
    $response = actingAsAdmin()->get(route('admin.users.show', $this->users->id));

    $response->assertStatus(200);
});

it('failed access show not found users page as an Admin', function () {
    $response = actingAsAdmin()->get(route('admin.users.show', $this->users->id+10));

    $response->assertStatus(404);
});

/*it('failed access show users page as an Admin', function () {
    $response = actingAsAdmin()->get(route('admin.users.show', $this->users->id));

    $response->assertStatus(403);
});*/

?>
