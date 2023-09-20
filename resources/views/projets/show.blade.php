<x-app-layout>

    <h2 class="text-center py-6">Mes investissements</h2>
        <div class="w-full max-w-3xl mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" style="min-height: 480px;">
            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                <li class="mr-2">
                    <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true" class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Projet</button>
                </li>
                <li class="mr-2">
                    <button id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Remboursement</button>
                </li>
            </ul>
            <div id="defaultTabContent">

                <div class="hidden px-4 py-2 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
                    <div class="px-3 grid grid-cols-2">
                        <div class="px-2 mb-3 flex flex-col">
                            <h4 class="mb-4 text-xl font-font-normal text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Plateforme :</span> {{ $projet->nom_plateforme }}.</h4>
                            <h4 class="mb-4 text-xl font-font-normal text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Statut :</span> {{ $projet->nom_status }}</h4>
                            <h4 class="mb-4 text-xl font-font-normal text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Investissement :</span> {{ number_format($projet->montantInvesti, 0, '', '') }}€</h4>
                            <h4 class="mb-4 text-xl font-font-normal text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Remboursement : </span> {{ number_format($projet->total_montant, 0, '', '') }}€</h4>
                            <h4 class="mb-4 text-xl font-font-normal text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Taux Brut/Net :</span> {{ $projet->tauxBrut }}% / {{ $projet->tauxNet }}%</h4>
                        </div>
                        <div class="px-2 mb-3 flex flex-col justify-end">
                            <h4 class="mb-4 text-xl font-normal text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Frais : </span> {{ $projet->frais }}%</h4>
                            <h4 class="mb-4 text-xl font-normal text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">PEA/PME :</span> {{ $projet->fiscalite == 0 ? 'Non' : 'Oui' }}</h4>
                            <h4 class="mb-4 text-xl font-normal text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Durée</span> {{ $projet->duree }}mois</h4>
                            <h4 class="mb-4 text-xl font-normal text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Gain éspéré</span> {{ $projet->gainFinal }}€</h4>
                            <h4 class="mb-4 text-xl font-normal text-gray-900 dark:text-white"><span class="font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-sky-700">Versement :</span> {{ $projet->nom_versement }}</h4>
                        </div>
                    </div>
                </div>

                
                <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services" role="tabpanel" aria-labelledby="services-tab">
                    <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">We invest in the world’s potential</h2>
                    <!-- List -->
                    <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
                        <li class="flex space-x-2 items-center">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            <span class="leading-tight">Dynamic reports and dashboards</span>
                        </li>
                        <li class="flex space-x-2 items-center">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            <span class="leading-tight">Templates for everyone</span>
                        </li>
                        <li class="flex space-x-2 items-center">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            <span class="leading-tight">Development workflow</span>
                        </li>
                        <li class="flex space-x-2 items-center">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            <span class="leading-tight">Limitless business automation</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

</x-app-layout>
