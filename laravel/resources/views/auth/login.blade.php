<html>
<body>
<form method="post" action="/login">

    <input type="text" name="email" placeholder="email" size="40"><br><br>
    <input type="password" name="password" placeholder="password" size="40"><br><br>
    <input type="submit" value="send">
    <input hidden name="_token" value="{{csrf_token()}}">



</form>

</body>
</html>