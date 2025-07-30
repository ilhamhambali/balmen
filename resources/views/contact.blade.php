<x-frontend-layout>
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="contact-us container">
            <div class="mw-930">
                <h2 class="page-title">CONTACT US</h2>
            </div>
        </section>

        <hr class="mt-2 text-secondary " />
        <div class="mb-4 pb-4"></div>

        <section class="contact-us container">
            <div class="mw-930">
                <div class="contact-us__form">
                    {{-- PERUBAHAN: Menampilkan pesan sukses --}}
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- PERUBAHAN: Mengarahkan form ke rute yang benar --}}
                    <form action="{{ route('contact.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <h3 class="mb-5">Get In Touch</h3>
                        <div class="form-floating my-4">
                            <input type="text" class="form-control" id="contact_us_name" name="name"
                                placeholder="Name *" required>
                            <label for="contact_us_name">Name *</label>
                            @error('name')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating my-4">
                            <input type="email" class="form-control" id="contact_us_email" name="email"
                                placeholder="Email address *" required>
                            <label for="contact_us_email">Email address *</label>
                            @error('email')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-4">
                            <textarea class="form-control form-control_gray" id="contact_us_message" name="message" placeholder="Your Message"
                                cols="30" rows="8" required></textarea>
                            @error('message')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</x-frontend-layout>
