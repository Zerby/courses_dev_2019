<html>
<head>
    <link rel="stylesheet" href="/static/styles.css">
</head>
<body>
<#if error??>
    <p style="color:red;">${error}</p>
</#if>
<form action="/board/:name/new" method="post" enctype="application/x-www-form-urlencoded">
    <div>Message:</div>
    <div><input type="text" name="author" /></div>
    <div>Password:</div>
    <div><input type="text" name="message" /></div>
    <div><input type="submit" value="board" /></div>
</form>
</body>
</html>