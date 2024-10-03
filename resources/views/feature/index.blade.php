<x-layout>
    <x-nav/>
    <div class="space-y-10">
        @auth
            <x-search />
                <section class="pt-10">
                    <x-heading>Project</x-heading>
                    <div class="grid lg:grid-cols-3 gap-8 grid-center mt-6">
                        @foreach ($projects as $project)
                                <x-job-card-project :$project />
                        @endforeach
                    </div>
                </section>
        @endauth
    </div>
    @guest
        <h1 class="text-xl">Please Log In Or Sign up </h1>
    @endguest

</x-layout>
