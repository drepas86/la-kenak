<?php
/* 
jTable 1.5.1
http://www.jtable.org
---------------------------------------------------------------------------
Copyright (C) 2011-2012 by Halil İbrahim Kalkan (http://www.halilibrahimkalkan.com)
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
?>

  <table style="width:99%;margin-right:auto;margin-left:auto;"><tr><td>
	<div id="TableContainer" style="width: 100%;"></div>
	</td></tr></table>
	<script type="text/javascript">
		$(document).ready(function () {
		    //Prepare jTable
			$('#TableContainer').jtable({
				paging: true,
				pageSize: 20,
				sorting: false, 
				defaultSorting: 'Name ASC',
				selecting: false, //Enable selecting
				multiselect: false, //Allow multiple selecting
				selectingCheckboxes: false,
				actions: {
					listAction: 'includes/jtable_actions.php?action=list&table=<?=$ped;?>&dig=<?=$dig;?>',
					createAction: 'includes/jtable_actions.php?action=create&table=<?=$ped;?>&dig=<?=$dig;?>',
					updateAction: 'includes/jtable_actions.php?action=update&table=<?=$ped;?>&dig=<?=$dig;?>',
					deleteAction: 'includes/jtable_actions.php?action=delete&table=<?=$ped;?>&dig=<?=$dig;?>'
				},
				<?=$fields;?>
				});

			$('#TableContainer').jtable('load');

		});
	</script>
