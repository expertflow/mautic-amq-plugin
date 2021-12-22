# ActiveMQ Transport plugin for Mautic 3.x
This Mautic plugin can send a Mautic campaign message as an ActiveMQ message. 

## Requirements
1. Mautic 3.2
2. PHP 7+
3. Stomp-php 5.0.0 (https://github.com/stomp-php/stomp-php)
4. https://github.com/expertflow/mautic-amq-plugin


## How to install

### Pre-Requisite

1. Go to Vendor folder in mautic's server directory using sftp access (html/vendor/)
2. Create new folder of name `stomp-php`
3. Download Stomp-php release 5.0.0 (https://github.com/stomp-php/stomp-php)
4. Extract it to vendor/stomp-php/ folder.
5. Run `rm -rf var/cache/*` 


### Plugin Installation (do not use composer at this time)

1. Download https://github.com/expertflow/mautic-amq-plugin
2. Extract it to plugins/MauticActivemqTransportBundle
3. Delete `app/cache/prod` or Run `rm -rf var/cache/*` to clear cache 
4. Go to Plugins in Mautic's admin menu (/s/plugins)
5. Click on the `Install / Upgrade Plugin` button to install plugin or Run `php app/console mautic:plugins:install` to install plugin via commandline
6. Go to Mautic's Configuration (/s/config/edit), click on the Text Message Settings, then choose ActiveMQ as the default transport.


## Send Test Text Message

### Setup Campaign to Send Text Message

After configure the plugin.

1. Go to Channels -> Text Messages.
2. Create a text message with any content.
3. Create some new Contacts having valid email and mobile number field.
4. Go to Segments.
5. Create a new Segment: Add filter having contacts with valid Mobile numbers in it.
6. Go to Campaigns.
7. Create a new campaign: Contact Sources: Campaign Segment.
8. Choose the Segment you created early.
9. In the next step, select Action.
10. In the Select box, choose Send Text Messages.
11. In the box of Send Text Messages, put a name and choose the message - that you created early.
12. Click on the Publish button and Save your campaign.


### To run the Campaign.

Execute the Following Commands.

1. `php bin/console cache:clear`
2. `php bin/console mautic:segments:update`
3. `php bin/console mautic:campaigns:update`
4. `php bin/console mautic:campaigns:trigger`


## Note

When using Mautic ActiveMQ Plugin.

1. +XXXXXXXXXXXX format for the contact phone number including the `+` with country code and no space.
2. Fulfilled in the mobile contact field.
3. Dynamic Variables can be added in the Text Messages like `Hi {contactfield=firstname}`
