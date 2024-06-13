<?php

use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

beforeEach(function (){
    $this->users = User::factory()->create();
});

it('failed access update users profile without login', function (){
    $response = $this->put(route('admin.profile.update'));

    $response->assertStatus(302);
    $response->assertRedirect('login');
});

/*it('can update users profile as an Admin', function (){
    $users = User::factory()->make();

    $loggedInUser = User::factory()->create();
    $loggedInUser->syncRoles([Role::ADMIN]);

    $response = test()->actingAs($loggedInUser)->put(route('admin.profile.update'), $users->only(['name', 'last_name', 'email']));
    $response->assertStatus(302);
    $response->assertSessionHas(["success"]);
    $response->assertSessionHasNoErrors();

    $this->assertDatabaseMissing('users', $loggedInUser->only(['name', 'last_name', 'email']));
    $this->assertDatabaseHas('users', $users->only(['name', 'last_name', 'email']));
});*/

it('failed validation change pass as an Admin', function ($data, $errors){
    $users = User::factory()->make();

    $response = actingAsAdmin()->put(route('admin.profile.update'),
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
]);

it('can change password as an Admin', function (){
    $password = 'Password123';
    $oldPassword = 'IniItuBanyakSekali123';

    $loggedInUser = User::factory()->state(['password'=>bcrypt($oldPassword)])->create();
    $loggedInUser->syncRoles([Role::ADMIN]);

    $response = test()->actingAs($loggedInUser)->post(route('admin.profile.change_password'), [
        'current_password'=>$oldPassword,
        'new_password'=>$password,
        'password_confirmation'=>$password
    ]);

    $response->assertStatus(302);
    $response->assertSessionHas(["success"]);
    $response->assertSessionHasNoErrors();

    //Get from database
    $userDatabase = User::whereEmail($loggedInUser->email)->first();
    //password database dengan password  yang toArray beda karena ada di encrypt
    $this->assertTrue(Hash::check($password, $userDatabase->password));
});

it('failed validation change password as an Admin', function ($data, $errors){
    $oldPassword = 'IniItuBanyakSekali123';

    $loggedInUser = User::factory()->state(['password'=>bcrypt($oldPassword)])->create();
    $loggedInUser->syncRoles([Role::ADMIN]);

    $response = test()->actingAs($loggedInUser)->post(route('admin.profile.change_password'), $data);

    $response->assertStatus(302);
    $response->assertSessionHasErrors($errors);

    //password database dengan password  yang toArray beda karena ada di encrypt
    $this->assertFalse(Hash::check($data['new_password'], $loggedInUser->password));

})->with([
    [['current_password' => 'Tessss123', 'new_password'=>'Tessssfada12' ,'password_confirmation' => 'Tessssfada12'],['current_password']], //Different current password
    [['current_password' => 'IniItuBanyakSekali123', 'new_password'=>'Tessssfada' ,'password_confirmation' => 'Tessssfada'],['new_password']], //Invalid format need numeric
    [['current_password' => 'IniItuBanyakSekali123', 'new_password'=>'tesss' ,'password_confirmation' => 'tesss'],['new_password']], //Minimum character 8 password
]);

?>
