<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Purchase</title>
    
  <!-- Favicon -->
  <link rel="icon" href="img/favicon/1.png" type="image/png">
    <style>
        /* Reset margins and paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            color: #fff; /* Text color for better contrast with video */
            overflow: hidden; /* Prevent scrollbars */
        }
        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Cover the entire background */
            z-index: -1; /* Place behind other content */
        }
        .content {
            position: relative;
            z-index: 1; /* Ensure content is above the video */
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <video class="video-background" autoplay muted loop>
        <source src="img/thank-u.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="content">
    </div>
</body>
</html>
