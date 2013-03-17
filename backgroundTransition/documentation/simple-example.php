<?php

include('../../htmlBasics.class.php');

$htmlBasics = new htmlBasics();

echo $htmlBasics->getHeader('backgroundTransition');

?>
<p>Hello world!</p>
    <div id="specialDiv">My special div where everything happens!</div>
    <input type="button" id="clickMe" value="Click me!" />
    <script type="text/javascript">
$('#clickMe').click(function(){
	$('#specialDiv').backgroundTransition({repeat:3});
});
    </script>