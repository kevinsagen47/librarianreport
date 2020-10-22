/**
 * create or alert 'root' user information
 * show grants for 'root'@'localhost';
 */
-- create 'root' account and password --
-- create user 'root'@'localhost' identified by 'lIb,eTd!2453;';

-- alert 'root' account and password --
alter user 'root'@'localhost' identified by 'lIb,eTd!2453;';

-- grant 'root' privilege --
grant all privileges on *.* to 'root'@'localhost' with grant option;

-- flush privileges --
flush privileges;

/**
 * create or alert 'etd_submitted' user information
 * show grants for 'etd_submitted'@'localhost';
 */
-- create 'etd_submitted' account and password --
create user 'etd_submitted'@'localhost' identified by 'nlib99sub';

-- alert 'etd_submitted' account and password --
-- alter user 'etd_submitted'@'localhost' identified by 'nlib99sub';

-- grant 'etd_submitted' privilege --
grant select, insert, update, delete, show databases, super, create temporary tables, lock tables, execute, replication slave, replication client, event, trigger on *.* to 'etd_submitted'@'localhost' identified by password '*9E89D91FD1ECC47BA842F1F457575E104A01D2E5';
grant select, insert, update, delete, create temporary tables, lock tables on `etd_qa_submitted`.* to 'etd_submitted'@'localhost';
grant select, insert, update, create temporary tables, lock tables on `etd_qa_available`.* to 'etd_submitted'@'localhost';
grant select, insert, update, delete, create temporary tables, lock tables on `etd_qa_global`.* to 'etd_submitted'@'localhost';

-- flush privileges --
flush privileges;

/**
 * create or alert 'etd_available' user information
 * show grants for 'etd_available'@'localhost';
 */
-- create 'etd_available' account and password --
create user 'etd_available'@'localhost' identified by 'nlib99ava';

-- alert 'etd_available' account and password --
-- alter user 'etd_available'@'localhost' identified by 'nlib99ava';

-- grant 'etd_qa_available' privilege --
grant select, insert, update, delete, show databases, super, create temporary tables, lock tables, execute, replication slave, replication client, event, trigger on *.* to 'etd_available'@'localhost' identified by password '*FF1D5EB08B1876138FD5959190BB84465290810A';
grant select, insert, update, delete, create temporary tables, lock tables on `etd_qa_available`.* to 'etd_available'@'localhost';

-- flush privileges --
flush privileges;

/**
 * create or alert 'ref' user information
 * show grants for 'ref'@'localhost';
 * show grants for 'ref'@'%';
 */
-- create 'ref' account and password --
create user 'ref'@'localhost' identified by 'lIb,eTd!2453;';

-- alert 'ref' account and password --
-- alter user 'ref'@'localhost' identified by 'lIb,eTd!2453;';

-- grant 'ref' privilege --
grant select, insert, update, delete, create, drop, references, index, alter, create temporary tables, lock tables on `etd_qa_submitted`.* to 'ref'@'localhost' with grant option;
grant select on `etd_qa_available`.* to 'ref'@'localhost';
grant select on `etd_qa_global`.* to 'ref'@'localhost';

-- flush privileges --
flush privileges;
