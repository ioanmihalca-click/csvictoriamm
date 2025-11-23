<div>
    <!-- Echipa Section -->
    <section class="py-16">
        <h2 class="mb-8 text-3xl font-bold text-center text-red-900 font-roboto-condensed">Echipa Clubului Sportiv
            Victoria Maramureș</h2>



        <!--Sportivi-->
        <section class="relative py-20 overflow-hidden bg-white">
            <span class="absolute top-0 right-0 flex flex-col items-end mt-0 -mr-16 opacity-60">
                <span
                    class="container hidden w-screen h-32 max-w-xs mt-20 transform rounded-full rounded-r-none md:block md:max-w-xs lg:max-w-lg 2xl:max-w-3xl bg-blue-50"></span>
            </span>

            <span class="absolute bottom-0 left-0"> </span>

            <div class="relative px-8 mx-auto md:px-16 max-w-7xl">
                <p class="font-semibold tracking-wide text-red-900 uppercase font-roboto-condensed">Grupa de performanta
                </p>
                <h2 class="relative max-w-lg mt-5 mb-10 text-4xl font-semibold leading-tight lg:text-5xl">Ei sunt
                    sportivii cu care ne mandrim</h2>
                <div class="grid w-full grid-cols-1 gap-10 md:grid-cols-4">
                    @foreach ($athletes as $athlete)
                        <div class="flex flex-col items-center justify-center col-span-1">
                            <div class="relative p-5">
                                <div
                                    class="absolute z-10 w-full h-full -mt-5 -ml-5 rounded-full rounded-tr-none {{ $athlete->background_color }}">
                                </div>
                                <img class="relative z-20 w-full rounded-full"
                                    src="{{ $athlete->photo_url ?? asset('assets/placeholder_athlete.jpg') }}"
                                    alt="{{ $athlete->name }}" />
                            </div>
                            <div class="mt-3 space-y-2 text-center">
                                <div class="space-y-1 text-lg font-medium leading-6">
                                    <h3>{{ $athlete->name }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        </section>


        <div class="relative py-20 overflow-hidden bg-white">
            <span class="absolute top-0 right-0 flex flex-col items-end mt-0 -mr-16 opacity-60">
                <span
                    class="container hidden w-screen h-32 max-w-xs mt-20 transform rounded-full rounded-r-none md:block md:max-w-xs lg:max-w-lg 2xl:max-w-3xl bg-blue-50"></span>
            </span>

            <span class="absolute bottom-0 left-0"> </span>

            <div class="relative px-8 mx-auto md:px-16 max-w-7xl">
                <p class="font-semibold tracking-wide text-red-900 uppercase font-roboto-condensed">Conducere, echipa
                    tehnica, management si membri de onoare</p>
                <h2 class="relative max-w-lg mt-5 mb-10 text-4xl font-semibold leading-tight lg:text-5xl">Ei sunt
                    coloana vertebrala a acestui club</h2>

                <div class="container mx-auto">
                    <div class="grid gap-8 md:grid-cols-2">
                        <!-- Conducere -->
                        <div class="p-6 bg-white rounded-lg shadow-md">
                            <h3 class="mb-4 text-2xl font-bold text-red-900">Conducere</h3>
                            <ul class="space-y-2">
                                <li><strong>Președinte:</strong> Ioan Mihalca</li>
                                <li><strong>Vice-Președinte:</strong> Ioana Mihalca</li>
                                <li><strong>Vice-Președinte:</strong> Andreea Mihalca</li>
                            </ul>
                        </div>

                        <!-- Echipa Tehnică -->
                        <div class="p-6 bg-white rounded-lg shadow-md">
                            <h3 class="mb-4 text-2xl font-bold text-red-900">Echipa Tehnică</h3>
                            <ul class="space-y-2">
                                <li><strong>Antrenor Principal:</strong> Ioan Mihalca</li>
                                <li><strong>Antrenor Secund:</strong> Stefan Benzar</li>
                            </ul>
                        </div>

                        <!-- Echipa de Management -->
                        <div class="p-6 bg-white rounded-lg shadow-md">
                            <h3 class="mb-4 text-2xl font-bold text-red-900">Echipa de Management</h3>
                            <ul class="space-y-2">
                                <li>Cristina Tăut</li>
                                <li>Andreea Mihalca</li>
                            </ul>
                        </div>

                        <!-- Membri de Onoare -->
                        <div class="p-6 bg-white rounded-lg shadow-md">
                            <h3 class="mb-4 text-2xl font-bold text-red-900">Membri de Onoare</h3>
                            <ul class="space-y-2">
                                <li>Victor Cîmpian</li>
                                <li>Andrei Giurgiu (Refresh)</li>
                                <li>Alexandru Badea</li>
                                <li>Alin Buda</li>
                                <li>Călin Filip</li>
                                <li>Vasi Mihalca</li>
                                <li>Vasi Chindriș</li>
                            </ul>
                        </div>
                    </div>
                </div>
    </section>
</div>

</div>
