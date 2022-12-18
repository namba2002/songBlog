<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            
            <!-- gender -->
            <div class="mt-4">
                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                <div class="w-full">
                    <input id="gender-m" type="radio" name="gender" value="male">
                    <label for="gender-m">Male</label>
                    <input id="gender-f" type="radio" name="gender" value="female">
                    <label for="gender-f">Female</label>
                    <input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>
            </div>
            
            <!-- age -->
            <div class="mt-4">
                <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>
            
                <div class="col-md-6">
                    <input id="age" type="number" min="1" class="block mt-1 w-full" name="age" value="old('age') }}" required>
            
                    @if ($errors->has('age'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('age') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
                     
            <!-- pitch -->
            <div class="mt-4">
                <label for="pitch" class="col-md-4 col-form-label text-md-right">Pitch</label>

                <div class="col-md-6">
                    <input id="pitchTooL" type="radio" name="pitch" value="pitchTooL">
                    <label for="pitchTooL">とても低い</label>
                    <input id="pitchL" type="radio" name="pitch" value="pitchL">
                    <label for="pitchL">低い</label>
                    <input id="pitch" type="radio" name="pitch" value="pitch">
                    <label for="pitch">普通</label>
                    <input id="pitchH" type="radio" name="pitch" value="pitchH">
                    <label for="pitchH">高い</label>
                    <input id="pitchTooH" type="radio" name="pitch" value="pitchTooH">
                    <label for="pitchTooH">とても高い</label>
            
                    @if ($errors->has('pitch'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('pitch') }}</strong>
                        </span>
                    @endif
                </div>
            </div>   

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
