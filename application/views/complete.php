<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>完成付费</title>
<!-- <link rel="stylesheet" href="./css/style.css"> -->
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<style type="text/css">
    body{
        padding: 0;
        margin: 0;
    }
</style>
</head>
<body>
    <img src="./img/BGI.png" style="width: 100%;position: fixed;">
    <img src="./img/complete.png" id="preorder" style="position: fixed;width: 60%;margin-left: 20%;">
</body>
<script type="text/javascript">
    window.onload=function (argument) {
    // body...    
    if (window.innerHeight)
    winHeight = window.innerHeight;
    else if ((document.body) && (document.body.clientHeight))
        winHeight = document.body.clientHeight;
    bh=winHeight/2;
    bh_=document.getElementById("preorder").offsetHeight/2;
    document.getElementById("preorder").style.marginTop=bh-bh_+"px";
}

</script>
</html>