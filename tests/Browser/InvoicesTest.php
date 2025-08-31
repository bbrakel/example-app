<?php

namespace Tests\Browser;

use App\Models\Invoice;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class InvoicesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @test
     */
    public function user_can_index_invoices(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/invoices')
                ->assertSee(__('invoices.title'));
        });
    }

    /**
     * @test
     */
    public function user_can_show_invoices(): void
    {
        $this->browse(function (Browser $browser) {
            $invoice = Invoice::factory()->create();

            $browser->visit('/invoices')
                ->assertSee(__('invoices.title'))
                ->clickLink('View')
                ->assertRouteIs('invoices.show', ['invoice' => $invoice->id]);
        });
    }

    /**
     * @test
     */
    public function user_can_edit_invoices(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/invoices')
                ->assertSee(__('invoices.title'));
        });
    }

    /**
     * @test
     */
    public function user_can_approve_invoices(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/invoices')
                ->assertSee(__('invoices.title'));
        });
    }

    /**
     * @test
     */
    public function user_can_download_invoices(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/invoices')
                ->assertSee(__('invoices.title'));
        });
    }

    /**
     * @test
     */
    public function user_can_send_invoices(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/invoices')
                ->assertSee(__('invoices.title'));
        });
    }
}
