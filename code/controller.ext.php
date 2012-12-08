<?php
 
class module_controller {

	static function getModuleDesc() {
		$message = ui_language::translate(ui_module::GetModuleDescription());
        return $message;
    }
	
	static function getModuleName() {
		$module_name = ui_language::translate(ui_module::GetModuleName());
        return $module_name;
    }

	static function getModuleIcon() {
		global $controller;
		$module_icon = "modules/" . $controller->GetControllerRequest('URL', 'module') . "/assets/icon.png";
        return $module_icon;
    }
	
}

?>
