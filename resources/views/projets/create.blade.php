<x-app-layout>

    <div class="flex justify-center items-center mt-3">
        <div class="w-full sm:max-w-md">
            <h3 class="text-center">Nouveau projet</h3>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200 mt-3">
    
                    <form method="POST" action="{{ route('projets.store') }}">
                        @csrf
                
                        <!-- Password -->
                        <div>
                            <!-- Nom du projet -->

                            <x-input-label for="nom" :value="__('Nom du projet')" />
                            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="nom" />
                            <x-input-error :messages="$errors->get('nom')" class="mt-2" />

                            <!-- Plateforme-->
                            <x-input-label class="mt-2" for="plateforme" :value="__('Plateforme')" />
                            <select name="plateforme_id" class="form-select" required>
                                <option value="">Sélectionnez une plateforme</option>
                                @foreach($plateformes as $plateforme)
                                    <option value="{{ $plateforme->id }}">{{ $plateforme->nom }}</option>
                                @endforeach
                            </select>

                            <!-- Status -->
                            {{-- <x-input-label for="status" :value="__('Status')" />
                            <select name="status_id" class="form-select" required>
                                <option value="">Sélectionnez un status</option>
                                @foreach($allStatus as $status)
                                    <option value="{{ $status->id }}">{{ $status->nom }}</option>
                                @endforeach
                            </select> --}}

                            <!-- Montant investi -->
                            <x-input-label class="mt-2" for="montantInvesti" :value="__('Montant investi')" />
                            <x-text-input id="montantInvesti" class="block mt-1 w-full" type="number" name="nom" :value="old('montantInvesti')" step="0.1" required autofocus autocomplete="montantInvesti" />
                            <x-input-error :messages="$errors->get('montantInvesti')" class="mt-2" />

                            <!-- Frais -->
                            <x-input-label class="mt-2" for="frais" :value="__('Frais')" />
                            <x-text-input id="frais" class="block mt-1 w-full" type="number" name="frais" :value="old('frais')" step="0.1" required autofocus autocomplete="frais" />
                            <x-input-error :messages="$errors->get('frais')" class="mt-2" />

                            <!-- Fiscalité -->
                            <x-input-label class="mt-2 form-check-inline" for="fiscalite" :value="__('Fiscalité')" />
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="fiscalite" id="fiscalite_oui" value="oui">
                                <label class="form-check-label" for="fiscalite_oui">Oui</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="fiscalite" id="fiscalite_non" value="non" checked>
                                <label class="form-check-label" for="fiscalite_non">Non</label>
                            </div>

                            <!-- Taux Brut -->
                            <x-input-label class="mt-2" for="tauxBrut" :value="__('Taux brut')" />
                            <x-text-input id="tauxBrut" class="block mt-1 w-full" type="number" name="tauxBrut" :value="old('tauxBrut')" step="0.1" required autofocus autocomplete="tauxBrut" />
                            <x-input-error :messages="$errors->get('tauxBrut')" class="mt-2" />

                            {{-- <!-- Taux net -->
                            <x-input-label for="tauxNet" :value="__('Taux net')" />
                            <x-text-input id="tauxNet" class="block mt-1 w-full" type="number" name="tauxNet" :value="old('tauxNet')" step="0.1" required autofocus autocomplete="tauxNet" />
                            <x-input-error :messages="$errors->get('tauxNet')" class="mt-2" /> --}}

                            {{-- <!-- Durée -->
                            <x-input-label for="duree" :value="__('Durée')" />
                            <x-text-input id="duree" class="block mt-1 w-full" type="text" name="duree" :value="old('duree')" required autofocus autocomplete="duree" />
                            <x-input-error :messages="$errors->get('duree')" class="mt-2" /> --}}

                            <!-- Date de début -->
                            <x-input-label class="mt-2" for="dateDebut" :value="__('Début')" />
                            <input type="date" name="dateDebut" class="form-control" required>

                            <!-- Date de fin -->
                            <x-input-label class="mt-2" for="dateFin" :value="__('Fin')" />
                            <input type="date" name="dateFin" class="form-control" required>

                            <!-- Versement -->
                            <x-input-label class="mt-2" for="versement" :value="__('Type de Versement')" />
                                <select name="versement_id" class="form-select" required>
                                    <option value="">Sélectionnez une plateforme</option>
                                    @foreach($versements as $versement)
                                        <option value="{{ $versement->id }}">{{ $versement->nom }}</option>
                                    @endforeach
                                </select>

                            </div>

                        <div class="flex justify-end mt-4">
                            <x-primary-button>
                                {{ __('Enregistrer') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</x-app-layout>
