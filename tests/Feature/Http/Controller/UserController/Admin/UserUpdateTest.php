<?php

use App\User;
use Illuminate\Support\Facades\Hash;

beforeEach(function (){
    $this->users = User::factory()->create();
});

it('failed access edit users page without login', function (){
    $response = $this->get(route('admin.users.edit', $this->users->id));

    $response->assertStatus(302);
    $response->assertRedirect('login');
});

it('can access edit users page as an Admin', function () {
    $response = actingAsAdmin()->get(route('admin.users.edit', $this->users->id));

    $response->assertStatus(200);
});

it('can edit users as an Admin', function (){
    $users = User::factory()->make();
    $password = 'Password123';

    $response = actingAsAdmin()->put(route('admin.users.update', $this->users->id), array_merge($users->toArray(), [
        'password_confirmation'=>$password,
        'password'=>$password
    ]));

    $response->assertStatus(302);
    $response->assertSessionHas(["success"]);
    $response->assertSessionHasNoErrors();

    //Get from database
    $userDatabase = User::whereEmail($users->email)->first();
    //password database dengan password  yang toArray beda karena ada di encrypt
    $this->assertTrue(Hash::check($password, $userDatabase->password));

    $this->assertDatabaseHas('users', array_merge($users->toArray(), []));
    $this->assertDatabaseMissing('users', array_merge($this->users->toArray(), []));
});

it('failed edit not found users as an Admin', function (){
    $users = User::factory()->make();
    $password = 'Password123';

    $response = actingAsAdmin()->put(route('admin.users.update', $this->users->id+10), array_merge($users->toArray(), [
        'password_confirmation'=>$password,
        'password'=>$password
    ]));

    $this->assertDatabaseHas('users', array_merge($this->users->toArray(), [
        'created_at' => $this->users->created_at->format('Y-m-d H:i:s'),
        'updated_at' => $this->users->updated_at->format('Y-m-d H:i:s'),
    ]));
    $this->assertDatabaseMissing('users', array_merge($users->toArray(), []));

    $response->assertStatus(404);
});

it('failed validation edit users as an Admin', function ($data, $errors){
    $users = User::factory()->make();
    $password = 'Password123';

    if (!isset($data['password'])){
        $data = array_merge($data, [
            'password_confirmation'=>$password,
            'password'=>$password
        ]);
    }

    $response = actingAsAdmin()->put(route('admin.users.update', $this->users->id),
        array_merge($users->toArray(), $data)
    );
    $response->assertStatus(302);
    $response->assertSessionHasErrors($errors);

    $this->assertDatabaseHas('users', array_merge($this->users->toArray(), [
        'created_at' => $this->users->created_at->format('Y-m-d H:i:s'),
        'updated_at' => $this->users->updated_at->format('Y-m-d H:i:s'),
    ]));
    $this->assertDatabaseMissing('users', array_merge($users->toArray(), $data));

})->with([
    [['name' => '', 'email' => ''],['name', 'email']], //Cannot empty
    [['password' => 'Tessss123', 'password_confirmation' => 'Tessssfada'],['password']], //Different password
    [['password' => 'fs', 'password_confirmation' => 'fs'],['password']], //Minimum character 8 password
]);

/*it('failed access edit users page as an Admin', function () {
    $response = actingAsAdmin()->get(route('admin.users.edit', $this->users->id));

    $response->assertStatus(403);
});*/

/*it('failed edit users as an admin', function (){
    $users = User::factory()->make();

    $response = actingAsAdmin()->put(route('admin.users.update', $this->users->id), array_merge($users->toArray(), [
    ]));
    $this->assertDatabaseHas('users', array_merge($this->users->toArray(), [
        'created_at' => $this->users->created_at->format('Y-m-d H:i:s'),
        'updated_at' => $this->users->updated_at->format('Y-m-d H:i:s'),
    ]));
    $this->assertDatabaseMissing('users', array_merge($users->toArray(), [
        'created_at' => $users->created_at->format('Y-m-d H:i:s'),
    ]));

    $response->assertStatus(403);
});*/

?>
