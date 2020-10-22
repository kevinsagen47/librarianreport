-- 找出 xxx 學年度 第 xx 學期，最早核准的時間 --
select min(adate) as adate from `etd_available`.`etd_main` where year in ('108') and semester in ('1');
select min(mdate) as mdate from `etd_available`.`etd_main` where year in ('108') and semester in ('1');

select min(adate) as adate from `etd_available`.`etd_main` where year in ('108') and semester in ('2');
select min(mdate) as mdate from `etd_available`.`etd_main` where year in ('108') and semester in ('2');

-- 找出 xxx 學年度 第 xx 學期，最晚核准的時間 --
select max(adate) as adate from `etd_available`.`etd_main` where year in ('108') and semester in ('1');
select max(mdate) as mdate from `etd_available`.`etd_main` where year in ('108') and semester in ('1');

select max(adate) as adate from `etd_available`.`etd_main` where year in ('108') and semester in ('2');
select max(mdate) as mdate from `etd_available`.`etd_main` where year in ('108') and semester in ('2');

/*
   108 學年度 , 第 2 學期 : 2019-01-18 ~ 2020-09-11 (1398 筆資料)
   資料數目

   【Linux】Linux統計資料夾、檔案數量的命令
   https://www.itread01.com/p/147708.html

   # 檢視當前目錄下的檔案數量(不包含子目錄中的檔案)
   ls -l|grep "^-"| wc -l

   # 檢視當前目錄下的檔案數量(包含子目錄中的檔案) 注意:R,代表子目錄
   ls -lR|grep "^-"| wc -l

   # 檢視當前目錄下的資料夾目錄個數(不包含子目錄中的目錄),同上述理,如果需要檢視子目錄的,加上R
   ls -l|grep "^d"| wc -l
 */
select count(*) as num from `etd_available`.`etd_main` where year in ('108') and adate >= '2019-01-18' and adate <= '2020-09-11';
select count(*) as num from `etd_available`.`etd_main` where year in ('108') and semester in ('2') and adate >= '2019-01-18' and adate <= '2020-09-11';

/*
   getdata.cgi SQL command
 */
select distinct urn from `etd_available`.`etd_main`
where (department_c like '%%') and (year >= '108') and (year <= '108')
  and ((adate>= '2019-01-18' and adate <= '2020-09-11')
     or(mdate>= '2019-01-18' and mdate <= '2020-09-11'));
