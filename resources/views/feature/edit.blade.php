<x-layout>
    <x-nav/>
    <x-forms.form class="space-y-6">
{{--        @dd($task->employer_name)--}}
        <x-forms.select label='Target User' name='assigned_to_id' class="px-2" value="{{ old($task->assigned_to_id) }}">
            @foreach($users as $user)
                <option class="bg-black text-blue-300 "
                        value="{{ $user->id }}" {{ (old('assigned_to_id', $task->assigned_to_id) == $user->id) ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </x-forms.select>
        <x-forms.input label="Title" name="Title" value="{{$task->title}}"></x-forms.input>
        <x-forms.input label="Description" name="description" value="{{$task->description}}"></x-forms.input>
        <x-forms.input label="Feature" name="feature" value="{{$task->feature->name}}"></x-forms.input>
        <x-forms.input label="Time Expected" name="time_expected" value="{{$task->time_expected}}"></x-forms.input>
        <x-forms.select label='Priority' name='priority' class="px-2" value="{{$task->priority}}">
            <option class="bg-black text-blue-300 ">High</option>
            <option class="bg-black text-blue-300 ">Medium</option>
            <option class="bg-black text-blue-300 ">Low</option>
        </x-forms.select>
        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
