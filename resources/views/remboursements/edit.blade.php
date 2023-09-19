<x-app-layout>

    <div class="flex justify-center items-center mt-3">
        <div class="w-full sm:max-w-lg">
            <h3 class="text-center">Modifier le remboursement</h3>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 mt-3">
                    <form method="POST" action="{{ route('remboursements.update', $remboursement->id) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <!-- Montant du remboursement -->
                            <x-input-label class="mt-2" for="montant" :value="__('Montant remboursé')" />
                            <div class="input-group">
                                <x-text-input id="montant" class="block mt-1 w-full form-control" type="number" name="montant" :value="$remboursement->montant" step="0.1" required autofocus />
                                <span class="input-group-text block mt-1">€</span>
                            </div>
                            <x-input-error :messages="$errors->get('montant')" class="mt-2" />

                            <!-- Projet -->
                            <x-input-label class="mt-2" for="projet" :value="__('Projet')" />
                            <select name="projet_id" class="form-select" required>
                                <option value="">Sélectionnez un projet</option>
                                @foreach($projets as $projet)
                                <option value="{{ $projet->id }}" {{ $remboursement->projet_id == $projet->id ? 'selected' : '' }}>{{ $projet->nom }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('projet')" class="mt-2" />

                            <!-- Date de remboursement -->
                            <x-input-label class="mt-2" for="dateRemboursement" :value="__('Date de remboursement')" />
                            <input type="date" name="dateRemboursement" class="form-control" value="{{ $projet->dateRemboursement }}" required>

                            <div class="flex justify-end mt-4">
                                <x-primary-button>
                                    Modifier
                                </x-primary-button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>