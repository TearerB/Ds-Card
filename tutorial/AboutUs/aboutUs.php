<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->

    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #007BFF; /* Blue background */
            color: white;
            overflow: auto;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
             background: rgba(0, 0, 0, 0.508); /* Slightly transparent background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }
        p {
            line-height: 1.6;
        }
        .team {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }
        .member {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            padding: 15px;
            margin: 10px;
            text-align: center;
            flex: 1 1 200px; /* Flex item with a minimum width */
            max-width: 220px;
        }
        .member img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
        }
        @media (max-width: 600px) {
            .team {
                flex-direction: column;
                align-items: center;
            }
            .member {
                max-width: none; /* Remove max width on small screens */
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>About Us</h1>
        <p> DS-Card and its modules provide an advanced ID management solution. DS-Card simpifies identity management, offering access from any device, anywhere, with a single subscription and no need for additional licenses or complex software installations.</p>
        <p>Users can issue both physical PVC ID cards and digital IDs from any device, accessible through any web browser, ensuring compatibility across various operating systems like Windows and Mac. This makes it a truly cross-platform, cloud-based solution for ID issuance.</p>
        <p>DS-Card allows for easy remote photo capture. This system allows users to quickly approve or reject ID photos using physical or digital IDs and have them issued with barcode features and optional building access. It streamlines data entry, provides comprehensive search options, and supports advanced batch printing for efficient high-volume ID issuance.</p>
        <p>Additionally, DS-Card optimizes printing with network printers and a centralized print manager. Once configured on the print server, there is no need to adjust printers and settings, regardless of the device used. This ensures a smooth ID card issuance process, ideal for today’s mobile and flexible working environments.</p>
        <h2>Meet Our Team</h2>
        <div class="team">
            <div class="member">
                <img src="https://via.placeholder.com/100" alt="Team Member 1">
                <h3>N Mofokeng</h3>
                <p>CEO</p>
            </div>
            <div class="member">
                <img src="https://via.placeholder.com/100" alt="Team Member 2">
                <h3>C Colbert</h3>
                <p>CTO</p>
            </div>
            <div class="member">
                <img src="https://via.placeholder.com/100" alt="Team Member 3">
                <h3>I Omotayo</h3>
                <p>Marketing Manager</p>
            </div>
            <div class="member">
                <img src="https://via.placeholder.com/100" alt="Team Member 4">
                <h3>M Dibeco</h3>
                <p>Project Manager</p>
            </div>
            <div class="member">
                <img src="https://via.placeholder.com/100" alt="Team Member 5">
                <h3>B Tshabile</h3>
                <p>Designer</p>
            </div>
            <div class="member">
                <img src="https://via.placeholder.com/100" alt="Team Member 6">
                <h3>T Monetshwale</h3>
                <p>Developer</p>
            </div>
            <div class="member">
                <img src="https://via.placeholder.com/100" alt="Team Member 7">
                <h3>T Colbert</h3>
                <p>Content Writer</p>
            </div>
            <div class="member">
                <img src="https://via.placeholder.com/100" alt="Team Member 8">
                <h3>M Kombe</h3>
                <p>Sales Manager</p>
            </div>
            <div class="member">
                <img src="https://via.placeholder.com/100" alt="Team Member 9">
                <h3>A Mbonambi</h3>
                <p>HR Manager</p>
            </div>
        </div>
    </div>

</body>
</html>

