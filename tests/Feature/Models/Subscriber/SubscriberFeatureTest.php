<?php

use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Channel;
use App\Models\Category;
use App\Models\Subscriber;
use function Pest\Faker\faker;
use function Pest\Laravel\post;
use App\Http\Livewire\Subscriber\ManageSubscribers;

test('anyone can subscribe to the Newsletter', function () {
    $email = fake()->email;

    post('/subscribers', ['email' => $email, 'name' => 'Peter Piper'])->assertValid();

    expect(Subscriber::latest()->first()->email)->toBe($email);
});

test('an new email must be unique on the subscribers table', function () {
    $email = fake()->email;

    Subscriber::create(['email' => $email]);

    post('/subscribers', ['email' => $email])

        ->assertInvalid(['email' => 'The email has already been taken.']);
});

test('an new email must be a valid email', function () {
    $email = fake()->name;

    post('/subscribers', ['email' => $email])

        ->assertInvalid(['email' => 'The email must be a valid email address.']);
});

test('an email is required for a subscriber', function () {
    post('/subscribers', ['email' => ''])

        ->assertInvalid(['email' => 'The email field is required.']);
});

test('a name is required for a subscriber', function () {
    post('/subscribers', ['name' => ''])

        ->assertInvalid(['name' => 'The name field is required.']);
});

test('a newsletter subscribe button appears on the welcome screen', function () {
    User::factory()->create();
    Category::factory()->create(['slug' => 'welcome']);
    Channel::factory()->create(['slug' => 'no-channel']);
    Channel::factory()->create(['slug' => 'no-channel']);
    $post = Post::factory()->create();

    $this->get('/')->assertSuccessful()
       ->assertSee($post->title)
       ->assertSee('Enter')
       ->assertSee('Subscribe ');
});

test('a guest user can see the create subscriber page', function () {
    $this->get('/subscribers/create')
         ->assertSuccessful()
         ->assertSee('Newsletter Registration')
         ->assertSee('Full Name')
         ->assertSee('Email Address')
         ->assertSee('Submit');
});
test('the create subscriber page contains the livewire menu components', function () {
    $this->get('/subscribers/create')
         ->assertSeeLivewire('menus.menu-bottom')
         ->assertSeeLivewire('menus.menu-top');
});

test('an authorised user can see a list of subscribers', function () {
    $this->signin();

   $subsc1 = Subscriber::factory()->create();
   $subsc2 = Subscriber::factory()->create();

    Livewire::test(ManageSubscribers::class)
        ->set('showTable', true)
        ->call('render')
        ->assertSee($subsc1->name)
        ->assertSee($subsc1->email)
        ->assertSee($subsc2->name)
        ->assertSee($subsc2->email);
});


