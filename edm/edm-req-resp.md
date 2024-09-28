

EDM E-FATURA - WEB SERVİS API - REQUEST- RESPONSE  

İçindekiler

- [1. FONKSİYONLAR](#1-fonksi̇yonlar)
  - [1.1 LOGIN](#11-login)
  - [1.2 LOGOUT](#12-logout)
  - [1.3 SEND INVOICE](#13-send-invoice)
  - [1.4 GET INVOICE](#14-get-invoice)
  - [1.5 GET INVOICE STATUS](#15-get-invoice-status)
  - [1.6 MARK INVOICE](#16-mark-invoice)
  - [1.7 GET USER LIST](#17-get-user-list)
  - [1.8 CHECK USER](#18-check-user)
  - [1.9 SEND INVOICE RESPONSEWITH SERVER SIGN](#19-send-invoice-responsewith-server-sign)
  - [1.10 CANCEL INVOICE](#110-cancel-invoice)
  - [1.11 CHECK COUNTER](#111-check-counter)
  - [1.12 GET INVOICE RESPONSE DATE](#112-get-invoice-response-date)
  - [1.13 UYGULAMA TARAFINDAN ÜRETİLEN SOAP FAULT EXCEPTION](#113-uygulama-tarafindan-üreti̇len-soap-fault-exception)

# 1. FONKSİYONLAR

## 1.1 LOGIN

LoginRequest

```xml
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Header>
        <ActivityId CorrelationId="7ccaec83-e94c-4748-8a5d-c3d1b4ec43c7" xmlns="http://schemas.microsoft.com/2004/09/ServiceModel/Diagnostics">00000000-0000-0000-0000-000000000000</ActivityId>
    </s:Header>
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <LoginRequest xmlns="http://tempuri.org/">
            <REQUEST_HEADER xmlns="">
                <SESSION_ID>0</SESSION_ID>
                <CLIENT_TXN_ID>23807a36-df76-4186-8960 66f9fe6fa9e3</CLIENT_TXN_ID>
                <ACTION_DATE>2018-11-01T10:56:36.6274908+03:00</ACTION_DATE>
                <REASON>E-fatura/E-Arşiv gönder-al testleri için</REASON>
                <APPLICATION_NAME>EDM MINI CONNECTOR v1.0</APPLICATION_NAME>
                <HOSTNAME>MDORA17</HOSTNAME>
                <CHANNEL_NAME>TEST</CHANNEL_NAME>
                <COMPRESSED>N</COMPRESSED>
            </REQUEST_HEADER>
            <USER_NAME xmlns="">username</USER_NAME>
            <PASSWORD xmlns="">password</PASSWORD>
        </LoginRequest>
    </s:Body>
</s:Envelope>

```



LoginResponse
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <LoginResponse xmlns="http://tempuri.org/">
            <SESSION_ID xmlns="">ab72489e-c791-41d7-bec2-e4f7d9d8e63b</SESSION_ID>
        </LoginResponse>
    </s:Body>
</s:Envelope>





## 1.2 LOGOUT

LogoutRequest

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Header>
        <ActivityId CorrelationId="3115b262-9639-413f-ab73-a120343eda58" xmlns="http://schemas.microsoft.com/2004/09/ServiceModel/Diagnostics">00000000-0000-0000-0000-000000000000</ActivityId>
    </s:Header>
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <LogoutRequest xmlns="http://tempuri.org/">
            <REQUEST_HEADER xmlns="">
                <SESSION_ID>ab72489e-c791-41d7-bec2-e4f7d9d8e63b</SESSION_ID>
                <CLIENT_TXN_ID>3f3f60c5-f1be-493d-adc7-d6b85d2a5735</CLIENT_TXN_ID>
                <ACTION_DATE>2018-11-01T11:05:53.6913031+03:00</ACTION_DATE>
                <REASON>E-fatura/E-Arşiv gönder-al testleri için</REASON>
                <APPLICATION_NAME>EDM MINI CONNECTOR v1.0</APPLICATION_NAME>
                <HOSTNAME>MDORA17</HOSTNAME>
                <CHANNEL_NAME>TEST</CHANNEL_NAME>
                <COMPRESSED>N</COMPRESSED>
            </REQUEST_HEADER>
        </LogoutRequest>
    </s:Body>
</s:Envelope>



LogoutResponse

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <LogoutResponse xmlns="http://tempuri.org/">
            <REQUEST_RETURN xmlns="">
                <INTL_TXN_ID>0</INTL_TXN_ID>
                <RETURN_CODE>0</RETURN_CODE>
            </REQUEST_RETURN>
        </LogoutResponse>
    </s:Body>
</s:Envelope>
 



## 1.3 SEND INVOICE

SendInvoiceRequest

```
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Header>
        <ActivityId CorrelationId="cdc1a640-f7a1-48e8-84e3-ac0ec8228ce8" xmlns="http://schemas.microsoft.com/2004/09/ServiceModel/Diagnostics">00000000-0000-0000-0000-000000000000</ActivityId>
    </s:Header>
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <SendInvoiceRequest xmlns="http://tempuri.org/">
            <REQUEST_HEADER xmlns="">
                <SESSION_ID>381adb94-5143-4a61-8d5f-5fe489820896</SESSION_ID>
                <CLIENT_TXN_ID>dc824d6f-cf80-4079-994f-192eedb5027d</CLIENT_TXN_ID>
                <ACTION_DATE>2018-11-01T11:14:56.7583153+03:00</ACTION_DATE>
                <REASON>E-fatura/E-Arşiv gönder-al testleri için</REASON>
                <APPLICATION_NAME>EDM MINI CONNECTOR v1.0</APPLICATION_NAME>
                <HOSTNAME>MDORA17</HOSTNAME>
                <CHANNEL_NAME>TEST</CHANNEL_NAME>
                <COMPRESSED>N</COMPRESSED>
            </REQUEST_HEADER>
            <RECEIVER vkn="1245548126" alias="damla.bas@edmbilisim.com.tr" xmlns=""/>
            <INVOICE TRXID="0" xmlns="">
                <HEADER>
                    <SENDER>3230512384</SENDER>
                    <RECEIVER>1245548126</RECEIVER>
                    <FROM>urn:mail:defaultgb@yenibirfirmadaha.com.tr </FROM>
                    <TO>damla.bas@edmbilisim.com.tr</TO>
                    <INTERNETSALES>false</INTERNETSALES>
                    <EARCHIVE>false</EARCHIVE>
                    <EARCHIVE_REPORT_SENDDATE>0001-01-01</EARCHIVE_REPORT_SENDDATE>
                    <CANCEL_EARCHIVE_REPORT_SENDDATE>0001-01-01</CANCEL_EARCHIVE_REPORT_SENDDATE>
                </HEADER>
                <CONTENT>PEludm9pY...2UgeG1sbn</CONTENT>
            </INVOICE>
        </SendInvoiceRequest>
    </s:Body>
</s:Envelope>

```

- SendInvoiceResponse

```
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <SendInvoiceResponse xmlns="http://tempuri.org/">
            <REQUEST_RETURN xmlns="">
                <INTL_TXN_ID>16495098</INTL_TXN_ID>
                <CLIENT_TXN_ID>dc824d6f-cf80-4079-994f-192eedb5027d</CLIENT_TXN_ID>
                <RETURN_CODE>0</RETURN_CODE>
            </REQUEST_RETURN>
            <INVOICE TRXID="16495098" UUID="2a83a3ef-2a63-4013-b620-84fd7e96d86b" ID="EE12018000000008" xmlns="">
                <HEADER>
                    <STATUS>PACKAGE - PROCESSING</STATUS>
                    <STATUS_DESCRIPTION>PROCESSING</STATUS_DESCRIPTION>
                    <INTERNETSALES>false</INTERNETSALES>
                    <EARCHIVE>false</EARCHIVE>
                    <EARCHIVE_REPORT_SENDDATE>0001-01-01</EARCHIVE_REPORT_SENDDATE>
                    <CANCEL_EARCHIVE_REPORT_SENDDATE>0001-01-01</CANCEL_EARCHIVE_REPORT_SENDDATE>
                </HEADER>
            </INVOICE>
        </SendInvoiceResponse>
    </s:Body>
</s:Envelope>

```




## 1.4 GET INVOICE

GetInvoiceRequest

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Header>
        <ActivityId CorrelationId="ed41b0da-c7c3-47b3-abd1-76e691973c0e" xmlns="http://schemas.microsoft.com/2004/09/ServiceModel/Diagnostics">00000000-0000-0000-0000-000000000000</ActivityId>
    </s:Header>
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <GetInvoiceRequest xmlns="http://tempuri.org/">
            <REQUEST_HEADER xmlns="">
                <SESSION_ID>381adb94-5143-4a61-8d5f-5fe489820896</SESSION_ID>
                <CLIENT_TXN_ID>dc824d6f-cf80-4079-994f-192eedb5027d</CLIENT_TXN_ID>
                <ACTION_DATE>2018-11-01T11:14:56.7583153+03:00</ACTION_DATE>
                <REASON>E-fatura/E-Arşiv gönder-al testleri için</REASON>
                <APPLICATION_NAME>EDM MINI CONNECTOR v1.0</APPLICATION_NAME>
                <HOSTNAME>MDORA17</HOSTNAME>
                <CHANNEL_NAME>TEST</CHANNEL_NAME>
                <COMPRESSED>N</COMPRESSED>
            </REQUEST_HEADER>
            <INVOICE_SEARCH_KEY xmlns="">
                <ID>TUR2018000000045</ID>
                <READ_INCLUDED>false</READ_INCLUDED>
                <DIRECTION>IN</DIRECTION>
                <CR_START_DATE>2018-10-30T00:00:00+03:00</CR_START_DATE>
                <CR_END_DATE>2018-11-02T00:00:00+03:00</CR_END_DATE>
                <ISARCHIVED>false</ISARCHIVED>
            </INVOICE_SEARCH_KEY>
            <HEADER_ONLY xmlns="">Y</HEADER_ONLY>
            <INVOICE_CONTENT_TYPE xmlns="">XML</INVOICE_CONTENT_TYPE>
        </GetInvoiceRequest>
    </s:Body>
</s:Envelope>


GetInvoiceResponse

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <GetInvoiceResponse xmlns="http://tempuri.org/">
            <INVOICE TRXID="0" UUID="4A7D2053-FBE3-4E06-821E-B816DA575E43" ID="MTB2018000000228" xmlns="">
                <HEADER>
                    <SENDER>3230512384</SENDER>
                    <RECEIVER>11111111111</RECEIVER>
                    <SUPPLIER>FIRMA</SUPPLIER>
                    <CUSTOMER>FARUK DEMELIOGLU</CUSTOMER>
                    <ISSUE_DATE>2018-11-02</ISSUE_DATE>
                    <PAYABLE_AMOUNT currencyID="TRY">92</PAYABLE_AMOUNT>
                    <FROM>urn:mail:defaultgb@edmbilisim.com.tr</FROM>
                    <TO/>
                    <PROFILEID>EARSIVFATURA</PROFILEID>
                    <STATUS>SEND - SUCCEED</STATUS>
                    <STATUS_DESCRIPTION>SUCCEED</STATUS_DESCRIPTION>
                    <GIB_STATUS_CODE>-1</GIB_STATUS_CODE>
                    <GIB_STATUS_DESCRIPTION/>
                    <RESPONSE_CODE/>
                    <RESPONSE_DESCRIPTION/>
                    <FILENAME/>
                    <HASH/>
                    <CDATE>2018-11-02T18:21:51.873</CDATE>
                    <INTERNETSALES>false</INTERNETSALES>
                    <EARCHIVE>false</EARCHIVE>
                    <EXPORT_GTB_REFNO/>
                    <EXPORT_GTB_GCB_TESCILNO/>
                    <INVOICE_TYPE>Satış</INVOICE_TYPE>
                    <INVOICE_SEND_TYPE>e-Arsiv</INVOICE_SEND_TYPE>
                    <EARCHIVE_REPORT_SENDDATE>0001-01-01</EARCHIVE_REPORT_SENDDATE>
                    <EARCHIVE_REPORT_STATUS>  </EARCHIVE_REPORT_STATUS>
                    <EARCHIVE_REPORT_STATUSDESC/>
                    <CANCEL_EARCHIVE_REPORT_SENDDATE>0001-01-01</CANCEL_EARCHIVE_REPORT_SENDDATE>
                    <CANCEL_EARCHIVE_REPORT_STATUSDESC/>
                    <CANCEL_EARCHIVE_REPORT_STATUS>  </CANCEL_EARCHIVE_REPORT_STATUS>
                </HEADER>
                <CONTENT a:contentType="text/plain" xmlns:a="http://www.w3.org/2005/05/xmlmime">base64</CONTENT>
            </INVOICE>
        </GetInvoiceResponse>
    </s:Body>
</s:Envelope>


## 1.5 GET INVOICE STATUS

GetInvoiceStatusRequest

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Header>
        <ActivityId CorrelationId="a753802c-b9fc-465a-87cb-aaf3b8ad34ac" xmlns="http://schemas.microsoft.com/2004/09/ServiceModel/Diagnostics">00000000-0000-0000-0000-000000000000</ActivityId>
    </s:Header>
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <GetInvoiceStatusRequest xmlns="http://tempuri.org/">
            <REQUEST_HEADER xmlns="">
                <SESSION_ID>94739926-e774-4aab-9713-71e2844230d7</SESSION_ID>
                <CLIENT_TXN_ID>4ba113c6-7a35-4300-aba0-04b8bc47dc01</CLIENT_TXN_ID>
                <ACTION_DATE>2018-11-05T14:08:09.7109738+03:00</ACTION_DATE>
                <REASON>E-fatura/E-Arşiv gönder-al testleri için</REASON>
                <APPLICATION_NAME>EDM MINI CONNECTOR v1.0</APPLICATION_NAME>
                <HOSTNAME>MDORA17</HOSTNAME>
                <CHANNEL_NAME>TEST</CHANNEL_NAME>
                <COMPRESSED>N</COMPRESSED>
            </REQUEST_HEADER>
            <INVOICE TRXID="0" UUID="a268a924-0255-4da6-9b47-94383421cb48" xmlns=""/>
        </GetInvoiceStatusRequest>
    </s:Body>
</s:Envelope>


GetInvoiceStatusResponse

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <GetInvoiceStatusResponse xmlns="http://tempuri.org/">
            <INVOICE_STATUS TRXID="0" UUID="a268a924-0255-4da6-9b47-94383421cb48" ID="EE12018000000013" xmlns="">
                <HEADER>
                    <INTERNETSALES>false</INTERNETSALES>
                    <EARCHIVE>false</EARCHIVE>
                    <EXPORT_GTB_REFNO/>
                    <EXPORT_GTB_GCB_TESCILNO/>
                    <EARCHIVE_REPORT_SENDDATE>0001-01-01</EARCHIVE_REPORT_SENDDATE>
                    <CANCEL_EARCHIVE_REPORT_SENDDATE>0001-01-01</CANCEL_EARCHIVE_REPORT_SENDDATE>
                </HEADER>
                <STATUS>SEND - SUCCEED</STATUS>
                <STATUS_DESCRIPTION>SUCCEED</STATUS_DESCRIPTION>
                <RESPONSE_CODE/>
                <RESPONSE_DESCRIPTION/>
                <CDATE>2018-11-01T13:38:23.267</CDATE>
                <EARCHIVE_REPORT_STATUS>  </EARCHIVE_REPORT_STATUS>
                <EARCHIVE_CANCEL_REPORT_STATUS>  </EARCHIVE_CANCEL_REPORT_STATUS>
                <EARCHIVE_REPORT_STATUS_DESC/>
                <EARCHIVE_CANCEL_REPORT_STATUS_DESC/>
                <DIRECTION>Giden</DIRECTION>
            </INVOICE_STATUS>
        </GetInvoiceStatusResponse>
    </s:Body>
</s:Envelope>



## 1.6 MARK INVOICE

MarkInvoiceRequest

```xml
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Header>
        <ActivityId CorrelationId="7aa7f808-22ac-4501-9967-619347f55383" xmlns="http://schemas.microsoft.com/2004/09/ServiceModel/Diagnostics">00000000-0000-0000-0000-000000000000</ActivityId>
    </s:Header>
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <MarkInvoiceRequest xmlns="http://tempuri.org/">
            <REQUEST_HEADER xmlns="">
                <SESSION_ID>94739926-e774-4aab-9713-71e2844230d7</SESSION_ID>
                <CLIENT_TXN_ID>4ba113c6-7a35-4300-aba0-04b8bc47dc01</CLIENT_TXN_ID>
                <ACTION_DATE>2018-11-05T14:08:09.7109738+03:00</ACTION_DATE>
                <REASON>E-fatura/E-Arşiv gönder-al testleri için</REASON>
                <APPLICATION_NAME>EDM MINI CONNECTOR v1.0</APPLICATION_NAME>
                <HOSTNAME>MDORA17</HOSTNAME>
                <CHANNEL_NAME>TEST</CHANNEL_NAME>
                <COMPRESSED>N</COMPRESSED>
            </REQUEST_HEADER>
            <MARK value="READ" xmlns="">
                <INVOICE TRXID="0" ID="HPL2018000000002"/>
            </MARK>
        </MarkInvoiceRequest>
    </s:Body>
</s:Envelope>

```

➖ MarkInvoiceResponse

```xml
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <MarkInvoiceResponse xmlns="http://tempuri.org/">
            <REQUEST_RETURN xmlns="">
                <INTL_TXN_ID>0</INTL_TXN_ID>
                <CLIENT_TXN_ID>4ba113c6-7a35-4300-aba0-04b8bc47dc01</CLIENT_TXN_ID>
                <RETURN_CODE>0</RETURN_CODE>
            </REQUEST_RETURN>
        </MarkInvoiceResponse>
    </s:Body>
</s:Envelope>

```



## 1.7 GET USER LIST

GetUserListRequest

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Header>
        <ActivityId CorrelationId="f70f37fd-57ab-46da-843b-5d0cbd4146de" xmlns="http://schemas.microsoft.com/2004/09/ServiceModel/Diagnostics">00000000-0000-0000-0000-000000000000</ActivityId>
    </s:Header>
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <GetUserListRequest xmlns="http://tempuri.org/">
            <REQUEST_HEADER xmlns="">
                <SESSION_ID>94739926-e774-4aab-9713-71e2844230d7</SESSION_ID>
                <CLIENT_TXN_ID>4ba113c6-7a35-4300-aba0-04b8bc47dc01</CLIENT_TXN_ID>
                <ACTION_DATE>2018-11-05T14:08:09.7109738+03:00</ACTION_DATE>
                <REASON>E-fatura/E-Arşiv gönder-al testleri için</REASON>
                <APPLICATION_NAME>EDM MINI CONNECTOR v1.0</APPLICATION_NAME>
                <HOSTNAME>MDORA17</HOSTNAME>
                <CHANNEL_NAME>TEST</CHANNEL_NAME>
                <COMPRESSED>N</COMPRESSED>
            </REQUEST_HEADER>
        </GetUserListRequest>
    </s:Body>
</s:Envelope>


GetUserListResponse

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <GetUserListResponse xmlns="http://tempuri.org/">
            <Items xmlns="">
                <Items>
                    <IDENTIFIER>0010047133</IDENTIFIER>
                    <ALIAS>urn:mail:defaultgb@abb.com.tr</ALIAS>
                    <TITLE>ABB ELEKTRIK SANAYI ANONIM SIRKETI</TITLE>
                    <TYPE>OZEL</TYPE>
                    <REGISTER_TIME>2014-03-05T22:35:35</REGISTER_TIME>
                    <UNIT>GB</UNIT>
                    <ALIAS_CREATION_TIME>2017-06-15T13:59:08</ALIAS_CREATION_TIME>
                </Items>
                <Items>
                    <IDENTIFIER>0010047133</IDENTIFIER>
                    <ALIAS>urn:mail:defaultpk@abb.com.tr</ALIAS>
                    <TITLE>ABB ELEKTRIK SANAYI ANONIM SIRKETI</TITLE>
                    <TYPE>OZEL</TYPE>
                    <REGISTER_TIME>2014-03-05T22:35:35</REGISTER_TIME>
                    <UNIT>PK</UNIT>
                    <ALIAS_CREATION_TIME>2017-06-15T13:59:30</ALIAS_CREATION_TIME>
                </Items>
    </Items>
        </GetUserListResponse>
    </s:Body>
</s:Envelope>

## 1.8 CHECK USER

CheckUserRequest

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Header>
        <ActivityId CorrelationId="ecc07b28-8950-4efb-96db-62ce9c7e52d9" xmlns="http://schemas.microsoft.com/2004/09/ServiceModel/Diagnostics">00000000-0000-0000-0000-000000000000</ActivityId>
    </s:Header>
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <CheckUserRequest xmlns="http://tempuri.org/">
            <REQUEST_HEADER xmlns="">
                <SESSION_ID>94739926-e774-4aab-9713-71e2844230d7</SESSION_ID>
                <CLIENT_TXN_ID>4ba113c6-7a35-4300-aba0-04b8bc47dc01</CLIENT_TXN_ID>
                <ACTION_DATE>2018-11-05T14:08:09.7109738+03:00</ACTION_DATE>
                <REASON>E-fatura/E-Arşiv gönder-al testleri için</REASON>
                <APPLICATION_NAME>EDM MINI CONNECTOR v1.0</APPLICATION_NAME>
                <HOSTNAME>MDORA17</HOSTNAME>
                <CHANNEL_NAME>TEST</CHANNEL_NAME>
                <COMPRESSED>N</COMPRESSED>
            </REQUEST_HEADER>
            <USER xmlns="">
                <IDENTIFIER>3230512384</IDENTIFIER>
            </USER>
        </CheckUserRequest>
    </s:Body>
</s:Envelope>


CheckUserResponse

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <CheckUserResponse xmlns="http://tempuri.org/">
        <USER xmlns="">
                <IDENTIFIER>3230512384</IDENTIFIER>
                <ALIAS>urn:mail:defaultpk@yenibirfirmadaha.com.tr</ALIAS>
                <TITLE>ETA BİLGİSAYAR TEST 3</TITLE>
                <TYPE>OZEL</TYPE>
                <REGISTER_TIME>2014-02-17T15:55:17</REGISTER_TIME>
                <UNIT>PK</UNIT>
                <ALIAS_CREATION_TIME>2015-12-31T12:09:52</ALIAS_CREATION_TIME>
            </USER>
        </CheckUserResponse>
    </s:Body>
</s:Envelope>

## 1.9 SEND INVOICE RESPONSEWITH SERVER SIGN

SendInvoiceResponseWithServerSignRequest

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Header>
        <ActivityId CorrelationId="a7c2623c-ffe7-4b8f-a58e-2f4fbf43ddb7" xmlns="http://schemas.microsoft.com/2004/09/ServiceModel/Diagnostics">00000000-0000-0000-0000-000000000000</ActivityId>
    </s:Header>
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <SendInvoiceResponseWithServerSignRequest xmlns="http://tempuri.org/">
            <REQUEST_HEADER xmlns="">
                <SESSION_ID>29f80658-215f-4474-a384-7c7d83a5cb55</SESSION_ID>
                <CLIENT_TXN_ID>3f22012b-e968-4fbe-8fe9-2bb57ed36a52</CLIENT_TXN_ID>
                <ACTION_DATE>2018-11-05T14:45:35.3217433+03:00</ACTION_DATE>
                <REASON>E-fatura/E-Arşiv gönder-al testleri için</REASON>
                <APPLICATION_NAME>EDM MINI CONNECTOR v1.0</APPLICATION_NAME>
                <HOSTNAME>MDORA17</HOSTNAME>
                <CHANNEL_NAME>TEST</CHANNEL_NAME>
                <COMPRESSED>N</COMPRESSED>
            </REQUEST_HEADER>
            <STATUS xmlns="">KABUL</STATUS>
            <INVOICE TRXID="0" ID="TRM2018002017076" xmlns=""/>
        </SendInvoiceResponseWithServerSignRequest>
    </s:Body>
</s:Envelope>


SendInvoiceResponseWithServerSignResponse

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <SendInvoiceResponseWithServerSignResponse xmlns="http://tempuri.org/">
            <REQUEST_RETURN xmlns="">
                <INTL_TXN_ID>0</INTL_TXN_ID>
                <CLIENT_TXN_ID>3f22012b-e968-4fbe-8fe9-2bb57ed36a52</CLIENT_TXN_ID>
                <RETURN_CODE>0</RETURN_CODE>
            </REQUEST_RETURN>
        </SendInvoiceResponseWithServerSignResponse>
    </s:Body>
</s:Envelope>





 
## 1.10 CANCEL INVOICE

CancelInvoiceRequest

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Header>
        <ActivityId CorrelationId="c1479431-55b5-426c-9e37-c8137e398171" xmlns="http://schemas.microsoft.com/2004/09/ServiceModel/Diagnostics">00000000-0000-0000-0000-000000000000</ActivityId>
    </s:Header>
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <CancelInvoiceRequest xmlns="http://tempuri.org/">
            <REQUEST_HEADER xmlns="">
                <SESSION_ID>94739926-e774-4aab-9713-71e2844230d7</SESSION_ID>
                <CLIENT_TXN_ID>0058c242-0200-44fd-a9c6-0c78d8669cd4</CLIENT_TXN_ID>
                <ACTION_DATE>2018-11-05T14:52:15.3740752+03:00</ACTION_DATE>
                <REASON>E-fatura/E-Arşiv gönder-al testleri için</REASON>
                <APPLICATION_NAME>EDM MINI CONNECTOR v1.0</APPLICATION_NAME>
                <HOSTNAME>MDORA17</HOSTNAME>
                <CHANNEL_NAME>TEST</CHANNEL_NAME>
                <COMPRESSED>N</COMPRESSED>
            </REQUEST_HEADER>
            <INVOICE TRXID="0" UUID="9c6a54a3-97ed-480b-af05-b527434f0197" xmlns=""/>
        </CancelInvoiceRequest>
    </s:Body>
</s:Envelope>



CancelInvoiceResponse

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <CancelInvoiceResponse xmlns="http://tempuri.org/">
            <REQUEST_RETURN xmlns="">
                <INTL_TXN_ID>0</INTL_TXN_ID>
                <CLIENT_TXN_ID>0058c242-0200-44fd-a9c6-0c78d8669cd4</CLIENT_TXN_ID>
                <RETURN_CODE>0</RETURN_CODE>
            </REQUEST_RETURN>
        </CancelInvoiceResponse>
    </s:Body>
</s:Envelope>



## 1.11 CHECK COUNTER

CheckCounterRequest

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Header>
        <ActivityId CorrelationId="5634bb85-abc6-4dd4-aed9-68c6c8cee33d" xmlns="http://schemas.microsoft.com/2004/09/ServiceModel/Diagnostics">00000000-0000-0000-0000-000000000000</ActivityId>
    </s:Header>
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <CheckCounterRequest xmlns="http://tempuri.org/">
            <REQUEST_HEADER xmlns="">
                <SESSION_ID>29f80658-215f-4474-a384-7c7d83a5cb55</SESSION_ID>
                <ACTION_DATE>2018-11-05T17:29:16.2038258+03:00</ACTION_DATE>
                <REASON>E-fatura/E-Arşiv gönder-al testleri için</REASON>
                <APPLICATION_NAME>EDM MINI CONNECTOR v1.0</APPLICATION_NAME>
                <HOSTNAME>MDORA17</HOSTNAME>
                <CHANNEL_NAME>TEST</CHANNEL_NAME>
                <COMPRESSED>N</COMPRESSED>
            </REQUEST_HEADER>
        </CheckCounterRequest>
    </s:Body>
</s:Envelope>


CheckCounterResponse
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <CheckCounterResponse xmlns="http://tempuri.org/">
            <COUNTER_LEFT xmlns="">-88</COUNTER_LEFT>
        </CheckCounterResponse>
    </s:Body>
</s:Envelope>


## 1.12 GET INVOICE RESPONSE DATE

GetInvoiceResponseDateRequest

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <GetInvoiceResponseDateRequest xmlns="http://tempuri.org/">
            <REQUEST_HEADER xmlns="">
                <SESSION_ID>58e634b3-61a2-44c2-8244-9eb04370bba9</SESSION_ID>
                <CLIENT_TXN_ID>afe7bdb0-6de2-435a-8c0f-7f62e2e2a42c</CLIENT_TXN_ID>
                <ACTION_DATE>2019-12-10T15:50:21.6431085+03:00</ACTION_DATE>
                <REASON>E-fatura/E-Arşiv gönder-al testleri için</REASON>
                <APPLICATION_NAME>EDM MINI CONNECTOR v1.0</APPLICATION_NAME>
                <HOSTNAME>MDORA17</HOSTNAME>
                <CHANNEL_NAME>TEST</CHANNEL_NAME>
                <COMPRESSED>N</COMPRESSED>
            </REQUEST_HEADER>
            <INVOICERESPONSEDATE_SEARCH_KEY xmlns="">
                <INVOICERESPONSESTARTDATE>2018-12-10T15:50:26</INVOICERESPONSESTARTDATE>
                <INVOICERESPONSEENDDATE>2019-12-10T15:50:26.9073987+03:00</INVOICERESPONSEENDDATE>
                <INVOICEID>DTN2017000131109</INVOICEID>
                <INVOICEUUID>a194000b-a3e9-43a7-990b-67b5d8903a07</INVOICEUUID>
                <COMPANYTAXNUMBER>3230512384</COMPANYTAXNUMBER>
            </INVOICERESPONSEDATE_SEARCH_KEY>
        </GetInvoiceResponseDateRequest>
    </s:Body>
</s:Envelope>


GetInvoiceResponseDateResponse

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
    <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
        <GetInvoiceResponseDateResponse xmlns="http://tempuri.org/">
            <Items xmlns="">
                <Items>
                    <INVOICERESPONSEDATE>2019-03-28T14:57:11.777</INVOICERESPONSEDATE>
                    <INVOICEID>DTN2017000131109</INVOICEID>
                    <INVOICEUUID>a194000b-a3e9-43a7-990b-67b5d8903a07</INVOICEUUID>
                    <SUPPLIERTAXNUMBER>3230512384</SUPPLIERTAXNUMBER>
                    <SUPPLIERNAME>EDM BILISIM SISTEMLERI VE DANISMANLIK HIZMETLERI ANONIM SIRKETI</SUPPLIERNAME>
                    <STATUSCODE>14-1</STATUSCODE>
                    <STATUSDESC>Kabul edildi</STATUSDESC>
                </Items>
            </Items>
        </GetInvoiceResponseDateResponse>
    </s:Body>
</s:Envelope>



## 1.13 UYGULAMA TARAFINDAN ÜRETİLEN SOAP FAULT EXCEPTION

Web servis işleminde uygulama ve sistem hataları vb. gibi her türlü olumsuz sonuç, “REQUEST_ERRORType “  tipinde SOAP Fault exception ile dönülmektedir. Örneğin, hatalı kullanıcı ve şifre verildiğinde dönen soap fault exception aşağıda verilmiştir.

<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
	<s:Body>
		<s:Fault>
			<faultcode>s:Client</faultcode>
			<faultstring xml:lang="tr-TR">Kullanıcı Bulunamadı!</faultstring>
			<detail>
				<RequestFault xmlns="http://tempuri.org/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
					<INTL_TXN_ID xmlns="">0</INTL_TXN_ID>
					<CLIENT_TXN_ID xmlns="">199fcbaf-ff8a-456e-8d3c-49b40f0f6a50</CLIENT_TXN_ID>
					<ERROR_CODE xmlns="">2005</ERROR_CODE>
					<ERROR_SHORT_DES xmlns="">Kullanıcı Bulunamadı!</ERROR_SHORT_DES>
					<ERROR_LONG_DES xmlns="">Kullanıcı veya Şifre hatalı!</ERROR_LONG_DES>
					<STACKTRACE xmlns=""/>
				</RequestFault>
			</detail>
		</s:Fault>
	</s:Body>
</s:Envelope>


