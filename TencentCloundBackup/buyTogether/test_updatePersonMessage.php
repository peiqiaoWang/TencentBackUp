<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

<form action="UpdatePersonMessage.php" method="post" enctype="multipart/form-data">
    <label for="file">文件名：</label>
    <input type="file" name="file" id="file"><br>
    <input type="text" name="username" >
    <input type="text" name="sex" >
    <input type="text" name="birthday" >
    <input type="text" name="occupation" >
    <input type="text" name="school" >
    <input type="text" name="description" >
    <input type="submit" name="submit" value="提交">
</form>

</body>
</html>