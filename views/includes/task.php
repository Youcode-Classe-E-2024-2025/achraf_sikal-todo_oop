<!-- Task Card -->
<?php
include "../../controller/ControllerTash.php";
function taskv($stat) {
    $taskclass = new TaskController();
    $task = $taskclass->viewTasks();
    if ($task) {
        $edit = '<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Task</h3>
                    <div class="mt-2 px-7 py-3">
                        <form id="editForm" action="../../controller/ControllerTash.php?action=edit" method="POST">
                            <div class="mb-4">
                                <label for="editName" class="block text-gray-700 text-sm font-bold mb-2">Task Name</label>
                                <input type="text" id="editName" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="mb-4">
                                <label for="editDescription" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                                <textarea id="editDescription" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="editType" class="block text-gray-700 text-sm font-bold mb-2">Type</label>
                                <select id="editType" name="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="Simple">Simple</option>
                                    <option value="Bug">Bug</option>
                                    <option value="Feature">Feature</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="editStatus" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                                <select id="editStatus" name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="To Do">To Do</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Done">Done</option>
                                </select>
                            </div>
                                <input type="hidden" id="taskid" name="id" value='.$task["task_id"].'>
                            <div class="items-center px-4 py-3">
                                <input id="saveButton" type="submit" class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300" value= "Save Changes">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
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
        if ($task["status"] == $stat) {
            echo $taskview;
            echo $edit;
        }
    }
}
?>