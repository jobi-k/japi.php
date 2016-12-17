<html>
<head>
<style>
	p.dotted
	{
		border-style: dotted solid;
		border-color: red;
	}
</style>
</head>
<body>
<h1>Welcome to PHP Basics</h1>
<p>This page will demonstrate some of basic programming concepts using PHP.
Specifically the following will be covered. 
<ul>
	<li>Declaring variables and types
	<li>Simple math functions
	<li>Using Strings
	<li>While and For Loops
	<li>Arrays
	<li>Functions
</ul>
</p>

<h1>Declaring Variables and Types</h1>
<p>
Variables and declared using the syntax of dollar sign[variable name]. Examples<br/>
<ul>
	<li>$x 
	<li>$myvariablename
	<li>$_varnamewithsymbol
</ul>
</br>
The variable type is determined at runtime through value assignment. Examples<br/>
<ul>
	<li>$x = 1;		[integer]
	<li>$y = "value"	[string]
	<li>$z = True		[boolean]
</ul>
NOTE: that when declaring a string the value must be surrounded by double quotes.  
</p>
<p>

<h1>Simple math functions</h1>
<p>Add two numbers together requires the declaration of two variables of a numerical type (int, float, double)

<br/>
	$a = 13;<br/>
	$b = 13;<br/>
	$c = $a + $b;<br/>
	echo "sum of a + b = ";<br/>
	echo $c;<br/>


<p class="dotted">
Execution of PHP <br/>
<?php

	$a = 13;
	$b = 13;
	$c = $a + $b;
	
	echo "sum of a + b = ";
	echo $c;
?>
</p>

<h1>Using Strings</h1>
<p>Formatting string output<br/>
Step 1 - declare two variables<br/>
	&nbsp;$name = "Testing";<br/>
	&nbsp;$weather = "good";<br/>

<br/>
Step 2 - Create a new value by formatting multiple strings together. <br/>
	&nbsp;$newvalue = "Hello $name. The weather is $weather isn't it?";<br/>

<br/>
<p class="dotted">
Execution of PHP <br/>
<?php
	$name = "Testing";
	$weather = "good";
	$newvalue = "Hello $name. The weather is $weather isn't it?";
	echo $newvalue;
?>
<br/>
</p>
<p>
Notice that declared string variables can be combined with string literals within a single grouping of double quotes. 
</p>


</body>
