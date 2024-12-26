<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <?php include("../includes/nav.php")?>

    <section class="flex flex-col md:flex-row justify-between px-4 md:px-24 p-5 my-24">
        <button id="btnAdd" class="rounded-md w-full md:w-40 h-10 flex justify-between px-3 items-center bg-blue-500 text-white hover:bg-blue-600 transition duration-200 mb-4 md:mb-0">
            Add Task <span class="text-3xl"><i class="bi bi-plus"></i></span>
        </button>
        <input type="text" placeholder="Search" class="border border-black rounded-md w-full md:w-40 h-10 outline-none ps-3 hover:border-blue-500 transition duration-200">
        <select name="Priorty" id="Priorty" class="border border-black rounded-md w-full md:w-40 h-10 outline-none ps-3 hover:border-blue-500 transition duration-200">
            <option value="">Select Proirty</option>
            <option value="all proirty">ALL</option>
            <option value="p1">P1</option>
            <option value="p2">P2</option>
            <option value="p3">P3</option>
        </select>
    </section>
    

    <section class="container mx-auto flex flex-col md:flex-row justify-around md:items-start h-full">
        <div class="todo border-2 border-indigo-500 m-5 lg:w-full pb-4 flex flex-col items-center bg-white shadow-lg rounded-lg md:w-56 ">
            <div class="header-todo rounded-[5px,5px,5px] bg-indigo-500 text-white border-b-2 border-indigo-500 flex justify-between items-center w-full p-3">
                <p id="countTodo" class="font-bold w-7 border-2 border-white bg-white rounded-full text-center text-indigo-700">0</p>
                <h2 class="font-bold text-lg  text-white">TO DO</h2>
                <i class="bi bi-arrow-down-up font-bold  text-white"></i>
            </div>
            <div id="tache" class="tache w-full mt-6 px-3">
                <!-- ajouter les tache -->
            </div>
        </div>
    
        <div id="doing" class="todo border-2 border-yellow-500 m-5 lg:w-full pb-4 flex flex-col items-center bg-white shadow-lg rounded-lg md:w-56 ">
            <div class="header-todo bg-yellow-500 border-b-2 border-yellow-500 flex justify-between items-center w-full p-3">
                <p id="countDoing" class="font-bold w-7 border-2 border-yellow-500 rounded-full text-center bg-white text-yellow-500">0</p>
                <h2 class="font-bold text-lg text-white">DOING</h2>
                <i class="bi bi-arrow-down-up font-bold text-white"></i>
            </div>
            <div id="doingTasks" class="doing-tasks w-full mt-6 px-3">
                <!-- ajouter les tache -->
            </div>
        </div>
    
        <div id="done" class="todo border-2 border-green-500 m-5 lg:w-full pb-4 flex flex-col items-center bg-white shadow-lg rounded-lg md:w-56 ">
            <div class="header-todo border-b-2 bg-green-500 border-green-500 flex justify-between items-center w-full p-3">
                <p id="countDone" class="font-bold w-7 border-2 bg-white border-green-500 rounded-full text-center text-green-500">0</p>
                <h2 class="font-bold text-lg text-white">DONE</h2>
                <i class="bi bi-arrow-down-up font-bold text-white"></i>
            </div>
            <div id="doneTasks" class="done-tasks w-full mt-6 px-3">
                <!-- ajouter les tache -->
            </div>
        </div>
    </section>
    
    
    


    <!-- MOdel window -->

    <section id="myModal" class="model p-6 rounded-lg shadow-md fixed inset-0 z-10 pt-30 overflow-auto bg-black bg-opacity-40 ms:border-2 ">
        <div class="flex justify-end p-2 mt-16 mb-6 ">
            <button id="close" class="btn btn-link text-white">
                <i class="bi bi-x-lg" style="font-size: 1.5rem;"></i>
            </button>
        </div>
        <form action="" class="space-y-4 p-6 bg-gray-100 rounded-lg shadow-md mx-auto w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="title">Titre</label>
                <input type="text" id="title" class="p-2 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter title">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="description">Description</label>
                <textarea id="description" rows="3" class=" pl-3 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter description"></textarea>
            </div>
            <!-- <div>
                <label class="block text-sm font-medium text-gray-700" for="date">Date</label>
                <input type="date" id="date" class="pl-3 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div> -->
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="priority">Priorité</label>
                    <select id="priority" class="p-2 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <option value="" >select priority</option>
                        <option value="p1">P1</option>
                        <option value="p2">P2</option>
                        <option value="p3">P3</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="status">Statut</label>
                    <select id="Statut" class=" p-2 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <option value="">select statut</option>
                        <option value="todo">Todo</option>
                        <option value="doing">Doing</option>
                        <option value="done">Done</option>
                    </select>
                </div>
            </div>
            <div>
            </div>
            <button id="submitTache" type="submit" class="mt-4 w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700">Submit</button>
            <button id="modifierTache" type="submit" class="mt-4 w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 hidden">Update</button>
        </form>
    </section>

    <script src="../../assets/js/main.js"></script>
</body>
</html>