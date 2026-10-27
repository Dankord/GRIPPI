<x-layout title="Sign In">
    <div class="flex items-center justify-center min-h-screen flex-col">
        <h1 class=" text-white text-left text-4xl w-100 h-auto my-1 p-1 font-bold">Sign In</h1>
        <div class="flex items-center justify-center w-100 h-auto p-1">
            <form action="/sign-in" method="post">
            <div class="flex flex-col text-left w-100 h-auto my-1 px-2 ">
                <label for ="id_num" class="text-white">ID Number <span class="text-yellow-500">*</span></label>
                <input type="text" name="id_num" placeholder="ID Number" class="border-2 text-white opacity-50 w-full p-1 mb-3" required>
                <label for ="password" class="text-white">Password <span class="text-yellow-500">*</span></label>
                <input type="password" name="password" placeholder="Password" class="border-2 text-white opacity-50 w-full p-1" required>
                
                <div class="flex flex-row p-2">
                    <input type="checkbox" name="remember_me" id="remember_me" class="text-white accent-amber-300 cursor-pointer">
                    <label for="remember_me" class="text-white ml-1.5">Remember Me</label>
                    <p class="text-white ml-auto hover:underline cursor-pointer">Forgot Password?</p>
                </div>
            </div>
            <br>
            <button type="submit" class="bg-amber-400 rounded-md text-black w-full p-2 cursor-pointer hover:bg-amber-300">Log In</button>
        </form>
    </div>
</div>
</x-layout>