<?php

namespace Tests\Feature;

use App\Http\Livewire\DataTable;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Support\Str;


class DataTableTest extends TestCase
{

    use  RefreshDatabase;

    public function test_main_page_contains_datable_livewire_component(): void
    {

        $response = $this->get('/user');

        $response->assertSeeLivewire('data-table');

        // Livewire::test(SearchDropdown::class)
        //     ->assertDontSee('3rd Planet')
        //     ->set('search', 'I.M.S')
        //     ->assertSee('3rd Planet');


    }

    public function test_datatable_active_work()
    {

        $userA =  User::create([
            'name' => 'prince',
            'email' => 'prince@gamil.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);


        $userB =  User::create([
            'name' => 'mohit',
            'email' => 'mohit@gamil.com',
            'password' => bcrypt('password'),
            'active' => false,
        ]);

        Livewire::test(DataTable::class)
            ->assertSee($userA->name)
            ->assertDontSee($userB->name)
            ->set('active', false)
            ->assertSee($userB->name)
            ->assertDontSee($userA->name);
    }


    public function test_datatable_search_work()
    {

        $userA =  User::create([
            'name' => 'prince',
            'email' => 'prince@gamil.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);


        $userB =  User::create([
            'name' => 'mohit',
            'email' => 'mohit@gamil.com',
            'password' => bcrypt('password'),
            'active' => false,
        ]);

        Livewire::test(DataTable::class)
            ->set('search', 'prince')
            ->assertSee($userA->name)
            ->assertDontSee($userB->name);
    }


    public function test_datatable_email_work()
    {

        $userA =  User::create([
            'name' => 'prince',
            'email' => 'prince@gamil.com',
            'password' => bcrypt('password'),
            'active' => true,
        ]);

        $userB =  User::create([
            'name' => 'mohit',
            'email' => 'mohit@gamil.com',
            'password' => bcrypt('password'),
            'active' => false,
        ]);

        Livewire::test(DataTable::class)
            ->set('search', 'prince@gamil.com')
            ->assertSee($userA->name)
            ->assertDontSee($userB->name);
    }


    // public function test_datatable_sort_by_asc_work()
    // {
    //     $userA =  User::create([
    //         'name' => 'prince A',
    //         'email' => 'prince@gamil.com',
    //         'password' => bcrypt('password'),
    //         'active' => true,
    //     ]);

    //     $userB =  User::create([
    //         'name' => 'hiren B',
    //         'email' => 'hiren@gamil.com',
    //         'password' => bcrypt('password'),
    //         'active' => true,
    //     ]);

    //     $userC =  User::create([
    //         'name' => 'mohit C',
    //         'email' => 'mohit@gamil.com',
    //         'password' => bcrypt('password'),
    //         'active' => false,
    //     ]);

    //     Livewire::test(DataTable::class)
    //         ->call('sortBy', 'name')
    //         ->assertSeeInOrder(['prince A', 'hiren B', 'mohit C']);
    // }
}
