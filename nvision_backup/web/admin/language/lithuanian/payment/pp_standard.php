<?php
// Heading
$_['heading_title']							= 'PayPal Standard';

// Text
$_['text_payment']							= 'Mokėjimai';
$_['text_success']							= 'Jūs sėkmingai modifikavote Paypal paskyros detales!';
$_['text_pp_standard']						= '<a href="https://www.paypal.com/" target="_blank"><img src="view/image/payment/paypal.png" alt="PayPal" title="PayPal" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_authorization']					= 'Autorizavimas';
$_['text_sale']								= 'Pardavimas';

// Entry
$_['entry_email']							= 'El. paštas:';
$_['entry_total']             		= 'Minimali užsakymo suma';
$_['entry_test']							= 'Smėlio dėžės (Sandbox) režimas:';
$_['entry_transaction']						= 'Transakcijos būdas:';
$_['entry_geo_zone']						= 'Geo zona:';
$_['entry_status']							= 'Būsena:';
$_['entry_sort_order']						= 'Rikiavimas:';
$_['entry_pdt_token']						= 'Mokėjimo duomenų perdavimo žymė:<br/><span class="help">Mokėjimo duomenų perdavimo žymė naudojama papildomam saugumui ir patikimumui. Sužinokite kaip ją aktyvuoti <a href="https://cms.paypal.com/us/cgi-bin/?&cmd=_render-content&content_ID=developer/howto_html_paymentdatatransfer" alt="">čia</a></span>';
$_['entry_itemized']						= 'Įvardinti produktus:<br/><span class="help">Rodyti produktų sąrašą Paypal sąskaitoje faktūroje vietoje parduotuvės pavadinimo.</span>';
$_['entry_debug']							= 'Derinimo režimas:<br/><span class="help">Įrašo papildomą informaciją į sistemos žurnalą.</span>';
$_['entry_completed_status']					= 'Užsakymo būsena Įvykdyta:<br /><span class="help">Ši būsena nustatoma, kai apmokėjimas sėkmingai baigtas.</span>';
$_['entry_pending_status']			= 'Užsakymo būsena Laukiama:<br /><span class="help">Mokėjimas laukia; pažiūrėkite priežasties kintamąjį, kad sužinotumėte daugiau. Gausite dar vieną greito apmokėjimo pranešimą (Instant Payment Notification), kai mokėjimo būsena pasikeis į to Įvykdytas, Nepavyko arba Atmestas.</span>';
$_['entry_denied_status']				= 'Užsakymo būsena Atmesta:<br /><span class="help">Jūs, prekiautojas, atmetėte mokėjimą. Taip gali atsitikti tik tada, jei mokėjimas anksčiau buvo laukimo būsenoje dėl vienos iš laukimo priežasčių.</span>';
$_['entry_failed_status']				= 'Užsakykmo būsena Nepavyko:<br /><span class="help">Mokėjimas nepavyko. Taip gali atsitikti tada, jei apmokėjimą buvo bandoma atlikti iš jūsų kliento banko sąskaitos.</span>';
$_['entry_refunded_status']			= 'Užsakymo būsena Grąžinta:<br /><span class="help">Jūs, prekiautojas, grąžinote apmokėjimą.</span>';
$_['entry_canceled_reversal_status']	= 'Užsakymo būsena Atšauktas Panaikinimas:<br /><span class="help">Tai reiškia, kad panaikinimas buvo atšauktas, pvz., jūs, prekiautojas, laimėjote ginčą su klientu ir panaikintosios transakcijos lėšos vėl sugrįžo Jums.</span>';
$_['entry_reversed_status']			= 'Užsakymo būsena Panaikinta:<br /><span class="help">Tai reiškia kad mokėjimas buvo panaikintas dėl kliento kreipimosi į banką (chargeback) arba kitos atšaukimo priežasties. Lėšos buvo išskaičiuotos iš Jūsų sąskaitos balanso ir grąžintos klientui. Atšaukimo priežastį parodo reason_code kintamasis.</span>';
$_['entry_unspecified_status']		= 'Užsakymo būsena Nežinoma Klaida:';
$_['entry_processed_status']			= 'Užsakymo būsena Apdorotata:</span>';
$_['entry_voided_status']			= 'Užsakymo būsena Anuliuotas:';
$_['entry_expired_status']			= 'Nebegaliojačio užsakymo būsena';

// Error
$_['error_permission']						= 'Jūs neturite teisių modifikuoti PayPal parametrų!';
$_['error_email']							= 'Būtinas el. pašto adresas!';
?>