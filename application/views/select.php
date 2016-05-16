<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>完成付费</title>
<!-- <link rel="stylesheet" href="./css/style.css"> -->
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<style type="text/css">
    body{
        background-color: #FFD900;
        padding: 0;
        margin: 0;
    }
    ul{
        /*line-height: 80px;*/
        width: 100px;
        margin-top: 0px;
        margin-bottom: 0px;
        padding-left: 8px;
        padding-right: 8px;
        font-size: 20px;
        font-family: "Microsoft YaHei";
        font-weight: bold;
    }
    a{
        text-decoration: none;
        color: #000;
    }
    @media screen and (min-width: 400px) {
        ul{
            font-size: 25px;
        }
    } 
</style>
</head>
<body>
    <img src="./img/BGI.png" style="width: 100%;position: fixed;">
    <img id="tribgi" src="./img/tribgi.png" style="position: fixed;width:40%;margin-left: 30%;">
    <div id="preorder" style="position: fixed; width: 40%;margin-left: 30%;">
        <ul style="float: left;text-align: left;"><a href="price.html">证件照</a></ul>
        <ul style="float: right;text-align: right;"><a href="price.html">写真照</a></ul>
        <ul style="float: left;text-align: left;"><a href="price.html">结婚照</a></ul>
        <ul style="float: right;text-align: right;"><a href="price.html">宠物照</a></ul>
        <ul style="float: left;text-align: left;"><a href="price.html">毕业照</a></ul>
    </div>
</body>
<script type="text/javascript">
    window.onload=function(){
        pos("tribgi");
        th=document.getElementById("tribgi").offsetHeight;
        for (var i = 0; i < 5; i++) {
            document.getElementsByTagName("ul")[i].style.lineHeight=th/6+"px";
        } 
        pos("preorder");
    } ;
    function pos(obj) {
    // body...    
    if (window.innerHeight){
        winHeight = window.innerHeight;
    }
    else if ((document.body) && (document.body.clientHeight)){
        winHeight = document.body.clientHeight;
    }
    bh=winHeight/2;
    bh_=document.getElementById(obj).offsetHeight/2;
    document.getElementById(obj).style.marginTop=bh-bh_+"px";    
}

</script>
</html>