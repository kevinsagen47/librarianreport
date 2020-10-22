-- ********************************************************************************************** --
-- stuid & password --
select stuid, utl_raw.cast_to_varchar2( utl_encode.base64_decode( utl_raw.cast_to_raw(passwd) ) ) as passwd, cname, dpt_cod, stat_cod
from stu_main_all_vw where stuid in ('D994040001');
-- ********************************************************************************************** --

-- select count(*) as num
select e11.*
from `etd_available`.`etd_main` e11
   , `etd_global`.`dept_c_list` d11
where ( ( e11.year in ('107') and e11.semester in ('1') )
     or ( e11.year in ('106') and e11.semester in ('2') ) )
  and ( e11.department_c <> d11.department_c_name )


-- 匯出 109-1 博士班 新生資料 --
select stuid, cname from stu_main where enter_yr = '109' and enter_mm in ('09', '9') and deg_cod in ('P') order by dpt_cod, stuid asc;