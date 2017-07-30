<?php
/**
 * This file aims to show you how to use this generated package.
 * In addition, the goal is to show which methods are available and the fist needed parameter(s)
 * You have to use an associative array such as:
 * - the key must be a constant beginning with WSDL_ from AbstractSoapClientbase class each generated ServiceType class extends this class
 * - the value must be the corresponding key value (each option matches a {@link http://www.php.net/manual/en/soapclient.soapclient.php} option)
 * $options = array(
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => 'https://senti.monitronics.net/eContractAPISIT?wsdl',
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_TRACE => true,
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_LOGIN => 'you_secret_login',
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_PASSWORD => 'you_secret_password',
 * );
 * etc....
 */
require_once __DIR__ . '/vendor/autoload.php';
/**
 * Minimal options
 */
$options = array(
    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => 'https://senti.monitronics.net/eContractAPISIT?wsdl',
    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => ClassMap::get(),
);
/**
 * Samples for APIV ServiceType
 */
$aPIV = new \ServiceType\APIV($options);
/**
 * Sample call for APIVersion operation/method
 */
if ($aPIV->APIVersion(new \StructType\APIVersion()) !== false) {
    print_r($aPIV->getResult());
} else {
    print_r($aPIV->getLastError());
}
/**
 * Samples for Authenticate ServiceType
 */
$authenticate = new \ServiceType\Authenticate($options);
/**
 * Sample call for AuthenticateUser operation/method
 */
if ($authenticate->AuthenticateUser(new \StructType\AuthenticateUser()) !== false) {
    print_r($authenticate->getResult());
} else {
    print_r($authenticate->getLastError());
}
/**
 * Sample call for AuthenticateUser2 operation/method
 */
if ($authenticate->AuthenticateUser2(new \StructType\AuthenticateUser2()) !== false) {
    print_r($authenticate->getResult());
} else {
    print_r($authenticate->getLastError());
}
/**
 * Samples for Unique ServiceType
 */
$unique = new \ServiceType\Unique($options);
/**
 * Sample call for UniqueDealerNames operation/method
 */
if ($unique->UniqueDealerNames(new \StructType\UniqueDealerNames()) !== false) {
    print_r($unique->getResult());
} else {
    print_r($unique->getLastError());
}
/**
 * Samples for Create ServiceType
 */
$create = new \ServiceType\Create($options);
/**
 * Sample call for CreateContract operation/method
 */
if ($create->CreateContract(new \StructType\CreateContract()) !== false) {
    print_r($create->getResult());
} else {
    print_r($create->getLastError());
}
/**
 * Sample call for CreateContract2 operation/method
 */
if ($create->CreateContract2(new \StructType\CreateContract2()) !== false) {
    print_r($create->getResult());
} else {
    print_r($create->getLastError());
}
/**
 * Samples for Void ServiceType
 */
$void = new \ServiceType\Void($options);
/**
 * Sample call for VoidContract operation/method
 */
if ($void->VoidContract(new \StructType\VoidContract()) !== false) {
    print_r($void->getResult());
} else {
    print_r($void->getLastError());
}
/**
 * Samples for Get ServiceType
 */
$get = new \ServiceType\Get($options);
/**
 * Sample call for GetContract operation/method
 */
if ($get->GetContract(new \StructType\GetContract()) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetContractAsPrimary operation/method
 */
if ($get->GetContractAsPrimary(new \StructType\GetContractAsPrimary()) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetContractLegacyAMA operation/method
 */
if ($get->GetContractLegacyAMA(new \StructType\GetContractLegacyAMA()) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetContractLegacyIA operation/method
 */
if ($get->GetContractLegacyIA(new \StructType\GetContractLegacyIA()) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetContractID operation/method
 */
if ($get->GetContractID(new \StructType\GetContractID()) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Samples for Docu ServiceType
 */
$docu = new \ServiceType\Docu($options);
/**
 * Sample call for DocuSignConnectUpdate operation/method
 */
if ($docu->DocuSignConnectUpdate(new \StructType\DocuSignConnectUpdate()) !== false) {
    print_r($docu->getResult());
} else {
    print_r($docu->getLastError());
}
/**
 * Samples for Send ServiceType
 */
$send = new \ServiceType\Send($options);
/**
 * Sample call for SendQuoteEmail operation/method
 */
if ($send->SendQuoteEmail(new \StructType\SendQuoteEmail()) !== false) {
    print_r($send->getResult());
} else {
    print_r($send->getLastError());
}
/**
 * Sample call for SendQuoteEmail2 operation/method
 */
if ($send->SendQuoteEmail2(new \StructType\SendQuoteEmail2()) !== false) {
    print_r($send->getResult());
} else {
    print_r($send->getLastError());
}
/**
 * Samples for Validate ServiceType
 */
$validate = new \ServiceType\Validate($options);
/**
 * Sample call for ValidateContract2 operation/method
 */
if ($validate->ValidateContract2(new \StructType\ValidateContract2()) !== false) {
    print_r($validate->getResult());
} else {
    print_r($validate->getLastError());
}
/**
 * Samples for Upload ServiceType
 */
$upload = new \ServiceType\Upload($options);
/**
 * Sample call for UploadAttachment operation/method
 */
if ($upload->UploadAttachment(new \StructType\UploadAttachment()) !== false) {
    print_r($upload->getResult());
} else {
    print_r($upload->getLastError());
}
/**
 * Samples for Delete ServiceType
 */
$delete = new \ServiceType\Delete($options);
/**
 * Sample call for DeleteAttachment operation/method
 */
if ($delete->DeleteAttachment(new \StructType\DeleteAttachment()) !== false) {
    print_r($delete->getResult());
} else {
    print_r($delete->getLastError());
}
/**
 * Samples for Verify ServiceType
 */
$verify = new \ServiceType\Verify($options);
/**
 * Sample call for VerifyDependencies operation/method
 */
if ($verify->VerifyDependencies(new \StructType\VerifyDependencies()) !== false) {
    print_r($verify->getResult());
} else {
    print_r($verify->getLastError());
}
/**
 * Samples for Search ServiceType
 */
$search = new \ServiceType\Search($options);
/**
 * Sample call for SearchContracts operation/method
 */
if ($search->SearchContracts(new \StructType\SearchContracts()) !== false) {
    print_r($search->getResult());
} else {
    print_r($search->getLastError());
}
