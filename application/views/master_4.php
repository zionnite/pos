<?php
$site_name      =$this->Admin_db->get_site_name();
$site_logo      =$this->Admin_db->get_site_logo();
// $this->uri->segment(1)

?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $site_name;?> | <?php echo $title;?></title>
	<meta name="viewport" content="width=device-width" />
	<link rel="icon" href="<?php echo $site_logo;?>" type="image/x-icon">
	<style type="text/css">
		@media only screen and (max-width: 550px),
		screen and (max-device-width: 550px) {
			body[yahoo] .buttonwrapper {
				background-color: transparent !important;
			}

			body[yahoo] .button {
				padding: 0 !important;
			}

			body[yahoo] .button a {
				background-color: #9b59b6;
				padding: 15px 25px !important;
			}
		}

		@media only screen and (min-device-width: 601px) {
			.content {
				width: 600px !important;
			}

			.col387 {
				width: 387px !important;
			}
		}

	</style>
</head>

<body bgcolor="#34495E" style="margin: 0; padding: 0;" yahoo="fix">
	<!--[if (gte mso 9)|(IE)]>
        <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td>
        <![endif]-->
	<table align="center" border="0" cellpadding="0" cellspacing="0"
		style="border-collapse: collapse; width: 100%; max-width: 600px;" class="content">
		
		<tr>
			<td align="center" bgcolor="#0073AA "
				style="padding: 20px 20px 20px 20px; color: #ffffff; font-family: Arial, sans-serif; font-size: 36px; font-weight: bold;">
				<img src="<?php echo $site_logo;?>" alt="<?php echo $site_name;?>" width="152" height="152" style="display:block;" />
			</td>
		</tr>
		<tr>
			<td align="center" bgcolor="#ffffff"
				style="padding: 75px 20px 40px 20px; color: #555555; font-family: Arial, sans-serif; font-size: 20px; line-height: 30px; border-bottom: 1px solid #f6f6f6;">
				<b><?php echo $title;?></b><br />
				<?php echo $message;?>
			</td>
		</tr>
		
		
	</table>
	<!--[if (gte mso 9)|(IE)]>
                </td>
            </tr>
        </table>
        <![endif]-->
</body>

</html>
