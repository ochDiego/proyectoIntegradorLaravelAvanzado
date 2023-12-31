
<section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
    <div class="flex flex-col justify-center h-full">
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <div class="p-3">
                <div class="overflow-x-auto">
                  {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</section>