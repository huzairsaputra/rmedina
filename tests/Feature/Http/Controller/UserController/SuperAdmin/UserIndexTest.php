<?php

use App\User;

beforeEach(function (){

});

it('can access index users page as a SuperAdmin', function () {
    $response = actingAsSuperAdmin()->get(route('admin.users.index'));

    $response->assertStatus(200);
});

?>
