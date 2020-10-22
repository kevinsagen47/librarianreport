-- all pri users --
select p1.*
     , utl_raw.cast_to_varchar2(utl_encode.base64_decode(utl_raw.cast_to_raw(p1.pwd))) as decode_pwd
     , c1.usr_desc
from pri_user p1, cod_usr c1 where p1.usr_cod = c1.usr_cod
order by p1.usr_cod asc, p1.usr_ac asc, p1.dpt_cod asc;

-- all pri users - department --
select p1.*
     , utl_raw.cast_to_varchar2(utl_encode.base64_decode(utl_raw.cast_to_raw(p1.pwd))) as decode_pwd
     , c1.usr_desc
from pri_user p1, cod_usr c1 where p1.usr_cod = c1.usr_cod and p1.usr_cod in ('A0')
order by p1.usr_cod asc, p1.usr_ac asc, p1.dpt_cod asc;

-- all pri users - academic affairs --
select p1.*
     , utl_raw.cast_to_varchar2(utl_encode.base64_decode(utl_raw.cast_to_raw(p1.pwd))) as decode_pwd
     , c1.usr_desc
from pri_user p1, cod_usr c1 where p1.usr_cod = c1.usr_cod and p1.usr_cod in ('51', '70', '20', '30')
order by p1.usr_cod asc, p1.usr_ac asc, p1.dpt_cod asc;