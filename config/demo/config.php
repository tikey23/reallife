<?PHP

$DB = [
	"hostname" => "sql367.your-server.de",
	"username" => "reallih_1",
	"password" => "LVWQbYS9eWvzHTZw",
	"database" => "reallih_db1",
	"port" => 3306,
];

$adminPwd = password_hash("admin", PASSWORD_DEFAULT);
$leaderPwd = password_hash("leader", PASSWORD_DEFAULT);
$helperPwd = password_hash("helper", PASSWORD_DEFAULT);
$zodyPwd = password_hash("reallife", PASSWORD_DEFAULT);

$additionalTitle = "(Demo)";

$Email = [
	"host" => "smtp.mailtrap.io",
	"port" => 2525,
	"username" => "0afb01c22b87eb",
	"password" => "175cfdf6334a3e",
	"fromAddress" => "info@mailtrap.io",
	"fromName" => "Mailtrap",
	"replyAddress" => "info@mailtrap.io",
	"replyName" => "Mailtrap",
	"address" => "recipient1@mailtrap.io",
	"adressName" => "Zody"	
];

?>