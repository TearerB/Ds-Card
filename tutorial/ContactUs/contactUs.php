<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome CDN -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #add8e6; /* Light blue background */
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Ensures padding is included in width */
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .social-media {
            margin-top: 20px;
            text-align: center;
        }
        .social-media a {
            margin: 0 10px;
            text-decoration: none;
            color: #333;
            font-size: 24px;
        }
        @media (max-width: 600px) {
            h1 {
                font-size: 24px;
            }
            input[type="submit"] {
                font-size: 14px;
            }
        }
    </style>
    <script>
        function sendMessage(event) {
            event.preventDefault();
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;
            const whatsappNumber = "+27670611598";
            const whatsappURL = `https://api.whatsapp.com/send?phone=${whatsappNumber}&text=Name:%20${name}%0AEmail:%20${email}%0AMessage:%20${message}`;
            window.open(whatsappURL, '_blank');
        }
    </script>
</head>
<body>

    <h1>Contact Us</h1>
    <form onsubmit="sendMessage(event)">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <input type="submit" value="Send Message">
    </form>

    <div class="social-media">
        <h3>Follow Us</h3>
        <a href="https://www.facebook.com" target="_blank" class="fab fa-facebook"></a>
        <a href="https://www.twitter.com" target="_blank" class="fab fa-twitter"></a>
        <a href="https://www.instagram.com" target="_blank" class="fab fa-instagram"></a>
        <a href="https://www.linkedin.com" target="_blank" class="fab fa-linkedin"></a>
    </div>

</body>
</html>
