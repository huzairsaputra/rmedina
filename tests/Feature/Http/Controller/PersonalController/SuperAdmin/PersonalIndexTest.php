<?php

beforeEach(function (){

});

it('can access index users profile as an Admin', function () {
    $response = actingAsSuperAdmin()->get(route('admin.profile'));

    $response->assertStatus(200);
});

?>
