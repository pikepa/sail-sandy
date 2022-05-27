<?php

namespace Tests\Feature\Livewire\Category;

use App\Http\Livewire\Category\ShowCategories;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ShowCategoriesTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ShowCategories::class);

        $component->assertStatus(200);
    }
}
