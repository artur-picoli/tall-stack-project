@extends('layouts.app')
@section('content')
    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <section class="max-w-xl">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                    data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg  hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300""
                            id="profile-tab" data-tabs-target="#profile" type="button" role="tab"
                            aria-controls="profile" aria-selected="false">Responsável</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">Aluno</button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent">
                <div class="hidden" id="profile" role="tabpanel"
                    aria-labelledby="profile-tab">
                    @livewire('guardian.guardian')

                </div>
                <div class="hidden" id="dashboard" role="tabpanel"
                    aria-labelledby="dashboard-tab">
                    @livewire('guardian.student')

                </div>

            </div>
        </section>
    </div>
@endsection
