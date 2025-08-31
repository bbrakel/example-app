@extends('layouts.stacked')

@section('header')
    <x-page-header title="Dashboard" :descriptions="[]" />
@endsection

@section('content')
    <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8 flex gap-6 flex-wrap flex-grow">
        <div
            class="grow-1 rounded-lg bg-white px-5 py-6 shadow-sm sm:px-6 dark:bg-gray-800 dark:shadow-none dark:outline-1 dark:-outline-offset-1 dark:outline-white/10">
            <x-table-header :title="__('dashboards.overdue_invoices')" :tableActions="['create']" />
            <x-table :headers="['serial', 'date', 'due_at', 'price']" :rowActions="['download', 'show', 'approve']"
                :rows="$overdue_invoices" />
        </div>

        <div
            class="grow-1 rounded-lg bg-white px-5 py-6 shadow-sm sm:px-6 dark:bg-gray-800 dark:shadow-none dark:outline-1 dark:-outline-offset-1 dark:outline-white/10">
            <x-table-header :title="__('dashboards.draft_invoices')" :tableActions="['create']" />
            <x-table :headers="['serial', 'date', 'due_at', 'price']" :rows="$draft_invoices" :rowActions="['download', 'edit', 'send']" />
        </div>

        <div
            class="grow-1 rounded-lg bg-white px-5 py-6 shadow-sm sm:px-6 dark:bg-gray-800 dark:shadow-none dark:outline-1 dark:-outline-offset-1 dark:outline-white/10">
            <x-table-header :title="__('dashboards.stocks')" :tableActions="['create']" />
            <x-table :headers="['name', 'quantity', 'price']" :rows="$stocks" />
        </div>
    </div>
@endsection