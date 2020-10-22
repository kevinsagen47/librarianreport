-- acad sql --
select s1.stuid, s1.dpt_cod, d1.dpt_desc
     , case s1.section_cod when '0' then '' else c1.section_desc end as section_desc
     , g1.deg_desc, s1.cname, s1.sems, e1.syear, e1.p_postpone, e1.campus, e1.out_campus
from `acad_data`.`stu_main` s1
   , `acad_data`.`cod_deg` g1, `acad_data`.`cod_dpt` d1, `acad_data`.`cod_section` c1
   , `acad_data`.`stu_etd` e1
where s1.stuid = e1.stuid
  and s1.deg_cod = g1.deg_cod and s1.dpt_cod = d1.dpt_cod
  and (s1.dpt_cod = c1.dpt_cod and s1.section_cod = c1.section_cod);

-- acad sql  --
select s1.stuid, s1.dpt_cod, d1.dpt_desc
     , case s1.section_cod when '0' then '' else c1.section_desc end as section_desc
     , g1.deg_desc, s1.cname, s1.sems, e1.syear
     , case e1.p_postpone when '' then '0' else e1.p_postpone end as p_postpone
     , case e1.campus when '' then '0' else e1.campus end as campus
     , case e1.out_campus when '' then '0' else e1.out_campus end as out_campus
from `acad_data`.`stu_main` s1
   , `acad_data`.`cod_deg` g1, `acad_data`.`cod_dpt` d1, `acad_data`.`cod_section` c1
   , `acad_data`.`stu_etd` e1
where s1.stuid = e1.stuid
  and s1.deg_cod = g1.deg_cod and s1.dpt_cod = d1.dpt_cod
  and (s1.dpt_cod = c1.dpt_cod and s1.section_cod = c1.section_cod);

-- acad sql  --
select s1.stuid as 學號, s1.dpt_cod as 系所代碼, d1.dpt_desc as 系所名稱
     , case s1.section_cod when '0' then '' else c1.section_desc end as 組別
     , g1.deg_desc as 學制, s1.cname as 姓名, s1.sems as 修業學期, e1.syear as 畢業學年
     , case e1.p_postpone when '' then '0' else e1.p_postpone end as 紙本公開情形
     , case e1.campus when '' then '0' else e1.campus end as 電子校內公開情形
     , case e1.out_campus when '' then '0' else e1.out_campus end as 電子校外公開情形
from `acad_data`.`stu_main` s1
   , `acad_data`.`cod_deg` g1, `acad_data`.`cod_dpt` d1, `acad_data`.`cod_section` c1
   , `acad_data`.`stu_etd` e1
where s1.stuid = e1.stuid
  and s1.deg_cod = g1.deg_cod and s1.dpt_cod = d1.dpt_cod
  and (s1.dpt_cod = c1.dpt_cod and s1.section_cod = c1.section_cod);

-- acad sql --
select s1.stuid, s1.dpt_cod, d1.dpt_desc
     , g1.deg_desc, s1.cname, s1.sems, e1.syear, e1.p_postpone, e1.campus, e1.out_campus
from `acad_data`.`stu_main` s1
   , `acad_data`.`cod_deg` g1, `acad_data`.`cod_dpt` d1
   , `acad_data`.`stu_etd` e1
where s1.stuid = e1.stuid
  and s1.deg_cod = g1.deg_cod and s1.dpt_cod = d1.dpt_cod
  and s1.section_cod not in ('0');

