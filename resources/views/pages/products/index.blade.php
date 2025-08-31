@extends('layouts.stacked')

@section('header')
    <x-page-header :title="__('products.title')" :descriptions="[
            __('products.description', ['count' => $product_count])
        ]"
        :actions="['create']" />
@endsection

@section('content')
    <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8 flex flex-col gap-6">
        <div
            class="rounded-lg bg-white px-5 py-6 shadow-sm sm:px-6 dark:bg-gray-800 dark:shadow-none dark:outline-1 dark:-outline-offset-1 dark:outline-white/10">
            <x-table :rows="$products" :title="__('products.table.0.title')"
                :description="__('products.table.0.description')" :headers="__('products.table.0.headers')"
                :rowActions="__('products.table.0.rowActions')" />
        </div>
    </div>
@endsection