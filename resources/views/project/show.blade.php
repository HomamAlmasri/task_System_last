<x-layout>
    <x-nav/>
    <x-heading>Employer Name: {{ $task->assignedTo->name }} </x-heading>
    <x-forms.divider />
    <x-heading>Title: {{ $task->title }} </x-heading>
    <x-forms.divider />
    <x-heading clas>
        <div class="mt-7">Description: {{ $task->description }} </div>
    </x-heading>
    <x-forms.divider />
    <x-heading>project: {{ $task->feature->project->name }} </x-heading>
    <x-forms.divider />
    <x-heading>Feature: {{ $task->feature->name }} </x-heading>
    <x-forms.divider />
    <x-heading>Time Expected : {{ $task->time_expected }} </x-heading>
    <x-forms.divider />
    @if ($task->priority === 'Medium')
        <div class="flex hover:text-yellow-300 transition-color duration-300">
            <div class="inline-flex items-center gap-x-2">
                <span class="relative flex h-3 w-3">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                    <span class="relative inline-flex h-3 w-3 bg-yellow-600"></span>
                </span>
                <h3 class="font-bold text-lg">
                    Priority : {{ $task->priority }}
                </h3>
            </div>
        </div>
    @elseif($task->priority === 'Low')

        <div class="flex hover:text-green-300 transition-color duration-300">
            <div class="inline-flex items-center gap-x-2">
                <span class="relative flex h-3 w-3">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                    <span class="relative inline-flex h-3 w-3 bg-green-600"></span>
                </span>
                <h3 class="font-bold text-lg">
                    Priority : {{ $task->priority }}
                </h3>
            </div>
        </div>

    @elseif($task->priority === 'High')
        <div class="flex hover:text-red-300 transition-color duration-300">
            <div class="inline-flex items-center gap-x-2">
                <span class="relative flex h-3 w-3">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                    <span class="relative inline-flex h-3 w-3 bg-red-600"></span>
                </span>
                <h3 class="font-bold text-lg">
                    Priority : {{ $task->priority }}
                </h3>
            </div>
        </div>
    @endif
    <a href="/task/{{$task->id}}/edit">
        <x-forms.button class="hover:bg-blue-900 mt-7">Edit</x-forms.button>
    </a>
</x-layout>
