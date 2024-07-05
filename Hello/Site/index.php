<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmetic Service's</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="hero-section">
        <h1>Welcome Eme Cosmetic Product and  Service's</h1>
        <p>Enhancing your natural charm and bringing your vision to life</p>
    </div>

    <div class="content-section">
        <section class="services">
            <h2>Our Services</h2>
            <div class="service-items">
                <div class="service-item">
                    <h3>Bridal Makeup</h3>
                    <p>Create flawless looks for your special day.</p>
                </div>
                <div class="service-item">
                    <h3>Special Occasions</h3>
                    <p>Make every event unforgettable with our services.</p>
                </div>
                <div class="service-item">
                    <h3>Personal Consultation</h3>
                    <p>Personalized advice to suit your beauty needs.</p>
                </div>
            </div>
        </section>

        <section class="gallery">
            <h2>Gallery</h2>
            <div class="gallery-items">
                <div class="gallery-item">
                    <img src="../product/4.png" alt="Gallery Image 1">
                    <p>Bridal Makeup</p>
                </div>
                <div class="gallery-item">
                    <img src="../product/3.png" alt="Gallery Image 2">
                    <p>Special Occasion Makeup</p>
                </div>
                <div class="gallery-item">
                    <img src="../product/5.png" alt="Gallery Image 3">
                    <p>Personal Consultation</p>
                </div>
            </div>
        </section>

        <section class="contact">
            <h2>Contact Us</h2>
            <form action="../contact_form.php" method="post">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </section>
    </div>

    <script src="script.js"></script>
</body>

</html>
