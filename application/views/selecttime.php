<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>预约拍摄</title>
<!-- <link rel="stylesheet" href="./css/style.css"> -->
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/hDate.js"></script>
<link href="css/hDate.css" rel="stylesheet" />
<style type="text/css">
    .calendar{
        margin-top: 85px;
    }
    body{
        /*background-color: #FFD900;*/
        padding: 0;
        margin: 0;
        background-image:   url('./img/date.png');
        background-size: 100%;
        background-repeat: no-repeat;
        font-family: "微软雅黑",Arial,Helvetica,sans-serif;
        font-weight: bold;
    }
    ul,li{
        list-style: none;
        margin: 0px;
        padding: 0px;        
        width: 100%;
        float: left;
    }
    li{
        width: 33%;
        text-align: center;
    }
    .number,.sex{
        border-width: 1px;
        border-radius: 5px;
        border-color: #000;
        background-color: #FFD900;
    }
    .cbtn{
        background-color:  #FFD900;
        border: none;
    }
    .sex{}
    #preorder{
        width: 100%;
    }
    .main{
        position: relative;
        height: 70px;
        font-size: 14px;
        width: 70%;margin-left: 15%;
    }
    .main2{
        position: relative;
        background-color: #FFD900;
        font-size: 14px;
        margin-top: 100px;
        width: 70%;margin-left: 15%;
        line-height: 28px;
    }
    .main input,.main2 input{
        width: 100px;
        margin: 5px 2px 5px 2px;
        background-color: #FFD900;
        border-style: none none solid none;
        border-width: 1px;
    }
    input[type="button"]{
        width: 40px;
        padding: 0px;
        height: 20px;
        border-style: solid solid solid solid;
        border-width: 1px;
        border-radius: 5px;
        border-color: #000;
        background-color: #FFD900;
    }
    .main2 a{
        display: block;
        width: 30px;
        height: 30px;
        float: left;
    }
    #select{
        width: 100%;height: 32px;position: fixed;bottom: 95px;
    }
    .main ul,.main2 ul{
        line-height: 28px;    
        text-align: center;
    }
    .calpri{
        margin-top: 20px;
    }
    .calpri ul{
        font-weight: lighter;
        line-height: 20px;
    }
    @media screen and (max-width: 330px) {
        .calendar{
            margin-top: 60px;
        }
        .main{
            margin-top: 290px;
        }
        .main2{
            margin-top: 0px;
        }
        .main ul{
            line-height: 24px;
            font-size: 12px;
        }
        a{
            height: 33px;
        }.main2 input {
            width: 72px;
        }
        input[type="button"]{
            width: 35px;
        }
    } 
    @media screen and (min-width: 400px) {
        .calendar{
            margin-top: 105px;
        }
        .main{
            width: 290px;
            margin-top: 380px;
        }
        .main2{
            width: 290px;
            margin-top: 30px;
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
        input[type="button"]{
            width: 50px;
        }
    }  
</style>
</head>
<body>
    <div>
        <input id="Text1" type="text" style="display: none;" />
    </div>
    <div class="main">
        <ul><input type="button" name="sex" value="10:00" />
            <input type="button" name="sex" value="10:30" />
            <input type="button" name="sex" value="11:00" />
            <input type="button" name="sex" value="11:30" />
        </ul>
        <ul>
            <input type="button" name="sex" value="12:00" />
            <input type="button" name="sex" value="12:30" />            
        </ul>    
    </div>
    <div class="main2">
        <ul><input type="button" name="sex" value="13:00" />
            <input type="button" name="sex" value="13:30" />
            <input type="button" name="sex" value="14:00" />
            <input type="button" name="sex" value="14:30" />
            <input type="button" name="sex" value="15:00" />
        </ul>
        <ul><input type="button" name="sex" value="15:30" />
            <input type="button" name="sex" value="16:00" />
            <input type="button" name="sex" value="16:30" />
            <input type="button" name="sex" value="17:00" />
            <input type="button" name="sex" value="17:30" />
        </ul>
        <ul><input type="button" name="sex" value="18:00" />
            <input type="button" name="sex" value="18:30" />
            <input type="button" name="sex" value="19:00" />
            <input type="button" name="sex" value="19:30" />
            <input type="button" name="sex" value="20:00" />
        </ul> 
    </div>
    <img src="./img/nextstep.png" id="preorder" style="position: absolute ;bottom: 50px;left: 0px;">
</body>
<script type="text/javascript">
    calendar.show({ id: Text1 });
</script>
</html>