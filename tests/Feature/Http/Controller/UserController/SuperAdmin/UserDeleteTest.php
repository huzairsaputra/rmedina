<?php

use App\User;

beforeEach(function (){
    $this->users = User::factory()->create();
});

it('can delete users as a SuperAdmin', function (){
    $users = $this->users;

    $response = actingAsSuperAdmin()->delete(route('admin.users.destroy', $users->id));

    $this->assertDatabaseMissing('users', array_merge($users->toArray(), [
        /*'yourAttribute1' => $users->date->format('Y-m-d H:i:s'),*/
        'created_at' => $users->created_at->format('Y-m-d H:i:s'),
        'updated_at' => $users->updated_at->format('Y-m-d H:i:s'),
    ]));

    $response->assertStatus(302);
    $response->assertSessionHas(["success"]);
    $response->assertSessionHasNoErrors();
});

it('failed delete not found users as a SuperAdmin', function (){
    $users = $this->users;

    $response = actingAsSuperAdmin()->delete(route('admin.users.destroy', $this->users->id+10));

    $this->assertDatabaseHas('users', array_merge($this->users->toArray(), [
        /*'yourAttribute1' => $this->users->date->format('Y-m-d H:i:s'),*/
        'created_at' => $this->users->created_at->format('Y-m-d H:i:s'),
        'updated_at' => $this->users->updated_at->format('Y-m-d H:i:s'),
    ]));

    $response->assertStatus(404);
});

?>
