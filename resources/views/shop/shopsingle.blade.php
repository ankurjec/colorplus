<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>T-Shirt Designer</title>
    
    <!-- Styles -->
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        #controls {
            display: flex;
            flex-direction: column;
            gap: 10px;
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }
        .tshirt-container {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        #tshirt-div {
            position: relative;
            background-color: #fff;
            width: 452px;
            height: 548px;
        }
        .drawing-area {
            position: absolute;
            top: 74px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            width: 250px;
            height: 400px;
            border: 1px solid #ccc;
        }
        .canvas-container {
            width: 250px;
            height: 400px;
            position: relative;
        }
        button {
            cursor: pointer;
            padding: 8px 12px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            background: #007bff;
            color: white;
        }
        button:hover {
            background: #0056b3;
        }
    </style>

    <!-- Fabric.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.3.1/fabric.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/dom-to-image-more@3/dist/dom-to-image-more.min.js"></script>


</head>
<body>

    <!-- Your existing HTML content goes here -->
    <div class="container">
        <!-- T-shirt Design Area -->
        <div class="tshirt-container">
            <div id="tshirt-div">
                <img id="tshirt-backgroundpicture" src="{{ asset('storage/images/tshirt.png') }}" crossorigin="anonymous" />
                <div id="drawingArea" class="drawing-area">
                    <div class="canvas-container">
                        <canvas id="tshirt-canvas" width="250" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls (Moved to the Right) -->
        <div id="controls">
            <label for="tshirt-color">T-Shirt Color:</label>
            <select id="tshirt-color">
                <option value="#fff">White</option>
                <option value="#000">Black</option>
                <option value="#f00">Red</option>
                <option value="#008000">Green</option>
                <option value="#ff0">Yellow</option>
            </select>

            <label for="tshirt-design">Predefined Designs:</label>
            <select id="tshirt-design">
                <option value="">Select a design</option>
                <option value="https://ourcodeworld.com/public-media/gallery/gallery-5d5b0e95d294c.png" crossorigin="anonymous">Batman</option>
            </select>

            <label for="tshirt-custompicture">Upload Design:</label>
            <input type="file" id="tshirt-custompicture" />

            <label for="clipart">Add Clipart:</label>
            <select id="clipart">
                <option value="">Select a clipart</option>
                <option value="https://cdn-icons-png.flaticon.com/512/2919/2919906.png">Star</option>
                <option value="https://cdn-icons-png.flaticon.com/512/833/833472.png">Heart</option>
                <option value="https://cdn-icons-png.flaticon.com/512/1077/1077114.png">Smile</option>
            </select>
            <button id="delete-clipart">Delete Selected Clipart</button>

            <label for="tshirt-text">Add Text:</label>
            <input type="text" id="tshirt-text" placeholder="Enter text" />
            <button id="add-text">Add Text</button>

            <label for="tshirt-text-color">Text Color:</label>
            <input type="color" id="tshirt-text-color" value="#000000" />

            <label for="tshirt-text-size">Font Size:</label>
            <input type="number" id="tshirt-text-size" min="10" max="100" value="30" />

            <button id="downloadDesign">Download Design</button>
            <button id="save-design">Save Design</button>
        </div>
    </div>

    <!-- JavaScript Code -->
    <script>
        let canvas = new fabric.Canvas('tshirt-canvas');

        function updateTshirtImage(imageURL) {
            if (!imageURL) return;
            fabric.Image.fromURL(imageURL, function (img) {
                canvas.clear();
                img.scaleToWidth(200);
                img.scaleToHeight(200);
                canvas.centerObject(img);
                canvas.add(img);
                canvas.renderAll();
            });
        }

        document.getElementById("tshirt-color").addEventListener("change", function () {
            document.getElementById("tshirt-div").style.backgroundColor = this.value;
        });

        document.getElementById("tshirt-design").addEventListener("change", function () {
            updateTshirtImage(this.value);
        });

        // document.getElementById('tshirt-custompicture').addEventListener("change", function (e) {
        //     var reader = new FileReader();
        //     reader.onload = function (event) {
        //         var imgObj = new Image();
        //         imgObj.src = event.target.result;
        //         imgObj.onload = function () {
        //             canvas.clear();
        //             var img = new fabric.Image(imgObj, { crossOrigin: "anonymous" });
        //             img.scaleToWidth(200);
        //             img.scaleToHeight(200);
        //             canvas.centerObject(img);
        //             canvas.add(img);
        //             canvas.renderAll();
        //         };
        //     };
        //     if (e.target.files[0]) {
        //         reader.readAsDataURL(e.target.files[0]);
        //     }
        // });


        document.getElementById('tshirt-custompicture').addEventListener("change", function (e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        var imgObj = new Image();
        imgObj.crossOrigin = "anonymous"; // Set crossOrigin BEFORE setting src
        imgObj.src = event.target.result;
        imgObj.onload = function () {
            canvas.clear();
            var img = new fabric.Image(imgObj);
            img.scaleToWidth(200);
            img.scaleToHeight(200);
            canvas.centerObject(img);
            canvas.add(img);
            canvas.renderAll();
        };
    };
    if (e.target.files[0]) {
        reader.readAsDataURL(e.target.files[0]);
    }
});


        document.getElementById("add-text").addEventListener("click", function () {
            let textValue = document.getElementById("tshirt-text").value;
            if (!textValue) return;

            let text = new fabric.Text(textValue, {
                left: 50,
                top: 100,
                fontSize: parseInt(document.getElementById("tshirt-text-size").value),
                fill: document.getElementById("tshirt-text-color").value,
                fontFamily: 'Arial',
                selectable: true
            });

            canvas.add(text);
            canvas.renderAll();
            document.getElementById("tshirt-text").value = "";
        });

        document.getElementById("downloadDesign").addEventListener("click", function () {
            domtoimage.toPng(document.getElementById('tshirt-div')).then(function (dataUrl) {
                let link = document.createElement('a');
                link.download = 'tshirt-design.png';
                link.href = dataUrl;
                link.click();
            }).catch(console.error);
        });

// 	   document.getElementById("save-design").addEventListener("click", function () {
//     var node = document.getElementById('tshirt-div');

//     domtoimage.toBlob(node).then(function (blob) {
//         let formData = new FormData();
//         formData.append("design", blob, "tshirt_design.png");

//         fetch("/save-design", {
//             method: "POST",
//             body: formData,
//             headers: {
//                 "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
//             }
//         })
//         .then(response => response.json())
//         .then(data => {
//             if (data.path) {
//                 alert("Design saved successfully!");
//                 console.log("Saved design URL:", data.path);
//             }
//         })
//         .catch(error => console.error('Error:', error));
//     }).catch(error => console.error("Image processing error:", error));
// });

document.getElementById("save-design").addEventListener("click", function () {
    var tshirtDiv = document.getElementById('tshirt-div');
    
    // Ensure the background color is properly applied before capture
    tshirtDiv.style.backgroundColor = document.getElementById("tshirt-color").value;

    domtoimage.toBlob(tshirtDiv).then(function (blob) {
        let formData = new FormData();
        formData.append("design", blob, "tshirt_design.png");

        fetch("/save-design", {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.path) {
                alert("Design saved successfully!");
                console.log("Saved design URL:", data.path);
            }
        })
        .catch(error => console.error('Error:', error));
    }).catch(error => console.error("Image processing error:", error));
});


    </script>

</body>
</html>
