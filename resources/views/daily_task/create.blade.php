<x-layout>
    <h2 class="text-2xl font-bold mb-4">Daily Tasks</h2>
    <x-forms.form action="/daily_task/store" method="POST" class="space-y-5 max-w-[900px]">
        @csrf
        @for ($i = 0; $i < 7; $i++)
            <div class="flex space-x-6 ">
                <x-forms.input label="Project" name="project[]"/>
                <x-forms.input label="Feature" name="feature[]"/>
                <x-forms.input label="Time Taken" name="time_taken[]"/>
                <x-forms.input label="Day" name="day[]" type="date"/>
                <div>
                    <x-forms.field label="Description" :name="false"></x-forms.field>
                    <textarea name="description[]" class= 'rounded-xl bg-white/10 border border-white/10 px-5 py-4 min-w-[500] hover:text-blue-300 hover:border-blue-500 transition-color duration-300'></textarea>
                </div>
            </div>
        @endfor
        <x-forms.button>Create Daily Task</x-forms.button>
    </x-forms.form>
</x-layout>
