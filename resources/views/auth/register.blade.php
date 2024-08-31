<x-layout>
    <h1 class="font-bold text-center text-4xl mb-8">Register</h1>
    <x-forms.form method="POST" action="/register" enctype="multipart/form-data" class="space-y-6">
        <x-forms.input label="Your Name" name="name" />
        @error('name')
            <div class="bg-red-500 rounded-xl px-3 py-1">{{ $message }}</div>
        @enderror
        <x-forms.input label="Email" name="email" type="email" />
        @error('email')
            <div class="bg-red-500 rounded-xl px-3 py-1">{{ $message }}</div>
        @enderror
        <x-forms.input label="Password" name="password" type="Password" />
        @error('password')
            <div class="bg-red-500 rounded-xl px-3 py-1">{{ $message }}</div>
        @enderror
        <x-forms.input label="Password Confirmation" name="password_confirmation" type="password" />
        @error('Password_confirmation')
            <div class="bg-red-500 rounded-xl px-3 py-1">{{ $message }}</div>
        @enderror
        <x-forms.divider />
        <x-forms.button>Create Account</x-forms.button>
    </x-forms.form>
</x-layout>
