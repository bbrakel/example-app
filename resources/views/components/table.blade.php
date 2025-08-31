<div class="flow-root">
    <div class="-mx-4 -my-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <table class="relative min-w-full divide-y divide-gray-300 dark:divide-white/15">
                <thead>
                    <tr>
                        @foreach ($headers as $header)
                            @if ($loop->first)
                                <th scope="col"
                                    class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-0 dark:text-white">
                                    {{ Str::apa(__("validation.attributes.{$header}")) }}
                                </th>
                            @else
                                <th scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                    {{ Str::apa(__("validation.attributes.{$header}")) }}
                                </th>
                            @endif
                        @endforeach
                        @isset($rowActions)
                            <th scope="col"
                                class="sr-only py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-0 dark:text-white max-w-fit">
                            </th>
                        @endisset
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-white/10">
                    @forelse ($rows as $row)
                        <tr>
                            @foreach ($headers as $header)
                                @if ($loop->first)
                                    <td
                                        class="py-4 pr-3 pl-4 text-sm font-medium whitespace-nowrap text-gray-900 sm:pl-0 dark:text-white">
                                        {{ $row[$header] }}
                                    </td>
                                @else
                                    <td class="px-3 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">
                                        {{ $row[$header] }}
                                    </td>
                                @endif
                            @endforeach
                            @isset($rowActions)
                                <td class="px-3 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400 w-1">
                                    <div class="flex gap-2">
                                        @foreach ($rowActions as $action)
                                            <x-action-button :action="$action" />
                                        @endforeach
                                    </div>

                                </td>
                            @endisset
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($headers ?? []) }}"
                                class="py-4 pr-3 pl-4 text-sm font-medium whitespace-nowrap text-gray-900 sm:pl-0 dark:text-white">
                                Geen data gevonden
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>