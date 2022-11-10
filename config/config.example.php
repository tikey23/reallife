<?PHP

$DB = [
	"hostname" => "",
	"username" => "",
	"password" => "",
	"database" => "reallife",
	"port" => 3306,
];

$adminPwd = password_hash("", PASSWORD_DEFAULT);
$leaderPwd = password_hash("", PASSWORD_DEFAULT);
$helperPwd = password_hash("", PASSWORD_DEFAULT);
$zodyPwd = password_hash("", PASSWORD_DEFAULT);

$Email = [
	"host" => "",
	"port" => "",
	"username" => "",
	"password" => "",
	"fromAddress" => "",
	"fromName" => "",
	"replyAddress" => "",
	"replyName" => "",
	"address" => "",
	"adressName" => ""	
];