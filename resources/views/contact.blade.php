@include('layout.header')

<!-- Contact Page -->
<div class="appointment">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage text_align_center">
                    <h2>Contact Us</h2>
                    <p>Get in touch with us for inquiries, appointments, or feedback.</p>
                </div>
            </div>
            <div class="col-md-12">
                <form id="contact_form" class="main_form" action="{{ url('/storedata') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form_control" placeholder="First Name" type="text" name="first_name" value="{{ old('first_name') }}">
                            <span class="text-danger">@error('first_name') {{ $message }} @enderror</span>
                        </div>
                        <div class="col-md-6">
                            <input class="form_control" placeholder="Last Name" type="text" name="last_name" value="{{ old('last_name') }}">
                            <span class="text-danger">@error('last_name') {{ $message }} @enderror</span>
                        </div>
                        <div class="col-md-6">
                            <input class="form_control" placeholder="Email" type="email" name="email" value="{{ old('email') }}">
                            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                        </div>
                        <div class="col-md-6">
                            <input class="form_control" placeholder="Phone Number" type="text" name="phone" value="{{ old('phone') }}">
                            <span class="text-danger">@error('phone') {{ $message }} @enderror</span>
                        </div>
                        <div class="col-md-12">
                            <input class="form_control" placeholder="Subject" type="text" name="subject" value="{{ old('subject') }}">
                            <span class="text-danger">@error('subject') {{ $message }} @enderror</span>
                        </div>
                        <div class="col-md-12">
                            <textarea class="textarea" placeholder="Message" name="message">{{ old('message') }}</textarea>
                            <span class="text-danger">@error('message') {{ $message }} @enderror</span>
                        </div>
                        <div class="col-md-12">
                            <button class="send_btn" type="submit">Send Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Contact Page -->

@include('layout.footer')