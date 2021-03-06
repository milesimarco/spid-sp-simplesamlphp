<?php

$config = array(
    // This is a authentication source which handles admin authentication.
    'admin' => array(
        // The default is to use core:AdminPassword, but it can be replaced with
        // any authentication source.
        'core:AdminPassword',
    ),
	
	 // SPID Demo authsource with attributes value
    'service-attributes' => array(
        'exampleauth:Static',
        'spidCode' => array('ABCD123456789A'),
        'name' => array('Francesca'),
        'familyName' => array('Rossi'),
        'placeOfBirth' => array('F205'),
        'countyOfBirth' => array('MI'),
        'dateOfBirth' => array('1900-01-01'),
        'gender' => array('F'),
        'companyName' => array('Agenzia per l\'Italia Digitale'),
        'registeredOffice' => array('via Listz 21 00144 Roma'),
        'fiscalNumber' => array('TINIT-RSSFNC00A41F205Q'),
        'ivaCode' => array('VATIT-00000000000'),
        'idCard' => array('CartaIdentità AS09452389 ComuneMilano 2013-01-02 2013-01-31'),
        'mobilePhone' => array('34912345678'),
        'email' => array('francesca.rossi@francescarossi.it'),
        'expirationDate' => array('2100-01-01'),
        'digitalAddress' => array('francesca.rossi@pec.francescarossi.it')

    ),
	
    // An authentication source 
    'service-name' => array(
        'saml:SP',
        'privatekey' => 'spid-sp.pem',
        'certificate' => 'spid-sp.crt',
        // The entity ID of this SP.
        // Can be NULL/unset, in which case an entity ID is generated based on the metadata URL.
        'entityID' => null,
        // The entity ID of the IdP this should SP should contact.
        // Can be NULL/unset, in which case the user will be shown a list of available IdPs.
        'idp' => null,
        // The URL to the discovery service.
        // Can be NULL/unset, in which case a builtin discovery service will be used.
        'discoURL' => null,

        /* Impostare il livello di spid che si vuole (1,2,3)  per il servizio */
        'AuthnContextClassRef' =>
        array(
            'https://www.spid.gov.it/SpidL2',
        ),

        'AuthnContextComparison' => 'minimum',

        /*Per autenticazione superiori a SPID Livello 1 occorre specificare 'ForceAuthn' => true */
        'ForceAuthn' => true,

        'AttributeConsumingServiceIndex' => 0,
        'signature.algorithm' => 'http://www.w3.org/2001/04/xmldsig-more#rsa-sha256',
        'metadata.sign.enable' => true,
        'metadata.sign.algorithm' => 'http://www.w3.org/2001/04/xmldsig-more#rsa-sha256',
        'metadata.supported.protocols' => array('urn:oasis:names:tc:SAML:2.0:protocol'),

        'sign.authnrequest' => true,
        'sign.logout' => true,
        'OrganizationName' => array(
            'en' => 'Organization name',
            'it' => 'Nome organizzazione',
        ),
        'OrganizationDisplayName' => array(
            'en' => 'Organization name',
            'it' => 'Nome organizzazione',
        ),
        'OrganizationURL' => array(
            'en' => 'http://dominio.organizzazione.it',
            'it' => 'http://dominio.organizzazione.it',
        ),
        'name' => array(
            'en' => 'Service',
            'it' => 'Servizio',
        ),
        'description' => array(
            'en' => 'Service description',
            'it' => 'Descrizione del servizio',
        ),
        'attributes.NameFormat' => 'urn:oasis:names:tc:SAML:2.0:attrname-format:basic',

        /* Per avere gli attributi richiesti tramite il metadata (codice fiscale, ecc) - specificare solo gli attributi necessari */
        'attributes' => array(
            'spidCode',
            'name',
            'familyName',
            'placeOfBirth',
            'countyOfBirth',
            'dateOfBirth',
            'gender',
            'fiscalNumber',
            'mobilePhone',
            'email',
            'address',
            'digitalAddress'
        ),
        // Attributi obbligatori richiesti in fase di autenticazione
        'attributes.required' => array(
        ),
        'acs.Bindings' => array('urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST'),
        'SingleLogoutServiceBinding' => array('urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST'),
		'NameIDPolicy' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:transient',
    )
);
