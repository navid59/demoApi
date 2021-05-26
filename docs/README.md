# UI Overview
###### ( [feel free to get it from GitHub repository](https://github.com/mobilpay) )
<!-- ![](assets/img/Demo01.png) -->
## Introduction
A web base example in pure php to simply show how NETOPIA Payments API works and can be implemented in your project, without using any kind of framework ,...



### API URL
<https://secure.sandbox.netopia-payments.com/>

### API Actions
* #### **Start the transaction**
        
    To start the transaction you will need to send your request to **START** action and then depend on response continue the process
    * **Action structure:** The START action has tree main part        
        * **Config:**  to configuration your IPN URL, Return URL, Email notification template, Email notification language
        * **Payment:** to set payment method and card informations
        * **Order:** to set order details
    * **URL:** /payment/card/start
    * **Method:** `POST`    
    * **Params:**


    <_If URL params exist, specify them in accordance with name mentioned in URL section. Separate into optional and required. Document data constraints._> 

    **Required:**
    
    `id=[integer]`

    **Optional:**
    
    `photo_id=[alphanumeric]`

    * **Data Params**

    <_If making a post request, what should the body payload look like? URL Params rules apply here too._>

    * **Success Response:**
    
    <_What should the status code be on success and is there any returned data? This is useful when people need to to know what their callbacks should expect!_>

    * **Code:** 200 <br />
        **Content:** `{ id : 12 }`
    
    * **Error Response:**

    <_Most endpoints will have many ways they can fail. From unauthorized access, to wrongful parameters etc. All of those should be liste d here. It might seem repetitive, but it helps prevent assumptions from being made where they should be._>

    * **Code:** 401 UNAUTHORIZED <br />
        **Content:** `{ error : "Log in" }`

    OR

    * **Code:** 422 UNPROCESSABLE ENTRY <br />
        **Content:** `{ error : "Email Invalid" }`

    * **Sample Call:**

    <_Just a sample call to your endpoint in a runnable format ($.ajax call or a curl request) - this makes life easier and more predictable._> 

    * **Notes:**

    <_This is where all uncertainties, commentary, discussion etc. can go. I recommend timestamping and identifying oneself when leaving comments here._> 

* #### **/sandbox/authorize**
* #### **/payment/card/verify-auth**


----
  


---
## Introduction

## Requirements

## Installation

---




##### Note / Suggestions
* if there is issue with namespace in your platform , you can solve it by getting help from Service Providers. 
for ex. in Laravel you can define a provider and put in your vendor and then set your namespace from the composer.json

* if in any case the Country , City , Zip code , ... is separated from the Address in your application , please merge it with Address and create full address for Billing/Shipping address.