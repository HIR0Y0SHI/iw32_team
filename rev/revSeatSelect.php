<?php
/**
 * 座席・予約処理。
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/13
 */
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/entity/Seat.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/entity/SeatDetail.class.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/dao/SeatDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/Functions.php');