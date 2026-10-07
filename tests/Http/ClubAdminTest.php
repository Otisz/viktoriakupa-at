<?php

function clubId(string $name): string
{
    preg_match('/<a class="row-title" href="[^"]*post\.php\?post=(\d+)&amp;action=edit"[^>]*>' . preg_quote($name, '/') . '</', adminPage('/wp/wp-admin/edit.php?post_type=club'), $matches);

    return $matches[1];
}

function clubEditScreen(string $name): string
{
    return adminPage('/wp/wp-admin/post.php?post=' . clubId($name) . '&action=edit');
}

it('does not link a single Club URL from the Club edit screen', function () {
    expect(clubEditScreen('Teszt Zala SE'))
        ->toContain('Egyesület szerkesztése')
        ->not->toContain('/egyesuletek/teszt-zala-se')
        ->not->toContain('?club=teszt-zala-se')
        ->not->toContain("id='wp-admin-bar-view'")
        ->not->toContain("id='wp-admin-bar-preview'");
});

it('does not show a single Club URL when the Club title or slug changes', function () {
    preg_match('/name="samplepermalinknonce" value="([^"]+)"/', clubEditScreen('Teszt Zala SE'), $nonce);

    expect(adminPage('/wp/wp-admin/admin-ajax.php', [
        'action' => 'sample-permalink',
        'post_id' => clubId('Teszt Zala SE'),
        'new_title' => 'Teszt Zala SE',
        'new_slug' => 'teszt-zala-se',
        'samplepermalinknonce' => $nonce[1],
    ]))->not->toContain('/egyesuletek/teszt-zala-se');
});

it('has no Yoast SEO box on the Club edit screen', function () {
    expect(clubEditScreen('Teszt Zala SE'))->not->toContain('id="wpseo_meta"');
});

it('does not link single Club URLs from the Club list screen', function () {
    expect(adminPage('/wp/wp-admin/edit.php?post_type=club'))
        ->toContain('Teszt Zala SE')
        ->not->toMatch('/\/egyesuletek\/teszt-/')
        ->not->toMatch('/[?&](amp;)?club=teszt-/');
});

it('links the Club list on the site from the Club list screen', function () {
    expect(adminPage('/wp/wp-admin/edit.php?post_type=club'))->toContain("href='" . url('/egyesuletek') . "'");
});
