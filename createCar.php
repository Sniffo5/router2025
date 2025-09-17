<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base::url("style.css") ?>">
</head>
<body>
    
    <form action="<?= base::url("save/car") ?>" method="post">

        <input type="text" name="brand" placeholder="Brand">
        <input type="text" name="model" placeholder="Model">
        <input type="submit" value="Save">

    </form>


</body>
</html>