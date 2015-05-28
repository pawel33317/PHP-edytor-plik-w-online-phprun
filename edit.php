<!DOCTYPE HTML><?php if(!isset($_GET['f']) || $_GET['f'] == "")die();?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $_GET['f']?> | Haks.pl - PHP runner</title>
	
	<script language="javascript" type="text/javascript" src="ea/edit_area/edit_area_full.js"></script>
	<script language="javascript" type="text/javascript">
	editAreaLoader.init({
		id : "textarea_1"		// textarea id
		,syntax: "php"			// syntax to be uses for highgliting
		,allow_toggle: false
		,word_wrap: true
		,start_highlight: true		// to display with highlight mode on start-up
		,toolbar: "fullscreen, charmap, |,search, go_to_line, |, undo, redo, |, select_font, |, syntax_selection, |, change_smooth_selection, highlight, reset_highlight, |, help"
		,syntax_selection_allow: "css,html,js,php,python,vb,xml,c,cpp,sql,basic,pas,brainfuck"
		,plugins: "charmap"
		,charmap_default: "arrows"
	});
	


	</script>
	
	<script>
	var S_podglad = function(){
		document.getElementById("MainArticleRight").style['display']="none";
	}
	
	var P_podglad = function(){
		document.getElementById("MainArticleRight").style['display']="inline-block";
	}
	
	function ZapisziPrzeladuj(){
		Zapisz();
		Przeladuj();
	}
	
	function Przeladuj(){
		if (window.XMLHttpRequest) {xmlhttp=new XMLHttpRequest();} 
		else {xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
		
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			if(document.getElementById("MainArticleRight").style['display']!=="none"){
				document.getElementById("MainArticleRight").innerHTML=xmlhttp.responseText;
			  }
			}
		}
		xmlhttp.open("POST","<?php echo $_GET['f']?>",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("q=");
		
		setTimeout(function a(){document.getElementById("MainArticleRight").style.border="2px solid orange";}, 10);
		setTimeout(function b(){document.getElementById("MainArticleRight").style.border="2px solid grey";}, 500);
		setTimeout(function a(){document.getElementById("MainArticleRight").style.border="2px solid orange";}, 1000);
		setTimeout(function b(){document.getElementById("MainArticleRight").style.border="2px solid grey";}, 1500);
	}
	
	function Zapisz(){
	
		var dane = "";
		dane +="operation=save";
		dane +="&fileName=<?php echo $_GET['f']?>";
		dane +="&data="; //dane+= editAreaLoader.getValue("textarea_1");

		dane+=encodeURIComponent( editAreaLoader.getValue("textarea_1"));
		

		if (window.XMLHttpRequest) {xmlhttp=new XMLHttpRequest();} 
		else {xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}

		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				newDiv = document.createElement("div");
				newDiv.innerHTML = xmlhttp.responseText;
				newDiv.style.border="2px solid green";
				newDiv.style['border-radius'] = '4px';
				newDiv.style['margin-top']="10px";
			    newDiv.id = 'tmpDiv';
				my_div = document.getElementById("aside_1").appendChild(newDiv);
				setTimeout(function b(){var elem = document.getElementById("tmpDiv");elem.parentNode.removeChild(elem);}, 2500);
			}
		}
		xmlhttp.open("POST","writer.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send(dane);
	
	}
	
	</script>
	
	<style>
	* {box-sizing: border-box; margin:0px; padding:0px;}
		#aside_1 {padding-top:15px;}
		section{margin-top:20px;}
		input{padding-left:5px; padding-right:5px; margin-top:2px;}
		article {width:49%; display:inline-block; min-height:600px;}
		textarea {width:100%; min-height:600px;}
		#MainArticleRight{float:right; border: 2px solid grey; width:50%; position:relative}
		#MainArticleLeft{}
		aside{text-align:center;}
		footer{text-align:center; margin-top:15px;}
		footer p{font-family:calibri; font-size:12px; color:brown;}
	</style>

</head>

<body  onload='expandToWindow(document.getElementById("content"));'>

	<aside id="aside_1">
		<input type='button' onclick='window.location.href = "index.php";' value='<?php echo $_GET['f']?>' />
		<input type='button' onclick='alert(editAreaLoader.getValue("textarea_1"));' value='Pobierz Kod' />
		<input type='button' onclick='editAreaLoader.setValue("textarea_1", "<?php echo '<?php echo \"Hello World!\"; ?>'; ?>");' value='Wyczyść (Hello)' />
		<input type="button" onclick='ZapisziPrzeladuj();' value="Zapisz i Przeładuj" />
		<input type="button" onclick='Zapisz();' value="Zapisz " />
		<input type="button" onclick='Przeladuj();' value="Przeładuj" />
		<input type="button" onclick='S_podglad();' value="Schowaj Podgląd " />
		<input type="button" onclick='P_podglad();' value="Pokaż podgląd" />
		<br>
		<input type='button' onclick='editAreaLoader.insertTags("textarea_1", "while($i<", "){\n\n$i++;\n}\n");' value='while' />
		<input type='button' onclick='editAreaLoader.insertTags("textarea_1", "for($i=0;$i<", ";$i++){\n\n}\n");' value='for' />
		<input type='button' onclick='editAreaLoader.insertTags("textarea_1", "if(", "){\n\n}\nelse{\n\n}\n");' value='if' />
		<input type='button' onclick='editAreaLoader.insertTags("textarea_1", "<?php echo'<?php \n';?>", "<?php echo' \n?>';?>");' value='php' />
		<input type='button' onclick='editAreaLoader.insertTags("textarea_1", "include \"", "\";\n");' value='include' />

	</aside>
	
	<section>
		<article id="MainArticleLeft">
			<textarea id="textarea_1"><?php echo file_get_contents($_GET['f']);?></textarea>
		</article>
		<article id="MainArticleRight">
			<script>Przeladuj();</script>
		</article>
	</section>
	
	<aside id="aside_2">
		<script>document.getElementById("aside_2").innerHTML = document.getElementById("aside_1").innerHTML;</script>
	</aside>
	<footer>
		<p>Copyright 2014 Paweł Czubak</p>
	</footer>
</body>
</html>