<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ 'user' }}" class="card-link">User Manage</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
            {{-- @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <style>
            .alert {
                padding: 15px;
                margin-bottom: 20px;
                border: 1px solid transparent;
                border-radius: 4px;
            }

            .alert-danger {
                color: #721c24;
                background-color: #f8d7da;
                border-color: #f5c6cb;
            }
        </style> --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ 'manage' }}" class="card-link">Lecturer Manage</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ 'majors' }}" class="card-link">Major Manage</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ 'courses' }}" class="card-link">Course Manage</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ 'courses_lo' }}" class="card-link">Course LO Manage</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ 'material' }}" class="card-link">Material Manage</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ 'assignments' }}" class="card-link">Assignments Manage</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ 'lessons' }}" class="card-link">Lessons Manage</a>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .card-link {
            color: #4a5568; /* text-gray-900 */
            font-size: 1.125rem; /* text-lg */
            font-weight: 600; /* font-semibold */
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .card-link:hover {
            color: #2b6cb0; /* text-blue-600 */
            text-decoration: underline;
        }

        .rounded-lg {
            border-radius: 0.75rem;
        }

        .shadow-lg {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .p-6 {
            padding: 1.5rem;
        }

        .text-gray-900 {
            background-color:#f1c615 ;
            color: #4a5568;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .max-w-7xl {
            max-width: 80rem;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .sm\\:px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .lg\\:px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .py-12 {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }
    </style>
</x-app-layout>
