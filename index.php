<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Haks.pl</title>
		<style>
		html,body{margin 0 auto; padding:0 100px 0 100px;}
	* {box-sizing: border-box; margin:0px; padding:0px; font-family:calibri; font-size:12px; }
		#aside_1 {padding-top:15px;}
		section{margin-top:20px;}
		input{padding-left:5px; padding-right:5px; margin-top:2px;}
		article {width:100%; display:inline-block;padding-left:50px;}
		textarea {width:100%; min-height:600px;}
		#MainArticleRight{float:right; border: 2px solid grey; width:50%; position:relative}
		#MainArticleLeft{}
		aside{text-align:center;}
		footer{text-align:center; margin-top:15px;}
		footer p{font-family:calibri; font-size:12px; color:brown;}
		ul,li {line-height:8px;}
		ul{margin-left:10px; display:none;}
		
	</style>
	
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	
	
	<script>

	
	
	function hide_show_sub_ul(parentt) {
		if($(parentt).nextAll('ul').first().is(':hidden')){
			$(parentt).nextAll('ul').first().show();
		}
		else{
			$(parentt).nextAll('ul').first().hide();
		}
	}
	
	function showFiles() {
	  if (window.XMLHttpRequest) {xmlhttp=new XMLHttpRequest();} else { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	  xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		  document.getElementById("artc").innerHTML=xmlhttp.responseText;  
		  setTimeout(function a(){document.getElementById("secFil").style.border="3px solid orange";}, 10);
		  setTimeout(function b(){document.getElementById("secFil").style.border="3px solid grey";}, 1000);
			$("ul").first().show();
		}
	  }
	  xmlhttp.open("GET","showFiles.php",true);
	  xmlhttp.send();
	}

	function deleteDirectory(str) {
	  if (window.XMLHttpRequest) {xmlhttp=new XMLHttpRequest();} else { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	  xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		  document.getElementById("menuOperacji").innerHTML=xmlhttp.responseText;  
		  setTimeout(function a(){document.getElementById("menuOperacji").style.border="3px solid orange";}, 10);
		  setTimeout(function b(){document.getElementById("menuOperacji").style.border="3px solid grey";}, 1000);
		  showFiles();
		}
	  }
	  xmlhttp.open("POST","fileManage.php",true);
	  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	  xmlhttp.send("op=usunfolder&folder="+str);
	}
	
		function deleteFile(str) {
	  if (window.XMLHttpRequest) {xmlhttp=new XMLHttpRequest();} else { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	  xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		  document.getElementById("menuOperacji").innerHTML=xmlhttp.responseText; 
		  setTimeout(function a(){document.getElementById("menuOperacji").style.border="3px solid orange";}, 10);
		  setTimeout(function b(){document.getElementById("menuOperacji").style.border="3px solid grey";}, 1000);		  
		  showFiles();
		}
	  }
	  xmlhttp.open("POST","fileManage.php",true);
	  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	  xmlhttp.send("op=usunplik&plik="+str);
	}
	
		function renameFile(neww,oldd) {
	  if (window.XMLHttpRequest) {xmlhttp=new XMLHttpRequest();} else { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	  xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		  document.getElementById("menuOperacji").innerHTML=xmlhttp.responseText;
		  setTimeout(function a(){document.getElementById("menuOperacji").style.border="3px solid orange";}, 10);
		  setTimeout(function b(){document.getElementById("menuOperacji").style.border="3px solid grey";}, 1000);		  
		  showFiles();
		}
	  }
	  xmlhttp.open("POST","fileManage.php",true);
	  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	  xmlhttp.send("op=zmiennazwe&old=" + neww + "&new=" + oldd);
	}
	
		function addFile(str) {
	  if (window.XMLHttpRequest) {xmlhttp=new XMLHttpRequest();} else { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	  xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		  document.getElementById("menuOperacji").innerHTML=xmlhttp.responseText;  
		  setTimeout(function a(){document.getElementById("menuOperacji").style.border="3px solid orange";}, 10);
		  setTimeout(function b(){document.getElementById("menuOperacji").style.border="3px solid grey";}, 1000);
		  showFiles();
		}
	  }
	  xmlhttp.open("POST","fileManage.php",true);
	  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	  xmlhttp.send("op=dodajplik&plik="+str);
	}
	
			function addFolder(str) {
	  if (window.XMLHttpRequest) {xmlhttp=new XMLHttpRequest();} else { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	  xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		  document.getElementById("menuOperacji").innerHTML=xmlhttp.responseText;  
		  setTimeout(function a(){document.getElementById("menuOperacji").style.border="3px solid orange";}, 10);
		  setTimeout(function b(){document.getElementById("menuOperacji").style.border="3px solid grey";}, 1000);
		  showFiles();
		}
	  }
	  xmlhttp.open("POST","fileManage.php",true);
	  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	  xmlhttp.send("op=dodajfolder&plik="+str);
	}
	
	function preaddFile(str) {
		document.getElementById("menuOperacji").innerHTML=""; 
				newInput1 = document.createElement("input");
				newInput1.id = 'input1';
				newInput1.type = "text";
				newInput1.value = "podaj nazwe";
				newInput1.style.border="2px solid orange";
				newInput1.style['border-radius'] = '4px';
				newInput1.style['margin-top']="10px";
				document.getElementById("menuOperacji").appendChild(newInput1);
				newInput2 = document.createElement("input");
				newInput2.id = 'input2';
				newInput2.type = "button";
				newInput2.value = "OK";
				newInput2.style.border="2px solid orange";
				newInput2.style['border-radius'] = '4px';
				newInput2.style['margin-top']="10px";
				newInput2.onclick=function(){addFile(str+newInput1.value);};
				document.getElementById("menuOperacji").appendChild(newInput2);				
	}
	
	function preaddFolder(str) {
		document.getElementById("menuOperacji").innerHTML=""; 
				newInput1 = document.createElement("input");
				newInput1.id = 'input1';
				newInput1.type = "text";
				newInput1.value = "podaj nazwe";
				newInput1.style.border="2px solid orange";
				newInput1.style['border-radius'] = '4px';
				newInput1.style['margin-top']="10px";
				document.getElementById("menuOperacji").appendChild(newInput1);
				newInput2 = document.createElement("input");
				newInput2.id = 'input2';
				newInput2.type = "button";
				newInput2.value = "OK";
				newInput2.style.border="2px solid orange";
				newInput2.style['border-radius'] = '4px';
				newInput2.style['margin-top']="10px";
				newInput2.onclick=function(){addFolder(str+newInput1.value);};
				document.getElementById("menuOperacji").appendChild(newInput2);				
	}
	</script>
</head>

<body>
	<section id="menuOperacji" style="border:3px solid grey; text-align:center; padding:10px; ">
		Menu operacji
	</section>
	<section id = "secFil" style="border:3px solid grey; padding-top:20px; padding-bottom:0px;">
		<article id="artc">
			Pliki ...
		</article>
	</section>
	<script>setTimeout(function b(){showFiles();}, 400);</script>
	<footer>
		<p>Copyright 2014 Paweł Czubak</p>
	</footer>

</body>

</html>






