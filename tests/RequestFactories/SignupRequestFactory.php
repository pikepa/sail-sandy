<?php

namespace Tests\RequestFactories;

use Worksome\RequestFactories\RequestFactory;

class SignupRequestFactory extends RequestFactory
{
    public function definition(): array
    {
        return [
            'email' => 'pikepeter@gmail.com', //$this->faker->email,
        ];
    }
}
