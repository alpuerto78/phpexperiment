<?php

	require('../include/bootstrap.php');

	execute_query('tblemployees', $_POST, 'create', null, null, 'ajax');

?>