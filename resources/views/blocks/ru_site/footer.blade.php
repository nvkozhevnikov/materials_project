<!-- Footer -->
<footer class="text-center" style="background-color: rgba(0, 0, 0, 0.1);">
    <!-- Grid container -->
    <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn  btn-floating m-1" href="https://www.youtube.com/c/SterbrustCOM" target="_blank" role="button"
            ><i class="icon-youtube fs2rem"></i
                ></a>

            <!-- Vkontakte -->
            <a class="btn  btn-floating m-1" href="https://vk.com/sterbrust" target="_blank" role="button"
            ><i class="icon-vkontakte fs2rem"></i
                ></a>

            <!-- Telegram -->
            <span class="btn  btn-floating m-1" target="_blank" role="button"
            ><i class="icon-telegram fs2rem"></i
                ></span>
        </section>
        <!-- Section: Social media -->
    {{--        <!-- Section: Text -->--}}
    {{--        <section class="mb-4">--}}
    {{--            <p>--}}
    {{--                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum--}}
    {{--                repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam--}}
    {{--                eum harum corrupti dicta, aliquam sequi voluptate quas.--}}
    {{--            </p>--}}
    {{--        </section>--}}
    {{--        <!-- Section: Text -->--}}

    <!-- Section: Links -->
        <section>
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">{{ __('О нас') }}</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="{{ route('about.show', ['project']) }}">{{ __('О проекте') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('about.show', ['company']) }}">{{ __('О компании') }}</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">{{ __('Источники') }}</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="{{ route('about.show', ['bug-report']) }}">{{ __('Сообщить об ошибке') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('about.show', ['sources']) }}">{{ __('Источники информации') }}</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">{{ __('Правовая информация') }}</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="{{ route('about.show', ['terms']) }}">{{ __('Пользовательское соглашение') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('about.show', ['privacy-policy']) }}">{{ __('Политика конфиденциальности') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('about.show', ['right-holders']) }}">{{ __('Правообладателям') }}</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">{{ __('Возможности') }}</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="{{ route('about.show', ['ads']) }}">{{ __('Реклама на сайте') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('about.show', ['contacts']) }}">{{ __('Контакты') }}</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </section>
        <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.1);">
        <p>{{ __('Вы принимаете условия политики конфиденциальности и пользовательского соглашения каждый раз, когда оставляете свои данные
            в любой форме обратной связи на сайте MetalWorkInd.com') }}</p>
        <p>{{ __('Сайт носит информационный характер, некоторые страницы могут быть неактуальными или недостоверными.') }}</p>
        © 2021 - {{ date('Y') }} | <a href="https://sterbrust.com/" target="_blank">{{ __('Sterbrust') }}</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
