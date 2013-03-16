<?php

include('../../htmlBasics.class.php');

$htmlBasics = new htmlBasics();
try {
    print($htmlBasics->getHeader('convertFormValues'));
} catch (Exception $e) {
    die('plugin not found!');
}
?>
<form id="mainForm" method="post" action="">
    <select name="selectBox1">
        <option value="">Select an option</option>
        <option value="1">1</option>
        <option value="2" selected="selected">2</option>
        <option value="3">3</option>
    </select>

    <select name="selectBox2">
        <optgroup label="First Group">
            <option>Select an option</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </optgroup>
        <optgroup label="Second Group">
            <option value="3">3</option>
            <option value="4">4</option>
        </optgroup>
    </select>

    <textarea rows="10" cols="2" name="myTextarea">This is a special text</textarea>
</form>

<div class="mainDiv">
    <input type="text" name="inputDiv1" value="A value 1" />
    <input type="text" name="inputDiv2" value="A value 2" />
</div>

<div class="mainDiv">
    <input type="text" name="inputDiv2" value="A value 3" />
    <input type="text" name="inputDiv3" value="A value 4" />
</div>

<script type="text/javascript">
console.log($('#mainForm').convertFormValues());
console.log($('.mainDiv').convertFormValues());
</script>

<?php print($htmlBasics->getFooter());