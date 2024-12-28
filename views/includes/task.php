<!-- Task Card -->
<?php
include "../../controller/ControllerTash.php";
function taskv($stat) {
    $taskclass = new TaskController();
    $task = $taskclass->viewTasks();
    $taskview = '
    <div id="taskCard" class="bg-white rounded-lg shadow-md overflow-hidden max-w-md w-full">
        <div class="p-6">
            <div class="flex justify-between items-start mb-4">
                <h2 id="taskName" class="text-xl font-semibold text-gray-800 leading-tight">'.$task["title"].'</h2>
                <span id="taskType" class="px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full">'.$task["task_type"].'</span>
            </div>
            <p id="taskDescription" class="text-gray-600 mb-4">'.$task["description"].'</p>
            <div class="flex justify-between items-center text-sm text-gray-500">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Created: <span id="taskDate">'.$task["created_at"].'</span>
                </div>
                <button id="editButton" class="text-blue-500 hover:text-blue-600 transition-colors duration-200">
                    Edit
                </button>
            </div>
        </div>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <span class="ml-2 text-sm text-gray-600">Sarah Johnson</span>
                </div>
                <span id="taskStatus" class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">'.$task["status"].'</span>
            </div>
        </div>
    </div>
    ';
    if ($task) {
        if ($task["status"] == $stat) {
            echo $taskview;
        }
    }
}

?>