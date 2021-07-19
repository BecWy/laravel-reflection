<div class="h-screen w-screen flex justify-center items-center fixed inset-0 z-50"> 
    <div class="bg-white border rounded-lg w-7/12 max-w-screen-md max-h-full overflow-y-auto">
        <div class="flex flex-col items-center bg-white my-4 mx-4" >


            <h2 class="text-lg font-bold my-4">Delete Company?</h2>

            <a onclick="hideDeleteModal()" class="absolute self-end px-4 py-2 text-lg cursor-pointer"><i class="fas fa-times"></i></a>

            @auth
                <form method="POST" 
                        action="/companies/{{$company->id}}/destroy" 
                        class="w-10/12" 
                        enctype="multipart/form-data"> 
                    @csrf

                    <p>Are you sure you want to delete {{$company->name}} and all of its employees?</p>


                    <!-- <button type="button" class="cancelbtn">Cancel</button> -->

                    <div id="button-div" class="my-4 mt-8 bg-indigo-700 text-white text-center">
                        <button type="submit" id="submit-button" class="font-bold uppercase w-full h-full py-3"> 
                            Delete
                        </button>
                    </div>
                </form>
            @endauth

        </div>
    </div>
</div>
