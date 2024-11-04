<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
    <style>
        /* Style for the image container */
        #imageContainer {
            border: 5px solid black; 
            display: inline-block; 
            margin-top: 20px; 
            overflow: hidden; /* Hide overflow if necessary */
        }

        /* Set the image to its original size */
        #selectedImage {
            max-width: none; /* Allow full width */
            height: auto; /* Maintain aspect ratio */
            transition: width 0.3s, height 0.3s; /* Smooth transition */
        }
    </style>
</head>
<body>
    <h1>Peys App</h1>

    <form id="peysForm">
        <label for="size">Select Photo Size:</label>
        <input type="range" id="size" min="1" max="10" value="6" step="1" oninput="updateSizeValue(this.value * 10)">
        <span id="sizeValue">60</span>px<br><br>

        <label for="borderColor">Select Border Color:</label>
        <input type="color" id="borderColor" value="#000000"><br><br>

        <button type="button" onclick="processImage()">Process</button>
    </form>

    <div id="imageContainer">
        <img id="selectedImage" src="images/addrialene.png" alt="Sample Image" style="width: 60px; height: 60px;">
    </div>

    <script>
        function updateSizeValue(value) {
            document.getElementById('sizeValue').innerText = value;
        }

        function processImage() {
            // Get selected values
            const size = document.getElementById('size').value * 10; // Convert to actual size
            const borderColor = document.getElementById('borderColor').value;

            // Update border color
            const imageContainer = document.getElementById('imageContainer');
            imageContainer.style.borderColor = borderColor;

            // Update image size dynamically
            const selectedImage = document.getElementById('selectedImage');
            selectedImage.style.width = size + 'px'; // Set width based on range
            selectedImage.style.height = size + 'px'; // Set height based on range
        }

        // Set default size value
        window.onload = function() {
            processImage(); // Initialize the image size and border color on page load
        }
    </script>
</body>
</html>
