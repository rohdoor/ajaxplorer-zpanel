ajaxplorer-zpanel
=================

intergate Ajaxplorer with Zpanel

Version: 1.0

Install AjaxPlorer 4 on Zpanel

First, you need to download ajaxplorer, following the command below:

	cd /etc/zpanel/panel/etc/apps/

	wget http://sourceforge.net/projects/ajaxplorer/files/ajaxplorer/stable-channel/4.2.3/ajaxplorer-core-4.2.3.zip/download

	unzip ajaxplorer-core-4.2.3.zip

	mv ajaxplorer-core-4.2.3.zip ajaxplorer

	mkdir ajaxplorer/data/tmp/sessions

	chmod -R 777 ajaxplorer/data

Edit following file:

File ajaxplorer/conf/bootstrap_plugins.php find and edit:

	"AUTH_DRIVER" => array(
		"NAME" => "ftp",
		"OPTIONS" => array(
		"LOGIN_REDIRECT" => false,
		"REPOSITORY_ID" => "your_id_ftp",
		"ADMIN_USER" => "admin",
		"FTP_LOGIN_SCREEN" => TRUE,
		"AUTOCREATE_AJXPUSER" => true,
		"TRANSMIT_CLEAR_PASS" => true,
		)
	),

File ajaxplorer/conf/boostrap_reponstories.php add

	// FTP
	$REPOSITORIES["your_id_ftp"] = array(
		"DISPLAY" => "Wrk FTP Server",
		"DRIVER" => "ftp",
		"DRIVER_OPTIONS"=> array(
		"FTP_HOST" => "your_ftp_server.com",
		"FTP_PORT" => "21",
		"DEFAULT_RIGHTS" => "rw",
		"USE_SESSION_CREDENTIALS" => true,
		"TMP_UPLOAD" => "AJXP_DATA_PATH/tmp",
		)
	);

Run command:

	export | grep LANG

The output usually says  lang_Country.encoding » (for example en_US.UTF-8)

File bootstrap_conf.php, remove "//" before following line

	define("AJXP_LOCALE", "UTF-8");

	define("AJXP_TMP_DIR", AJXP_DATA_PATH."/tmp");

	$AJXP_INISET["session.save_path"] = AJXP_DATA_PATH."/tmp/sessions";

	$AJXP_INISET["session.cookie_path"] = "/ajaxplorer";

Final step, go to https://github.com/wrk73/ajaxplorer-zpanel

Download Files_manager.zpp then go to Go to admin/module admin

upload and install Files_manager.zpp

Next realse feature:
	- Zip, Unzip on server
	- Integrate with zpanel database and use zpanel login to access ftp
	(contiune)