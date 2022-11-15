        <!-- Pied de page du site 'Passionné de Formule 1' -->

        <footer>
            <div class="footer-container row">

                <!-- Copyright et mentions légales du site -->

                <div class="d-flex col-copyright-mentions">
                    <div class="col-copyright">
                        <p class="copyrightText">© Copyright : Passionné de Formule 1</p>
                    </div>
                    <div class="col-mentions">
                        <a href="{{ url('/mentions-legales') }}" class="mentionsText">Mentions Légales</a>
                    </div>

                    <hr>
                </div>

                <!-- Lien vers mes réseaux sociaux -->

                <div class="col-rs">
                    <div class="d-flex rsLink">
                        <a href="https://www.facebook.com/" target="_blank" class="fa-brands rsItem"></a>
                        <a href="https://www.twitter.com/" target="_blank" class="fa-brands rsItem"></a>
                        <a href="https://www.instagram.com/" target="_blank" class="fa-brands rsItem"></a>
                        <a href="https://github.com/GJimmyX/projet-final" target="_blank" class="fa-brands rsItem"></a>
                    </div>

                    <!-- Plan du site -->

                    <div class="d-flex sitePlan">
                        <a href="{{ url('/plan-du-site') }}" class="sitePlanLink">Plan du site</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Import du JS -->

        <!-- URL du site -->

        <script>
            var siteUrl = "{{url('/')}}";
        </script>

        <!-- jQuery -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- jQuery UI -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

        <!-- Scripts -->
        
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <!-- JS pour les cookies -->

        <script src="{{ url('js/cookie/cookie.js') }}" defer></script>

        <!-- JS pour la barre de navigation -->

        <script src="{{ url('js/navigation.js') }}" defer></script>

        <!-- JS pour la barre de recherche -->

        <script src="{{ url('js/searchBar.js') }}" defer></script>

        <script src="{{ url('js/searchAuto.js') }}" defer></script>

        @if (Route::is('index'))
        
            <!-- JS pour le slider d'images -->

            <script src="{{ url('js/slider.js') }}" defer></script>
        @endif

    </body>
</html>