<?php // $Id: insert_cloze.php,v 1.4 2011/03/10

 require("../../../../../../../config.php");


    $id = optional_param('id', SITEID, PARAM_INT);

    require_course_login($id);
    @header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="../../tiny_mce_popup.js?v={tinymce_version}"></script>
	<script type="text/javascript" src="js/dialog.js?v={tinymce_version}"></script>
	<script type="text/javascript" src="js/encode.js"></script>
  <script type="text/javascript" src="js/parse.js"></script>
  <script type="text/javascript" src="js/parseHelper.js"></script>
  <script type="text/javascript" src="js/parseAnswer.js"></script>
  <script type="text/javascript" src="js/parseFeedback.js"></script>
  <script type="text/javascript" src="js/parsePercentage.js"></script>
  <script type="text/javascript" src="js/parseThrottle.js"></script>

  <link rel="stylesheet" type="text/css" href="dialog.css">
</head>
<body onload="Init(); ">

<form name="Formular">
  <fieldset >
    <legend class="title">CLOZE</legend>
    <label for="quiz_type"></label>
    <select name="quizType" onchange="toggleThrottle(); " >
            <option value="SHORTANSWER"><?php echo get_string('shortanswer', 'quiz'); ?></option>
            <option value="SHORTANSWER_C"><?php echo get_string('shortanswer', 'quiz')." (".get_string('casesensitive', 'quiz').")"; ?></option>
            <option value="MULTICHOICE" ><?php echo get_string('layoutselectinline', 'qtype_multianswer'); ?></option>
            <option value="MULTICHOICE_V"><?php echo get_string('layoutvertical', 'qtype_multianswer'); ?></option>
            <option value="MULTICHOICE_H"><?php echo get_string('layouthorizontal', 'qtype_multianswer'); ?></option>
            <option value="NUMERICAL"><?php echo get_string('numerical', 'quiz'); ?></option>
  </select>
  <br />
<label for="weighting"><?php echo get_string('defaultgrade', 'quiz'); ?></label>
  <input size=4 type="text" name="weighting" style="margin-top: 8px; margin-bottom: 4px; " />
  <br />
  
  <table id="main_table">
    <tbody>
      <tr>
        <td class="table_value"></td>
        <td class="table_value"><?php echo get_string('answer', 'moodle'); ?></td>
        <td class="table_value_throttle"><?php echo get_string('tolerance', 'qtype_calculated'); ?></td>
        <td class="table_value"><?php echo get_string('correct', 'quiz'); ?></td>
        <td class="table_value"><?php echo get_string('percentcorrect', 'quiz'); ?></td>
        <td class="table_value"><?php echo get_string('feedback', 'qtype_multichoice'); ?></td>
      </tr>
    </tbody>
  </table>  
  
  <input type="button" name="addline"    value="<?php echo get_string('addfields', 'form', 1); ?>" onclick="addRow('main_table');" style="margin-top: 5px; " />
  <br />
   <input type="text" name="output" style="display: none; width: 456px; margin-top: 8px; " />
    
</form>

<form onsubmit="clozeeditorDialog.insert();return false;" action="#">

	<div class="mceActionPanel">
		<input type="button" id="insert" name="insert" value="{#insert}" onclick="clozeeditorDialog.insert();" />
		<input type="button" id="cancel" name="cancel" value="{#cancel}" onclick="tinyMCEPopup.close();" />
	</div>
</form>

</body>
</html>
