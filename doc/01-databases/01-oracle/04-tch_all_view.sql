-- 可能使用 tch_all_view 比較有完整的教師資訊 --
-- sco_member_net : unit + name --
select trim(unit||' '||member_name) as u_name from sco_member_net where syear in ('108') and mem_kind in ('1') group by unit, member_name;

-- in tch_all_view --
select * from tch_all_view
where trim(unicod||' '||name) in (select trim(unit||' '||member_name) as u_name from sco_member_net where syear in ('108') and mem_kind in ('1') group by unit, member_name);

select idno, name, unicod from tch_all_view group by idno, name, sex, unicod

-- in tch_all_view (join) --
select v1.*, v2.*
from (select x1.*, trim(x1.unicod||' '||x1.name) as u_name_1 from (select idno, name, unicod from tch_all_view group by idno, name, unicod) x1) v1
   , (select trim(unit||' '||member_name) as u_name_2 from sco_member_net where syear in ('108') and mem_kind in ('1') group by unit, member_name) v2
where v1.u_name_1 = v2.u_name_2;

-- in tch_all_view (left join) --
select v1.*, v2.*
from (select x1.*, trim(x1.unicod||' '||x1.name) as u_name_1 from (select idno, name, unicod from tch_all_view group by idno, name, unicod) x1) v1
   , (select trim(unit||' '||member_name) as u_name_2 from sco_member_net where syear in ('108') and mem_kind in ('1') group by unit, member_name) v2
where v1.u_name_1 = v2.u_name_2(+);

-- in tch_all_view (right join) --
select v1.*, v2.*
from (select x1.*, trim(x1.unicod||' '||x1.name) as u_name_1 from (select idno, name, unicod from tch_all_view group by idno, name, unicod) x1) v1
   , (select trim(unit||' '||member_name) as u_name_2 from sco_member_net where syear in ('108') and mem_kind in ('1') group by unit, member_name) v2
where v1.u_name_1(+) = v2.u_name_2;

-- in tch_all_view (join) --
select v1.*, v2.*
from (select x1.*, trim(x1.unicod||' '||x1.name) as u_name_1 from (select idno, name, unicod from tch_all_view group by idno, name, unicod) x1) v1
   , (select trim(unit||' '||member_name) as u_name_2 from sco_member_net where mem_kind in ('1') group by unit, member_name) v2
where v1.u_name_1 = v2.u_name_2;

-- in tch_all_view (join) --
select v1.*, v2.*
from (select x1.*, trim(x1.unicod||' '||x1.name) as u_name_1 from (select idno, name, unicod from tch_all_view group by idno, name, unicod) x1) v1
   , (select trim(unit||' '||member_name) as u_name_2 from sco_member_net group by unit, member_name) v2
where v1.u_name_1 = v2.u_name_2 order by v1.idno,  v1.name, v1.unicod;

