<x-app-layout>

    <h2 class="text-center py-6">Mes investissements</h2>
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
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Montant remboursé</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Rendement brut/net</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Frais</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">PEA/PME</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Dates</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Gain éspéré</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Versements</th>
                                    <th class="px-1 py-3 font-semibold text-gray-700 text-center uppercase tracking-wider titre">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($projets as $projet)
                                <tr>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->nom }}</td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->nom_plateforme }}</td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->nom_status }}</td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->montantInvesti }}€</td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle" style="width: 250px;">
                                        <div class="relative flex items-center mt-2 px-5" style="width: 250px;">
                                            <div class="relative w-full bg-gray-200">
                                                <div class="absolute h-3 bg-gray-200" style="width:100%"></div>
                                                <div class="flex absolute h-3
                                                @if ($projet->total_montant / $projet->montantInvesti >= 1)
                                                    bg-green-400
                                                @elseif ($projet->total_montant / $projet->montantInvesti >= 0.5)
                                                    bg-yellow-400
                                                @else
                                                    bg-red-400
                                                @endif"
                                                style="width:{{ ($projet->total_montant / $projet->montantInvesti) * 100 }}%">
                                                </div>
                                            </div>
                                            <div class="absolute left-0 px-5 text-xs" style="top: -15px;">{{ number_format($projet->total_montant, 0, '', '') }}€</div>
                                            <div class="absolute right-0 px-5 text-xs" style="top: -15px;">{{ number_format($projet->montantInvesti, 0, '', '') }}€</div>
                                            
                                            <div class="absolute right-0 top-1/2 transform -translate-y-1/2">
                                                <a href="{{ route('remboursements.create', ['projet_id' => $projet->id]) }}" class="text-white bg-green-600 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1.5 text-center inline-flex items-center mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" stroke-width="2" />
                                                </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->tauxBrut }}% / {{ $projet->tauxNet }}%</td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->frais }}%</td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->fiscalite == 0 ? 'Non' : 'Oui' }}</td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">
                                        {{ \Carbon\Carbon::parse($projet->dateDebut)->format('d/m/Y') }}
                                            <span style="font-size: 25px; font-weight: bold;">&rarr;</span>
                                        {{ \Carbon\Carbon::parse($projet->dateFin)->format('d/m/Y') }}
                                    </td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->gainFinal }}€</td>
                                    <td class="py-4 whitespace-nowrap description text-center align-middle">{{ $projet->nom_versement }}</td>
                                    <!-- <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                        @if ($projet->nom_versement == 'Mensuel')
                                            {{ $projet->gainPonctuel }}€ / mois
                                        @elseif ($projet->nom_versement == 'Semestriel')
                                            {{ $projet->gainPonctuel }}€ / 6 mois
                                        @elseif ($projet->nom_versement == 'Annuel')
                                            {{ $projet->gainPonctuel }}€ / an
                                        @elseif ($projet->nom_versement == 'Infine')
                                            {{ $projet->gainPonctuel }}€
                                        @endif
                                    </td> -->

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                        <div class="flex justify-center">
                                            <a href="{{ route('projets.edit', $projet->id) }}" class="px-2 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded mr-2 no-underline">Modifier</a>
                                            <form action="{{ route('projets.destroy', $projet->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-2 py-2 bg-red-500 hover:bg-red-600 text-white font-bold rounded" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')">Supprimer</button>
                                            </form>
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
