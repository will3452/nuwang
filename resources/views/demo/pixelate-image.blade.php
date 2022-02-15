<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixelate image</title>
</head>
<body>
    <h1>Pixelate Image</h1>
    <form action="/demo/pixelate-image" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" accept="image/*" name="image" required>
        <button>upload image</button>
    </form>
</body>
</html>
