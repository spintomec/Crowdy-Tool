<x-app-layout>

    <h2 class="text-center py-6">{{ $projet->nom }}</h2>
        <div class="w-full max-w-3xl mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" style="min-height: 480px;">
            {{-- <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                <li class="mr-2">
                    <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true" class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Projet</button>
                </li>
                <li class="mr-2">
                    <button id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Remboursement</button>
                </li>
            </ul>
            <div id="defaultTabContent">

                <div class="hidden px-4.5 py-2 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
                    <div class="justify-center text-center">
                        <ol class="mx-auto flex items-center w-full pr-8">
                            <li class="flex w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-800">
                                <span class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-800 shrink-0">
                                    <svg class="w-3.5 h-3.5 text-blue-600 lg:w-4 lg:h-4 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                    </svg>
                                </span>
                            </li>
                            <p>test</p>
                            <li class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                                <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                    <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                        <path d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z"/>
                                    </svg>
                                </span>
                            </li>
                            <li class="flex items-center">
                                <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                    <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"/>
                                    </svg>
                                </span>
                            </li>
                        </ol>
                    </div>
                    
                    <div class="px-4 py-2 grid grid-cols-2 gap-20">
                        <div class="mb-3 flex flex-col">
                            <h4 class="mb-4 text-xl font-light text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Plateforme :</span> {{ $projet->nom_plateforme }}</h4>
                            <h4 class="mb-4 text-xl font-light text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Statut :</span> {{ $projet->nom_status }}</h4>
                            <h4 class="mb-4 text-xl font-light text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Investissement :</span> {{ number_format($projet->montantInvesti, 0, '', '') }}€</h4>
                            <h4 class="mb-4 text-xl font-light text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Remboursement : </span> 
                                @if ($projet->nom_status == 'Remboursé')
                                    {{ number_format($projet->montantInvesti, 0, '', '') }}€</h4>
                                @else
                                    {{ number_format($projet->total_montant, 0, '', '') }}€</h4>
                                @endif
                            <h4 class="mb-4 text-xl font-light text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Taux :</span> {{ $projet->tauxBrut }}% brut / {{ $projet->tauxNet }}% net</h4>
                        </div>
                        <div class="mb-3 flex flex-col">
                            <h4 class="mb-4 text-xl font-light text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Frais : </span> {{ $projet->frais }}%</h4>
                            <h4 class="mb-4 text-xl font-light text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">PEA/PME :</span> {{ $projet->fiscalite == 0 ? 'Non' : 'Oui' }}</h4>
                            <h4 class="mb-4 text-xl font-light text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Durée :</span> {{ $projet->duree }}mois</h4>
                            <h4 class="mb-4 text-xl font-light text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Gain éspéré :</span> {{ $projet->gainFinal }}€</h4>
                            <h4 class="mb-4 text-xl font-light text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Versement :</span> {{ $projet->nom_versement }}</h4>
                        </div>
                    </div>
                </div>
                

                <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services" role="tabpanel" aria-labelledby="services-tab">
                    @if ($projet->nom_status == 'Remboursé' && $remboursements->count() == 0)
                        <p>Remboursement total </p>
                    @elseif ($projet->nom_status !== 'Remboursé' && $remboursements->count() == 0)
                        <p>Aucun remboursement pour le moment</p>
                    @else
                    @endif

                    @foreach ($remboursements as $remboursement)
                    <div class="flex items-center w-full">
                        <p class="text-lg font-semibold mr-3"> 1. </p>
                        <div class="flex items-center w-full px-4 py-4 bg-blue-100 rounded-lg shadow-md">
                            <p class="text-lg font-semibold">{{ $remboursement->montant }}€</p>
                            <p class="text-gray-600 ml-2">{{ Carbon\Carbon::parse($remboursement->dateRemboursement)->format('d/m/Y') }}</p>
                        </div>
                    </div>
                     @endforeach
                </div> --}}




                {{-- <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"> --}}
                <div class="w-full max-w-3xl mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" style="min-height: 480px;">

                    <div class="sm:hidden">
                        <label for="tabs" class="sr-only">Select tab</label>
                        <select id="tabs" class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>Projet</option>
                            <option>Remboursements</option>
                            <option>Versements</option>
                        </select>
                    </div>
                    <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                        <li class="w-full">
                            <button id="stats-tab" data-tabs-target="#stats" type="button" role="tab" aria-controls="stats" aria-selected="true" class="inline-block w-full p-4 rounded-tl-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Projet</button>
                        </li>
                        <li class="w-full">
                            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false" class="inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Versement</button>
                        </li>
                        <li class="w-full">
                            <button id="faq-tab" data-tabs-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="false" class="inline-block w-full p-4 rounded-tr-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Remboursement</button>
                        </li>
                    </ul>

                    <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
                        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="stats" role="tabpanel" aria-labelledby="stats-tab">
                            <p>hello</p>
                        </div>
                        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
                        </div>
                        <div class="hidden p-4 bg-white rounded-lg dark:bg-gray-800" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        



</x-app-layout>
