 <?php 

	require_once("_inc.php");
	require_once("_code_public.php");
	
	if(!isset($_POST['csrf']) || empty($_POST['csrf']) || !is_string($_POST["csrf"]) || $_POST['csrf']!= $_SESSION['CSRF']){
		location_href('./');
	}
	
	$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
	$recaptcha_secret = '6LfWWcoZAAAAAHFInlbsZC0TuQRTQ3balPhl8Ork';
	$recaptcha_response = $_POST['recaptcha_response'];

	//Make and decode POST request:
	$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
	$recaptcha = json_decode($recaptcha);
	$score = 0;
	//如果驗證成功，就進一步計算使用者分數，官方回饋分數為 0-1，分數愈接近 1 就是正常，低於 0.5 以下就有可能是機器人了
	if($recaptcha->success==true){
	   $score = $recaptcha->score;
	}

	if($score < 0.5){
		ECHO "<script language=\"javascript\">" ;
		ECHO "alert('您已被判定為機器人，請重新填寫表單');";
		ECHO "location.href='contact.php';";
		ECHO "</script>";
		exit;
	}
	$recaptcha = $res->success;
	
	// if (strLen($_POST["name"]) == 0)
	// {$MSG .= "【姓名】空白\\n";}
	
	// if (strLen($_POST["tel"]) == 0)
	// {$MSG .= "【電話】空白\\n";}
	
	// if (!CheckMail($_POST["email"]))
	// {$MSG .= "【信箱】空白或格式錯誤\\n";}
	
	// if (strLen($_POST["description"]) == 0)
	// {$MSG .= "【留言】空白\\n";}
	
	if (empty($_POST["name"]) || !is_string($_POST["name"]))
	{$MSG .= "【姓名】空白\\n";}
	
	if (empty($_POST["sex"]) || !is_string($_POST["sex"]))
	{$MSG .= "【性別】空白\\n";}

	if (empty($_POST["tel"]) || !is_string($_POST["tel"]))
	{$MSG .= "【聯絡電話】空白\\n";}
	
	if (empty($_POST["description"]) || !is_string($_POST["description"]))
	{$MSG .= "【問題描述】空白\\n";}
	 
	if ( $MSG == "" ){
		
		$mail_subject = $m_title."-國都｜聯絡我們";

		//複選欄位的變數宣告
		// if(! empty($_POST["interest"])){
		// 	$interest = implode(' ； ',$_POST["interest"]);
		// }

		//郵件內容
		$BODY = "<html><head>";
		$BODY .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
		$BODY .= "</head><style type=\"text/css\">";
		$BODY .= ".font1 { font-size: 15px; color: #333333; font-weight: bold;}";
		$BODY .= "</style><body bgcolor=\"#FFFFFF\">";
		$BODY .= "<p>&nbsp;&nbsp;</p><div >";
		$BODY .= "<center>";
		$BODY .= "<table width=\"70%\" border=\"1\" cellspacing=\"0\" cellpadding=\"5\" style=\"border-collapse: collapse\" bordercolor=\"#C6C6C6\" align=\"center\">";
		$BODY .= "<tr><td colspan=\"2\" bgcolor=\"#1488DE\" align=\"center\">";
		$BODY .= "<font color=\"#ffffff\" font size=\"5\"  font-weight: bold ><b>".$mail_subject."</b></font></td>";
		$BODY .= "</tr>";
		
		$BODY .= "</tr><tr>";
		$BODY .= "<td class=\"font1\" width=\"30%\">姓名</td>";
		$BODY .= "<td>".$_POST["name"]."</td>";

		$BODY .= "</tr><tr>";
		$BODY .= "<td class=\"font1\" width=\"30%\">性別</td>";
		$BODY .= "<td>".$_POST["sex"]."</td>";
	
		$BODY .= "</tr><tr>";
		$BODY .= "<td class=\"font1\">連絡電話</td>";
		$BODY .= "<td>".$_POST["tel"]."</td>";

		$BODY .= "</tr><tr>";
		$BODY .= "<td class=\"font1\">車主車號</td>";
		$BODY .= "<td>".$_POST["car"]."</td>";	
	
		$BODY .= "</tr><tr>";
		$BODY .= "<td class=\"font1\">E-mail</td>";
		$BODY .= "<td>".$_POST["mail"]."</td>";
	
		$BODY .= "</tr><tr>";
		$BODY .= "<td class=\"font1\">問題描述</td>";
		$BODY .= "<td>".nl2br($_POST["description"])."</td></tr>";
	
		$BODY .= "</table></center></div></body></html>";
		
		// $m_from_mail = $_POST["mail"];
			
		/*echo "m_title=".$m_title."<br>";
		echo "mail_subject=".$mail_subject."<br>";
		echo "m_from_mail=".$m_from_mail."<br>";
		echo "m_to_mail=".$m_to_mail."<br>";
		echo "BODY=".$BODY."<br>";
		exit;*/

		//$m_to_mail = "";
		SendMail($m_title, $m_to_mail, $m_title, $m_from_mail, $mail_subject, $BODY);//(收件者,收件信箱,寄件者,寄件信箱,主旨,內文)
		
		echo "<script language=\"javascript\">" ;
		echo "alert('謝謝您的來信，我們將儘速為您服務。');" ;
		echo "location.href='index.php';" ;
		echo "</script>" ;
		exit() ;
	
	} else {
		echo "<script language=\"javascript\">" ;
		echo "alert('發生錯誤，請填寫下列欄位\\n".$MSG."');";
		echo "location.href='javascript:history.back()';";
		echo "</script>";
	}
	?>