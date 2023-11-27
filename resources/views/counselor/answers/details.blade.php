<x-counselor-layout pageTitle="Hasil Pengisian">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            @if ($user && $answered_at && $results)
                <div class="px-24">
                    <x-personality-test-result :user=$user :answered_at=$answered_at :results=$results />
                </div>
            @endif
        </div>
    </div>
</x-counselor-layout>
