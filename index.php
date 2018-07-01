<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Blockly</title>
	<script src="vendor/appengine/storage.js"></script>
	<script src="vendor/blockly_compressed.js"></script>
	<script src="vendor/blocks_compressed.js"></script>
	<script type="text/javascript" src="vendor/javascript_compressed.js"></script>
	<script src="vendor/msg/js/en.js"></script>
	<script type="text/javascript" src="vendor/js-interpreter/acorn_interpreter.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Passion+One|Prosto+One" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/main.css">
</head>
<body>
	<div class="top-matter">
		<h1>Welcome to Blockly!</h1>
		<p>Drag and drop blocks from the left into the white workspace. Blocks can be connected together by matching the shapes of the jigsaw edges; if something will snap into place, it will be highlighted in yellow.</p>
		<p>Click / Tap on <span class="button-label">Execute</span> to run the code that you generated. <span class="button-label">Clear</span> will clear the output window.</p>
	</div>
	<div id="blocklyArea"></div>
	<div id="js-output">
		<pre class="code"></pre>
		<a class="run-js" href="#">Execute</a><a class="clear-console" href="#">Clear</a>
		<pre class="console"></pre>
	</div>
	<!-- End of HTML. JS-Driven Blockly elements start here -->
	<div id="blocklyDiv" style="position: absolute;"></div>
	<!--<script type="text/xmldata" src="assets/toolbox.xml"></script>-->
	<xml xmlns="http://www.w3.org/1999/xhtml" id="toolbox" style="display: none;">
		<category name="Logic" colour="#5C81A6">
			<block type="controls_if"></block>
			<block type="logic_compare">
				<field name="OP">EQ</field>
			</block>
			<block type="logic_operation">
				<field name="OP">AND</field>
			</block>
			<block type="logic_negate"></block>
			<block type="logic_boolean">
				<field name="BOOL">TRUE</field>
			</block>
			<block type="logic_null"></block>
			<block type="logic_ternary"></block>
		</category>
		<category name="Loops" colour="#5CA65C">
			<block type="controls_repeat_ext">
				<value name="TIMES">
					<shadow type="math_number">
						<field name="NUM">10</field>
					</shadow>
				</value>
			</block>
			<block type="controls_whileUntil">
				<field name="MODE">WHILE</field>
			</block>
			<block type="controls_for">
				<field name="VAR" id=")`4/fAV+7lpoY:2!P;c)" variabletype="">i</field>
				<value name="FROM">
					<shadow type="math_number">
						<field name="NUM">1</field>
					</shadow>
				</value>
				<value name="TO">
					<shadow type="math_number">
						<field name="NUM">10</field>
					</shadow>
				</value>
				<value name="BY">
					<shadow type="math_number">
						<field name="NUM">1</field>
					</shadow>
				</value>
			</block>
			<block type="controls_forEach">
				<field name="VAR" id="{O1zjVtl=MV.{?KMn,f2" variabletype="">j</field>
			</block>
			<block type="controls_flow_statements">
				<field name="FLOW">BREAK</field>
			</block>
		</category>
		<sep></sep>
		<category name="Math" colour="#5C68A6">
			<block type="math_number">
				<field name="NUM">0</field>
			</block>
			<block type="math_arithmetic">
				<field name="OP">ADD</field>
				<value name="A">
					<shadow type="math_number">
						<field name="NUM">1</field>
					</shadow>
				</value>
				<value name="B">
					<shadow type="math_number">
						<field name="NUM">1</field>
					</shadow>
				</value>
			</block>
			<block type="math_single">
				<field name="OP">ROOT</field>
				<value name="NUM">
					<shadow type="math_number">
						<field name="NUM">9</field>
					</shadow>
				</value>
			</block>
			<block type="math_trig">
				<field name="OP">SIN</field>
				<value name="NUM">
					<shadow type="math_number">
						<field name="NUM">45</field>
					</shadow>
				</value>
			</block>
			<block type="math_constant">
				<field name="CONSTANT">PI</field>
			</block>
			<block type="math_number_property">
				<mutation divisor_input="false"></mutation>
				<field name="PROPERTY">EVEN</field>
				<value name="NUMBER_TO_CHECK">
					<shadow type="math_number">
						<field name="NUM">0</field>
					</shadow>
				</value>
			</block>
			<block type="math_round">
				<field name="OP">ROUND</field>
				<value name="NUM">
					<shadow type="math_number">
						<field name="NUM">3.1</field>
					</shadow>
				</value>
			</block>
			<block type="math_on_list">
				<mutation op="SUM"></mutation>
				<field name="OP">SUM</field>
			</block>
			<block type="math_modulo">
				<value name="DIVIDEND">
					<shadow type="math_number">
						<field name="NUM">64</field>
					</shadow>
				</value>
				<value name="DIVISOR">
					<shadow type="math_number">
						<field name="NUM">10</field>
					</shadow>
				</value>
			</block>
			<block type="math_constrain">
				<value name="VALUE">
					<shadow type="math_number">
						<field name="NUM">50</field>
					</shadow>
				</value>
				<value name="LOW">
					<shadow type="math_number">
						<field name="NUM">1</field>
					</shadow>
				</value>
				<value name="HIGH">
					<shadow type="math_number">
						<field name="NUM">100</field>
					</shadow>
				</value>
			</block>
			<block type="math_random_int">
				<value name="FROM">
					<shadow type="math_number">
						<field name="NUM">1</field>
					</shadow>
				</value>
				<value name="TO">
					<shadow type="math_number">
						<field name="NUM">100</field>
					</shadow>
				</value>
			</block>
			<block type="math_random_float"></block>
		</category>
		<category name="Text" colour="#5CA68D">
			<block type="text">
				<field name="TEXT"></field>
			</block>
			<block type="text_join">
				<mutation items="2"></mutation>
			</block>
			<block type="text_append">
				<field name="VAR" id="Z]Edna+d/[pXc_IBuN=v" variabletype="">item</field>
				<value name="TEXT">
					<shadow type="text">
						<field name="TEXT"></field>
					</shadow>
				</value>
			</block>
			<block type="text_length">
				<value name="VALUE">
					<shadow type="text">
						<field name="TEXT">abc</field>
					</shadow>
				</value>
			</block>
			<block type="text_isEmpty">
				<value name="VALUE">
					<shadow type="text">
						<field name="TEXT"></field>
					</shadow>
				</value>
			</block>
			<block type="text_indexOf">
				<field name="END">FIRST</field>
				<value name="VALUE">
					<block type="variables_get">
						<field name="VAR" id="{zhc*md.OjHxO2iL*5aM" variabletype="">text</field>
					</block>
				</value>
				<value name="FIND">
					<shadow type="text">
						<field name="TEXT">abc</field>
					</shadow>
				</value>
			</block>
			<block type="text_charAt">
				<mutation at="true"></mutation>
				<field name="WHERE">FROM_START</field>
				<value name="VALUE">
					<block type="variables_get">
						<field name="VAR" id="{zhc*md.OjHxO2iL*5aM" variabletype="">text</field>
					</block>
				</value>
			</block>
			<block type="text_getSubstring">
				<mutation at1="true" at2="true"></mutation>
				<field name="WHERE1">FROM_START</field>
				<field name="WHERE2">FROM_START</field>
				<value name="STRING">
					<block type="variables_get">
						<field name="VAR" id="{zhc*md.OjHxO2iL*5aM" variabletype="">text</field>
					</block>
				</value>
			</block>
			<block type="text_changeCase">
				<field name="CASE">UPPERCASE</field>
				<value name="TEXT">
					<shadow type="text">
						<field name="TEXT">abc</field>
					</shadow>
				</value>
			</block>
			<block type="text_trim">
				<field name="MODE">BOTH</field>
				<value name="TEXT">
					<shadow type="text">
						<field name="TEXT">abc</field>
					</shadow>
				</value>
			</block>
			<block type="text_print">
				<value name="TEXT">
					<shadow type="text">
						<field name="TEXT">abc</field>
					</shadow>
				</value>
			</block>
			<block type="text_prompt_ext">
				<mutation type="TEXT"></mutation>
				<field name="TYPE">TEXT</field>
				<value name="TEXT">
					<shadow type="text">
						<field name="TEXT">abc</field>
					</shadow>
				</value>
			</block>
		</category>
		<category name="Lists" colour="#745CA6">
			<block type="lists_create_with">
				<mutation items="0"></mutation>
			</block>
			<block type="lists_create_with">
				<mutation items="3"></mutation>
			</block>
			<block type="lists_repeat">
				<value name="NUM">
					<shadow type="math_number">
						<field name="NUM">5</field>
					</shadow>
				</value>
			</block>
			<block type="lists_length"></block>
			<block type="lists_isEmpty"></block>
			<block type="lists_indexOf">
				<field name="END">FIRST</field>
				<value name="VALUE">
					<block type="variables_get">
						<field name="VAR" id="z7j?yFmms3rTeyKSUMbo" variabletype="">list</field>
					</block>
				</value>
			</block>
			<block type="lists_getIndex">
				<mutation statement="false" at="true"></mutation>
				<field name="MODE">GET</field>
				<field name="WHERE">FROM_START</field>
				<value name="VALUE">
					<block type="variables_get">
						<field name="VAR" id="z7j?yFmms3rTeyKSUMbo" variabletype="">list</field>
					</block>
				</value>
			</block>
			<block type="lists_setIndex">
				<mutation at="true"></mutation>
				<field name="MODE">SET</field>
				<field name="WHERE">FROM_START</field>
				<value name="LIST">
					<block type="variables_get">
						<field name="VAR" id="z7j?yFmms3rTeyKSUMbo" variabletype="">list</field>
					</block>
				</value>
			</block>
			<block type="lists_getSublist">
				<mutation at1="true" at2="true"></mutation>
				<field name="WHERE1">FROM_START</field>
				<field name="WHERE2">FROM_START</field>
				<value name="LIST">
					<block type="variables_get">
						<field name="VAR" id="z7j?yFmms3rTeyKSUMbo" variabletype="">list</field>
					</block>
				</value>
			</block>
			<block type="lists_split">
				<mutation mode="SPLIT"></mutation>
				<field name="MODE">SPLIT</field>
				<value name="DELIM">
					<shadow type="text">
						<field name="TEXT">,</field>
					</shadow>
				</value>
			</block>
			<block type="lists_sort">
				<field name="TYPE">NUMERIC</field>
				<field name="DIRECTION">1</field>
			</block>
		</category>
		<category name="Colour" colour="#A6745C">
			<block type="colour_picker">
				<field name="COLOUR">#ff0000</field>
			</block>
			<block type="colour_random"></block>
			<block type="colour_rgb">
				<value name="RED">
					<shadow type="math_number">
						<field name="NUM">100</field>
					</shadow>
				</value>
				<value name="GREEN">
					<shadow type="math_number">
						<field name="NUM">50</field>
					</shadow>
				</value>
				<value name="BLUE">
					<shadow type="math_number">
						<field name="NUM">0</field>
					</shadow>
				</value>
			</block>
			<block type="colour_blend">
				<value name="COLOUR1">
					<shadow type="colour_picker">
						<field name="COLOUR">#ff0000</field>
					</shadow>
				</value>
				<value name="COLOUR2">
					<shadow type="colour_picker">
						<field name="COLOUR">#3333ff</field>
					</shadow>
				</value>
				<value name="RATIO">
					<shadow type="math_number">
						<field name="NUM">0.5</field>
					</shadow>
				</value>
			</block>
		</category>
		<sep></sep>
		<category name="Variables" colour="#A65C81" custom="VARIABLE"></category>
		<category name="Functions" colour="#9A5CA6" custom="PROCEDURE"></category>
	</xml>
	<!--<script type="text/xmldata" src="assets/workspace.xml"></script>-->
	<xml xmlns="http://www.w3.org/1999/xhtml" id="workspaceBlocks" style="display:none"></xml>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="assets/main.js"></script>
</body>
</html>
