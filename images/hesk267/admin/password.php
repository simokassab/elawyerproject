<?php
/*******************************************************************************
*  Title: Help Desk Software HESK
*  Version: 2.6.7 from 18th April 2016
*  Author: Klemen Stirn
*  Website: http://www.hesk.com
********************************************************************************
*  COPYRIGHT AND TRADEMARK NOTICE
*  Copyright 2005-2016 Klemen Stirn. All Rights Reserved.
*  HESK is a registered trademark of Klemen Stirn.

*  The HESK may be used and modified free of charge by anyone
*  AS LONG AS COPYRIGHT NOTICES AND ALL THE COMMENTS REMAIN INTACT.
*  By using this code you agree to indemnify Klemen Stirn from any
*  liability that might arise from it's use.

*  Selling the code for this program, in part or full, without prior
*  written consent is expressly forbidden.

*  Using this code, in part or full, to create derivate work,
*  new scripts or products is expressly forbidden. Obtain permission
*  before redistributing this software over the Internet or in
*  any other medium. In all cases copyright and header must remain intact.
*  This Copyright is in full effect in any country that has International
*  Trade Agreements with the United States of America or
*  with the European Union.

*  Removing any of the copyright notices without purchasing a license
*  is expressly forbidden. To remove HESK copyright notice you must purchase
*  a license for this script. For more information on how to obtain
*  a license please visit the page below:
*  https://www.hesk.com/buy.php
*******************************************************************************/

define('IN_SCRIPT',1);
define('HESK_PATH','../');

/* Get all the required files and functions */
require(HESK_PATH . 'hesk_settings.inc.php');
require(HESK_PATH . 'inc/common.inc.php');

// Is the password reset function enabled?
if ( ! $hesk_settings['reset_pass'])
{
	die($hesklang['attempt']);
}

// Allow additional 5 attempts in case the user is already blocked
$hesk_settings['attempt_limit'] += 5;

// Start session
hesk_session_start();

if (!isset($_SESSION['a_iserror']))
{
	$_SESSION['a_iserror'] = array();
}

$hesk_error_buffer = array();

