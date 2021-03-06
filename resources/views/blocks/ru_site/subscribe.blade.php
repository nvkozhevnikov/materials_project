<div class="container">
    <div class="col">
        <div class="block bg-light rounded mb-3">
            <aside class="pt-3">
                <!-- Section: Form -->
                <section class="row">
                    <form method="POST" action="{{ route('mail.subscribe') }}">
                        @csrf
                        <!--Grid row-->
                        <div class="row d-flex justify-content-center">
                            <!--Grid column-->
                            <div class="col-auto">
                                <p class="pt-2">
                                    <strong><i class="icon-mail-alt" style="color: #0d6efd; font-size: 1.2rem"></i>Подпишитесь
                                        на рассылку</strong>
                                </p>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-5 col-12">
                                <!-- Email input -->
                                <div class="form-outline mb-2">
                                    <input name="email" type="email" id="form5Example2" class="form-control"
                                           placeholder="Введите email адрес"/>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-auto">
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary mb-2">Подписаться</button>
                            </div>
                            <!--Grid column-->
                        </div>
                        <!--Grid row-->
                    </form>
                </section>
                <!-- Section: Form -->
            </aside>
        </div>
    </div>
</div>
