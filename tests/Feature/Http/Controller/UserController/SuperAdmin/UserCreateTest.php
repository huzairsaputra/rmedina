<?php

use App\User;
use Illuminate\Support\Facades\Hash;

beforeEach(function (){

});

it('can access create users page as a SuperAdmin', function () {
    $response = actingAsSuperAdmin()->get(route('admin.users.create'));

    $response->assertStatus(200);
});

it('can create users as a SuperAdmin', function (){
    $users = User::factory()->make();
    $password = 'Password123';

    $response = actingAsSuperAdmin()->post(route('admin.users.store'), array_merge($users->toArray(), [
        'password_confirmation'=>$password,
        'password'=>$password
    ]));

    $response->assertStatus(302);
    $response->assertSessionHasNoErrors();

    //Get from database
    $userDatabase = User::whereEmail($users->email)->first();
    $this->assertTrue(Hash::check($password, $userDatabase->password));

    $this->assertDatabaseHas('users', $users->toArray());
    //password database dengan password  yang toArray beda karena ada di encrypt
    $response->assertSessionHas(["success"]);
});

it('failed validation create users as a SuperAdmin', function ($data, $errors){
    $users = User::factory()->make();
    $password = 'Password123';

    if (!isset($data['password'])){
        $data = array_merge($data, [
            'password_confirmation'=>$password,
            'password'=>$password
        ]);
    }

    $response = actingAsSuperAdmin()->post(route('admin.users.store'), array_merge($users->toArray(), $data));

    $response->assertStatus(302);
    $response->assertSessionHasErrors($errors);

    $this->assertDatabaseMissing('users', array_merge($users->toArray(), []));
})->with([
    [['name' => '', 'email' => ''],['name', 'email']], //Cannot empty
    [['password' => 'Tessss123', 'password_confirmation' => 'Tessssfada'],['password']], //Different password
    [['password' => 'fs', 'password_confirmation' => 'fs'],['password']], //Minimum character 8 password
]);

?>
