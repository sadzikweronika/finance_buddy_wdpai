<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Document</title>
</head>
<body class="flex-row-center-center">
    <div class="container flex-column-center-center">
        <h1>Finance Buddy</h1>
        <form class="flex-column-center-center">
            <?php if(isset($messages)) {
                foreach ($messages as $message){
                    echo $message;
                }
            }
            ?>
            <input type="email", placeholder="email">
            <input type="password", placeholder="password">
            <button type="submit">LOGIN</button>
        </form>
    </div>
</body>
</html>