<?php

use App\User;

beforeEach(function (){
    $this->users = User::factory()->create();
});

it('can access show users page as an Admin', function () {
    $response = actingAsSuperAdmin()->get(route('admin.users.show', $this->users->id));

    $response->assertStatus(200);
});

it('failed access show not found users page as an Admin', function () {
    $response = actingAsSuperAdmin()->get(route('admin.users.show', $this->users->id+10));

    $response->assertStatus(404);
});

/*it('failed access show users page as an Admin', function () {
    $response = actingAsSuperAdmin()->get(route('admin.users.show', $this->users->id));

    $response->assertStatus(403);
});*/

?>
