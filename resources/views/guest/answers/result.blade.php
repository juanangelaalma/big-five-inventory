<x-app-layout class="bg-white">
    <div class="py-12 bg-white">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <h1 class="text-2xl">@lang('analyst.guest.result.title')</h1>
            <div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b">
                                <th class="px-4 py-3">@lang('analyst.guest.result.table.columns.created')</th>
                                <th class="px-4 py-3">@lang('analyst.guest.result.table.columns.status')</th>
                                <th class="px-4 py-3 hidden md:block">@lang('analyst.guest.result.table.columns.result')</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($answers as $answer)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">
                                        {{ $answer->updated_at }}
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            @lang('analyst.guest.result.table.body.statuses.done')
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 hidden md:table-cell text-sm">
                                        @lang('analyst.guest.result.table.body.result')
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <x-guest.primary-button href="{{ route('answers.result.details', $answer) }}" class="w-[90px] text-xs">@lang('analyst.guest.result.table.body.cta.show')</x-guest.primary-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
