<x-layout>
    <x-nav/>
    <x-heading>Results</x-heading>
    <div class=" space-y-6">
        @foreach ($tasks as $task)
            <x-job-card-wide1 :$task />
        @endforeach
    </div>
</x-layout>
