<x-layout>
    <x-nav/>
    <section class="text-center">
        <p class="font-bold text-4xl hover:text-blue-500 transition-color duration-300">Create A Task</p>
    </section>
    <section>
        <x-forms.form class="space-y-3" method='POST' action="/task/store">
            <x-forms.input label="Title" name="title" placeholder="Test Zahi" />
            <x-forms.input label="Description" name="description" placeholder="What To do" />
            <x-forms.select label='Employer name' name='employer_name' class="px-2">
                @foreach ($users as $user)
                    <option class="bg-black text-blue-300">{{ $user->name }}</option>
                @endforeach
            </x-forms.select>
            <x-forms.select label='Project name' name='project' class="px-2">
                @foreach ($users as $user)
                    <option class="bg-black text-blue-300 ">{{ $user->name }}</option>
                @endforeach
            </x-forms.select>
            <x-forms.select label='Feature name' name='feature' class="px-2">
                @foreach ($users as $user)
                    <option class="bg-black text-blue-300 ">{{ $user->name }}</option>
                @endforeach
            </x-forms.select>
            <x-forms.select label='Employer Type' name='tag' class="px-2">
                <option class="bg-black text-blue-300 ">Back-End</option>
                <option class="bg-black text-blue-300">Front-End</option>
                <option class="bg-black text-blue-300 ">Test</option>
            </x-forms.select>
            <x-forms.select label='Priority' name='priority' class="px-2">
                <option class="bg-black text-blue-300 ">High</option>
                <option class="bg-black text-blue-300 ">Medium</option>
                <option class="bg-black text-blue-300 ">Low</option>
            </x-forms.select>
            <x-forms.input label="Time Expected" type="number" name="time_expected"
                placeholder="In Hour" />
            <x-forms.button>Publish</x-forms.button>
        </x-forms.form>
    </section>
</x-layout>
