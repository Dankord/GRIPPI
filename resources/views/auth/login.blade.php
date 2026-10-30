<x-layout>
    <x-slot:title>
        Sign-In
    </x-slot:title>

    <div class="flex items-center justify-center min-h-screen flex-col">
        <div class="flex items-center justify-center w-100 h-auto p-1">
            <div class="card">
                <div class="card-body w-auto h-auto bg-slate-800 shadow-xl rounded-xl">
                <form action="{{ route('login.store') }}" method="post">
                    @csrf
                    <div class="flex flex-col text-left w-100 h-auto my-1 px-2 ">
                        <h1 class="text-white text-3xl w-100 h-auto my-1 p-1 font-bold flex items-center justify-center mb-8">Sign In</h1>
                        <label for="personnel_number" class="text-white">
                            ID Number <span class="text-yellow-500">*</span>
                        </label>
                        <input type="text" name="personnel_number" value="{{ old('personnel_number') }}" placeholder="Personnel ID Number" class="border rounded-md bg-transparent p-2 mb-2 text-sm w-full @error('personnel_number') border-red-500 @else border-slate-500 @enderror" required>
                        @error('personnel_number')
                            <p class="text-red-400 text-sm mb-3">{{ $message }}</p>
                        @enderror

                        <label for="password" class="text-white">Password <span class="text-accent">*</span></label>
                        <input type="password" name="password" value="{{ old('password') }}" placeholder="Password" auto-complete="current-password" class="border rounded-md border-slate-500 transparent p-2 mb-2 text-sm w-full @error('password') border-red-500 @else border-slate-500 @enderror" required>
                        @error('password')
                            <p class="text-red-400 text-sm mb-3">{{ $message }}</p>
                        @enderror

                        <div class="flex justify-between p-2">
                            <div class="flex items-center">
                                <input type="checkbox" name="remember_me" id="remember_me" class="checkbox checkbox-sm checkbox-accent cursor-pointer">
                                <label for="remember_me" class="text-white ml-1.5">Remember Me</label>
                            </div>
                            <p class="flex justify-end ml-auto hover:underline cursor-pointer text-accent">Forgot Password?</p>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="bg-accent rounded-md text-black w-full p-2 cursor-pointer hover:bg-amber-300">Log In</button>
            </form>
        </div>
    </div>
</x-layout>