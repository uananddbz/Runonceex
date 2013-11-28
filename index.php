<html>
<head>
<title>RunonceEx Creator</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

function add_ent()
{
var node=document.createElement("LI");
document.getElementById("form").appendChild(node).innerHTML='<input type="text" placeholder="name" name="name[]" /><input type="text" placeholder="command" name="com[]" />';
}
  
</script>
</head>
<body>
<div class="logo"><h1>uRunonceEx</h1><small>gmail | github | facebook | twitter / <b>uananddbz</b></small></div>

<form action="output.php" method="post">

<div class="header">
<span style="float:left;">
<input name="title" placeholder="title of window" type="text" />
<a href="#" onClick="add_ent();return false;"><b>+Add</b></a></span>
<span style="float:right;">
<select name="format">
<option value="reg">Reg</option>
<option value="inf">Inf</option>
<option value="bat">Bat</option>
</select> <button type="submit">DOWNLOAD</button></span>
</div>
<br/>
<div class="list">
<ol id="form">

<li><input type="text" placeholder="name" name="name[]" /><input type="text" placeholder="command" name="com[]" /></li>

</ol>

</div>

</form>

</body></html>