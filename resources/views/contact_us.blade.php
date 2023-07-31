@extends("layout")
@section("main")
<section class="py-5 container text-secondary">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <!--Section description-->
    <p class="text-center mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>
        <hr>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
        <form id="contact-form" name="contact-form" action="{{ asset('assets/php/mail.php') }}" method="POST">

                <!--Grid row-->
                <div class="row mb-4">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="name" class="">Your name</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="email" class="">Your email</label>
                            <input type="text" id="email" name="email" class="form-control">
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="subject" class="">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control">
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row mb-4">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <label for="message">Your message</label>
                            <textarea type="text" id="message" name="message" rows="4" class="form-control md-textarea"></textarea>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

            </form>

            <div class="text-center text-md-left">
                <a class="btn bg-secondary scale shadow" onclick="document.getElementById('contact-form').submit();">Send</a>
            </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled">
                <li><i class="fas fa-phone mt-4 fa-2x text-secondary"></i>
                    <a class="text-decoration-none link-dark" href="tel:+201000000123"><p>+20 1000 000 123</p></a>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x text-secondary"></i>

                    <a class="text-decoration-none link-dark" href="mailto:contact@monkiz.com"><p>contact@monkiz.com</p></a>
                </li>
            </ul>
        </div>

    </div>

</section>
@endsection
