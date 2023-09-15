<x-app-layout>

    <div class="flex justify-center items-center mt-3">
        <div class="w-full sm:max-w-lg">
            <h3 class="text-center">Modifier le projet</h3>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 mt-3">
                    <form method="POST" action="{{ route('projets.update', $projet->id) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <!-- Nom du projet -->
                            <x-input-label for="nom" :value="__('Nom du projet')" />
                            <x-text-input id="nom" class="block mt-1 w-full form-control" type="text" name="nom" :value="$projet->nom" required autofocus />
                            <x-input-error :messages="$errors->get('nom')" class="mt-2" />

                            <!-- Plateforme -->
                            <x-input-label class="mt-2" for="plateforme" :value="__('Plateforme')" />
                            <select name="plateforme_id" class="form-select" required>
                                <option value="">Sélectionnez une plateforme</option>
                                @foreach($plateformes as $plateforme)
                                    <option value="{{ $plateforme->id }}" {{ $projet->plateforme_id == $plateforme->id ? 'selected' : '' }}>{{ $plateforme->nom }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('plateforme')" class="mt-2" />

                            <!-- Status -->
                            <x-input-label class="mt-2" for="status" :value="__('Status')" />
                            <select name="status_id" class="form-select" required>
                                <option value="">Sélectionnez un status</option>
                                @foreach($statusOption as $status)
                                    <option value="{{ $status->id }}" {{ $projet->status_id == $status->id ? 'selected' : '' }}>{{ $status->nom }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />

                            <!-- Montant investi -->
                            <x-input-label class="mt-2" for="montantInvesti" :value="__('Montant investi')" />
                            <div class="input-group">
                                <x-text-input id="montantInvesti" class="block mt-1 w-full form-control" type="number" name="montantInvesti" :value="$projet->montantInvesti" step="0.1" required autofocus />
                                <span class="input-group-text block mt-1">€</span>
                            </div>
                            <x-input-error :messages="$errors->get('montantInvesti')" class="mt-2" />

                            <!-- Taux Brut -->
                            <x-input-label class="mt-2" for="tauxBrut" :value="__('Taux brut')" />
                            <div class="input-group">
                                <x-text-input id="tauxBrut" class="block mt-1 w-full form-control" type="number" name="tauxBrut" :value="$projet->tauxBrut" step="0.1" required autofocus/>
                                <span class="input-group-text block mt-1">%</span>
                            </div>
                            <x-input-error :messages="$errors->get('tauxBrut')" class="mt-2" />

                            <!-- Frais -->
                            <x-input-label class="mt-2" for="frais" :value="__('Frais')" />
                            <div class="input-group">
                                <x-text-input id="frais" class="block mt-1 w-full form-control" type="number" name="frais" :value="$projet->frais" step="0.1" required autofocus />
                                <span class="input-group-text block mt-1">%</span>
                            </div>
                            <x-input-error :messages="$errors->get('frais')" class="mt-2" />

                            <!-- Fiscalité -->
                            <div class="mt-2">
                                <x-input-label class="mr-2" for="fiscalite" :value="__('PEA/PME')" />
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fiscalite" id="fiscalite_true" value="1" {{ $projet->fiscalite == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="fiscalite_true">Oui</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fiscal
                                    <input class="form-check-input" type="radio" name="fiscalite" id="fiscalite_false" value="0" {{ $projet->fiscalite == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="fiscalite_false">Non</label>
                            </div>
                            <x-input-error :messages="$errors->get('fiscalite')" class="mt-2" />

                            <!-- Date de début -->
                            <x-input-label class="mt-2" for="dateDebut" :value="__('Début')" />
                            <input type="date" name="dateDebut" class="form-control" value="{{ $projet->dateDebut }}" required>

                            <!-- Date de fin -->
                            <x-input-label class="mt-2" for="dateFin" :value="__('Fin')" />
                            <input type="date" name="dateFin" class="form-control" value="{{ $projet->dateFin }}" required>

                            <!-- Versement -->
                            <x-input-label class="mt-2" for="versement" :value="__('Type de Versement')" />
                            <select name="versement_id" class="form-select" required>
                                <option value="">Sélectionnez un type de versement</option>
                                @foreach($versements as $versement)
                                    <option value="{{ $versement->id }}" {{ $projet->versement_id == $versement->id ? 'selected' : '' }}>{{ $versement->nom }}</option>
                                @endforeach
                            </select>
                        </div>

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


