<?php
namespace nsysu\database;

class dbs_conn {
    public $acad;
    public $paoz;

    public function __construct()
    {
        $this->acad = array(
            'username' => 'acad',
            'password' => 'aszx3211',
            'db' => 'oci:dbname=(description=(address=(protocol=tcp)(host=140.117.13.225)(port=1521))(connect_data=(service_name=dgsvr5)));charset=utf8'
        );

        $this->paoz = array(
            'username' => 'paoz',
            'password' => 'dgpa2040',
            'db' => 'oci:dbname=(description=(address=(protocol=tcp)(host=140.117.13.225)(port=1521))(connect_data=(service_name=dgsvr5)));charset=utf8'
        );
    }
}
