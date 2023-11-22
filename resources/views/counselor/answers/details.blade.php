<x-counselor-layout pageTitle="Hasil Pengisian">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <x-personality-test-result :user=$user :answered_at=$answered_at :results=$results />
        </div>
    </div>
</x-counselor-layout>
