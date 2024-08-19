<x-layout>
    <section class="text-center">
        <p class="font-bold text-4xl hover:text-blue-500 transition-color duration-300">Create A Task</p>
    </section>
    <section>
        <x-forms.form method='POST' action="/task">
            <x-forms.input label="Title" name="title" placeholder="Test Zahi" />
            <x-forms.input label="Discription" name="discription" placeholder="What To do" />
            <x-forms.select label='Employer name' name='employer_name' class="px-2">
                @foreach ($users as $user)
                    <option class="bg-black text-blue-300 texl-xl">{{ $user->name }}</option>
                @endforeach
            </x-forms.select>
            <x-forms.select label='Project name' name='project' class="px-2">
                @foreach ($users as $user)
                    <option class="bg-black text-blue-300 texl-xl">{{ $user->name }}</option>
                @endforeach
            </x-forms.select>
            <x-forms.select label='Employer Type' name='tag' class="px-2">
                <option class="bg-black text-blue-300 texl-xl">Back-End</option>
                <option class="bg-black text-blue-300 texl-xl">Front-End</option>
                <option class="bg-black text-blue-300 texl-xl">Test</option>
            </x-forms.select>
            <x-forms.select label='Priority' name='priority' class="px-2">
                <option class="bg-black text-blue-300 texl-xl">High</option>
                <option class="bg-black text-blue-300 texl-xl">Medium</option>
                <option class="bg-black text-blue-300 texl-xl">Low</option>
            </x-forms.select>
            <x-forms.input label="Time Expected" type="number" name="time_expected"
                placeholder="1 = 1hour && 0.30 = 30min " />
            <x-forms.button>Publish</x-forms.button>
        </x-forms.form>
    </section>
</x-layout>
