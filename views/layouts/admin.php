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
    <header>
        <?php include("../includes/nav.php")?>
    </header>
    <main>
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
        <?php include('../includes/main.php') ?>
    </main>    
    
    <!-- MOdel window -->

    <section id="myModal" class="model p-6 rounded-lg shadow-md fixed inset-0 z-10 pt-30 overflow-auto bg-black bg-opacity-40 ms:border-2 ">
        <div class="flex justify-end p-2 mt-16 mb-6 ">
            <button id="close" class="btn btn-link text-white">
                <i class="bi bi-x-lg" style="font-size: 1.5rem;"></i>
            </button>
        </div>
        <form action="../../controller/ControllerTash.php?action=insert" method="POST" class="space-y-4 p-6 bg-gray-100 rounded-lg shadow-md mx-auto w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="title">Titre</label>
                <input type="text" id="title"  name="title" class="p-2 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter title">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="description">Description</label>
                <textarea id="description" rows="3" name="description" class=" pl-3 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter description"></textarea>
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