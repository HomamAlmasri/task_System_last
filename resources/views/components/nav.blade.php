@section('nav')
    <div class="flex flex-col justify-between font-bold mt-1 space-y-1 items-center relative"> <!-- Added 'relative' to the parent container -->
        @auth
            <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="hover:bg-blue-900 font-bold text-white bg-black  rounded-lg  px-2 py-2.5 mt-2 mx-3 text-center inline-flex items-center" type="button"><svg class="w-3 h-3 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownInformation" class="z-10 hidden absolute top-full mt-1  divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-black   dark:divide-gray-600">
                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                    <div>{{ Auth::user()->name }}</div>
                    <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                </div>
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
                    <li>
                            <a href="/task/create" class="block px-4 py-2 hover:bg-blue-900 dark:hover:text-white">Create A Task</a>
                    </li>
                    <li>
                        @if (Auth::user()->role == 'admin')
                            <a href="/register" class="block px-4 py-2 hover:bg-blue-900 dark:hover:text-white">Create a User</a>
                        @endif
                    </li>
                    <li>
                        @if (Auth::user()->role != 'admin')
                                <a class="block px-4 py-2 hover:bg-blue-900 dark:hover:text-white" href="/daily_tasks/create"> Create a daily Task</a>
                        @endif
                </ul>
                <div class="py-2">
                    <x-forms.form action="/logout" method="Post" class="text-sm">
                        <button class="block px-4 py-2 hover:bg-blue-900 dark:hover:text-white">Log out</button>
                    </x-forms.form>
                </div>
            </div>
        @endauth
        <script>
            document.addEventListener('DOMContentLoaded', function () {
            const dropdownButton = document.getElementById('dropdownInformationButton');
            const dropdownMenu = document.getElementById('dropdownInformation');

            dropdownButton.addEventListener('click', function () {
            dropdownMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function (e) {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.classList.add('hidden');
            }
            });
            });
        </script>
    </div>
@endsection

