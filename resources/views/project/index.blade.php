<x-layout>
    <x-nav/>
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
                                <x-job-card1 :$task />
                        @endforeach
                    </div>
                    <div class="mt-10">
                    {{$tasks->links()}}
                    </div>
                </section>
            <section>
                <x-heading>Daily Tasks</x-heading>
                <div class="mt-6 space-y-6 ">
                    @foreach ($daily as $dtask)
                        @if ($dtask->name === Auth::user()->name)
                            <a href="/task/{{ $task->id }}">
                                <x-panal class="mb-3 flex justify-between">
                                    <div>{{ $dtask->created_at }}</div>
                                    <div>{{ $dtask->name }}</div>
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
