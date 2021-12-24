<?php

namespace Tests;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Mail;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected $faker;

    public function setUp(): void
    {
        parent::setUp();

        Mail::fake();
        $this->faker = Factory::create();
    }
}
