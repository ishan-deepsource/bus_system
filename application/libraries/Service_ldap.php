<?php
class Service_ldap {
        private $CI;            /*!< CodeIgniter instance */
        protected $connection = NULL;

        private $host;
        private $port;
        private $account_prefix;
		function __construct() {
                $this->CI = & get_instance();
				$this->CI->config->load('ldap_config',TRUE);
				$this->host = $this->CI->config->item('host','ldap_config');
				$this->port = $this->CI->config->item('port','ldap_config');
				$this->account_prefix = $this->CI->config->item('account_prefix','ldap_config');
				return $this->connect();
        }

        function __destruct() {
                $this->close();
        }

        /**
         * Connect to LDAP server
         */
        public function connect() {
                try {
                        $this->connection = @ldap_connect( $this->host, $this->port );
                        if( !$this->connection ) {
                                return false;
                        }
                }catch (Exception $e) {									
					return false;
                }
                return true;
        }

        /**
         * Authenticate to LDAP with username and password
         * @param $username
         * @param $password
         */
        public function authenticate( $account_prefix, $username, $password ) {
            //var_dump($account_prefix,$username,$password);
            //die();
                try {
                        if( $this->connection ) {
                                $bind = @ldap_bind($this->connection, $this->account_prefix.$username, $password);

                                if( $bind ) {
                                        /** TODO **/
                                } else {
                                        return false;
                                }
                        } else {
                                return false;
                        }
                } catch( Exception $e ) {
                        return false;
                }
                return true;
        }

        public function get_data($username, $password) {
            $bind = @ldap_bind($this->connection, $this->account_prefix.$username, $password);
            $dn = "OU=People,DC=BUU,DC=AC,DC=TH";
            $filter="(|(cn=$username))";
        //     echo $filter;

            $sr=ldap_search($this->connection, $dn, $filter);

            $info = ldap_get_entries($this->connection, $sr);
        //     print_r($info);
            $person_data = array(
                'fname' => $info[0]['givenname'][0],
                'lname' => $info[0]['sn'][0],
                'email' => $info[0]['mail'][0],
                'code' => $info[0]['cn'][0],
                'ou' => str_replace('OU=', '', explode(",", $info[0]['dn'])[1]),
                'company' => @$info[0]['company'][0]
                );
            return $person_data;
            //echo $info[0]['givenname'][0]." ".$info[0]['sn'][0]." ".$info[0]['mail'][0];
        }
 

        /**
         * Close LDAP connection
         */
        public function close() {
                try {
                        if( $this->connection ) {
                                @ldap_close($this->connection);
                        } else {
                                return false;
                        }
                } catch( Exception $e ) {
                        return false;
                }
                return true;
        }


}
?>