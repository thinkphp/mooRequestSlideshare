<?php
if(isset($_GET['username']) && $_GET['username'] != '') {
   $user = $_GET['username'];
} else {$user = "weierophinney";}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
   <title>Request.Slideshare</title>
   <link rel="stylesheet" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" type="text/css">
   <link rel="stylesheet" href="http://yui.yahooapis.com/2.7.0/build/base/base.css" type="text/css">
   <style type="text/css">
   html,body{font-family: georgia,helvetica,arial,sans-serif;}
   h1{ font-size:200%; margin:0; padding-bottom:10px; color:#393;}
   h1 span{color: #111}
   form{background:#b4f08a;padding: 5px;-moz-box-shadow:5px 5px 7px rgba(33, 33, 33, 0.7);width: 100%}
   #badge{font-family: georgia,helvetica,arial;}
   .loading{margin: 10px;font-weight: bold;}
   .error{color: #fff;background: #c00;padding: 4px;width: 400px}
.slidesharebadge ul{  padding-left: 0;width: 500px}
.slidesharebadge li{border-bottom: 1px dotted #35740a;padding: 4px;list-style:square}
.slidesharebadge a{  color: #000;  text-decoration: none;  font-size: 17px}
.slidesharebadge a:hover{text-decoration: none;}
.slidesharebadge li:hover{background: #aaf478}
   #ft{font-size:80%;color:#888;text-align:left;margin:2em 0;font-size: 12px}
   #ft p a{color:#93C37D;}
   </style>
   <script src="http://www.google.com/jsapi?key=ABQIAAAA1XbMiDxx_BTCY2_FkPh06RRaGTYH6UMl8mADNa0YKuWNNa8VNxQEerTAUcfkyrr6OwBovxn7TDAH5Q"></script>
   <script type="text/javascript">google.load("mootools", "1.2.4");</script>
   <script type="text/javascript" src="http://github.com/thinkphp/Request.ForecastWeather/raw/master/demo/Request.JSONP.js"></script>
   <script type="text/javascript" src="Request.Slideshare-yui-compressed.js"></script>
</head>
<body>
<div id="doc" class="yui-t7">
   <div id="hd" role="banner"><h1>new Request.<span>Slide</span>Share(user,amount,options)</h1></div>
   <div id="bd" role="main">
	<div class="yui-g">
         <form id="f" name="f">
         <label for="username">Enter Username: </label><input type="text" id="username" name="username" value="<?php echo$user;?>"/><input type="submit" value="Search">
         </form>  
         <div id="badge">
         </div>
	</div>
	</div>
<div id="ft"><p>Created by @<a href="http://twitter.com/thinkphp">thinkphp</a> using <a href="http://thinkphp.ro/apps/YQL/slideshare.rss.xml">Open Data Table</a> | You can grab the source code of this demo on <a href="http://mootools.net/forge/download/Request_Slideshare/v1.0">Forge</a></p></div></div>
</div>

<script type="text/javascript">

       <?php  if($_GET['username']) { ?>
                        new Request.Slideshare('<?php echo$user;?>',10,{
                                    onSuccess: function(o) {
                                             if(o.results[0].indexOf('<error') != -1) {
                                                  if(window.console){console.log(o);}
                                                  var r = o.results[0]; 
                                                  var clean = r.replace(/<\/?error[^>]*>/,' '); 
                                                  $('badge').set('html','<h2 class="error">'+clean+'</h2>');
                                              } else {
                                                  if(window.console){console.log(o);}
                                                  $('badge').set('html',o.results[0]);
                                                  $('badge').fade('hide');
                                                  $('badge').fade(1);
                                              }
                                    },
                                    onRequest: function(script){
                                                  if(window.console){console.log(script);}
                                                  $('badge').empty();
                                                  new Element('div',{'class':'loading'}).set('text','Loading...').inject($('badge'));
                                    } 
                        }).send();
       <?php } ?>
</script>

</body>
</html>