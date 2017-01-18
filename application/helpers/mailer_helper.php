<?php

	if(!function_exists('send_mailer')) {
		function send_mailer($to = false, $subject = false, $message = false) {
			$content = array(
				'to' => $to,
				'from' => 'งานบริหารกองทุน สำนักงานปลัดกระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์',
				'subject' => $subject,
				'message' => $message
			);

			//-- smtp Nbtc
			$connect = array(
				'host'=>'ssl://smtp.googlemail.com',
				'port'=>'465',
				'user'=>'Kpi.msociety@gmail.com',
				'pass'=>'kpimsociety'
			);
			
			// Main codes
			// require_once("media/PHPMailer_v5.1/class.phpmailer.php");
			// $mail = new PHPMailer();
			// $mail->IsSMTP();
			// $mail->SMTPDebug = 1;
			// $mail->IsHTML(true); //หากส่งในรูปแบบ html ถ้าส่งเป็น text ก็ลบบรรทัดนี้ออกได้
			// $mail->CharSet = "utf-8"; //กำหนด charset ของภาษาในเมล์ให้ถูกต้อง เช่น tis-620 หรือ utf-8
// 			
			// $mail->Host = $connect['host']; // SMTP server
			// $mail->Port = $connect['port'];
			// $mail->SMTPAuth = "true";###
			// $mail->SMTPSecure = 'ssl';###
			// $mail->IsHTML(true);
			// $mail->Username = $connect['user']; // ชื่อ emil ที่ท่านใช้ login ควรสร้าง email user แยกต่างหากเพื่อใช้ส่งเมล์จากเว็บโดยเฉพาะเพื่อให้ตรวจสอบได้ง่าย
			// $mail->Password = $connect['pass']; // รหัสผ่านของ email ที่ระบุด้านบน
// 			
			// $mail->From = $connect['user']; // ผู้รับจะเห็นอีเมล์นี้เป็น ผู้ส่งเมล์
			// $mail->FromName = $content['from']; // ผู้รับจะเห็นชื่อนี้เป็น ชื่อผู้ส่ง
			// $mail->AddAddress($content['to']);
			// $mail->Subject = $content['subject'];
			// $mail->Body = $content['message'];
// 			
			// if($mail->Send()) {
				// return true;
			// } else {
				// return false;
			// }
			
			// ###### PHPMailer #### 
		    require_once("media/PHPMailer_v5.1/class.phpmailer.php"); // ประกาศใช้ class phpmailer กรุณาตรวจสอบ ว่าประกาศถูก path
		    $mail = new PHPMailer();
		    $mail->IsSMTP();
		    $mail->Host = 'ssl://smtp.googlemail.com';
		    $mail->Port = 465;
		    $mail->Username = 'line2me.info@gmail.com';
		    $mail->Password = 'Des@gn9;';
		    $mail->SMTPAuth = true;
		    $mail->CharSet = "utf-8";
		    $mail->From = $connect['user']; //  account e-mail ของเราที่ใช้ในการส่งอีเมล
		    $mail->FromName = $content['from'];
		    $mail->IsHTML(true);                            // ถ้า E-mail นี้ มีข้อความในการส่งเป็น tag html ต้องแก้ไข เป็น true
		    $mail->Subject = $content['subject'];            // หัวข้อที่จะส่ง
		    $mail->Body = $content['message'];           // ข้อความ ที่จะส่ง
		    $mail->SMTPDebug = 1;
		    $mail->do_debug = 0;
		    $mail->AddAddress($content['to']);                      // Email ปลายทางที่เราต้องการส่ง
		    $mail->send();
		    $mail->ClearAddresses();
		    // if (!$mail->send())
		    // {                                                                            
		        // echo "Mailer Error: " . $mail->ErrorInfo;
		        // exit;                        
		    // }
    
    
		}
	}
		
?>