<?php
/**
 * 入力情報チェック
 *
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/21
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/Functions.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/Seat.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/SeatDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/Price.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/PriceDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/SpecialDay.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/SpecialDayDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/SeatDetail.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/CreditCard.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/CreditCardDAO.class.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/Member.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/MemberDAO.class.php');


@session_start();

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'] . "/IW32_Team_Project/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'] . "/IW32_Team_Project/templates_c");

/* ログインチェック */
if (loginCheck()) {
	$validationMsgs[] = "ログインしていないか、前回ログインしてから一定時間が経過しています。もう一度ログインし直してください。";
	$smarty->assign("validationMsgs", $validationMsgs);
	$tplPath = "login.tpl";
	$smarty->display($tplPath);
} else {

	$tplPath = "rev/revConfirmation.tpl";
	
	//スケジュールIDの取得
	$schedule_id = $_SESSION["schedule_id"];
	
	//メンバーIDの取得
	$login_id = $_SESSION["login_id"];
	
	//選択済み座席情報の取得
	$seat_position_list = $_SESSION["seat_position_list"];
	$smarty->assign("seat_position_list", $seat_position_list);
	
	$seat_detail = $_SESSION["seat_detail"];
	
	/***************
	 * 入力情報のバリデーションチェック
	 **************/
	
	$input_date = array();
	
	//名前
	if (!empty($_POST["last_name"])){
		$input_date["last_name"] = $_POST["last_name"];	
	} else {
		$validationMsgs[] = "姓（漢字）が入力されていません。";
	}
	
	if (!empty($_POST["first_name"])){
		$input_date["first_name"] = $_POST["first_name"];	
	} else {
		$validationMsgs[] = "名（漢字）が入力されていません。";
	}
	
	if (!empty($_POST["last_name_kana"])){
		$input_date["last_name_kana"] = $_POST["last_name_kana"];	
	} else {
		$validationMsgs[] = "セイ（カナ）が入力されていません。";
	}
	
	if (!empty($_POST["first_name_kana"])){
		$input_date["first_name_kana"] = $_POST["first_name_kana"];
	} else {
		$validationMsgs[] = "メイ（カナ）が入力されていません。";
	}
	
	//tel
	if (empty($_POST["n_tel"])){
		$tel = format_phone_number($_POST["tel"]);
		$input_date["tel"] = $tel;
	} else {
		if (!ctype_digit($_POST["n_tel"])){
			$validationMsgs[] = "'電話番号'は半角数字で入力してください。";		
		} else if (strlen($_POST["n_tel"] < 9)) {
			$validationMsgs[] = "'電話番号'は10文字以上で入力してください。";
		} else {
			$input_date["tel"] = $tel;
		}
	}
	
	//mail
	if (empty($_POST["n_mail"])){
		$input_date["mail"] = $_POST["mail"];
	} else {
		if (empty($_POST["n_mail_check"])){
			$validationMsgs[] = "確認用メールアドレスを入力してください。";		
		} else if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST["n_mail"])) {
			$validationMsgs[] = "正しい形式でメールアドレスを入力してください。";
		} else if ($_POST["n_mail"] == $_POST["n_mail_check"]){
			$input_date["mail"] = $_POST["n_mail"];
		} else {
			$validationMsgs[] = "入力されたメールアドレスと確認用メールアドレスが一致しません。";
		}
	}
	
	//cc
	if (empty($_POST["n_cc"]) && empty($_POST["n_cc_name"]) && empty($_POST["n_cc_month"]) && empty($_POST["n_cc_year"]) && empty($_POST["n_cc_security_code"])){
		$ccno = wordwrap($_POST["cc"], 4, "-", true);
		$input_date["cc"] = $ccno;
	} else {
		$ccflg = true;
		
		if(!ctype_digit($_POST["n_cc"])) {
			$validationMsgs[] = "クレジットカード番号は半角数字で入力してください。";		
			$ccflg = false;
		} else if (strlen($_POST["n_cc"]) != 16) {
			$validationMsgs[] = "クレジットカード番号は必ず16桁で入力してください。";
			$ccflg = false;
		} else {
			$new_ccno = wordwrap($_POST["n_cc"], 4, "-", true);
		}
		
		if (empty($_POST["n_cc_name"])) {
			$validationMsgs[] = "クレジットカード名義を入力してください。";		
			$ccflg = false;
		}
		if (empty($_POST["n_cc_month"])) {
			$validationMsgs[] = "有効期限（月）を選択してください。";
			$ccflg = false;
		}
		if (empty($_POST["n_cc_year"])) {
			$validationMsgs[] = "有効期限（年）を選択してください。";
			$ccflg = false;		
		}
		if (empty($_POST["n_cc_security_code"])) {
			$validationMsgs[] = "セキュリティコードを入力してください。";
			$ccflg = false;
		} else if (strlen($_POST["n_cc_security_code"]) != 3) {
			$validationMsgs[] = "セキュリティコードは必ず3桁で入力してください。";
			$ccflg = false;
		}
		
		if ($ccflg) {
			$input_date["n_cc"] = $new_ccno;
			$input_date["n_cc_name"] = $_POST["n_cc_name"];
			$input_date["n_cc_month"] = $_POST["n_cc_month"];
			$input_date["n_cc_year"] = $_POST["n_cc_year"];
			$input_date["n_cc_security_code"] = $_POST["n_cc_security_code"];
		}
	
	}
	
	
	
	if (empty($validationMsgs)) {
		try {
			$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
			$memberDAO = new MemberDAO($db);
			$seatDAO = new SeatDAO($db);
			$creditcardDAO = new CreditCardDAO($db);
			
			//映画情報取得
			$seat_detail = $seatDAO->findFromMovieDetail($schedule_id);
			$smarty->assign("seat_detail", $seat_detail);
			
			//メンバー情報取得
			$member = $memberDAO->findByLoginid($login_id);
			$smarty->assign("member", $member);
			
			//予約座席情報
			$ticket_select_list = $_SESSION["ticket_select_list"];
			$smarty->assign("ticket_select_list",$ticket_select_list);

			//チケット価格
			$total_price = $_SESSION["total_price"];
			$smarty->assign("total_price" , $total_price);
			
			//クレジットカード番号を取得
			$ccno = $creditcardDAO->findByCreditCardNo($_SESSION["member_id"]);
//			if(is_null($ccno)) {
//				print ("かーど未登録");
//			} else {
				$smarty->assign("ccno" , $ccno);
//			}

			$_SESSION["input_date"] = $input_date;
			$smarty->assign("input_date",$input_date);
		} catch (PDOException $ex) {
			print_r($ex);
			$smarty->assign("errorMsg", "接続障害が発生しました。再度お試しください。");
			$tplPath = "error.tpl";
		} finally {
			$db = null;
		}
	}
	
	
	if(!empty($validationMsgs)) {
		$tplPath = "rev/revInput.tpl";
		$smarty->assign("validationMsgs" , $validationMsgs);	
		
		$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
		$seatDAO = new SeatDAO($db);
		$priceDAO = new PriceDAO($db);
		$memberDAO = new MemberDAO($db);
		$specialdayDAO = new SpecialDayDAO($db);
		$creditcardDAO = new CreditCardDAO($db);

		//映画情報取得
		$seat_detail = $seatDAO->findFromMovieDetail($schedule_id);
		$smarty->assign("seat_detail", $seat_detail);
		
		//メンバー情報取得
		$member = $memberDAO->findByLoginid($login_id);
		$smarty->assign("member", $member);
		
		//チケット価格
		$total_price = $_SESSION["total_price"];
		$smarty->assign("total_price" , $total_price);
	
		//予約座席情報
		$ticket_select_list = $_SESSION["ticket_select_list"];
		$smarty->assign("ticket_select_list",$ticket_select_list);
			
		//クレジットカード番号を取得
		$ccno = $creditcardDAO->findByCreditCardNo($_SESSION["member_id"]);
		$smarty->assign("ccno" , $ccno);

		//チケット券種取得
		//特別日 = true ,　特別日以外 false 
		if(empty($_SESSION["ladiesdayflg"])){
			$ticket_price_list = $priceDAO->findAllNotSpecialDay();
		} else {
			$ticket_price_list = $priceDAO->findAll();
		}

		$_SESSION["ticket_price_list"] = $ticket_price_list;
		$smarty->assign("ticket_price_list", $ticket_price_list);
	}
	
	//チケット価格取得
	$ticket_price_list = $_SESSION["ticket_price_list"];
	$smarty->assign("ticket_price_list", $ticket_price_list);
	
	//映画情報取得
	$smarty->assign("seat_detail", $seat_detail);
	$smarty->display($tplPath);
}


