<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Discover Beauty</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
            
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
             
        }

        section {
            padding: 60px 0;
        }

        section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-align: center;
        }

        section p {
            margin-bottom: 20px;
            text-align: center;
        }

        .offering {
            background-color: #fff;
            padding: 40px;
            border-radius: 5px;  
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        
        }

        .offering-content {
            text-align: center;
        }

        .offering h3 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .team-grid {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 40px;
        }

        .team-member {
            text-align: center;
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: opacity 0.5s, transform 0.5s;
        }

        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 2.5rem;
            }

            section h2 {
                font-size: 2rem;
            }

            .offering {
                padding: 30px;
            }

            .team-member {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>About Us</h1>
        </div>
    </header>

    <section id="mission">
        <div class="container">
            <h2>Our Mission</h2>
            <p>At Discover Beauty, our mission is to redefine self-care through high-quality cosmetic products and personalized services. We believe in empowering individuals to embrace their unique beauty with confidence.</p>
        </div>
    </section>

    <section id="story">
        <div class="container">
            <h2>Our Story</h2>
            <p>Founded in 2010 by Nisha Limbu, Discover Beauty started with a passion for making beauty accessible and enjoyable for everyone. Our journey began with a small boutique offering carefully curated skincare products and has since grown to include a wide range of cosmetics and professional beauty services.</p>
        </div>
    </section>

    <section id="offerings">
        <div class="container">
            <h2>Our Offerings</h2>
            <div class="offering">
                <div class="offering-content">
                    <h3>Cosmetic Products</h3>
                    <p>Explore our selection of premium skincare, makeup, and haircare products sourced from trusted brands committed to quality and innovation.</p>
                </div>
            </div>
            <div class="offering">
                <div class="offering-content">
                    <h3>Beauty Services</h3>
                    <p>Experience personalized beauty services including professional makeup applications, skincare consultations, and spa treatments designed to enhance your natural beauty.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="team">
        <div class="container">
            <h2>Meet Our Team</h2>
            <div class="team-grid">
                <div class="team-member">
                    <img src="product/_8.png" alt="Team Member 1">
                    <h3>Anup Rai</h3>
                    <p>Founder & CEO</p>
                </div>
                <div class="team-member">
                    <img src="product/_rabin.png" alt="Team Member 2">
                    <h3>Rabin Sharma</h3>
                    <p>Head of Beauty Services</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2010 Cosmetic Product's and Beauty Service's. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
