<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @test
     */
    public function basic_example(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dashboards')
                ->assertSee('Dashboard');
        });
    }
}
