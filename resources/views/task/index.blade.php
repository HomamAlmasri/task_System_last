<x-layout>
    @section('nav')
        <div class="mt-2 font-bold ">
            @auth
                <div class="inline">
                    @if (Auth::user()->role === 'admin')
                        <x-heading><a href="/task/create" class="hover:bg-blue-900 rounded-xl px-2 py-1">Create A
                                Task</a></x-heading>
                    @endif
                    <x-heading>
                        <button class=" hover:bg-blue-900 rounded-xl px-2 py-1">{{ Auth::user()->name }}</button>
                    </x-heading>
                </div>
                <form action="/logout" method="Post">
                    @csrf
                    <x-heading>
                        <button class="hover:bg-blue-900 rounded-xl px-2 py-1">Log out</button>
                    </x-heading>
                </form>
            @endauth
        </div>
    @endsection
    <div class="space-y-10">
        @auth
            <section class="text-center pt-10">
                <h1 class="font-bold text-4xl mb-6">Search</h1>
                <x-forms.form action="/search" method="GET">
                    <x-forms.input :label="false" name="q" placeholder="Web Developer..." />
                </x-forms.form>
            </section>
            <section class="pt-10">
                <x-heading>My Tasks</x-heading>
                <div class="grid lg:grid-cols-3 gap-8 grid-center mt-6">
                    @foreach ($tasks as $task)
                        @if ($task->employer_name === Auth::user()->name)
                            <x-job-card1 :$task />
                        @endif
                    @endforeach
                </div>
            </section>

            <section>
                <x-heading>Recent Jobs</x-heading>
                <div class="mt-6 space-y-6">
                    @foreach ($tasks as $task)
                        <x-job-card-wide1 :$task />
                    @endforeach
                </div>
            </section>
        @endauth
    </div>
    @guest
        <h1 class="text-xl">Please Log In Or Sign up </h1>
    @endguest

</x-layout>
