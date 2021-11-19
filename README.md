# ActiveMQ Transport plugin for Mautic 3

Plugin to provide ActiveMQ transport to Mautic.

## Requirements

1. Mautic 3.2
2. PHP 7+
3. https://github.com/expertflow/mautic-amq-plugin


## How to install


### Installation (do not use composer at this time)

1. Download https://github.com/expertflow/mautic-amq-plugin
2. Extract it to plugins/MauticActivemqTransportBundle
3. Delete `app/cache/prod`
3. Run `php app/console mautic:plugins:install`
4. Go to Plugins in Mautic's admin menu (/s/plugins)
6. Go to Mautic's Configuration (/s/config/edit), click on the Text Message Settings, then choose ActiveMQ as the default transport.

## FYI

### Maximum length

### Supported Characters
