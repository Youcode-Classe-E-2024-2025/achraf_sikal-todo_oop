<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Task</h3>
            <div class="mt-2 px-7 py-3">
                <form id="editForm">
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
                            <option value="Development">Development</option>
                            <option value="Design">Design</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Research">Research</option>
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
                </form>
            </div>
            <div class="items-center px-4 py-3">
                <button id="saveButton" class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    Save Changes
                </button>
            </div>
        </div>
    </div>
</div>