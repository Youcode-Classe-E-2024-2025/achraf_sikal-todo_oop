<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Card</title>
    <link rel="stylesheet" href="./assets/src/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="">
    <div class="bg-white rounded-lg shadow-md overflow-hidden max-w-md w-full">
        <div class="p-6">
            <div class="flex justify-between items-start mb-4">
                <h2 class="text-xl font-semibold text-gray-800 leading-tight">Implement User Authentication</h2>
                <span class="px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full">Development</span>
            </div>
            <p class="text-gray-600 mb-4">Set up user authentication system using JWT tokens and implement login/logout functionality.</p>
            <div class="flex justify-between items-center text-sm text-gray-500">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Created: May 15, 2023
                </div>
                <button class="text-blue-500 hover:text-blue-600 transition-colors duration-200">
                    Edit
                </button>
            </div>
        </div>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <img class="h-8 w-8 rounded-full object-cover" src="https://randomuser.me/api/portraits/women/42.jpg" alt="Assigned to">
                    <span class="ml-2 text-sm text-gray-600">Sarah Johnson</span>
                </div>
                <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">In Progress</span>
            </div>
        </div>
    </div>
</body>
</html>