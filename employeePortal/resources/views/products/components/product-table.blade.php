<div class="overflow-x-auto">
    <div class="flex w-full p-3 space-x-2">
        <!-- Seach Box -->
        <div class="w-3/6">
            <input type="text" wire:model.debounce.300ms="search" class="relative w-full px-3 py-3 pl-10 text-sm
            text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded shadow-inner outline-none
            focus:outline-none focus:shadow-outline focus-ring-0 foucus:bg-indigo-50" placeholder="Search Products...">
        </div>
        <!-- Order By -->
        <div class="relative w-1/6">
            <select wire:model="orderBy" id="orderBy" class="relative w-full px-3 py-3 pl-10 text-sm
            text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none
            focus:outline-none focus:shadow-outline focus-ring-0 foucus:bg-indigo-50">
                <option value="id">ID</option>
                <option value="name">Name</option>
                <option value="created_at">Created At</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
            </div>
        </div>
        <!-- Order Asc -->
        <div class="relative w-1/6">
            <select wire:model="orderAsc" id="orderAsc" class="relative w-full px-3 py-3 pl-10 text-sm
            text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none
            focus:outline-none focus:shadow-outline focus-ring-0 foucus:bg-indigo-50">
                <option value="1">Ascending</option>
                <option value="0">Descending</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">                            
            </div>
        </div>
        <!-- Per Page -->
        <div class="relative w-1/6">
            <select wire:model="perPage" id="perPage" class="relative w-full px-3 py-3 pl-10 text-sm
            text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none
            focus:outline-none focus:shadow-outline focus-ring-0 foucus:bg-indigo-50">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">                            
            </div>
        </div>
    </div> 
    <table class="w-full text-base text-left text-gray-700 dark:text-gray-400">
        <thead class="text-sm text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="">
                <th class="py-3 px-6">
                    ID
                </th>
                <th class="py-3 px-6">
                    Name
                </th>
                <th class="py-3 px-6">
                    Category
                </th>
                <th class="py-3 px-6">
                    Image                                        
                </th>
                <th class="py-3 px-6">
                    Price ($)                                        
                </th>
                <th class="py-3 px-6">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">                                    
                <td class="py-4 px-6">
                    {{ $product->id }}
                </td>
                <td class="py-4 px-6">
                    {{ $product->name }}
                </td>
                <td class="py-4 px-6">
                    {{ $product->category }}
                </td>                
                <td class="hidden">
                    {{ $product->color }}                                   
                </td>
                <td class="py-4 px-6">
                    <img src="{{ asset($product->img) }}" width="75px" height="75px" />                                  
                </td>
                <td class="hidden">
                    {{ $product->stock }}                                   
                </td>
                <td class="py-4 px-6">
                    {{ $product->price }}                                   
                </td>
                <td class="hidden">
                    {{ $product->description }}
                </td>
                <td class="hidden">
                    {{ $product->img }}
                </td>
                <td class="py-4 px-6">
                    <a href="{{ route('products.edit', $product) }}" class="inline-flex items-center px-4 py-2 bg-yellow-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150" >Edit</a>
                    <button type="button" data-modal-toggle="viewData" class="viewBtn inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 active:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">View</button>
                    <button type="button" data-modal-toggle="deleteData" class="deleteBtn inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-2 bg-gray-50">
        <div class="flex justify-end">
            {{ $products->links() }}            
        </div>
    </div>
</div>


<!-- View modal -->
<div id="viewData" tabindex="-1" class="bg-opacity-50 fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="viewData">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6">
                <h3 class="mb-5 text-center text-xl font-normal text-gray-700 dark:text-gray-400"><span id="view_name"></span></h3>
                <div>
                    <div class="flex items-center justify-center">
                        <img id="view_img" width="250px" height="250px" />
                    </div><br>
                    <strong>ID : </strong><span id="view_id"></span><br> 
                    <strong>Category : </strong><span id="view_category"></span><br>
                    <strong>Color : </strong><span id="view_color"></span><br>
                    <strong>Available Stock : </strong><span id="view_stock"></span><br>
                    <strong>Selling Price : </strong>USD $<span id="view_price"></span><br>
                    <strong>Description : </strong><span id="view_description"></span><br> 
                </div>                                
            </div>
        </div>
    </div>
</div>

<!-- Delete modal -->
<div id="deleteData" tabindex="-1" class="bg-opacity-50 fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="deleteData">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <form method="POST" action="{{ route('products.destroy', 'data_id', 'delete_img') }}">
                    @csrf
                    @method('DELETE')
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this data?</h3>
                    <input type="hidden" name="data_id"  id="data_id"> 
                    <input type="hidden" name="delete_img"  id="delete_img">                        
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, Delete
                    </button>
                    <button type="button" data-modal-toggle="deleteData" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('deleteDataId')
    <script>
    $(document).ready(function(){
        $('.deleteBtn').on('click', function(){
            

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();      

            }).get();

            $('#data_id').val(data[0].trim());
            $('#delete_img').val(data[8].trim());
        });
    });
    </script>
@endpush

@push('viewDataModal')
<script>
$(document).ready(function(){
    $('.viewBtn').on('click', function(){
        

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();      

        }).get();

        console.log(data);
        
        document.getElementById('view_id').innerHTML = data[0];
        document.getElementById('view_name').innerHTML = data[1];
        document.getElementById('view_category').innerHTML = data[2];
        document.getElementById('view_color').innerHTML = data[3];        
        document.getElementById('view_stock').innerHTML = data[5];
        document.getElementById('view_price').innerHTML = data[6];
        document.getElementById('view_description').innerHTML = data[7];
        document.getElementById('view_img').src = data[8];
    });
});
</script>
@endpush