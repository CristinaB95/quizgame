<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/contacts" method="POST">
    {{csrf_field()}}
    Name:
        <input type="text" name="name"/>
    Phone:
        <input type="text" name="phone"/>
        <button type="submit">Send</button>
    </form> 
</body>
</html>