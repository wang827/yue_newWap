<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<script type="text/javascript" src="__PUBLIC__/Public/js/jquery.min.js"></script>
	<title>微信直冲</title>
	<style type="text/css">
		.fixed {
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			background-color: rgba(0, 0, 0, .3);
			z-index: 999;
		}
		.loading {
			position: fixed;
			left: 30%;
			margin-left: 0px;
			top: 30%;
		}
	</style>
	<script type="text/javascript">
        $(function(){
            callpay();
        })

        //调用微信JS api 支付
        function jsApiCall()
        {
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
            <?php echo $jsApiParameters; ?>,
            function(res){
                if (res.err_msg == "get_brand_wcpay_request:ok") {
                    window.location.href="<?php echo ($chenggong); ?>";
                } else if (res.err_msg == "get_brand_wcpay_request:cancel") {
                    alert('亲爱的读者，您取消支付了哦,可以选用微信扫码支付哦');
                    window.location.href="<?php echo ($shibai); ?>";

                } else {
                    alert("微信直冲失败请选择微信扫码支付!");
                    window.location.href="<?php echo ($shibai); ?>";
                }

            }
        );
        }

        function callpay()
        {
            if (typeof WeixinJSBridge == "undefined"){
                if( document.addEventListener ){
                    document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                }else if (document.attachEvent){
                    document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                    document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                }
            }else{
                jsApiCall();
            }
        }

	</script>
</head>
<body>
<br/>
<div style="border:0px solid red;width:100px;height:100px;position:absolute;left:50%;margin-left:-50px;top:50%;margin-top:-50px;"> <img class="loading"  src='/Public/Public/images/load.gif'  /> </div>
</body>
</html>