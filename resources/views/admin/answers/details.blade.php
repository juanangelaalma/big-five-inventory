<x-admin-layout pageTitle="Hasil Pengisian">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            @if ($user && $answered_at && $results)
                <x-personality-test-result :user=$user :answered_at=$answered_at :results=$results />
            @endif
        </div>
    </div>
</x-admin-layout>
