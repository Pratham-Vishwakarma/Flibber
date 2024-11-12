<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
	<div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 space-y-2">
            <!-- Section 1: Upload New Paper -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-semibold mb-4 dark:text-white">Upload New Research Paper</h3>
                <a href="{{ route('papers.upload') }}" class="text-blue-500 hover:underline">Go to Upload Form</a>
            </div>

            <!-- Section 2: View Uploaded Papers -->
		<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-2xl font-semibold mb-4 dark:text-white">Manage Your Papers</h3>
                    <a href="{{ route('papers.index') }}" class="text-blue-500 hover:text-blue-700">
                        View Your Research Papers
                    </a>
                </div>
        </div>
    </div>
</x-app-layout>
