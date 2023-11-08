@if ($type == 'success')
    <div
        class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20">
                <path fill="currentColor"
                    d="M10 20a10 10 0 0 1 0-20a10 10 0 1 1 0 20Zm-2-5l9-8.5L15.5 5L8 12L4.5 8.5L3 10l5 5Z" />
            </svg>
            <span>{{ $message }}</span>
        </div>
    </div>
@elseif($type == 'warning')
    <div
        class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-white bg-[#F29D0D] rounded-lg shadow-md focus:outline-none focus:shadow-outline-yellow">
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M1 21h22L12 2L1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z" />
            </svg>
            <span>{{ $message }}</span>
        </div>
    </div>
@else
    <div
        class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-red-100 bg-red-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-red">
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M1 21h22L12 2L1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z" />
            </svg>
            <span>{{ $message }}</span>
        </div>
    </div>
@endif
