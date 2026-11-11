<form action="" method="post">
    <div class="min-h-screen flex flex-col w-full">
        @csrf
        <label for="incident_title" class="text-white flex justify-start items-start font-medium text-xs mb-1">
            Incident Title
        </label>
        <input type="text" name="incident_title" placeholder="Incident Title" maxlength="80" required class="text-white rounded-md bg-sky-950 p-3 text-sm w-full border-slate-500 border-2 resize-none h-auto mb-5">
        <div class="flex flex-row gap-5">
            <div class="flex flex-col w-full">
                <label for="reporting_officer" class="text-white flex justify-start items-start font-medium text-xs mb-1">
                    Reporting Officer
                </label>
                <input type="text" name="reporting_officer" readonly value="" class="text-white rounded-md bg-sky-950 p-3 text-sm w-full border-slate-500 border-2 resize-none h-auto mb-5">
            </div>
            <div class="flex flex-col w-full">
                <label for="sub_station" class="text-white flex justify-start items-start font-medium text-xs mb-1">
                    Sub Station
                </label>
                <input type="text" name="sub_station" readonly value="" class="text-white rounded-md bg-sky-950 p-3 text-sm w-full border-slate-500 border-2 resize-none h-auto mb-5"> 
            </div>
        </div>
        <label for="incident_date" class="text-white flex justify-start items-start font-medium text-xs mb-1">
            Date and Time of Incident
        </label>
        <input type="datetime-local" id="incident_date" name="incident_date" required class="text-white rounded-md bg-sky-950 p-3 text-sm w-full border-slate-500 border-2 resize-none h-auto mb-5">
        <div class="flex flex-row gap-5 mb-2">
            <label class="flex items-center bg-sky-950 rounded-md p-2 w-full cursor-pointer border-2 border-slate-500 has-checked:border-yellow-500">
                <span class="text-white flex justify-center items-center font-medium text-sm ml-2 mb-1 mr-3 w-full">
                    Low
                </span>
                <input type="radio" name="crime_class" value="Low" required class="appearance-none">
            </label>
            <label class="flex items-center bg-sky-950 rounded-md p-2 w-full cursor-pointer border-2 border-slate-500 has-checked:border-yellow-500">
                <span class="text-white flex justify-center items-center font-medium text-sm ml-2 mb-1 mr-3 w-full">
                    Moderate
                </span>
                <input type="radio" name="crime_class" value="Moderate" class="appearance-none">
            </label>

            <label class="flex items-center bg-sky-950 rounded-md p-2 w-full cursor-pointer border-2 border-slate-500 has-checked:border-yellow-500">
                <span class="text-white flex justify-center items-center font-medium text-sm ml-2 mb-1 mr-3 w-full">
                    High
                </span>
                <input type="radio" name="crime_class" value="High" class="appearance-none">
            </label>
        </div>
        <label for="incident_description" class="text-white flex justify-start items-start font-medium text-xs mb-2 mt-2">
            Incident Description
        </label>
        <textarea name="incident_description" placeholder="Incident Description" wrap="soft" maxlength="500" required class="text-white rounded-md bg-sky-950 p-3 text-sm w-full border-slate-500 border-2 resize-none h-auto mb-5 required"></textarea>
        <button type="submit" class="bg-yellow-500 text-black rounded-md p-3 text-sm w-full text-center hover:bg-yellow-600 cursor-pointer">
            Next: Classification
        </button>
    </div>
</form>