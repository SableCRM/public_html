<?php
/**
 * Class which returns the class map definition
 * @package
 */
class ClassMap
{
    /**
     * Returns the mapping between the WSDL Structs and generated Structs' classes
     * This array is sent to the \SoapClient when calling the WS
     * @return string[]
     */
    final public static function get()
    {
        return array(
            'ArrayOfDealerDBA' => '\\ArrayType\\ArrayOfDealerDBA',
            'DealerDBA' => '\\StructType\\DealerDBA',
            'ExtensionDataObject' => '\\StructType\\ExtensionDataObject',
            'ArrayOfDealerEmail' => '\\ArrayType\\ArrayOfDealerEmail',
            'DealerEmail' => '\\StructType\\DealerEmail',
            'DealerInfo' => '\\StructType\\DealerInfo',
            'MoniNetUserInfo' => '\\StructType\\MoniNetUserInfo',
            'ArrayOfString' => '\\ArrayType\\ArrayOfString',
            'ArrayOfDealerLicense' => '\\ArrayType\\ArrayOfDealerLicense',
            'DealerLicense' => '\\StructType\\DealerLicense',
            'ArrayOfstring' => '\\ArrayType\\ArrayOfstring_1',
            'ArrayOfKeyValueOfstringstring' => '\\ArrayType\\ArrayOfKeyValueOfstringstring',
            'KeyValueOfstringstring' => '\\StructType\\KeyValueOfstringstring',
            'AuthenticationResult' => '\\StructType\\AuthenticationResult',
            'ArrayOfOptionListing' => '\\ArrayType\\ArrayOfOptionListing',
            'OptionListing' => '\\StructType\\OptionListing',
            'AuthenticationResult2' => '\\StructType\\AuthenticationResult2',
            'ArrayOfProgramDiscounts' => '\\ArrayType\\ArrayOfProgramDiscounts',
            'ProgramDiscounts' => '\\StructType\\ProgramDiscounts',
            'ArrayOfDealerListing' => '\\ArrayType\\ArrayOfDealerListing',
            'DealerListing' => '\\StructType\\DealerListing',
            'ContractDocument' => '\\StructType\\ContractDocument',
            'ArrayOfContactItem' => '\\ArrayType\\ArrayOfContactItem',
            'ContactItem' => '\\StructType\\ContactItem',
            'ArrayOfEquipmentItem' => '\\ArrayType\\ArrayOfEquipmentItem',
            'EquipmentItem' => '\\StructType\\EquipmentItem',
            'PaymentItem' => '\\StructType\\PaymentItem',
            'ContractDocument2' => '\\StructType\\ContractDocument2',
            'CreateContractResult' => '\\StructType\\CreateContractResult',
            'VoidEnvelopeResult' => '\\StructType\\VoidEnvelopeResult',
            'ContractEnvelope' => '\\StructType\\ContractEnvelope',
            'StatusSearch' => '\\StructType\\StatusSearch',
            'ArrayOfStatusSearch' => '\\ArrayType\\ArrayOfStatusSearch',
            'APIVersion' => '\\StructType\\APIVersion',
            'APIVersionResponse' => '\\StructType\\APIVersionResponse',
            'AuthenticateUser' => '\\StructType\\AuthenticateUser',
            'AuthenticateUserResponse' => '\\StructType\\AuthenticateUserResponse',
            'UniqueDealerNames' => '\\StructType\\UniqueDealerNames',
            'UniqueDealerNamesResponse' => '\\StructType\\UniqueDealerNamesResponse',
            'CreateContract' => '\\StructType\\CreateContract',
            'CreateContractResponse' => '\\StructType\\CreateContractResponse',
            'VoidContract' => '\\StructType\\VoidContract',
            'VoidContractResponse' => '\\StructType\\VoidContractResponse',
            'GetContract' => '\\StructType\\GetContract',
            'GetContractResponse' => '\\StructType\\GetContractResponse',
            'GetContractAsPrimary' => '\\StructType\\GetContractAsPrimary',
            'GetContractAsPrimaryResponse' => '\\StructType\\GetContractAsPrimaryResponse',
            'DocuSignConnectUpdate' => '\\StructType\\DocuSignConnectUpdate',
            'DocuSignConnectUpdateResponse' => '\\StructType\\DocuSignConnectUpdateResponse',
            'SendQuoteEmail' => '\\StructType\\SendQuoteEmail',
            'SendQuoteEmailResponse' => '\\StructType\\SendQuoteEmailResponse',
            'GetContractLegacyAMA' => '\\StructType\\GetContractLegacyAMA',
            'GetContractLegacyAMAResponse' => '\\StructType\\GetContractLegacyAMAResponse',
            'GetContractLegacyIA' => '\\StructType\\GetContractLegacyIA',
            'GetContractLegacyIAResponse' => '\\StructType\\GetContractLegacyIAResponse',
            'GetContractID' => '\\StructType\\GetContractID',
            'GetContractIDResponse' => '\\StructType\\GetContractIDResponse',
            'AuthenticateUser2' => '\\StructType\\AuthenticateUser2',
            'AuthenticateUser2Response' => '\\StructType\\AuthenticateUser2Response',
            'CreateContract2' => '\\StructType\\CreateContract2',
            'CreateContract2Response' => '\\StructType\\CreateContract2Response',
            'ValidateContract2' => '\\StructType\\ValidateContract2',
            'ValidateContract2Response' => '\\StructType\\ValidateContract2Response',
            'SendQuoteEmail2' => '\\StructType\\SendQuoteEmail2',
            'SendQuoteEmail2Response' => '\\StructType\\SendQuoteEmail2Response',
            'UploadAttachment' => '\\StructType\\UploadAttachment',
            'UploadAttachmentResponse' => '\\StructType\\UploadAttachmentResponse',
            'DeleteAttachment' => '\\StructType\\DeleteAttachment',
            'DeleteAttachmentResponse' => '\\StructType\\DeleteAttachmentResponse',
            'VerifyDependencies' => '\\StructType\\VerifyDependencies',
            'VerifyDependenciesResponse' => '\\StructType\\VerifyDependenciesResponse',
            'SearchContracts' => '\\StructType\\SearchContracts',
            'SearchContractsResponse' => '\\StructType\\SearchContractsResponse',
        );
    }
}
