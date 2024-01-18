<x-guest-layout>


    {{-- <div class="flex">
        <div class="w-1/2">
            soy puto
        </div>
       
        <div class="w-1/2 ">
            <x-authentication-card class="bg-black">
                <x-slot name="logo">
                    <x-authentication-card-logo />
                </x-slot>
        
                <x-validation-errors class="mb-4" />
        
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
        
                <form method="POST" action="{{ route('login') }}">
                    @csrf
        
                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>
        
                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>
        
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
        
                        <x-button class="ms-4 bg-greenColor text-secundaryColor">
                            {{ __('Log in') }}
                        </x-button>
        
        
                    
                    </div>
                </form>
            </x-authentication-card>
        </div>
    </div> --}}


    <!-- component -->
<div class="bg-white ">
    <div class="flex justify-center h-screen">
        <div class="hidden bg-cover lg:block lg:w-2/3" style="background-image: url(https://lh3.googleusercontent.com/p/AF1QipNAGSLNFa-IYGbCdCEreTYOyBhobEFBQMzPbSDL=w600-k)">
            <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                <div>
                    <h2 class="text-4xl font-bold text-white">Brand</h2>
                    
                    <p class="max-w-xl mt-3 text-gray-300">Lorem ipsum dolor sit, amet consectetur adipisicing elit. In autem ipsa, nulla laboriosam dolores, repellendus perferendis libero suscipit nam temporibus molestiae</p>
                </div>
            </div>
        </div>
        
        <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
            <div class="flex-1">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-center text-gray-700 ">Brand</h2>
                    
                    <p class="mt-3 text-gray-500 ">Sign in to access your account</p>
                </div>

                <div class="mt-8">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm text-gray-600 ">Email Address</label>
                            <input type="email" name="email"  id="email" placeholder="example@example.com" :value="old('email')" required autofocus autocomplete="username" class="inputText " />
                        </div>

                        <div class="mt-6">
                            <div class="flex justify-between mb-2">
                                <label for="password" class="text-sm text-gray-600 ">Password</label>
                                <a href="#" class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline">Forgot password?</a>
                            </div>

                            <input type="password" name="password" id="password" placeholder="Your Password" type="password" name="password" required autocomplete="current-password" class="inputText " />
                        </div>

                        <div class="mt-6">
                            <input type="submit" value=" Sign in" class="btnLogin">
                            {{-- <button
                                class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                Sign in
                            </button> --}}
                        </div>

                    </form>

                    <p class="mt-6 text-sm text-center text-gray-400">Don&#x27;t have an account yet? <a href="#" class="text-blue-500 focus:outline-none focus:underline hover:underline">Sign up</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>

   
</x-guest-layout>