/*telの-入れのための関数*/
function format_phone_number($input, $strict = false) {
    $groups = array(
        5 => 
        array (
            '01564' => 1,
            '01558' => 1,
            '01586' => 1,
            '01587' => 1,
            '01634' => 1,
            '01632' => 1,
            '01547' => 1,
            '05769' => 1,
            '04992' => 1,
            '04994' => 1,
            '01456' => 1,
            '01457' => 1,
            '01466' => 1,
            '01635' => 1,
            '09496' => 1,
            '08477' => 1,
            '08512' => 1,
            '08396' => 1,
            '08388' => 1,
            '08387' => 1,
            '08514' => 1,
            '07468' => 1,
            '01655' => 1,
            '01648' => 1,
            '01656' => 1,
            '01658' => 1,
            '05979' => 1,
            '04996' => 1,
            '01654' => 1,
            '01372' => 1,
            '01374' => 1,
            '09969' => 1,
            '09802' => 1,
            '09912' => 1,
            '09913' => 1,
            '01398' => 1,
            '01377' => 1,
            '01267' => 1,
            '04998' => 1,
            '01397' => 1,
            '01392' => 1,
        ),
        4 => 
        array (
            '0768' => 2,
            '0770' => 2,
            '0772' => 2,
            '0774' => 2,
            '0773' => 2,
            '0767' => 2,
            '0771' => 2,
            '0765' => 2,
            '0748' => 2,
            '0747' => 2,
            '0746' => 2,
            '0826' => 2,
            '0749' => 2,
            '0776' => 2,
            '0763' => 2,
            '0761' => 2,
            '0766' => 2,
            '0778' => 2,
            '0824' => 2,
            '0797' => 2,
            '0796' => 2,
            '0555' => 2,
            '0823' => 2,
            '0798' => 2,
            '0554' => 2,
            '0820' => 2,
            '0795' => 2,
            '0556' => 2,
            '0791' => 2,
            '0790' => 2,
            '0779' => 2,
            '0558' => 2,
            '0745' => 2,
            '0794' => 2,
            '0557' => 2,
            '0799' => 2,
            '0738' => 2,
            '0567' => 2,
            '0568' => 2,
            '0585' => 2,
            '0586' => 2,
            '0566' => 2,
            '0564' => 2,
            '0565' => 2,
            '0587' => 2,
            '0584' => 2,
            '0581' => 2,
            '0572' => 2,
            '0574' => 2,
            '0573' => 2,
            '0575' => 2,
            '0576' => 2,
            '0578' => 2,
            '0577' => 2,
            '0569' => 2,
            '0594' => 2,
            '0827' => 2,
            '0736' => 2,
            '0735' => 2,
            '0725' => 2,
            '0737' => 2,
            '0739' => 2,
            '0743' => 2,
            '0742' => 2,
            '0740' => 2,
            '0721' => 2,
            '0599' => 2,
            '0561' => 2,
            '0562' => 2,
            '0563' => 2,
            '0595' => 2,
            '0596' => 2,
            '0598' => 2,
            '0597' => 2,
            '0744' => 2,
            '0852' => 2,
            '0956' => 2,
            '0955' => 2,
            '0954' => 2,
            '0952' => 2,
            '0957' => 2,
            '0959' => 2,
            '0966' => 2,
            '0965' => 2,
            '0964' => 2,
            '0950' => 2,
            '0949' => 2,
            '0942' => 2,
            '0940' => 2,
            '0930' => 2,
            '0943' => 2,
            '0944' => 2,
            '0948' => 2,
            '0947' => 2,
            '0946' => 2,
            '0967' => 2,
            '0968' => 2,
            '0987' => 2,
            '0986' => 2,
            '0985' => 2,
            '0984' => 2,
            '0993' => 2,
            '0994' => 2,
            '0997' => 2,
            '0996' => 2,
            '0995' => 2,
            '0983' => 2,
            '0982' => 2,
            '0973' => 2,
            '0972' => 2,
            '0969' => 2,
            '0974' => 2,
            '0977' => 2,
            '0980' => 2,
            '0979' => 2,
            '0978' => 2,
            '0920' => 2,
            '0898' => 2,
            '0855' => 2,
            '0854' => 2,
            '0853' => 2,
            '0553' => 2,
            '0856' => 2,
            '0857' => 2,
            '0863' => 2,
            '0859' => 2,
            '0858' => 2,
            '0848' => 2,
            '0847' => 2,
            '0835' => 2,
            '0834' => 2,
            '0833' => 2,
            '0836' => 2,
            '0837' => 2,
            '0846' => 2,
            '0845' => 2,
            '0838' => 2,
            '0865' => 2,
            '0866' => 2,
            '0892' => 2,
            '0889' => 2,
            '0887' => 2,
            '0893' => 2,
            '0894' => 2,
            '0897' => 2,
            '0896' => 2,
            '0895' => 2,
            '0885' => 2,
            '0884' => 2,
            '0869' => 2,
            '0868' => 2,
            '0867' => 2,
            '0875' => 2,
            '0877' => 2,
            '0883' => 2,
            '0880' => 2,
            '0879' => 2,
            '0829' => 2,
            '0550' => 2,
            '0228' => 2,
            '0226' => 2,
            '0225' => 2,
            '0224' => 2,
            '0229' => 2,
            '0233' => 2,
            '0237' => 2,
            '0235' => 2,
            '0234' => 2,
            '0223' => 2,
            '0220' => 2,
            '0192' => 2,
            '0191' => 2,
            '0187' => 2,
            '0193' => 2,
            '0194' => 2,
            '0198' => 2,
            '0197' => 2,
            '0195' => 2,
            '0238' => 2,
            '0240' => 2,
            '0260' => 2,
            '0259' => 2,
            '0258' => 2,
            '0257' => 2,
            '0261' => 2,
            '0263' => 2,
            '0266' => 2,
            '0265' => 2,
            '0264' => 2,
            '0256' => 2,
            '0255' => 2,
            '0243' => 2,
            '0242' => 2,
            '0241' => 2,
            '0244' => 2,
            '0246' => 2,
            '0254' => 2,
            '0248' => 2,
            '0247' => 2,
            '0186' => 2,
            '0185' => 2,
            '0144' => 2,
            '0143' => 2,
            '0142' => 2,
            '0139' => 2,
            '0145' => 2,
            '0146' => 2,
            '0154' => 2,
            '0153' => 2,
            '0152' => 2,
            '0138' => 2,
            '0137' => 2,
            '0125' => 2,
            '0124' => 2,
            '0123' => 2,
            '0126' => 2,
            '0133' => 2,
            '0136' => 2,
            '0135' => 2,
            '0134' => 2,
            '0155' => 2,
            '0156' => 2,
            '0176' => 2,
            '0175' => 2,
            '0174' => 2,
            '0178' => 2,
            '0179' => 2,
            '0184' => 2,
            '0183' => 2,
            '0182' => 2,
            '0173' => 2,
            '0172' => 2,
            '0162' => 2,
            '0158' => 2,
            '0157' => 2,
            '0163' => 2,
            '0164' => 2,
            '0167' => 2,
            '0166' => 2,
            '0165' => 2,
            '0267' => 2,
            '0250' => 2,
            '0533' => 2,
            '0422' => 2,
            '0532' => 2,
            '0531' => 2,
            '0436' => 2,
            '0428' => 2,
            '0536' => 2,
            '0299' => 2,
            '0294' => 2,
            '0293' => 2,
            '0475' => 2,
            '0295' => 2,
            '0297' => 2,
            '0296' => 2,
            '0495' => 2,
            '0438' => 2,
            '0466' => 2,
            '0465' => 2,
            '0467' => 2,
            '0478' => 2,
            '0476' => 2,
            '0470' => 2,
            '0463' => 2,
            '0479' => 2,
            '0493' => 2,
            '0494' => 2,
            '0439' => 2,
            '0268' => 2,
            '0480' => 2,
            '0460' => 2,
            '0538' => 2,
            '0537' => 2,
            '0539' => 2,
            '0279' => 2,
            '0548' => 2,
            '0280' => 2,
            '0282' => 2,
            '0278' => 2,
            '0277' => 2,
            '0269' => 2,
            '0270' => 2,
            '0274' => 2,
            '0276' => 2,
            '0283' => 2,
            '0551' => 2,
            '0289' => 2,
            '0287' => 2,
            '0547' => 2,
            '0288' => 2,
            '0544' => 2,
            '0545' => 2,
            '0284' => 2,
            '0291' => 2,
            '0285' => 2,
            '0120' => 3,
            '0570' => 3,
            '0800' => 3,
            '0990' => 3,
        ),
        3 => 
        array (
            '099' => 3,
            '054' => 3,
            '058' => 3,
            '098' => 3,
            '095' => 3,
            '097' => 3,
            '052' => 3,
            '053' => 3,
            '011' => 3,
            '096' => 3,
            '049' => 3,
            '015' => 3,
            '048' => 3,
            '072' => 3,
            '084' => 3,
            '028' => 3,
            '024' => 3,
            '076' => 3,
            '023' => 3,
            '047' => 3,
            '029' => 3,
            '075' => 3,
            '025' => 3,
            '055' => 3,
            '026' => 3,
            '079' => 3,
            '082' => 3,
            '027' => 3,
            '078' => 3,
            '077' => 3,
            '083' => 3,
            '022' => 3,
            '086' => 3,
            '089' => 3,
            '045' => 3,
            '044' => 3,
            '092' => 3,
            '046' => 3,
            '017' => 3,
            '093' => 3,
            '059' => 3,
            '073' => 3,
            '019' => 3,
            '087' => 3,
            '042' => 3,
            '018' => 3,
            '043' => 3,
            '088' => 3,
            '050' => 4,
        ),
        2 => 
        array (
            '04' => 4,
            '03' => 4,
            '06' => 4,
        ),
    );
    $groups[3] += 
        $strict ?
        array(
            '020' => 3,
            '070' => 3,
            '080' => 3,
            '090' => 3,
        ) :
        array(
            '020' => 4,
            '070' => 4,
            '080' => 4,
            '090' => 4,
        )
    ;
    $number = preg_replace('/[^\d]++/', '', $input);
    foreach ($groups as $len => $group) {
        $area = substr($number, 0, $len);
        if (isset($group[$area])) {
            $formatted = implode('-', array(
                $area,
                substr($number, $len, $group[$area]),
                substr($number, $len + $group[$area])
            ));
            return strrchr($formatted, '-') !== '-' ? $formatted : $input;
        }
    }
    $pattern = '/\A(00(?:[013-8]|2\d|91[02-9])\d)(\d++)\z/';
    if (preg_match($pattern, $number, $matches)) {
        return $matches[1] . '-' . $matches[2];
    }
    return $input;
}

?>