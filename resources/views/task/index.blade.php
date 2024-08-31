<x-layout>
    @section('nav')
        <div class="flex flex-col flex justify-between font-bold mt-1 space-y-1 items-center">
            @auth
                <div class=" flex justify-between space-x-3">
                    @if (Auth::user()->role === 'admin')
                        <x-heading>
                            <a href="/task/create" class="hover:bg-blue-900 rounded-xl px-2 py-1">Create A Task</a>
                        </x-heading>
                        <x-heading>
                            <a href="/register" class="hover:bg-blue-900 rounded-xl px-2 py-1">Create a User</a>
                        </x-heading>
                    @elseif (Auth::user()->role != 'admin')
                        <x-heading>
                            <a href="/"> Create a daily Task</a>
                        </x-heading>
                    @endif
                </div>
                <div class=" flex justify-between space-x-3 ">
                    <x-heading>
                        <p class="  hover:bg-blue-900 rounded-xl px-2 py-1">{{ Auth::user()->name }}</p>
                    </x-heading>

                    <x-forms.form action="/logout" method="Post" class="">
                        <x-heading>
                            <button class="hover:bg-blue-900 rounded-xl px-2 py-1">Log out</button>
                        </x-heading>
                    </x-forms.form>
                </div>
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
            @if (Auth::user()->role != 'admin')
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
            @endif

            <section>
                <x-heading>Daily Tasks</x-heading>
                <div class="mt-6 space-y-6 ">
                    @foreach ($tasks as $task)
                        @if ($task->employer_name === Auth::user()->name)
                            <a href="/task/{{ $task->id }}">
                                <x-panal class="mb-3 flex justify-between">
                                    <div>{{ $task->created_at }}</div>
                                    <div>{{ $task->employer_name }}</div>
                                </x-panal>
                            </a>
                        @endif
                    @endforeach
                </div>
            </section>
        @endauth
    </div>
    @guest
        <h1 class="text-xl">Please Log In Or Sign up </h1>
    @endguest

</x-layout>
