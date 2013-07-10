<?php
class AuthOpenLDAP extends AuthPluginBase
{
    protected $storage = 'DbStorage';
       
    static protected $description = 'Advanced LDAP authentication with OpenLDAP';
    static protected $name = 'AuthOpenLDAP';
    
    protected $settings = array(
        'server' => array(
            'type' => 'string',
            'label' => 'OpenLDAP server, e.g. ldap.mydomain.com'
        ),
        'domainsuffix' => array(
            'type' => 'string',
            'label' => 'Domain suffix for username, e.g. ou=people,dc=mydomain,dc=com'
        ),
        'ldapversion' => array(
            'type' => 'string',
            'label' => 'LDAP version (LDAPv2 = 2), e.g. 3'
        ),
        'idfield' => array(
            'type' => 'string',
            'label' => 'Id field, e.g. cn or uid'
        ),
        'is_default' => array(
            'type' => 'checkbox',
            'label' => 'Check to make default authentication method'
        )
    );
    
    public function __construct(PluginManager $manager, $id) {
        parent::__construct($manager, $id);
        
        /**
         * Here you should handle subscribing to the events your plugin will handle
         */
        $this->subscribe('beforeLogin');
        $this->subscribe('newLoginForm');
        $this->subscribe('afterLoginFormSubmit');
        $this->subscribe('newUserSession');
        $this->subscribe('beforeDeactivate');
    }

    public function beforeDeactivate()
    {
        $this->getEvent()->set('success', false);

        // Optionally set a custom error message.
        $this->getEvent()->set('message', gT('Core plugin can not be disabled.'));
    }
    
    public function beforeLogin()
    {
        if ($this->get('is_default', null, null, false) == true) { 
            // This is configured to be the default login method
            $this->getEvent()->set('default', get_class($this));
        }
    }
       
    public function newLoginForm()
    {
        $this->getEvent()->getContent($this)
             ->addContent(CHtml::tag('li', array(), "<label for='user'>"  . gT("Username") . "</label><input name='user' id='user' type='text' size='40' maxlength='40' value='' />"))
             ->addContent(CHtml::tag('li', array(), "<label for='password'>"  . gT("Password") . "</label><input name='password' id='password' type='password' size='40' maxlength='40' value='' />"));
    }
    
    public function afterLoginFormSubmit()
    {
        // Here we handle post data        
        $request = $this->api->getRequest();
        if ($request->getIsPostRequest()) {
            $this->setUsername( $request->getPost('user'));
            $this->setPassword($request->getPost('password'));
        }
    }
    
    public function newUserSession()
    {
        // Here we do the actual authentication       
        $username = $this->getUsername();
        $password = $this->getPassword();
        
        $user = $this->api->getUserByName($username);
        
        if ($user === null)
        {
            // If the user doesn't exist ín the LS database, he can't login
            // Here we should add the user to the LS database!
            $this->setAuthFailure(self::ERROR_USERNAME_INVALID);
            return;
        }
        
        // Get configuration settings:
        $ldapserver = $this->get('server');        
        $domain     = $this->get('domainsuffix');;
        $ldapver    = $this->get('ldapversion');;
        $field      = $this->get('idfield');;

        // Try to connect
        $ldapconn = ldap_connect($ldapserver);
        if (false == $ldapconn) {
            $this->setAuthFailure(1, gT('Could not connect to LDAP server.'));
            return;
        }

        if($ldapconn) {
            // using LDAP version
            if ($ldapver === null)
            {
                // If the version hasn't been set, default = 2
                $ldapver = 2;
            }
            ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, $ldapver);
            // binding to ldap server
            $rdn = $field."=".$username.",".$domain;
            $ldapbind = ldap_bind($ldapconn, $rdn, $password);
            // verify binding
            if (!$ldapbind) {
                $this->setAuthFailure(100, ldap_error($ldapconn));
                ldap_close($ldapconn); // all done? close connection
                return;
            }
            ldap_close($ldapconn); // all done? close connection
        }

        $this->setAuthSuccess($user);
    }
}
