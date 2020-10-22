<?php
/** ***********************
 * 一般基本系統設定 (variables)
 * @param array $sys ,
 ************************** */

$sys = array();

/** ***********************
 * 論文系統的所屬單位名稱。如：國立中山大學
 ************************** */
$sys['institution'] = '國立中山大學';

/** ***********************
 * Archives ID. 如中山大學的網路名稱英文縮寫 NSYSU
 ************************** */
$sys['archives_id'] = 'NSYSU';

/** ***********************
 * Server's Domain Name 網域名稱。
 ************************** */
$sys['server_name'] = 'etd.lis.nsysu.edu.tw';

/** ***********************
 * 品保資料的主要存放目錄
 ************************** */
$sys['system_root'] = '/home/etd-qa';

/** ***********************
 * available 目錄的儲存名稱，用於儲存已審核後的論文PDF檔之用
 ************************** */
$sys['available_dir'] = 'available';

/** ***********************
 * submitted 目錄的儲存名稱，用於儲存上傳繳交等待審核的論文PDF檔之用
 ************************** */
$sys['submitted_dir'] = 'submitted';

/** ***********************
 * Master web directory in your system.
 ************************** */
$sys['web_root'] = "/theses-qa";

/** ***********************
 * ETD's Web CGI 目錄名稱
 ************************** */
$sys['cgi_root'] = "/ETD-qa";

/** ***********************
 * 紀錄檔的存檔位置及名稱
 ************************** */
$sys['logfile'] = "/var/www/html/ETD-qa/log/ETD-qa-log";

/**
 * 校內 IP 位置設定，將影響到 ETD-search/getfile & ETD-search-c/getfile
 * 中的權限判斷，每組 IP 間請以一個英文逗點來隔開。
 * 有多組 IP 範圍設定範例： $allow_ip_address = "11.22.33.,44,55,66."
 */
$allow_ip_address = "140.117.";

