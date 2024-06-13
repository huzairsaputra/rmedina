<?php

use App\User;
use Illuminate\Support\Facades\Hash;

beforeEach(function (){

});

it('failed access create users page without login', function (){
    $response = $this->get(route('admin.users.create'));

    $response->assertStatus(302);
    $response->assertRedirect('login');
});

it('can access create users page as an Admin', function () {
    $response = actingAsAdmin()->get(route('admin.users.create'));

    $response->assertStatus(200);
});

it('can create users as an Admin', function (){
    $users = User::factory()->make();
    $password = 'Password123';

    $response = actingAsAdmin()->post(route('admin.users.store'), array_merge($users->toArray(), [
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
    $this->assertDatabaseHas('users', $users->toArray());
});

it('failed validation create users as an Admin', function ($data, $errors){
    $users = User::factory()->make();
    $password = 'Password123';

    if (!isset($data['password'])){
        $data = array_merge($data, [
            'password_confirmation'=>$password,
            'password'=>$password
        ]);
    }

    $response = actingAsAdmin()->post(route('admin.users.store'), array_merge($users->toArray(), $data));

    $response->assertStatus(302);
    $response->assertSessionHasErrors($errors);

    $this->assertDatabaseMissing('users', array_merge($users->toArray(), []));
})->with([
    [['name' => '', 'email' => ''],['name', 'email']], //Cannot empty
    [['password' => 'Tessss123', 'password_confirmation' => 'Tessssfada'],['password']], //Different password
    [['password' => 'fs', 'password_confirmation' => 'fs'],['password']], //Minimum character 8 password
]);

/*it('failed access create users page as an Admin', function () {
    $response = actingAsAdmin()->get(route('admin.users.create'));

    $response->assertStatus(403);
});

it('failed create users as an Admin', function (){
    $users = User::factory()->make();

    $response = actingAsAdmin()->post(route('admin.users.create'), array_merge($users->toArray(), [
        'yourAttribute' => $users->yourReplacedAttribute
    ]));
    $this->assertDatabaseMissing('users', array_merge($users->toArray(), [
        'yourAttribute1' => $users->date->format('d-m-Y H:i:s')
    ]));

    $response->assertStatus(403);
});*/

?>
