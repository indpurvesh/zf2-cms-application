<?php
$command = "create";

function copyTemplate($directory, $module){
	$moduleLower = strtolower($module);
	$currentDirectory = dir($directory);

	while ($entry = $currentDirectory->read()) {
		if ($entry != "." && $entry != "..") {
			$newEntry = str_replace("template", $moduleLower, $directory . '/' . $entry);
			$newEntry = str_replace("Template", $module, $newEntry);

                        //var_dump(is_dir($directory."/".$entry));die;
			if (is_dir($directory."/".$entry)) {

				system("mkdir {$newEntry} -p");
				copyTemplate($directory."/".$entry, $module);
			}
			else {
                           
                           
                                
                                //echo (str_replace("Template", $module,$directory));die;
				//mkdir((str_replace("Template", $module,$directory)),"0777");
				$template = file_get_contents($directory . "/" . $entry);
				$template = str_replace('{$module}', $module, $template);
				$template = str_replace('{$moduleLower}', $moduleLower, $template);
				file_put_contents($newEntry, $template);
			}
		}
	}

	$currentDirectory->close();
}

switch ($command) {
	case "create":
		$type = "module";

		switch ($type) {

			case "module":

				$module = "Admin";
				copyTemplate(__DIR__ . '/module/Template', $module);
				if ( isset($argv[4]) && $argv[4] == 'with_tests' ) {
					copyTemplate(__DIR__ . '/tests/module/Template', $module);

				}
		}
		break;
}