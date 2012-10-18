<html>
<head>
	<link rel="stylesheet" type="text/css" href="jqcloud.css" />
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="jqcloud-1.0.0.min.js"></script>
    

	<!--<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jqcloud-1.0.0.min.js"></script>
    <script type="text/javascript" src="js/jquery-latest.js"></script>-->

<script type="text/javascript">
function fun(){
  

var nameey=document.getElementById('handle').value;

var word_list = new Array({text: "", weight: 0});
var name,num,sum=0;
var xy=[];
var k,h;
for (k=0; k <500; k++)
xy[k]=[];


$(document).ready(function() {
  
 var twitter_api_url = 'https://api.twitter.com/1/statuses/user_timeline/';

 var last='.json?callback=?&count=200';
  var user= nameey;
var i=0;
  
  $.getJSON(
    twitter_api_url+user+last,
    function(data) {
      i=data.length;
      //alert(i);
      $.each(data, function(i, tweet) {
  
      name=tweet.text;
      num=tweet.text.split(" ").length;
      
      //alert(name);

      xy[i][0]=num;

      xy[i][1]=1;
      i=i+1;      

        
      

      });
  
      //alert(tweet_data[0].text);
     // alert(xy[5][0]);

      for(h=0;h<i;h++){

        if(xy[h][1]!=0)
          for(j=h+1;j<i;j++){

              if(xy[h][0]==xy[j][0]){
                  
               xy[h][1]=xy[h][1]+1;   
               
               xy[j][0]=0;
               xy[j][1]=0;
               




              }

          }        

      }

//xy.splice(3,1); 
  

      for(h=0;h<i;h++){


          
        if(xy[h][0]==0||xy[h][1]==0){
            xy.splice(h,1);         
            //document.write("eer");    
        }
        //else{
          //sum=parseInt(sum)+
          if(!isNaN(xy[h][1]))
          sum=parseInt(sum)+parseInt(xy[h][1]);
        //}
        
        
      }

//alert("as"+sum);
for(h=0;h<i;h++){

       if(xy[h][0]!=0 && !isNaN(xy[h][0])){    
        
        temp=xy[h][1]*100/sum;
        word_list.push({text:xy[h][0],weight:temp});

      }

}




      $("#wordcloud").html(" ");
      $("#wordcloud").jQCloud(word_list);
   });




});


  }

</script>



<style type="text/css">
body {
        background-color:#A9A9A9;
        font-family: Helvetica, Arial, sans-serif;
      }
      #wordcloud {

        width: 100%;
        height: 100%;
        background-color:#666666;
        border: none;
        -moz-border-radius:5px;
  -webkit-border-radius:5px;  
      }
      #wordcloud span.w10, #wordcloud span.w9, #wordcloud span.w8, #wordcloud span.w7 {
        text-shadow: 0px 1px 1px #ccc;
      }
      #wordcloud span.w3, #wordcloud span.w2, #wordcloud span.w1 {
        text-shadow: 0px 1px 1px #fff;
      }




</style>

</head>
<body>

<div id="wordcloud">
<center><span id="hh" style="position:absolute;top:50px"><font size="5">
  Enter the twitter handle:
  <input type="text" name="handle" id="handle" />
  <input type="submit" value="save" onclick="fun()" />
</center>
</span>
</font>
</div>

</body>
</html>	
