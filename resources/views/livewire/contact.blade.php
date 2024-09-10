<div class="bg-gray-100">
    <section class="px-4 py-16 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="space-y-12">
            <!-- Title -->
            <h1 class="text-4xl font-extrabold text-center text-red-900 sm:text-5xl font-roboto-condensed">
                Contact
            </h1>
            
            <!-- FAQ Section -->
            <div class="overflow-hidden bg-white rounded-lg shadow-xl">
                <div class="px-6 py-8">
                    <h2 class="mb-6 text-3xl font-bold text-red-900 font-roboto-condensed">Întrebări frecvente</h2>
                    <div class="space-y-6">
                        @foreach([
                            ['question' => 'Ce echipament trebuie să am pentru a participa la clasele de freestyle kickboxing?', 
                             'answer' => 'Recomandăm purtarea unui echipament sportiv confortabil și a unor mănuși de box + tibiere.'],
                            ['question' => 'Cât durează o clasă de fitness functional?', 
                             'answer' => 'O clasă de fitness functional durează aproximativ 60 de minute, dar este adaptat la nivelul fiecarui membru.'],
                            ['question' => 'Pot participa la antrenamente chiar dacă nu am experiență anterioară în arte marțiale?', 
                             'answer' => 'Da, antrenamentele sunt deschise tuturor, indiferent de nivelul de experiență sau varstă'],
                            ['question' => 'Care sunt beneficiile practicării kickboxingului?', 
                             'answer' => 'Kickboxingul ajută la îmbunătățirea rezistenței cardiovasculare, la tonifierea mușchilor și la dezvoltarea abilităților de autoapărare. De asemenea, dezvoltă încrederea de sine și disciplina.']
                        ] as $faq)
                            <div class="pb-4 border-b border-gray-200">
                                <h3 class="mb-2 text-lg font-semibold text-gray-900">{{ $faq['question'] }}</h3>
                                <p class="text-gray-600">{{ $faq['answer'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="overflow-hidden bg-white rounded-lg shadow-xl">
                <div class="px-6 py-8">
                    <h2 class="mb-6 text-3xl font-bold text-red-900 font-roboto-condensed">Contactează-ne</h2>
                    <p class="mb-4 text-lg text-gray-600">Nu ați găsit răspunsul? Luați legătura cu noi!</p>
                    <div class="space-y-2">
                        <p class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-red-900" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                            Email: <a href="mailto:csvictoriamm@gmail.com" class="ml-1 text-red-900 hover:underline">csvictoriamm@gmail.com</a>
                        </p>
                        <p class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-red-900" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                            </svg>
                            Telefon: <a href="tel:0734411115" class="ml-1 text-red-900 hover:underline">0734 411 115</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Image -->
            <div class="relative overflow-hidden rounded-lg shadow-xl h-96">
                <img src="https://res.cloudinary.com/dpxess5iw/image/upload/t_Gradient fade/v1724149033/154105428_3510923319131877_1815913397909330049_n-lnx5z2yg_cucw3n.jpg" 
                     alt="Kickbox Baia Mare Maramures" 
                     class="object-cover w-full h-full">
                <div class="absolute inset-0 opacity-50 bg-gradient-to-t from-black to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-6">
                   <h2 class="mb-2 text-3xl font-bold text-white font-roboto-condensed">Alătură-te comunității noastre</h2>
<p class="text-lg text-white">Experimentează puterea kickboxing-ului alături de noi!</p>

                </div>
            </div>

            <!-- Google Maps Embed -->
            <div class="overflow-hidden bg-white rounded-lg shadow-xl">
                <div class="px-6 py-8">
                    <h2 class="mb-6 text-3xl font-bold text-red-900 font-roboto-condensed">Locatia noastra</h2>
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2687.145514698816!2d23.59965147609558!3d47.662169484138936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4737dddf6b0a6e1b%3A0xe77ebbdb7e7781ad!2sClub%20Sportiv%20Victoria%20Maramure%C8%99%20(Kickboxing%20adulti%20si%20copii)!5e0!3m2!1sen!2sro!4v1724158679571!5m2!1sen!2sro"
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>