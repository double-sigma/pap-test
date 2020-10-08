<?php
include 'PapApi.class.php'; //Download PapApi.class.php from the merchant panel
$session = new Pap_Api_Session("http://e.postaffiliatepro.com/scripts/server.php");
if (!@$session->login( /* CREDENTIALS */ )) {
    die("Cannot login. Message: " . $session->getMessage());
}
$affiliate = new Pap_Api_AffiliateSignup($session);

$affiliate->setUsername("testaffiliate@email.com");
$affiliate->setParentUserId('testaff');
$affiliate->setFirstname("test");
$affiliate->setLastname("affiliate");
$affiliate->setRefid('testaff10');
$affiliate->setData(1, "urlExample");
$affiliate->setData(2, "companyNameExample");
$affiliate->setData(3, "streetExample");
$affiliate->setData(4, "cityExample");
$affiliate->setData(5, "streetExample");
$affiliate->setData(6, "GB");

//$affiliate->setPassword("affpassword"); // use it if you want to set password

try {
    if ($affiliate->add()) {
        echo "Affiliate saved successfuly id: " . $affiliate->getUserid();
    } else {
        die("Cannot save affiliate: " . $affiliate->getMessage());
    }
} catch (Exception $e) {
    die("Error while communicating with PAP: " . $e->getMessage());
}
