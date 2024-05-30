<div class="bg-white block mt-6 p-6 border-gray-300 hover:border-indigo-300 hover:ring hover:ring-indigo-200 hover:ring-opacity-50 rounded-md shadow-sm">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            <!-- SVG aquí -->
        </div>
        <div class="flex-1 min-w-0 ms-4">
            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
            {{ $contact->first_name }} {{ $contact->last_name }}
            </p>
            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
            {{ $contact->email }}
            </p>
        </div>
        <div class="flex-shrink-0">
            <!-- SVG aquí -->
        </div>
        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
            {{ $contact->phone }}
        </div>
    </div>
</div>