<x-layout>
    <x-heading>Employer Name: {{ $task->employer_name }} </x-heading>
    <x-forms.divider />
    <x-heading>Title: {{ $task->title }} </x-heading>
    <x-forms.divider />
    <x-heading>Discription: {{ $task->discription }} </x-heading>
    <x-forms.divider />
    <x-heading>Time Expected : {{ $task->time_expected }} Hour</x-heading>
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
    @if ($task->status == 0 && Auth::user()->role != 'admin')
        <x-forms.divider />
        <form class="max-w-xs mx-auto space-y-6" method="POST" action="/task/{{ $task->id }}">
            @csrf
            @method('PATCH')
            <x-forms.input label="Note" name="note" type="text" />
            <x-forms.select label='Programming Status' name='status' class="px-2">
                <option value=1 class="bg-black text-blue-300 texl-xl">Finished</option>
                <option value=0 class="bg-black text-blue-300 texl-xl">Pending</option>
            </x-forms.select>
            <x-forms.input label="Hour Taken" name="hour" type="number" max="8" />
            <x-forms.input label="Minutes Taken" name="minutes" type="number" default=10 max=59 min=0 value=0 />
            <x-forms.button>Submit</x-forms.button>
        </form>
    @endif
    <x-forms.divider />
    @if ($task->status == 1)
        <x-heading>Time Taken For Programming: {{ $time }} </x-heading>
        <x-forms.divider />
    @endif

</x-layout>