// If this is a POST method, check input
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	// Verify security image
	if ($hesk_settings['secimg_use'])
	{
		// Using ReCaptcha?
		if ($hesk_settings['recaptcha_use'] == 1)
		{
			require_once(HESK_PATH . 'inc/recaptcha/recaptchalib.php');

			$resp = recaptcha_check_answer($hesk_settings['recaptcha_private_key'],
			$_SERVER['REMOTE_ADDR'],
			hesk_POST('recaptcha_challenge_field', ''),
			hesk_POST('recaptcha_response_field', '')
            );

			if ($resp->is_valid)
			{
				//$_SESSION['img_a_verified']=true;
			}
			else
			{
				$hesk_error_buffer['mysecnum']=$hesklang['recaptcha_error'];
			}
		}
		// Using ReCaptcha API v2?
		elseif ($hesk_settings['recaptcha_use'] == 2)
		{
			require(HESK_PATH . 'inc/recaptcha/recaptchalib_v2.php');

			$resp = null;
			$reCaptcha = new ReCaptcha($hesk_settings['recaptcha_private_key']);

			// Was there a reCAPTCHA response?
			if ( isset($_POST["g-recaptcha-response"]) )
			{
				$resp = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], hesk_POST("g-recaptcha-response") );
			}

			if ($resp != null && $resp->success)
			{
				//$_SESSION['img_a_verified']=true;
			}
			else
			{
				$hesk_error_buffer['mysecnum']=$hesklang['recaptcha_error'];
			}
		}
		// Using PHP generated image
		else
		{
			$mysecnum = intval( hesk_POST('mysecnum', 0) );

			if ( empty($mysecnum) )
			{
				$hesk_error_buffer['mysecnum'] = $hesklang['sec_miss'];
			}
			else
			{
				require(HESK_PATH . 'inc/secimg.inc.php');
				$sc = new PJ_SecurityImage($hesk_settings['secimg_sum']);
				if ( isset($_SESSION['checksum']) && $sc->checkCode($mysecnum, $_SESSION['checksum']) )
				{
					//$_SESSION['img_a_verified'] = true;
				}
				else
				{
					$hesk_error_buffer['mysecnum'] = $hesklang['sec_wrng'];
				}
			}
		}
	}

	// Connect to database and check for brute force attempts
	hesk_load_database_functions();
	hesk_dbConnect();
	hesk_limitBfAttempts();

	// Get email
	$email = hesk_validateEmail( hesk_POST('email'), 'ERR', 0) or $hesk_error_buffer['email']=$hesklang['enter_valid_email'];

	// Any errors?
	if (count($hesk_error_buffer)!=0)
	{
		$_SESSION['a_iserror'] = array_keys($hesk_error_buffer);

		$tmp = '';
		foreach ($hesk_error_buffer as $error)
		{
			$tmp .= "<li>$error</li>\n";
		}
		$hesk_error_buffer = $tmp;

		$hesk_error_buffer = $hesklang['pcer'].'<br /><br /><ul>'.$hesk_error_buffer.'</ul>';
		hesk_process_messages($hesk_error_buffer,'NOREDIRECT');
	}
	elseif( defined('HESK_DEMO') )
	{
		hesk_process_messages($hesklang['ddemo'],'NOREDIRECT');
	}
	else
	{
		// Get user data from the database
		$res = hesk_dbQuery("SELECT `id`, `name`, `pass` FROM `".hesk_dbEscape($hesk_settings['db_pfix'])."users` WHERE `email` LIKE '".hesk_dbEscape($email)."' LIMIT 1");
		if (hesk_dbNumRows($res) != 1)
		{
			hesk_process_messages($hesklang['noace'],'NOREDIRECT');
		}
		else
		{
			$row = hesk_dbFetchAssoc($res);
			$hash = sha1(microtime() . $_SERVER['REMOTE_ADDR'] . mt_rand() . $row['id'] . $row['name'] . $row['pass']);

			// Insert the verification hash into the database
			hesk_dbQuery("INSERT INTO `".hesk_dbEscape($hesk_settings['db_pfix'])."reset_password` (`user`, `hash`, `ip`) VALUES (".intval($row['id']).", '{$hash}', '".hesk_dbEscape($_SERVER['REMOTE_ADDR'])."') ");

			// Prepare and send email
			require(HESK_PATH . 'inc/email_functions.inc.php');

			// Get the email message
			$msg = hesk_getEmailMessage('reset_password',array(),1,0,1);

			// Replace message special tags
			$msg = str_replace('%%NAME%%',				hesk_msgToPlain($row['name'],1,1),	$msg);
			$msg = str_replace('%%SITE_URL%%',			$hesk_settings['site_url'],			$msg);
			$msg = str_replace('%%SITE_TITLE%%',   		$hesk_settings['site_title'],		$msg);
			$msg = str_replace('%%PASSWORD_RESET%%',	$hesk_settings['hesk_url'].'/'.$hesk_settings['admin_dir'].'/password.php?h='.$hash, $msg);

			// Send email
			hesk_mail($email, $hesklang['reset_password'], $msg);

			// Show success
			hesk_process_messages($hesklang['pemls'],'NOREDIRECT','SUCCESS');
		}
	}
}
// If the "h" parameter is set verify it and reset the password
elseif ( isset($_GET['h']) )
{
	// Get the hash
	$hash = preg_replace('/[^a-zA-Z0-9]/', '', $_GET['h']);

	// Connect to database
	hesk_load_database_functions();
	hesk_dbConnect();

	// Expire verification hashes older than 2 hours
	hesk_dbQuery("DELETE FROM `".hesk_dbEscape($hesk_settings['db_pfix'])."reset_password` WHERE `dt` < (NOW() - INTERVAL 2 HOUR)");

	// Verify the hash exists
	$res = hesk_dbQuery("SELECT `user`, `ip` FROM `".hesk_dbEscape($hesk_settings['db_pfix'])."reset_password` WHERE `hash` = '{$hash}' LIMIT 1");
	if (hesk_dbNumRows($res) != 1)
	{
		// Not a valid hash
		hesk_limitBfAttempts();
		hesk_process_messages($hesklang['ehash'],'NOREDIRECT');
	}
	else
	{
		// Get info from database
		$row = hesk_dbFetchAssoc($res);

		// Only allow resetting password from the same IP address that submitted password reset request
		if ($row['ip'] != $_SERVER['REMOTE_ADDR'])
		{
			hesk_limitBfAttempts();
			hesk_process_messages($hesklang['ehaip'],'NOREDIRECT');
		}
		else
		{
			// Expire all verification hashes for this user
			hesk_dbQuery("DELETE FROM `".hesk_dbEscape($hesk_settings['db_pfix'])."reset_password` WHERE `user`=".intval($row['user']));

			// Load additional required functions
			require(HESK_PATH . 'inc/admin_functions.inc.php');

			// Get user details
			$res = hesk_dbQuery('SELECT * FROM `'.$hesk_settings['db_pfix']."users` WHERE `id`=".intval($row['user'])." LIMIT 1");
			$row = hesk_dbFetchAssoc($res);
			foreach ($row as $k=>$v)
			{
				$_SESSION[$k]=$v;
			}

			// Set a tag that will be used to expire sessions after username or password change
			$_SESSION['session_verify'] = hesk_activeSessionCreateTag($_SESSION['user'], $_SESSION['pass']);

			// We don't need the password hash anymore
			unset($_SESSION['pass']);

			// Clean brute force attempts
			hesk_cleanBfAttempts();

			// Regenerate session ID (security)
			hesk_session_regenerate_id();

			// Get allowed categories
			if (empty($_SESSION['isadmin']))
			{
				$_SESSION['categories']=explode(',',$_SESSION['categories']);
			}

			// Redirect to the profile page
			hesk_process_messages($hesklang['resim'],'profile.php','NOTICE');
			exit();

		} // End IP matches
	}
}

