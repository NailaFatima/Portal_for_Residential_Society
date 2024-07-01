<?php
	define("LOCAL",1);
	if(LOCAL==1)
	{
  define("SITE_URL", "http://localhost/aht/");
  define("IMAGE_URL", "http://localhost/aht/admin/images/");
  define("SERVER", "localhost");
  define("DB_USER", "root");
  define("PASSWORD", "");
  define("DB_NAME", "aht_db");
}
else
{
	define("SITE_URL", "www.test.com");
  define("IMAGE_URL", "http://www.test.com/mystore/Images/");
  define("SERVER", "localhost");
  define("DB_USER", "root");
  define("PASSWORD", "");
  define("DB_NAME", "batch11_db");
}
?>