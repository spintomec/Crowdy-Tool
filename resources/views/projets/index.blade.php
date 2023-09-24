<x-app-layout>

    <h2 class="text-center pt-6 pb-2">Mes investissements</h2> 
    <div class="flex justify-center pb-4">
        <a href="{{ route('projets.create') }}" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center no-underline">Ajouter</a>
    </div>

        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 max-w-full">
                    <div class="overflow-x-auto">
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Projet</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Plateforme</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">StatuT</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Montant investi</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Remboursement</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Taux brut/net</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Frais</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">PEA/PME</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Début</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Fin</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Gain éspéré</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Versements</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($projets as $projet)
                                <tr>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->id }}</td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->nom_plateforme }}</td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->nom_status }}</td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->montantInvesti }}€</td>
                                    {{-- Remboursement --}}
                                    <td class="py-4 whitespace-nowrap description text-center align-middle" style="width: 250px;">
                                        <div class="relative flex items-center mb-2.5 px-5" style="width: 250px;">
                                            <div class="relative w-full bg-gray-200">
                                                <div class="absolute h-3 bg-gray-200" style="width:100%"></div>
                                                <div class="flex absolute h-3
                                                    @if ($projet->total_montant / $projet->montantInvesti >= 1 || $projet->nom_status == "Remboursé")
                                                        bg-green-400
                                                    @elseif ($projet->total_montant / $projet->montantInvesti >= 0.5)
                                                        bg-yellow-400
                                                    @else
                                                        bg-red-400
                                                    @endif"
                                                    style="width: {{ $projet->nom_status !== 'Remboursé' ? ($projet->total_montant / $projet->montantInvesti) * 100 : 100 }}%">
                                               

                                                </div>
                                            </div>
                                            <div class="absolute left-0 px-5 text-xs" style="top: -17px;">{{ $projet->nom_status !== 'Remboursé' ? number_format($projet->total_montant, 0, '', '') : number_format($projet->montantInvesti, 0, '', '') }}€</div>
                                            <div class="absolute right-0 px-5 text-xs" style="top: -17px;">{{ number_format($projet->montantInvesti, 0, '', '') }}€</div>
                                            
                                            @if ($projet->nom_status !== "Remboursé")
                                                <div class="absolute right-0 top-1/2 transform -translate-y-1/2">
                                                    <a href="{{ route('remboursements.create', ['projet_id' => $projet->id]) }}" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1.5 text-center inline-flex items-center mr-2" data-tooltip-target="tooltip-light">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus test" viewBox="0 0 16 16">
                                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" stroke-width="2" />
                                                    </svg>
                                                    </a>
                                                </div>
                                                <div id="tooltip-light" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                                    Nouveau remboursement
                                                    <div class="tooltip-arrow" data-popper-arrow></div> 
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->tauxBrut }}% / {{ $projet->tauxNet }}%</td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->frais }}%</td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->fiscalite == 0 ? 'Non' : 'Oui' }}</td>
                                    {{-- Dates --}}
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">
                                        <p>{{ \Carbon\Carbon::parse($projet->dateDebut)->format('d/m/Y') }}</p>
                                    </td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">
                                        <p>{{ \Carbon\Carbon::parse($projet->dateDebut)->format('d/m/Y') }}</p>
                                    </td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->gainFinal }}€</td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->nom_versement }}</td>
                                    {{-- Actions --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-center align-middle">
                                        <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal{{ $projet->id }}" class="inline-flex items-center p-2 text-sm font-medium  text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button"> 
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                            </svg>
                                        </button>
                                        <div id="dropdownDotsHorizontal{{ $projet->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                            <div class="pt-1">
                                                <a href="{{ route('projets.show', $projet->id) }}" class="text-left block px-4 py-2 text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full focus:outline-none focus:ring focus:ring-opacity-50 no-underline">Consulter</a>
                                                <a href="{{ route('projets.edit', $projet->id) }}" class="text-left block px-4 py-2 text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full focus:outline-none focus:ring focus:ring-opacity-50 no-underline">Modifier</a>
                                            </div>
                                            <div class="pb-1">
                                                <form action="{{ route('projets.destroy', $projet->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-left block px-4 py-2 text-sm text-red-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full focus:outline-none focus:ring focus:ring-opacity-50 no-underline" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')">Supprimer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