// Tell header to load reCaptcha API if needed
if ($hesk_settings['recaptcha_use'] == 2)
{
	define('RECAPTCHA',1);
}

$hesk_settings['tmp_title'] = $hesk_settings['hesk_title'] . ' - ' .$hesklang['passr'];
require_once(HESK_PATH . 'inc/header.inc.php');
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="3"><img src="../img/headerleftsm.jpg" width="3" height="25" alt="" /></td>
<td class="headersm"><?php echo $hesklang['login']; ?></td>
<td width="3"><img src="../img/headerrightsm.jpg" width="3" height="25" alt="" /></td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td><span class="smaller"><a href="<?php echo $hesk_settings['site_url']; ?>" class="smaller"><?php echo $hesk_settings['site_title']; ?></a> &gt;
<span class="smaller"><a href="index.php" class="smaller"><?php echo $hesklang['admin_login']; ?></a> &gt;
<?php echo $hesklang['passr']; ?></span></td>
</tr>
</table>

</td>
</tr>
<tr>
<td>

<br />

<?php
/* This will handle error, success and notice messages */
hesk_handle_messages();
?>

<br />

<div align="center">
	<table border="0" cellspacing="0" cellpadding="0" width="<?php echo ($hesk_settings['secimg_use']) ? '60' : '50'; ?>% ">
	<tr>
		<td width="7" height="7"><img src="../img/roundcornerslt.jpg" width="7" height="7" alt="" /></td>
		<td class="roundcornerstop"></td>
		<td><img src="../img/roundcornersrt.jpg" width="7" height="7" alt="" /></td>
	</tr>
	<tr>
		<td class="roundcornersleft">&nbsp;</td>
		<td>

        <form action="password.php" method="post" name="form1">

        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="60" style="text-align:center"><img src="../img/login.png" alt="" width="24" height="24" /></td>
                <td>
                <p><b><?php echo $hesklang['passr']; ?></a></b></p>
                </td>
        </tr>
        <tr>
                <td width="60">&nbsp;</td>
                <td>&nbsp;</td>
        </tr>
        <tr>
                <td width="60">&nbsp;</td>
                <td><?php echo $hesklang['passe']; ?>:<br /><input type="text" name="email" size="35" value="<?php if (isset($email)) {echo stripslashes(hesk_input($email));} ?>" <?php echo in_array('email',$_SESSION['a_iserror']) ? ' class="isError" ' : ''; ?> /></td>
        </tr>
		<?php
		if ($hesk_settings['secimg_use'])
	    {
			?>
			<tr>
				<td width="60">&nbsp;</td>
				<td>
                <hr />
				<?php
				// Should we use Recaptcha?
				if ($hesk_settings['recaptcha_use'] == 1)
				{
					?>
					<script type="text/javascript">
					var RecaptchaOptions = {
					theme : '<?php echo ( isset($_SESSION['a_iserror']) && in_array('mysecnum',$_SESSION['a_iserror']) ) ? 'red' : 'white'; ?>',
					custom_translations : {
						visual_challenge : "<?php echo hesk_slashJS($hesklang['visual_challenge']); ?>",
						audio_challenge : "<?php echo hesk_slashJS($hesklang['audio_challenge']); ?>",
						refresh_btn : "<?php echo hesk_slashJS($hesklang['refresh_btn']); ?>",
						instructions_visual : "<?php echo hesk_slashJS($hesklang['instructions_visual']); ?>",
						instructions_context : "<?php echo hesk_slashJS($hesklang['instructions_context']); ?>",
						instructions_audio : "<?php echo hesk_slashJS($hesklang['instructions_audio']); ?>",
						help_btn : "<?php echo hesk_slashJS($hesklang['help_btn']); ?>",
						play_again : "<?php echo hesk_slashJS($hesklang['play_again']); ?>",
						cant_hear_this : "<?php echo hesk_slashJS($hesklang['cant_hear_this']); ?>",
						incorrect_try_again : "<?php echo hesk_slashJS($hesklang['incorrect_try_again']); ?>",
						image_alt_text : "<?php echo hesk_slashJS($hesklang['image_alt_text']); ?>",
					},
					};
					</script>
					<?php
					require_once(HESK_PATH . 'inc/recaptcha/recaptchalib.php');
					echo recaptcha_get_html($hesk_settings['recaptcha_public_key'], null, true);
				}
				// Use reCaptcha API v2?
				elseif ($hesk_settings['recaptcha_use'] == 2)
				{
					?>
					<div class="g-recaptcha" data-sitekey="<?php echo $hesk_settings['recaptcha_public_key']; ?>"></div>
					<?php
				}
				// At least use some basic PHP generated image (better than nothing)
				else
				{
					$cls = in_array('mysecnum',$_SESSION['a_iserror']) ? ' class="isError" ' : '';

					echo $hesklang['sec_enter'].'<br />&nbsp;<br /><img src="'.HESK_PATH.'print_sec_img.php?'.rand(10000,99999).'" width="150" height="40" alt="'.$hesklang['sec_img'].'" title="'.$hesklang['sec_img'].'" border="1" name="secimg" style="vertical-align:text-bottom" /> '.
					'<a href="javascript:void(0)" onclick="javascript:document.form1.secimg.src=\''.HESK_PATH.'print_sec_img.php?\'+ ( Math.floor((90000)*Math.random()) + 10000);"><img src="'.HESK_PATH.'img/reload.png" height="24" width="24" alt="'.$hesklang['reload'].'" title="'.$hesklang['reload'].'" border="0" style="vertical-align:text-bottom" /></a>'.
					'<br />&nbsp;<br /><input type="text" name="mysecnum" size="20" maxlength="5" '.$cls.' />';
				}
                ?>
                <hr />
				</td>
			</tr>
            <?php
		}
		?>
        <tr>
                <td width="60">&nbsp;</td>
                <td>&nbsp;</td>
        </tr>
        <tr>
                <td width="60">&nbsp;</td>
				<td><input type="submit" value="<?php echo $hesklang['passs']; ?>" class="orangebutton" onmouseover="hesk_btn(this,'orangebuttonover');" onmouseout="hesk_btn(this,'orangebutton');" />
                <br />&nbsp;
				</td>
        </tr>
        </table>

        </form>

		</td>
		<td class="roundcornersright">&nbsp;</td>
	</tr>
	<tr>
		<td><img src="../img/roundcornerslb.jpg" width="7" height="7" alt="" /></td>
		<td class="roundcornersbottom"></td>
		<td width="7" height="7"><img src="../img/roundcornersrb.jpg" width="7" height="7" alt="" /></td>
	</tr>
	</table>
</div>

<p>&nbsp;</p>

<?php
// Clean session errors
hesk_cleanSessionVars('a_iserror');
hesk_cleanSessionVars('img_a_verified');

// Print footer
require_once(HESK_PATH . 'inc/footer.inc.php');
?>
