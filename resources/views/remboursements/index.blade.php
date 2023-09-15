<x-app-layout>

    <h2 class="text-center py-6">Mes remboursements</h2>
        <div class="max-w-full  mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 max-w-full">
                    <div class="overflow-x-auto">
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700 text-center uppercase tracking-wider">Nom du projet</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700 text-center uppercase tracking-wider">Montant</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700 text-center uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700 text-center uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($remboursements as $remboursement)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{ $remboursement->nom_projet }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{ $remboursement->montant }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{ \Carbon\Carbon::parse($remboursement->dateRemboursement)->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                        <div class="flex justify-center">
                                            <a href="{{ route('remboursements.edit', $remboursement->id) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded mr-2 no-underline">Modifier</a>

                                            <form action="{{ route('remboursements.destroy', $remboursement->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-bold rounded" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce remboursement ?')">Supprimer</button>
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
