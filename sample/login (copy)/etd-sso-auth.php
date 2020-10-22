<?php
/** ***********************
 * sso 認證設定 (function)
 * @param string $role , 身分 / 角色
 * eall , 包含退休的全校人員(師職工)認證
 * all , 全校人員(師生職工)認證
 * emp , 師生職工認證
 * stu , 學生認證
 * @param string $account , 帳戶名稱(職工編號 / 學號)
 * @param string $password , 密碼
 **************************
 * @return array|string ,
 */
function sso_auth($role, $account, $password) {
    /**
     * 建立 soap 連線
     * @param string $wsdl , WSDL 定義檔
     */
    $wsdl = 'http://sso5.nsysu.edu.tw/ssoWebservice/wsso.wsdl';
    $client = new SoapClient($wsdl, array('login' =>'admin', 'password' => '123456'));

    /**
     * sso 認證
     * @param boolean $auth , sso 認證
     * @param string $getAttr , 讀取「使用者」資訊。
     * @param string $Attribute , 屬性與欄位資訊。
     */
    $auth = null;
    $getAttr = null;
    $attribute = 'EMPNO;NAME;IDNO;PKIND;GRPNO;UNICOD1;DPT_DESC1;UNICOD2;DPT_DESC2;LEAVE;TITCOD;TITLE;EMAIL;POFTEL;DEG_COD';

    switch ($role) {
        /**
         * 包含退休的全校人員(師職工)認證使用者帳號與密碼的函式。
         */
        case 'eall': {
            /**
             * 功能：包含退休的全校人員(師職工)認證使用者帳號與密碼的函式。
             * 說明：如果帳號密碼正確則傳回Boolean-True，否則傳回Boolean-False。
             * 參數：
             * @param string $userName , 使用者帳號。
             * @param string $password , 使用者密碼(一律與md5加密密碼比對)。
             * @param string $enc_md5 , 密碼加密設定(‘ENC’要加密，’’不加密)。
             * @param string $leave , 設定人員就職狀況例如取就職狀況N(正常)及R(退休)，則設定值為’N;R’，以分號隔開，只與教職員工有關，對學生無作用。
             */
            $auth = $client->authUser3($account, $password, 'ENC', 'N;R;Y');
            /*var_dump($auth);*/

            if ($auth) {
                /**
                 * 功能：包含退休的全校人員(師職工)取得使用者相關資訊。
                 * 說明：如果帳號密碼正確則傳回所欲取得的屬性，否則傳回空字串。
                 * 參數：
                 * @param string $userName , 使用者帳號。
                 * @param string $password , 使用者密碼(一律與md5加密密碼比對)。
                 * @param string $enc_md5 , 密碼加密設定(‘ENC’要加密，’’不加密)。
                 * @param string $leave , 設定人員就職狀況例如取就職狀況N(正常)及R(退休)，則設定值為’N;R’，以分號隔開，只與教職員工有關，對學生無作用。
                 * @param string $attr , 欲回傳的屬性，字串以分號隔開，全部英文大寫。
                 * ('EMPNO;NAME;IDNO;PKIND;GRPNO;UNICOD1;DPT_DESC1;UNICOD2;DPT_DESC2;LEAVE;TITCOD;TITLE;EMAIL;POFTEL')
                 * (員工編號;姓名;身分證號;屬性;群組代號;一級單位代號; 一級單位名稱;二級單位代號;二級單位名稱;是否離職;職稱編號;職稱名稱;電子信箱;辨公室電話)
                 */
                $getAttr = $client->getAttr3($account, $password, 'ENC', 'N;R;Y', $attribute);
                /*var_dump($getAttr);*/
            }
        }  break;


        /**
         * 全校人員(師生職工)認證使用者帳號與密碼的函式。
         */
        case 'all': {
            /**
             * 功能：全校人員(師生職工)認證使用者帳號與密碼的函式。
             * 說明：如果帳號密碼正確則傳回Boolean-True，否則傳回Boolean-False。
             * 參數：
             * @param string $userName , 使用者帳號。
             * @param string $password , 使用者密碼(一律與md5加密密碼比對)。
             * @param string $enc_md5 , 密碼加密設定(‘ENC’要加密，’’不加密)。
             * @param string $stat_cod , 設定學生在校狀況例如取在校狀況1及2，則設定值為’1;2’，以分號隔開，只與學生有關，對教職員工無作用。
             */
            $auth = $client->authUser2($account, $password, 'ENC', '1;2;3;6');
            /*var_dump($auth);*/

            if ($auth) {
                /**
                 * 功能：包含退休的全校人員(師職工)取得使用者相關資訊。
                 * 說明：如果帳號密碼正確則傳回所欲取得的屬性，否則傳回空字串。
                 * 參數：
                 * @param string $userName , 使用者帳號。
                 * @param string $password , 使用者密碼(一律與md5加密密碼比對)。
                 * @param string $enc_md5 , 密碼加密設定(‘ENC’要加密，’’不加密)。
                 * @param string $stat_cod , 設定學生在校狀況例如取在校狀況1及2，則設定值為’1;2’，以分號隔開，只與學生有關，對教職員工無作用。
                 * @param string $attr , 欲回傳的屬性，字串以分號隔開，全部英文大寫。
                 * ('EMPNO;NAME;IDNO;PKIND;GRPNO;UNICOD1;DPT_DESC1;UNICOD2;DPT_DESC2;LEAVE;TITCOD;TITLE;EMAIL;POFTEL')
                 * (員工編號;姓名;身分證號;屬性;群組代號;一級單位代號; 一級單位名稱;二級單位代號;二級單位名稱;是否離職;職稱編號;職稱名稱;電子信箱;辨公室電話)
                 */
                $getAttr = $client->getAttr2($account, $password, 'ENC', '1;2;3;6', $attribute);
                /*var_dump($getAttr);*/
            }
        }  break;

        /**
         * 認證使用者帳號與密碼的函式。
         */
        case 'emp': {
            /**
             * 功能：認證使用者帳號與密碼的函式。
             * 說明：如果帳號密碼正確則傳回Boolean-True，否則傳回Boolean-False。
             * 參數：
             * @param string $userName , 使用者帳號。
             * @param string $password , 使用者密碼(一律與md5加密密碼比對)。
             * @param string $enc_md5 , 密碼加密設定(‘ENC’要加密，’’不加密)。
             */
            $auth = $client->authUser($account, $password, 'ENC');
            /*var_dump($auth);*/

            if ($auth) {
                /**
                 * 功能：取得使用者相關資訊。
                 * 說明：如果帳號密碼正確則傳回所欲取得的屬性，否則傳回空字串。
                 * 參數：
                 * @param string $userName , 使用者帳號。
                 * @param string $password , 使用者密碼(一律與md5加密密碼比對)。
                 * @param string $enc_md5 , 密碼加密設定(‘ENC’要加密，’’不加密)。
                 * @param string $attr , 欲回傳的屬性，字串以分號隔開，全部英文大寫。
                 * ('EMPNO;NAME;IDNO;PKIND;GRPNO;UNICOD1;DPT_DESC1;UNICOD2;DPT_DESC2;LEAVE;TITCOD;TITLE;EMAIL;POFTEL')
                 * (員工編號;姓名;身分證號;屬性;群組代號;一級單位代號; 一級單位名稱;二級單位代號;二級單位名稱;是否離職;職稱編號;職稱名稱;電子信箱;辨公室電話)
                 */
                $getAttr = $client->getAttr($account, $password, 'ENC', $attribute);
                /*var_dump($getAttr);*/
            }
        }  break;

        /**
         *
         */
        case 'stu': {
            /**
             * 功能：認證使用者帳號與密碼的函式。
             * 說明：如果帳號密碼正確則傳回Boolean-True，否則傳回Boolean-False。
             * 參數：
             * @param string $userName , 使用者帳號。
             * @param string $password , 使用者密碼(一律與md5加密密碼比對)。
             * @param string $enc_md5 , 密碼加密設定(‘ENC’要加密，’’不加密)。
             * @param string $stat_cod , 設定學生在校狀況例如取在校狀況1及2，則設定值為’1;2’，以分號隔開。1=>在校,2=>復學,3=>休學,4=>退學,6=>畢業
             */
            // $auth = $client->authStu($account, $password, 'ENC', '1;2;3;6');
            $auth = $client->authStu($account, $password, 'ENC', '1;2;6');
            /*var_dump($auth);*/

            if ($auth) {
                /**
                 * 功能：取得使用者相關資訊。
                 * 說明：如果帳號密碼正確則傳回所欲取得的屬性，否則傳回空字串。
                 * 參數：
                 * @param string $userName , 使用者帳號。
                 * @param string $password , 使用者密碼(一律與md5加密密碼比對)。
                 * @param string $enc_md5 , 密碼加密設定(‘ENC’要加密，’’不加密)。
                 * @param string $stat_cod , 設定學生在校狀況例如取在校狀況1及2，則設定值為’1;2’，以分號隔開。1=>在校,2=>復學,3=>休學,4=>退學,6=>畢業
                 * @param string $attr , 欲回傳的屬性，字串以分號隔開，全部英文大寫。
                 * ('STUID;CNAME;DEG_COD;DPT_COD;DPT_DESC;T_CID;STAT_COD;GRADE;TEL_NO;ZIP_COD1;CITY1;ADDR1;ZIP_COD2;CITY2;ADDR2;EMAIL;BIRTH_YR;BIRTH_MM;BIRTH_DD')
                 * (學號;姓名;學制別帶號;系所代號;系所名稱;身分證號;在校狀況代號;年級;電話號碼;戶籍郵遞區號;戶籍縣市;戶籍地址;通訊郵遞區號; 通訊縣市; 通訊地址;墊子信箱;出生年;出生月;出生日)
                 */
                // $attribute = 'STUID;CNAME;DEG_COD;DPT_COD;DPT_DESC;T_CID;STAT_COD;GRADE;TEL_NO;ZIP_COD1;CITY1;ADDR1;ZIP_COD2;CITY2;ADDR2;EMAIL;BIRTH_YR;BIRTH_MM;BIRTH_DD';
                $getAttr = $client->getStuAttr($account, $password, 'ENC', '1;2;3;6', $attribute);
                /*var_dump($getAttr);*/
            }
        }  break;

    }

    /**
     * 還傳 array
     */
    /*return $getAttr;*/
    return ($getAttr != "") ? explode(";",$getAttr) : "";
}