<!DOCTYPE html>
<html>
<title> CS467 XSS </title>
<head>
 <meta name="author" content="Ray Franklin">
 <meta name="Reference source" 
 content="https://www.youtube.com/c/DrapsTV/featured">
</head>
<body>
<h1 align="center"> Please search below. </h1>
<table align="center">
<tr><td>
<form action="xss_secure.php" method="get">
	<input type="text" name="search" placeholder="search" />
	<input type="submit" value="Search" />
</form>
</td></tr>
</table>
<br />
<br />
<p align="center">
<?php
if(isset($_GET["search"]))
{
	echo htmlspecialchars("You searched for: ".$_GET["search"], ENT_QUOTES, 
	'UTF-8');
	echo "<br /><br /> <i> Attack didn't work? Check out 
	<a href='https://owasp.org/www-community/xss-filter-evasion-cheatsheet'>OWASP</a>
	
	it has a list of all common filter evasion methods.</i>";
}
?>
</p>
<div align="center">
<h3>This website was made for educational 
purposes.</h3>
    <ul style="text-align: center;list-style-position: inside;">
    See below for further reading-
        <li>OWASP: <a href="https://owasp.org/www-community/attacks/xss/">
        https://owasp.org/www-community/attacks/xss/</a> 
        <li>Wikipedia: 
        <a href="https://en.wikipedia.org/wiki/Cross-site_scripting">
        https://en.wikipedia.org/wiki/Cross-site_scripting</a>
    </ul>
</div>
</body>
</html> 
