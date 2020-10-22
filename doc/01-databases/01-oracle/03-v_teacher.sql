-- sco_member_net : unit + name --
select trim(unit||' '||member_name) as u_name from sco_member_net where syear in ('108') and mem_kind in ('1') group by unit, member_name;

-- in v_teacher --
select * from v_teacher
where trim(unicod||' '||name) in (select trim(unit||' '||member_name) as u_name from sco_member_net where syear in ('108') and mem_kind in ('1') group by unit, member_name);

-- in v_teacher (join) --
select v1.*, v2.*
from (select v_teacher.*, trim(unicod||' '||name) as u_name_1 from v_teacher) v1
   , (select trim(unit||' '||member_name) as u_name_2 from sco_member_net where syear in ('108') and mem_kind in ('1') group by unit, member_name) v2
where v1.u_name_1 = v2.u_name_2;

-- in v_teacher (left join) --
select v1.*, v2.*
from (select v_teacher.*, trim(unicod||' '||name) as u_name_1 from v_teacher) v1
   , (select trim(unit||' '||member_name) as u_name_2 from sco_member_net where syear in ('108') and mem_kind in ('1') group by unit, member_name) v2
where v1.u_name_1 = v2.u_name_2(+);

-- in v_teacher (right join) --
select v1.*, v2.*
from (select v_teacher.*, trim(unicod||' '||name) as u_name_1 from v_teacher) v1
   , (select trim(unit||' '||member_name) as u_name_2 from sco_member_net where syear in ('108') and mem_kind in ('1') group by unit, member_name) v2
where v1.u_name_1(+) = v2.u_name_2;