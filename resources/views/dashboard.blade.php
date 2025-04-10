<x-app-layout>
    <!-- Header Slot with the Dashboard Title -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Main Content Area -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card Container -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Content Wrapper -->
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Project Overview -->
                    <p class="mb-4">
                        Welcome to your Financial Management Dashboard! This application is designed to help you
                        effectively manage and track your financial activities, allowing you to stay informed
                        and make smarter decisions.
                    </p>

                    <!-- Key Features List -->
                    <p class="mb-4 font-bold text-lg">Key Features:</p>
                    <ul class="list-disc ml-6 mb-4">
                        <li><strong>User Management:</strong> Update your profile and manage your account.</li>
                        <li><strong>Transactions:</strong> Create, view, edit, and delete your income and expense records.</li>
                        <li><strong>Goals Tracking:</strong> Set financial goals and monitor your progress.</li>
                        <li><strong>Dashboard Summary:</strong> Aggregated financial insights and overviews. (Planned)</li>
                        <li><strong>Secure API:</strong> Token-based API access for enhanced security. (Planned)</li>
                    </ul>

                    <!-- Technology Used -->
                    <p class="mb-4 font-bold text-lg">Technology Used:</p>
                    <ul class="list-disc ml-6 mb-4">
                        <li><strong>Backend:</strong> Laravel 12 with PostgreSQL</li>
                        <li><strong>Frontend:</strong> Blade templating</li>
                        <li><strong>Dev Environment:</strong> Docker and Laravel Sail</li>
                        <li><strong>Testing:</strong> Postman for manual tests and PHPUnit</li>
                        <li><strong>Deployment:</strong> Render or local Docker deployments</li>
                        <li><strong>Monitoring:</strong> Laravel logs and Postman test cases</li>
                    </ul>

                    <!-- Future Plans -->
                    <p class="mb-4 font-bold text-lg">Future Plans:</p>
                    <ul class="list-disc ml-6 mb-4">
                        <li><strong>Secure API Improvements:</strong> Full implementation of Token/JWT authentication.</li>
                    </ul>

                    <!-- Footer note -->
                    <p class="text-sm text-gray-500">
                        Your session is secure, and your data persists thanks to our setup with Laravel Sail and Docker.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
