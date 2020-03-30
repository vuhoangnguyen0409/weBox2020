<!DOCTYPE html>
<!--
Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or http://ckeditor.com/license
-->
<html>
<head>
	<meta charset="utf-8">
	<title>Replace Textarea by Code &mdash; CKEditor Sample</title>
	<script src="../ckeditor.js"></script>
	<link href="sample.css" rel="stylesheet">
</head>
<body>
	<h1 class="samples">
		<a href="index.html">CKEditor Samples</a> &raquo; Replace Textarea Elements Using JavaScript Code
	</h1>
	<form action="sample_posteddata.php" method="post">
		<div class="description">
			<p>
				This editor is using an <code>&lt;iframe&gt;</code> element-based editing area, provided by the <strong>Wysiwygarea</strong> plugin.
			</p>
<pre class="samples">
CKEDITOR.replace( '<em>textarea_id</em>' )
</pre>
		</div>
		<textarea cols="80" id="editor1" name="editor1" rows="10">
			&lt;h1&gt;&lt;img alt=&quot;Saturn V carrying Apollo 11&quot; class=&quot;right&quot; src=&quot;assets/sample.jpg&quot;/&gt; Apollo 11&lt;/h1&gt; &lt;p&gt;&lt;b&gt;Apollo 11&lt;/b&gt; was the spaceflight that landed the first humans, Americans &lt;a href=&quot;http://en.wikipedia.org/wiki/Neil_Armstrong&quot; title=&quot;Neil Armstrong&quot;&gt;Neil Armstrong&lt;/a&gt; and &lt;a href=&quot;http://en.wikipedia.org/wiki/Buzz_Aldrin&quot