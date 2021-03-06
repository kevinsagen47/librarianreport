-- 無法使用 DBMS_METADATA 嘗試內部產生器轉換物件 PAOZ.V_EMPLOYEE 的 VIEW DDL.
CREATE VIEW PAOZ.V_EMPLOYEE AS

-- 編制內人員 ( 公務人員 + 專任教師 ) 主表單 : CPABT01M , CPABT02M --
SELECT B.B02IDNO,B.B02CARD,B.B02NAME,A.B01ENAME,A.B01SEX,A.B01BIRTHD,A.B01DOMICE,A.B01CURADD,B.B02POFTEL,A.B01CURTEL,
       B.B02EMAIL,B.B02UNICOD,C.DEST,B.B02UNICOD2,F.DEST,B.B02SERDAT,B.B02LEVDAT,B.B02TITCOD,D.DESCR,E.GRPNO,'1'
FROM CPABT01M A,CPABT02M B,XUNIT C,CODE1 D,USRLOG E,XUNIT F
WHERE (A.B01IDNO = B.B02IDNO)
AND   (B.B02IDNO NOT IN ('T121184320','T222509958','E124021935','T120032309'))
AND   (B.B02LEVCOD IS NULL OR B.B02LEVCOD in ('2408','2409') OR TRIM(B.B02LEVCOD) = '') --2408,2409借調
AND   (B.B02UNICOD = C.CODE(+) AND B.B02UNICOD2 = F.CODE(+))
AND   (D.ITEM = 'EPT' AND B.B02TITCOD = D.CODE(+))
AND   (A.B01IDNO = E.IDNO(+) AND E.PKIND = '1')

UNION

-- 非編制內人員 ( 行政助理 + 研究助理 ) 主表單 : PABDB55M --
SELECT A.IDNO,A.EMPNO,A.NAME,A.ENAME,A.SEX,A.BIRTHD,A.DOMICE,A.CURADD,A.POFTEL,A.CURTEL,
       A.EMAIL,A.UNICOD,C.DEST,A.UNICOD2,D.DEST,A.SERDAT,A.LEVDAT,A.TITCOD,A.TITLE,B.GRPNO,'2'
FROM PABDB55M A,USRLOG B,XUNIT C,XUNIT D
WHERE (A.LEAVE = 'N')
AND   (A.IDNO = B.IDNO(+) AND B.PKIND = '2')
--20180806 eddieliu, 單位名稱改查單位表
AND (A.UNICOD = C.CODE(+) AND A.UNICOD2 = D.CODE(+))

UNION

-- 兼任教師  主表單 : PABDB54M --
SELECT A.IDNO,A.EMPNO,A.NAME,A.ENAME,A.SEX,A.BIRTHD,A.DOMICE,A.CURADD,A.POFTEL,A.CURTEL,
       A.EMAIL,A.UNICOD,A.UNIT,A.UNICOD2,A.UNIT2,A.SERDAT,A.LEVDAT,A.TITCOD,A.TITLE,B.GRPNO,'3'
FROM PABDB54M A,USRLOG B
WHERE (A.LEAVE = 'N')
AND   (A.IDNO = B.IDNO(+) AND B.PKIND = '3')

UNION

-- 名譽教授 + 客座教授 + 約聘教師/研究員 + 博士後研究  主表單 : PABDB53M --
SELECT A.IDNO,A.EMPNO,A.NAME,A.ENAME,A.SEX,A.BIRTHD,A.DOMICE,A.CURADD,A.POFTEL,A.CURTEL,
       A.EMAIL,A.UNICOD,A.UNIT,A.UNICOD2,A.UNIT2,A.SERDAT,A.LEVDAT,A.TITCOD,A.TITLE,B.GRPNO,'4'
FROM PABDB53M A,USRLOG B
WHERE (A.LEAVE = 'N')
AND   (A.IDNO = B.IDNO(+) AND B.PKIND = '4')

UNION

SELECT "IDNO","EMPNO","NAME","ENAME","SEX","BIRTHD","DOMICE","CURADD","POFTEL","CURTEL","EMAIL","UNICOD","UNIT","UNICOD2","UNIT2","SERDAT","LEVDAT","TITCOD","TITLE","GRPNO","PKIND" FROM GAD.V_EMPLOYEE


-- V_BT0102M , V_BT02M2 , v_leaderemp