<!DOCTYPE html>
<html lang="en">
<head>
    <title>t3</title>
</head>
<body>
    <div id="url"></div>
    <script>
    var arr = [{"display":"Đại Học Tài Nguyên","url":"http://hunre.edu.vn"},
    {"display":"Khoa CNTT","url":"http://cntt.hunre.edu.vn"}];
    // arr là mảng chức 2 Json Object
    var out ="";
    for(i=0;i<arr.length;i++){
        out+='<a href="'+arr[i].url+'">'+arr[i].display+'</a><br>';
    }
    document.getElementById("url").innerHTML=out;
    </script>
</body>
</html>