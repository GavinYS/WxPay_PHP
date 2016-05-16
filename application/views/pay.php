<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>预约拍摄</title>
<!-- <link rel="stylesheet" href="./css/style.css"> -->
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<style type="text/css">
    body{
        /*background-color: #FFD900;*/
        padding: 0;
        margin: 0;
        background-image:   url('./img/pay.png');
        background-size: 100%;
        background-repeat: no-repeat;
        font-family: "微软雅黑",Arial,Helvetica,sans-serif;
        font-weight: bold;
    }
    ul,li{
        list-style: none;
        margin: 0px;
        padding: 0px;
    }
    a{
        width: 50%;height: 39px;display: block;float: left;
    }
    .payselect{
        bottom: 50px;
        position: fixed;
        width: 100%;
    }
    #preorder{
        width: 100%;
    }
    .main{
        position: relative;
        height: 140px;
        margin-top: 100px;
        font-size: 14px;
        width: 70%;margin-left: 15%;
    }
    .main2{
        position: relative;
        background-color: #FFD900;
        margin-top: 40px;
        font-size: 6px;
        width: 70%;margin-left: 15%;
        line-height: 14px;
    }
    ,#select{
        width: 100%;height: 32px;position: fixed;bottom: 95px;
    }
    .main ul{
        line-height: 28px;
    }
    .mian2 ul{        
        line-height: 12px;
    }
    @media screen and (max-width: 330px) {
        .main ul{
            line-height: 24px;
            font-size: 12px;
        }
        a{
            height: 33px;
        }
    } 
    @media screen and (min-width: 400px) {
        .main{
            width: 414px;
            margin-top: 120px;
        }
        .payselect,#select{
            width: 414px;
        }
        a{
            height: 43px;
        }    
        body{
            background-size: 414px;
            width: 414px;
        }
        #preorder{
            width: 414px;
        }
    } 
</style>
</head>
<body>
    <div class="main" style="">
        <ul>门店地址：麓山南路242号</ul>
        <ul>到店时间：5月1日&nbsp;&nbsp;下午 2:30</ul>
        <ul>拍摄内容：证件照x1&nbsp;&nbsp;宠物照x1</ul>
        <ul>服务价格：198元</ul>
        <ul>顾客姓名：李大宝</ul>
    </div>
    <!-- <img src="./img/detail.png" style="width: 100%;position: absolute   ;"> -->
    <div id="select" style="">
        <a href=""></a>
        <a href=""></a>
    </div>
    <img class="payselect" src="./img/payselect.png" id="preorder" style="position: absolute ;left: 0px;">
    <a href="complete.html"><img src="./img/paynow.png" id="preorder" style="position: absolute ;bottom: 0px;left: 0px;"></a>
</body>
<script type="text/javascript">
</script>
</html>