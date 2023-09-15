<x-app-layout>

    <h2 class="text-center py-6">Mes investissements</h2>
        <div class="max-w-full  mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 max-w-full">
                    <div class="overflow-x-auto">
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700 text-center uppercase tracking-wider">Projet</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700 text-center uppercase tracking-wider">Plateforme</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700 text-center uppercase tracking-wider">StatuT</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700 text-center uppercase tracking-wider">Montant investi</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700 text-center uppercase tracking-wider">Montant remboursé</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700 text-center uppercase tracking-wider">Rendement brut/net</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700 text-center uppercase tracking-wider">Frais</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700 text-center uppercase tracking-wider">PEA/PME</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700 text-center uppercase tracking-wider">Début</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700 text-center uppercase tracking-wider">Fin</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700 text-center uppercase tracking-wider">Gain final</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700 text-center uppercase tracking-wider">Versements</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700 text-center uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($projets as $projet)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{ $projet->nom }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{ $projet->nom_plateforme }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{ $projet->nom_status }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{ $projet->montantInvesti }}€</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                        @if ($projet->total_montant != 0)
                                            <div class="relative flex items-center mt-2 px-5">
                                                <div class="relative w-full bg-gray-200" style="margin-top:4px;">
                                                    <div class="flex absolute h-3 bg-gray-200 " style="width:100%"></div> 
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
                                            </div>
                                        @else
                                            <div class=" left-0 px-5">0€</div>
                                             
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{ $projet->tauxBrut }}% / {{ $projet->tauxNet }}%</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{ $projet->frais }}%</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{ $projet->fiscalite == 0 ? 'Non' : 'Oui' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{ \Carbon\Carbon::parse($projet->dateDebut)->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{ \Carbon\Carbon::parse($projet->dateFin)->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{ $projet->gainFinal }}€</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                        @if ($projet->nom_versement == 'Mensuel')
                                            {{ $projet->gainPonctuel }}€ / mois
                                        @elseif ($projet->nom_versement == 'Semestriel')
                                            {{ $projet->gainPonctuel }}€ / 6 mois
                                        @elseif ($projet->nom_versement == 'Annuel')
                                            {{ $projet->gainPonctuel }}€ / an
                                        @elseif ($projet->nom_versement == 'Infine')
                                            {{ $projet->gainPonctuel }}€
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                        <div class="flex justify-center">
                                            <a href="{{ route('remboursements.create', ['projet_id' => $projet->id]) }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white font-bold rounded mr-2 no-underline">Remboursement</a>
                                            <a href="{{ route('projets.edit', $projet->id) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded mr-2 no-underline">Modifier</a>

                                            <form action="{{ route('projets.destroy', $projet->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-bold rounded" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')">Supprimer</button>
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
