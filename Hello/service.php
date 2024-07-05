<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty - Cosmetic Products & Services</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        header h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            transition: background-color 0.3s ease, color 0.3s ease;
            border-radius: 5px;
        }

        nav ul li a:hover {
            background-color: #34495e;
        }

        #services {
            padding: 60px 0;
            background-color: #fff;
        }

        .service-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            justify-items: center;
        }

        .service-item {
            text-align: center;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .service-item img {
            width: 100%;
            max-width: 300px;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .service-item h3 {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .service-item p {
            font-size: 1.2rem;
            line-height: 1.6;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 0;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Beauty-Cosmetic Products and Service's</h1>

        </div>
    </header>

    <section id="services">
        <div class="container">
            <h2>Our Services</h2>
            <div class="service-grid">
                <div class="service-item">
                    <img src="product/_l/1.png" alt="Cosmetic Product 1">
                    <h3>Cosmetic Products</h3>
                    <p>Explore our selection of premium skincare, makeup, and haircare products sourced from trusted brands committed to quality and innovation.</p>
                </div>
                <div class="service-item">
                    <img src="product/_l/2.png" alt="Beauty Service 1">
                    <h3>Beauty Services</h3>
                    <p>Experience personalized beauty services including professional makeup applications, skincare consultations, and spa treatments designed to enhance your natural beauty.</p>
                </div>
                <div class="service-item">
                    <img src="product/_l/3.png" alt="Cosmetic Product 2">
                    <h3>Special Offers</h3>
                    <p>Check out our special offers on selected cosmetic products and beauty services. Don't miss out on these exclusive deals!</p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <p>If you have any questions or inquiries, feel free to contact us through the following channels:</p>
            <ul>
                <li>Email: servicebeauty7@gmail.com</li>
                <li>Phone: 9819396877</li>
                <li>Address:  Dharan Road,Itahari Sunsari,Nepal</li>
            </ul>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2010 Cosmetic Product's and Service's. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
