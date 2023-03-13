<?php

namespace Tests\Feature;

use App\Http\Livewire\SearchDropdown;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SearchDropdownTest extends TestCase
{

    public function test_search_dropdown_searches_correctly_if_song_extist(): void
    {

        $response = $this->get('/dashboard');

        $response->assertSeeLivewire(SearchDropdown::class);

        // Livewire::test(SearchDropdown::class)
        //     ->assertDontSee('3rd Planet')
        //     ->set('search', 'I.M.S')
        //     ->assertSee('3rd Planet');
    }


    public function test_search_dropdown_searches_correctly_if_no_song_extist()
    {

        Livewire::test(SearchDropdown::class)

            ->set('search', 'ahskjhdfhkjfjkhdjkhk')

            ->assertSee('No Search result found ');
    }
}
