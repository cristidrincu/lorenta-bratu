<?  
	require_once("classes/class.ocrcaptcha.php");
	$captcha = new ocr_captcha();
	
    if(isset($_POST['submitBtn']) && $_POST['submitBtn']=="Trimite") {   
		require_once("classes/auxiliary.php");
		require_once("classes/class.htmlMimeMail.php");
	  
		$contactErrorMessage = "";    
		if($captcha->check_captcha($_POST['public_key'],$_POST['private_key']))	 { 
				$contactErrorMessage = checkContactForm($_POST); 
				if($contactErrorMessage=="") {
					$name          = $_POST['name'];
					$company       = $_POST['company'];
					$address       = $_POST['address'];
					$phone         = $_POST['phone'];
					$email         = $_POST['email'];
					$message       = $_POST['message'];
					
					$htmlText="";
					$htmlText .=   '<table align="center" width="99%" style="font-weight:bold;" border="1">';
					$htmlText .=   '<tr style="font-weight:bold">';
					$htmlText .=   '    <td colspan="2">Cerere Contact</td>';
					$htmlText .=   '</tr>';
					$htmlText .=   '<tr>';
					$htmlText .=   '    <td width="200">Nume:&nbsp;</td>';
					$htmlText .=   '    <td>'.$name.'</td>';
					$htmlText .=   '</tr>';
					$htmlText .=   '<tr>';
					$htmlText .=   '    <td width="200">Compania:&nbsp;</td>';
					$htmlText .=   '    <td>'.$company.'</td>';
					$htmlText .=   '</tr>';
					$htmlText .=   '<tr>';
					$htmlText .=   '    <td width="200">Adresa:&nbsp;</td>';
					$htmlText .=   '    <td>'.$address.'</td>';
					$htmlText .=   '</tr>';
					$htmlText .=   '<tr>';
					$htmlText .=   '    <td width="200">Telefon:&nbsp;</td>';
					$htmlText .=   '    <td>'.$phone.'</td>';
					$htmlText .=   '</tr>';
					$htmlText .=   '<tr>';                                        
					$htmlText .=   '    <td>Email:&nbsp;</td>';
					$htmlText .=   '    <td>'.$email.'</td>';
					$htmlText .=   '</tr>';
					$htmlText .=   '<tr>';
					$htmlText .=   '    <td>Mesaj:&nbsp;</td>';
					$htmlText .=   '    <td>'.nl2br($message).'</td>';
					$htmlText .=   '</tr>';
					$htmlText .=   '</table>';
					
					$text  =   'Cerere Contact\r\n';
					$text .=   'Nume:'.$name.'\r\n';
					$text .=   'Company:'.$company.'\r\n';
					$text .=   'Adresa:'.$adresa.'\r\n';
					$text .=   'Telefon:'.$phone.'\r\n';
					$text .=   'Email:'.$email.'\r\n';
					$text .=   'Mesaj:'.nl2br($message).'\r\n';
		
					$to="office@bratu-pfa.ro; lorenta.bratu@gmail.com";                                                            
					#$to = "office@globe-studios.com";
					$from = "vizitator@bratu-pfa.ro";
					$subject = "Cerere Contact";    
					$html = "<HTML><HEAD></HEAD><BODY>".$htmlText."</BODY></HTML>";
		
					$mail=new htmlMimeMail();
					$mail->setHtml($htmlText, $text);
					$mail->setReturnPath($to);
					$mail->setFrom($from);
					$mail->setSubject($subject);
					$mail->setHeader("X-Mailer","bratu-pfa.ro");
					$mail->setHeader("X-Priority","1");
					$mail->setHeader("X-Sender","<www.bratu-pfa.ro>");
					
					$result = @$mail->send(array($to));
					
					unset($name);
					unset($message);
					unset($email);
					unset($company);
					
					if (!$result){
						  $contactErrorMessage .= "Eroarea in cadrul operatiunii de trimitere a mesajului. Va rugam reveniti mai tarziu. Va multumim!";	  
					}
					else {
						  $contactErrorMessage .= "Mesajul dumneavoastra a fost trimis. Va multumim!";	  
					}  
				} 
		} else {  // else captcha
			$contactErrorMessage .= "Codul din imagine nu corespunde cu cel introdus de dumneavoastra";		
		}
    }                                                           
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bratu PFA - Contact</title>
<link rel="stylesheet" type="text/css" href="css/bl.css" media="screen"/>
<!--[if lt IE 7]>

        <script type="text/javascript" src="js/unitpngfix.js"></script>

<![endif]-->
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>
<div class="mainBoxParent">
  <div class="topBarChooseLanguage">
    <!--<div class="wrapperLanguageSelector">

            	<a href="" target="_self">

                	this site is also available in <strong>italian</strong>

                </a>

            </div>-->
  </div>
  <!--ends topBarChooseLanguage-->
  <div class="containerGradientFlash">
    <div class="flashContainer">
      <script type="text/javascript">

AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','960','height','305','src','swf/banner_logo_hand','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','wmode','transparent','movie','swf/banner_logo_hand' ); //end AC code

</script>
      <noscript>
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="960" height="305">
        <param name="movie" value="swf/banner_logo_hand.swf" />
        <param name="quality" value="high" />
        <param name="wmode" value="transparent" />
        <embed src="swf/banner_logo_hand.swf" width="960" height="305" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" wmode="transparent"></embed>
      </object>
      </noscript>
    </div>
    <!--ends flashContainer-->
  </div>
  <!--ends containerGradientFlash-->
  <div class="containerMenu">
    <div class="wrapperMainMenu">
      <script type="text/javascript">

AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','960','height','58','src','swf/contact','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','swf/contact' ); //end AC code

</script>
      <noscript>
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="960" height="58">
        <param name="movie" value="swf/contact.swf" />
        <param name="quality" value="high" />
        <embed src="swf/contact.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="960" height="58"></embed>
      </object>
      </noscript>
    </div>
    <!--ends wrapperMainMenu-->
  </div>
  <!--ends containerMenu-->
  <div class="containerBackgroundDew">
    <div class="mainBoxSiteContent">
      <div class="wrapperParentServicii">
        <div class="topParentServicii"></div>
        <div class="middleParentServicii">
          <div class="containerGreenTextServicii">
            <div class="containerParentContact">
              <div class="containerFormularContact">
                <form name="contactForm" method="post" action="contact.php">
                  <?
				  	if(isset($contactErrorMessage)) :
                  ?>	
                  <div class="containerFormField">
                    <p style="text-align: center"><strong>
                      <?
					  		echo $contactErrorMessage;
					  ?>
                      </strong>
                    </p>
                  </div>
                  <?
				  	endif;
                  ?>
                  
                  <div class="containerFormField">
                    <p>Nume si prenume*:
                      <input type="text" id="inputFieldForm" name="name" value="<?=(isset($name) ? $name : '')?>"/>
                    </p>
                  </div>                  
                  <!--ends containerFormField-->
                  <div class="containerFormField">
                    <p>Compania:
                      <input type="text" id="inputFieldForm" name="company" value="<?=(isset($company) ? $company : '')?>"/>
                    </p>
                  </div>
                  <!--ends containerFormField-->
                  <div class="containerFormField">
                    <p>Adresa:
                      <input type="text" id="inputFieldForm" name="address" value="<?=(isset($address) ? $address : '')?>"/>
                    </p>
                  </div>
                  <!--ends containerFormField-->
                  <div class="containerFormField">
                    <p>Telefon:
                      <input type="text" id="inputFieldForm" name="phone" value="<?=(isset($phone) ? $phone : '')?>"/>
                    </p>
                  </div>
                  <!--ends containerFormField-->
                  <div class="containerFormField">
                    <p>Adresa e-mail*:
                      <input type="text" id="inputFieldForm" name="email" value="<?=(isset($email) ? $email : '')?>"/>
                    </p>
                  </div>
                  <!--ends containerFormField-->
                  <div class="containerFormMesaj">
                    <p>Mesajul Dumneavoastra*: </p>
                    <textarea name="message" id="textAreaForm" cols="" rows=""><?=(isset($message) ? $message : '')?></textarea>
                  </div>
                  <div class="containerFormField">
                    <p>
                        <table cellpadding="0" cellspacing="2" border="0" width="300" align="right">
                            <tr>
                                <td colspan="2" align="center">
                                    <a href="formular_contact_sudotim.php">
                                        <strong>Daca nu vedeti imaginea de mai jos dati click aici</strong>
                                    </a>
                                    <br/>
                                    <span class="greenText">
                                    	<strong>Va rugam introduceti codul din imagine</strong>
                                    </span>
                                    <br/>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2" valign="middle">
                                    <?
                                        echo $captcha->display_captcha(true);
                                                            
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                        </table>                      
                    </p>
                  </div>
                  
                  <div class="containerSubmitBtn">
                    <input type="submit" id="submitBtn" name="submitBtn" value="Trimite"/>
                  </div>
                  <br class="clearFloats"/>
                </form>
              </div>
              <!--ends containerFormularContact-->
              <div class="headerContact">
                <h3> Contact </h3>
                <p> 300495 Timisoara <br/>
                  Str. Calea Sagului Nr.54</p>
                <p>Tel/Fax: + 40 356 80 10 56 <br/>
                  Mobil:    + 40 766 29 60 32 <br/>
                  e-mail:lorenta.bratu@gmail.com </p>
              </div>
              <!--ends headerContact-->
              <br class="clearFloats"/>
            </div>
            <!--ends containerParentContact-->
          </div>
          <!--ends containerGreenTextServicii-->
        </div>
        <!--ends middleParentServicii-->
        <div class="bottomParentServicii"></div>
      </div>
      <!--ends wrapperParentServicii-->
      <div class="containerFooter">
        <div class="wrapperMainMenuFooter">
          <ul>
            <li class="noBorderLi"> <a href="index.html" target="_self">acasa</a> </li>
            <li> <a href="despre_noi.html" target="_self">despre noi</a> </li>
            <li> <a href="servicii.html" target="_self">servicii</a> </li>
            <li> <a href="portofoliu.html" target="_self">portofoliu</a> </li>
            <li> <a href="contact.php" target="_self">contact</a> </li>
          </ul>
          <p> copyright 2008 LB. Toate drepturile rezervate </p>
          
           <a href="http://www.globe-studios.com" target="_blank"><img src="images/pic_developed_by/developed_by.png" alt="Globe Studios" border="0" width="200" height="44"/></a>
          
        </div>
        <!--ends wrapperMainMenuFooter-->
      </div>
      <!--ends containerFooter-->
    </div>
    <!--ends mainBoxSiteContent-->
  </div>
  <!--ends containerBackgroundDew-->
</div>
<!--ends mainBoxParent-->
</body>
</html>
