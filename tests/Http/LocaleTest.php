<?php

it('serves the admin in Hungarian', function () {
    expect(request('/wp/wp-login.php')['body'])->toMatch('/<html[^>]* lang="hu(-HU)?"/');
});
