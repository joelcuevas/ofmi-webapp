<div>
    <x-button wire:click="$set('applying', true)">¡Aplica ahora!</x-button>

    @section('ofmi_email')<a href="email:ofmi@omegaup.com" class="text-link">ofmi@omegaup.com</a>@overwrite
    @section('discord_server')<a href="https://discord.gg/gn6GTb4rfG" target="_blank" class="text-link">servidor de Discord</a>@overwrite

    <x-modal wire:model="applying">
        @if ($user)
            <x-form-section submit="apply">
                <x-slot name="title">
                    Aplica al Concurso
                </x-slot>

                @if ($user->isContestant())
                    @if (! $userRegistered)
                        <x-slot name="form">
                            <div class="col-span-6 border border-gray-300 rounded-md shadow-sm p-5">
                                <p class="mb-3 text-sm text-orange-600 font-bold flex justify-between items-center">
                                    Antes de continuar, por favor confirma que la información de tu perfil esté actualizada; esto es importante para garantizar tu participación en el concurso.
                                </p>
                                <p class="mb-2"><x-label value="Nombre" /> {{ $user->getFullName() }}</p>
                                <p class="mb-2"><x-label value="Correo Electrónico" /> {{ $user->email }}</p>
                                <p class="mb-2"><x-label value="Fecha de Nacimiento" /> {{ $user->birth_date }}</p>
                                <p class="mb-2"><x-label value="Dirección (para recibir paquetes)" /> {{ $user->getFullAddress() }}</p>
                                <p class="mb-3"><x-label value="Teléfono Celular" /> {{ $user->phone_number }}</p>
                                <a class="text-indigo-600 underline text-sm hover:no-underline" href="{{ route('profile.show') }}">¡Necesito actualizar mi información!</a>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="school_level" value="Nivel Escolar" />
                                <x-inputs.select id="school_level" class="mt-1 block w-full" wire:model="schoolLevel">
                                    <option value="" disabled selected>Selecciona...</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Secundaria">Secundaria</option>
                                    <option value="Preparatoria">Preparatoria</option>
                                </x-inputs.select>
                                <x-input-error for="schoolLevel" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="school_grade" value="Grado Escolar" />
                                <x-inputs.select id="school_grade" wire:model.defer="schoolGrade" class="mt-1 block w-full">
                                    @if ($schoolLevel == '')
                                        <option value="" disabled selected>Selecciona primero tu nivel escolar...</option>
                                    @else
                                        <option value="" disabled selected>Selecciona...</option>
                                        <option value="1">1o</option>
                                        <option value="2">2o</option>
                                        <option value="3">3o</option>
                                        @if ($schoolLevel == 'primary')
                                            <option value="4">4o</option>
                                            <option value="5">5o</option>
                                            <option value="6">6o</option>
                                        @endif
                                    @endif
                                </x-inputs.select>
                                <x-input-error for="schoolGrade" class="mt-2" />
                            </div>

                            <div class="col-span-6">
                                <x-label for="school_name" value="Escuela" />
                                <x-input id="school_name" wire:model.defer="schoolName" type="text" class="mt-1 block w-full" />
                                <x-input-error for="schoolName" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="tshirt_size" value="Talla de Playera" />
                                <x-inputs.select id="tshirt_size" wire:model.defer="tshirtSize" class="mt-1 block w-full">
                                    <option value="" disabled selected>Selecciona...</option>
                                    <option value="XS">XS (Extra chica)</option>
                                    <option value="S">S (Chica)</option>
                                    <option value="M">M (Mediana)</option>
                                    <option value="L">L (Grande)</option>
                                    <option value="XL">XL (Extra grande)</option>
                                    <option value="XXL">XXL (Extra extra grande)</option>
                                </x-inputs.select>
                                <x-input-error for="tshirtSize" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="tshirt_style">
                                    Estilo de Playera
                                    <x-icon data-popover-target="popover-default" name="question-mark-circle" class="inline align-text-top text-gray-600 cursor-pointer w-4 h-4 px-0" /> 
                                </x-label>
                                <x-inputs.select id="tshirt_style" wire:model.defer="tshirtStyle" class="mt-1 block w-full">
                                    <option value="" disabled selected>Selecciona...</option>
                                    <option value="A">Estilo A (Recta)</option>
                                    <option value="B">Estilo B (Acinturada)</option>
                                </x-inputs.select>
                                <x-input-error for="tshirtStyle" class="mt-2" />
                            </div>

                            <div data-popover id="popover-default" role="tooltip" class="absolute z-10 invisible inline-block w-auto text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-300 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                <div class="p-3">
                                    <div class="grid grid-cols-2 gap-3">
                                        <div class="col-span-1"><x-assets.tshirt-a /></div>
                                        <div class="col-span-1"><x-assets.tshirt-b /></div>
                                    </div>
                                    </p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>

                            <div class="col-span-6 flex justify-between items-flex-start">   
                                <x-checkbox wire:model.defer="acceptRules" value="1" id="acceptRules" class="mr-2 mt-1" /> 
                                <div>
                                    <label for="acceptRules" class="text-sm">
                                        Confirmo que he leido y entendido la <a href="{{ route('contest') }}" class="text-link">convocatoria</a> y <a href="{{ route('rules') }}" class="text-link">reglamento</a> del concurso, y que cumplo con los criterios de elegibilidad, incluyendo mi identificación como mujer o persona no-binaria.
                                    </label>   
                                    <x-input-error for="acceptRules" class="mt-2" />
                                </div>
                            </div>       
                        </x-slot>

                        <x-slot name="actions">
                            <x-action-message error class="mr-3" on="error">
                                No puedes registrarte a este concurso...
                            </x-action-message>

                            <x-button secondary wire:click="$set('applying', false)" wire:loading.attr="disabled">
                                Cancelar
                            </x-button>

                            <x-button class="ml-2">
                                ¡Aplicar!
                            </x-button>
                        </x-slot>
                    @else
                        <x-slot name="content">
                            <div class="p-4 bg-green-700 text-white rounded-md text-center">
                                <x-icon name="check-circle" class="inline w-10 h-10" />
                                <div>¡Ya estás registrado en este concurso!</div>
                            </div>
                            <h3 class="text-lg font-medium mt-6 mb-4">¿Qué sigue?</h3>
                            <p class="mb-2">Te recomendamos completar los siguientes cursos en omegaUp:</p>

                            <ul class="mb-4">
                                <li><a href="https://omegaup.com/course/introduccion_a_cpp/" class="text-link" target="_blank">Introducción a C++</a></li>
                                <li><a href="https://omegaup.com/course/introduccion_a_algoritmos/" class="text-link" target="_blank">Introducción a Algoritmos - Parte I</a></li>
                                <li><a href="https://omegaup.com/course/introduccion_a_algoritmos_ii/" class="text-link" target="_blank">Introducción a Algoritmos - Parte II</a></li>
                                <li><a href="https://omegaup.com/course/Curso-OMI/" class="text-link" target="_blank">Curso OMI</a></li>
                            </ul>

                            <p class="mb-2">También puedes practicar con problemas de los concursos pasados:</p>

                            <ul class="mb-4">
                                <li><a href="https://omegaup.com/arena/OFMI2022DIA1/#problems" class="text-link" target="_blank">OFMI 2022 - Día 1</a></li>
                                <li><a href="https://omegaup.com/arena/OFMI2022DIA2/#problems" class="text-link" target="_blank">OFMI 2022 - Día 2</a></li>
                            </ul>

                            <p>
                                ¡Y también puedes encontrar más material <a href="/material" class="text-link">aquí</a>!
                            </p>
                        </x-slot>

                        <x-slot name="actions">
                            <x-button type="button" wire:click="$set('applying', false)" wire:loading.attr="disabled">
                                ¡Genial!
                            </x-button>
                        </x-slot>
                    @endif
                @else
                    <x-slot name="content">
                        <div class="p-4 bg-orange-700 text-white rounded-md text-center">
                            <x-icon name="exclamation-triangle" class="inline w-10 h-10" />
                            <div>¡Solo competidores pueden registrarse a este concurso!</div>
                        </div>
                        <p class="mt-6">
                            Solo usuarios con rol de competidor puede aplicar a este concurso. Si consideras que este mensaje es un error y que eres elegible para participar, por favor ponte en contacto con nosotros escribiendo a: <a href="email:ofmi@omegaup.com" class="text-link">ofmi@omegaup.com</a>.
                        </p>
                    </x-slot>

                    <x-slot name="actions">
                        <x-button secondary wire:click="$set('applying', false)" wire:loading.attr="disabled">
                            Cerrar
                        </x-button>
                    </x-slot>
                @endif
            </x-form-section>
        @else
            <x-action-section>
                <x-slot name="title">
                   Aplica al Concurso
                </x-slot>

                <x-slot name="content">
                    <p class="mt-4 font-bold">
                        Necesitas registrarte o iniciar sesión para poder aplicar.
                    </p>
                    <p class="mt-2 mb-7 text-sm">
                        ¿Necesitas ayuda? Por favor escríbenos a <a href="email:ofmi@omegaup.com" class="text-link">ofmi@omegaup.com</a>, o únete a nuestro <a href="https://discord.gg/gn6GTb4rfG" target="_blank" class="text-link">servidor de Discord</a> y platica con nuestra comunidad de entrenadores y ex-participantes.
                    </p>
                    <x-button href="{{ route('register') }}">Registrarme</x-button>
                    <a class="underline text-indigo-600 hover:no-underline ml-3 text-sm" href="{{ route('login') }}">¿Ya tienes una cuenta?</a>
                </x-slot>
            </x-action-section>
        @endif
    </x-modal>
</div>
