<x-layout>
    <section class="text-center">
        <p class="font-bold text-4xl">Post A Job</p>
    </section>
    <x-forms.form method='POST' action="/jobs">
        <x-forms.input label="Title" name="title" placeholde="CEO" />
        <x-forms.input label="Time Expected" name="time_expected" placeholde="$90,000 USD" />
        <x-forms.select label='Employer name' name='shedule' class="px-2">
            @foreach ($tags as $tag)
                <option class="bg-black text-blue-300 texl-xl">{{ $tag->name }}</option>
            @endforeach
        </x-forms.select>
        <x-forms.input label="URL" name="url" placeholde="Winter Park" />
        <x-forms.input label="Tags (comma sperated)" name="tags" placeholde="Winter Park" />
        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
