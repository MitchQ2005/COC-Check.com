<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="contact-page">
        <div class="contact-container">
            <!-- Linker sectie -->
            <div class="contact-info">
                <h2>Contact</h2>
                <p>We would love to speak with you, or if you have any trouble or ideas. Feel free to reach out using the below details.</p>
                <h3>Get In Touch</h3>
                <p>Info@coc-check.com</p>
            </div>

            <!-- Rechter sectie -->
            <div class="contact-form">
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Your name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last name</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Your last name">
                    </div>
                    <div class="form-group full-width">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="Your subject">
                    </div>
                    <div class="form-group full-width">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Write your message"></textarea>
                    </div>
                    <button type="submit">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
</x-app-layout>
