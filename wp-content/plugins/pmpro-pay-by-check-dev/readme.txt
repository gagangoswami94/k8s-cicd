=== Paid Memberships Pro: Pay by Check Add On ===
Contributors: strangerstudios, eighty20results
Tags: pmpro, paid memberships pro, members, memberships, check, cheque, payments, offline
Requires at least: 4
Tested up to: 5.5
Stable tag: 0.9

A collection of customizations useful when allowing users to pay by check for Paid Memberships Pro levels.

== Description ==

Adds a radio option to checkout to pay by credit card or PayPal now or pay by check.

Users who choose to pay by check will have their order to "pending" status.

Users with a pending order will not have access based on their level.

After you receive and cash the check, you can edit the order to change the status to "success", which will give the user access.

An email is sent to the user RE the status change.

== Installation ==

1. Upload the `pmpro-pay-by-check` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Change your Payment Settings to the "Pay by Check" gateway and make sure to set the "Instructions" with instructions for how to pay by check. Save.
1. Change the Payment Settings back to use your gateway of choice. Behind the scenes the Pay by Check settings are still stored.
1. Edit your membership levels and set the "Pay by Check Settings" for each level.

If you would like to change the wording from "Pay by Check" to something else, you can use this custom code:
https://gist.github.com/strangerstudios/68bb75bf3b83530390d4

== Changelog ==
= 0.9 - 2020-08-31 =
* ENHANCEMENT: Improved SQL queries around sending email reminders, cancelling outstanding memberships. Thanks @swhytehead
* ENHANCEMENT: Support PayFast gateway.
* ENHANCEMENT: Support PayPal Website Payments Pro.

= .8.1 =
* BUG FIX: Fixed issue when using PMPro v2.1+.
* BUG FIX: Fixed issue with billing address or payment info fields not being shown when switching back to the default gateway after having an error with checking out by check.

= .8 =
* BUG FIX: Fixed issue where JavaScript was loaded on non-post pages (e.g. archives).
* BUG FIX: Now using the correct text domain for localization.
* BUG FIX: Fixed bug in pmprobpc_isMemberPending when the user has no last order.
* BUG FIX/ENHANCEMENT: Added support for Variable Pricing add-on.
* BUG FIX/ENHANCEMENT: Added pmprobpc_memberHasAccessWithAnyLevel() to use with PMPro MMPU. Needs more testing.
* ENHANCEMENT: Change Text Domain for plugin/add-on.
* FEATURE: Added French Translation. (Thanks, Alfonso Sánchez Uzábal)

= .7.8 =
* BUG FIX/ENHANCEMENT: pmpropbc_isMemberPending can now accept a level ID as a 2nd parameter to check status for a user's specific level.

= .7.8 =
* BUG FIX: Fixed issue where PayPal button was showing sometimes when "check" was chosen.
* ENHANCEMENT: Now showing a better non-member-text notice when pending members try to access content.

= .7.7 =
* BUG: Updated to better support the PayPal Website Payments Pro gateway option. Shows 3 gateway options in one box now.

= .7.6 =
* BUG: Fixed bug in pmpropbc_send_invoice_email().
* BUG: Fixed issue with PMPro 1.8.14+ where a discount code error would show up at checkout even if no code was used.
* BUG/ENHANCEMENT: Users are no longer considered "pending" (although the order still is) if they renew their expiring membership early. The code will check if the user has successfully paid order within the membership period, including the grace period set for the level in the pay by check options. We were doing this check for recurring memberships before, but will do them for one time payments as well now.

= .7.5 =
* BUG: Check of discounted price would sometimes fail
* BUG: Would sometimes cause JavaScript error if Stripe gateway was configured & discount code set cost to 0
* BUG: Infinite loop when discount code sets cost to 0
* BUG: Correctly toggle payment information field when discount code(s) are present
* BUG: Warning when order isn't found
* BUG/ENHANCEMENT: Updated to better support using this addon along with the Add PayPal Express addon. Make sure both are up to date.
* BUG/ENHANCEMENT: Updated the Choose a Payment Method box to hook into pmpro_checkout_boxes with priority 20. This will make it more likely for the Payment Method box to show up closer to the billing address and payment address sections (e.g. after any custom Register Helper fields).
* ENHANCEMENT: Added a PMPROPBC_VER constant used during enqueue operations
* ENHANCEMENT: Separated JavaScript into their own files to make them debuggable & load during enqueue operations

= .7 =
* NOTE: Changed togglePaymentMethodBox() function to have a prefix, pmpropbc_togglePaymentMethodBox().
* BUG: Along with update 1.8.10.4 of PMPro, fixes an issue where users could not checkout when they applied a discount code that made the level free.
* BUG/ENHANCEMENT: Better integration with the Address for Free Levels addon.

= .6 =
* FEATURE: Updated for localization with new pmpropbc.pot/po files.

= .5 =
* Added support for recurring levels.
* Create a new "pending" invoice automatically on renewal date.
* Send emails when the invoice is created asking for payment.
* Send email if the invoice isn't paid within 30, 45 days.
* Cancel the subscription and mark invoice as "unpaid" after 60 days.

= .4 =
* Added ability to set certain levels to be check only.
* Updated readme with info on using gettext filter to change language from "check" to "wire transfer" etc.

= .3.1 =
* Hiding the payment option radio buttons on the review page when using PayPal Express/Standard/etc.

= .3 =
* Added readme.
* If using PayPal Standard or Express gateway, the PayPal checkout submit button will swap out for the default button when choosing to pay by check.

= .1 =
* First version.
