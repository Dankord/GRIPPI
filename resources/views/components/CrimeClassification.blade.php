<form action="" method="post">
    @csrf
    <div class="flex flex-col items-start justify-start mb-5">
        <input type="text" name="searchCrimeCategory" placeholder="Search Crime Categories" maxlength="80" class="text-white rounded-md bg-sky-950 p-3 text-sm w-full border-slate-500 border-2 resize-none h-auto mb-2">
        <label class="flex items-center bg-sky-950 rounded-md p-2 h-auto w-full border-2 border-slate-500 mb-2 cursor-pointer has-checked:border-yellow-500">
            <span class="text-white flex justify-start items-start font-medium text-sm ml-2 mb-1 mr-3">
                Theft
            </span>
            <input type="radio" name="crime_class" value="Theft" required class="radio radio-sm accent-yellow-500 border-2 border-slate-500 ml-auto">
        </label>

        <label class="flex items-center bg-sky-950 rounded-md p-2 h-auto w-full border-2 border-slate-500 mb-2 cursor-pointer has-checked:border-yellow-500">
            <span class="text-white flex justify-start items-start font-medium text-sm ml-2 mb-1 mr-3">
                Robbery
            </span>
            <input type="radio" name="crime_class" value="Robbery" class="radio radio-sm accent-yellow-500 border-2 border-slate-500 ml-auto">
        </label>

        <label class="flex items-center bg-sky-950 rounded-md p-2 h-auto w-full border-2 border-slate-500 mb-2 cursor-pointer has-checked:border-yellow-500">
            <span class="text-white flex justify-start items-start font-medium text-sm ml-2 mb-1 mr-3">
                Murder
            </span>
            <input type="radio" name="crime_class" value="Murder" class="radio radio-sm accent-yellow-500 border-2 border-slate-500 ml-auto">
        </label>

        <label class="flex items-center bg-sky-950 rounded-md p-2 h-auto w-full border-2 border-slate-500 mb-2 cursor-pointer has-checked:border-yellow-500">
            <span class="text-white flex justify-start items-start font-medium text-sm ml-2 mb-1 mr-3">
                Physical Injury
            </span>
            <input type="radio" name="crime_class" value="Physical Injury" class="radio radio-sm accent-yellow-500 border-2 border-slate-500 ml-auto">
        </label>

        <label class="flex items-center bg-sky-950 rounded-md p-2 h-auto w-full border-2 border-slate-500 mb-2 cursor-pointer has-checked:border-yellow-500">
            <span class="text-white flex justify-start items-start font-medium text-sm ml-2 mb-1 mr-3">
                Drug-Related
            </span>
            <input type="radio" name="crime_class" value="Drug-Related" class="radio radio-sm accent-yellow-500 border-2 border-slate-500 ml-auto">
        </label>

        <button type="submit" class="bg-yellow-500 text-black rounded-md p-3 text-sm w-full text-center hover:bg-yellow-600 cursor-pointer">
            Next: Classification
        </button>
    </div>
</form>
