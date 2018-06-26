<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Blockly</title>
	<script src="blockly_compressed.js"></script>
	<script src="blocks_compressed.js"></script>
	<script type="text/javascript" src="javascript_compressed.js"></script>
	<script src="msg/js/en.js"></script>
	<script type="text/javascript" src="js-interpreter/acorn_interpreter.js"></script>

	<link rel="stylesheet" type="text/css" href="assets/main.css">
</head>
<body>
	<div id="blocklyArea"></div>
	<div id="js-output">
		<a class="run-js" href="#">Execute Code</a>
		<p></p>
	</div>

	<div id="blocklyDiv"></div>

	<xml id="toolbox">
		<block type="controls_if"></block>
		<block type="logic_compare"></block>
		<block type="controls_repeat_ext"></block>
		<block type="math_number">
			<field name="NUM">123</field>
		</block>
		<block type="math_arithmetic"></block>
		<block type="text"></block>
		<block type="text_print"></block>
	</xml>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="assets/main.js"></script>
</body>
</html>
