<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>预约拍摄</title>
<!-- <link rel="stylesheet" href="./css/style.css"> -->
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<script type="text/javascript" src="./js/jquery.1.4.2-min.js"></script>
<style type="text/css">
    body{
        /*background-color: #FFD900;*/
        padding: 0;
        margin: 0;
        background-image:   url('./img/price.png');
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
        height: 140px;
        margin-top: 80px;
        font-size: 14px;
        width: 70%;margin-left: 15%;
    }
    .main2{
        position: relative;
        background-color: #FFD900;
        margin-top: 185px;
        font-size: 14px;
        width: 70%;margin-left: 15%;
        line-height: 28px;
    }
    .main2 input{
        width: 100px;
        background-color: #FFD900;
        border-style: none none solid none;
        border-width: 1px;
    }
    .main2 input[type="button"]{
        width: 40px;
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
    .main ul{
        line-height: 28px;
    }
    .calpri{
        margin-top: 20px;
    }
    .calpri ul{
        font-weight: lighter;
        line-height: 20px;
    }
    @media screen and (max-width: 330px) {
        .main{
            margin-top: 60px;
        }
        .main2{
            margin-top: 140px;
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
    } 
    @media screen and (min-width: 400px) {
        .main{
            width: 290px;
            margin-top: 90px;
        }
        .main2{
            width: 290px;
            margin-top: 210px;
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
        <p></p><p></p><p></p><p></p>
        <ul><li>内容</li><li>人数</li><li>价格</li></ul>
        <ul>
            <li>证件照</li>
            <li>
                <script type="text/javascript">
                    $(function () {
                        var t = $("#text_box1");
                        $("#add1").click(function () {
                            t.val(parseInt(t.val()) + 1)
                            setTotal(); GetCount();tsetTotal();
                        })
                        $("#min1").click(function () {
                            if (parseInt(t.val())>=1) {
                                t.val(parseInt(t.val()) - 1)
                                setTotal(); GetCount();tsetTotal();
                            }
                        })
                        function setTotal() {
                            pri1=(t.val()) * 88;
                            // $("#total1").html("￥"+pri1);
                        }
                        tsetTotal();
                    })
                </script>                
                <input id="min1" name=""  class="cbtn" style=" width:20px; height:18px;" type="button" value="-" />
                <input id="text_box1" name="" type="text" value="0" class="number" style=" width:20px; text-align:center; " />
                <input id="add1" name="" class="cbtn" style=" width:20px; height:18px;" type="button" value="+" />
            </li><li id="total1" >￥108</li>
        </ul>
        <ul><li>写真照</li>
            <li>
                <script type="text/javascript">
                    $(function () {
                        var t = $("#text_box2");
                        $("#add2").click(function () {
                            t.val(parseInt(t.val()) + 1)
                            setTotal(); GetCount();tsetTotal();
                        })
                        $("#min2").click(function () {
                            if (parseInt(t.val())>=1) {
                                t.val(parseInt(t.val()) - 1)
                                setTotal(); GetCount();tsetTotal();
                            }
                        })
                        function setTotal() {
                            pri2=(t.val()) * 88;
                            // $("#total2").html("￥"+pri2);
                        }
                        tsetTotal();
                    })
                </script>                              
                <input id="min2" name=""  class="cbtn" style=" width:20px; height:18px;" type="button" value="-" />
                <input id="text_box2" name="" type="text" value="0" class="number" style=" width:20px; text-align:center; " />
                <input id="add2" name="" class="cbtn" style=" width:20px; height:18px;" type="button" value="+" />
            </li><li id="total2" >￥88</li>
        </ul>
        <ul><li>结婚照</li>
            <li>
                <script type="text/javascript">
                    $(function () {
                        var t = $("#text_box3");
                        $("#add3").click(function () {
                            t.val(parseInt(t.val()) + 1)
                            setTotal(); GetCount();tsetTotal();
                        })
                        $("#min3").click(function () {
                           if (parseInt(t.val())>=1) {
                            t.val(parseInt(t.val()) - 1)
                            setTotal(); GetCount();tsetTotal();
                        }
                    })
                        function setTotal() {
                            pri3=(t.val()) * 168;
                            // $("#total3").html("￥"+pri3);
                        }
                        tsetTotal();
                    })
                </script>                              
                <input id="min3" name=""  class="cbtn" style=" width:20px; height:18px;" type="button" value="-" />
                <input id="text_box3" name="" type="text" value="0" class="number" style=" width:20px; text-align:center; " />
                <input id="add3" name="" class="cbtn" style=" width:20px; height:18px;" type="button" value="+" />
            </li><li id="total3" >￥198</li>
        </ul>
        <ul><li>宠物照</li>
            <li>
                <script type="text/javascript">
                    $(function () {
                        var t = $("#text_box4");
                        $("#add4").click(function () {
                            t.val(parseInt(t.val()) + 1)
                            setTotal(); GetCount();tsetTotal();
                        })
                        $("#min4").click(function () {
                           if (parseInt(t.val())>=1) {
                            t.val(parseInt(t.val()) - 1)
                            setTotal(); GetCount();tsetTotal();
                        }
                    })
                        function setTotal() {
                            pri4=(t.val()) * 128;
                            // $("#total4").html("￥"+pri4);
                        }
                        tsetTotal();
                    })
                </script>                              
                <input id="min4" name="" class="cbtn"  style=" width:20px; height:18px;" type="button" value="-" />
                <input id="text_box4" name="" type="text" value="0" class="number" style=" width:20px; text-align:center; " />
                <input id="add4" name="" class="cbtn" style=" width:20px; height:18px;" type="button" value="+" />
            </li><li id="total4" >￥148</li>
        </ul>
        <ul style="margin-bottom: 5px;"><li>毕业照</li>
            <li>
                <script type="text/javascript">
                    $(function () {
                        var t = $("#text_box5");
                        $("#add5").click(function () {
                            t.val(parseInt(t.val()) + 1)
                            setTotal(); GetCount();tsetTotal();
                        })
                        $("#min5").click(function () {
                           if (parseInt(t.val())>=1) {
                            t.val(parseInt(t.val()) - 1)
                            setTotal(); GetCount();tsetTotal();
                        }
                    })
                        function setTotal() {
                            pri5=(t.val()) * 128;
                            // $("#total5").html("￥"+pri5);
                        }
                        tsetTotal();
                    })
                </script>                              
                <input id="min5" name=""  class="cbtn" style=" width:20px; height:18px;" type="button" value="-" />
                <input id="text_box5" name="" type="text" value="0" class="number" style=" width:20px; text-align:center; " />
                <input id="add5" name="" class="cbtn" style=" width:20px; height:18px;" type="button" value="+" />
            </li><li id="total5" >￥148</li>
        </ul>
        <div class="calpri">
            <ul style="line-height: 18px;"><li style="width: 66%">线上预约立减</li><li id="zong3" style="text-align: center;font-weight: bold;"></li></ul>
            <ul style="line-height: 18px;border-bottom: 1px solid;"> <li style="width: 66%">组合优惠</li><li id="zong2" style="text-align: center;font-weight: bold;">-￥0</li></ul>
            <ul style="line-height: 18px;"><li style="width: 66%">应付金额</li><li id="zong1" style="text-align: center;font-weight: bold;color: red;"></li></ul>
        </div>
        
    </div>
    <div class="main2">
        <ul>
            <span class="inf-pj">姓名</span>
            <input type="text" class="inf-text" name="username">
            <span class="inf-pj">姓别</span> 
            <input type="button" name="sex" value="男" />
            <input type="button" name="sex" value="女" />
        <ul>
            <span class="inf-pj">手机</span>
            <input type="text" class="inf-text" style="width: 170px;" name="username">
        </ul>  
        <ul>
            <span class="inf-pj">地址</span>
            <input type="text" class="inf-text" style="width: 170px;" name="username">
        </ul>
    </ul>

</div>
<a href="pay.html"><img src="./img/nextstep.png" id="preorder" style="position: absolute ;bottom: 50px;left: 0px;"></a>
</body>
<script type="text/javascript">
    pri1=0,pri2=0,pri3=0,pri4=0,pri5=0;
    function GetCount() {
        var conts = 0;
        var aa = 0;
        $(".gwc_tb2 input[name=newslist]").each(function () {
            if ($(this).attr("checked")) {
                for (var i = 0; i < $(this).length; i++) {
                    conts += parseInt($(this).val());
                    aa += 1;
                }
            }
        });
        $("#shuliang").text(aa);
        $("#zong1").html((conts).toFixed(2));
        $("#jz1").css("display", "none");
        $("#jz2").css("display", "block");
    }
    function tsetTotal() {
        num=pri1+pri2+pri3+pri4+pri5;
        $("#zong1").text(parseInt(num).toFixed(2));
        num_=pri1/88*108+pri2+pri3/168*198+pri4/128*148+pri5/128*148-num;
        $("#zong3").text(parseInt(num_).toFixed(2));
    }
</script>
</html>