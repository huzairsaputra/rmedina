<?php

use App\User;

beforeEach(function (){

});

it('failed access index users page without login', function (){
    $response = $this->get(route('admin.users.index'));

    $response->assertStatus(302);
    $response->assertRedirect('login');
});

it('can access index users page as an Admin', function () {
    $response = actingAsAdmin()->get(route('admin.users.index'));

    $response->assertStatus(200);
});

/*it('failed access index users page as an Admin', function () {
    $response = actingAsAdmin()->get(route('users.index'));

    $response->assertStatus(403);
});*/

?>
