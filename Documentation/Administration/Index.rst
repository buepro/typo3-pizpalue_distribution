.. include:: ../Includes.txt


.. _administration:

==============
Administration
==============

Installation
============

The distribution can be installed from within the distribution list, by uploading the extension and through composer.
Refer to TYPO3 documentation for further details on
`installing extensions <https://docs.typo3.org/m/typo3/guide-installation/master/en-us/ExtensionInstallation/Index.html>`__.

Required extensions
-------------------

The following extensions will be installed with the distribution:

================================ ================
Extension                        Version
================================ ================
pizpalue                         11.2.0-11.99.99
container_elements               1.0.0-1.99.99
news                             8.5.0-8.99.99
eventnews                        4.0.0-4.99.99
tt_address                       5.2.0-8.99.99
ws_flexslider                    1.5.14-1.99.99
timelog                          1.6.0-1.99.99
================================ ================

Supported extensions
--------------------

The distribution supports the same extensions as the extension `pizpalue`. Head over to its
`administration chapter <https://docs.typo3.org/p/buepro/typo3-pizpalue/master/en-us/Administration/Index.html#supported-extensions>`__
to see the details.

.. note::

   In case one of the supported extensions is being used it **should be installed prior** installing this distribution.
   This ensures that already predefined records for supported extensions are being imported during installing the
   distribution.

Extension manager
-----------------

Follow these steps to install the distribution through the extension manager:

#. Go to the extension manager
#. Install `supported extensions` as needed
#. Select `Get preconfigured distribution`
#. Search for `Pizpalue Distribution` and install it

Composer
--------

.. hint::
   A composer package to be used with the command `create-project` is available.
   See `buepro/typo3-pizpalue-distribution-base <https://packagist.org/packages/buepro/typo3-pizpalue-distribution-base>`__.

In the following code snippets TYPO3 with the extension `pizpalue_distribution` will be installed in the directory
`pizpalue`.

.. note::
   In case you encounter a problem with the typo3 console test if **remote db connection** is required and the host
   configuration is correct (:php:`'host' => '127.0.0.1'`).

.. rst-class:: bignums

1. Install TYPO3 (optional)

   .. code-block:: bash

      composer create-project typo3/cms-base-distribution pizpalue
      cd pizpalue

   After the packages have been added the installation setup has to be carried out. This can be done by walking
   through the installation wizard or by command (replace credentials in `[]`-brackets):

   .. code-block:: bash

      vendor/bin/typo3cms install:setup \
      --no-interaction \
      --use-existing-database \
      --database-name='[database_name]' \
      --database-user-name='[database_user_name]' \
      --database-user-password='[database_password]' \
      --admin-user-name='[admin_user_name]' \
      --admin-password='[admin_password]' \
      --site-name='[site_name]' \
      --web-server-config='apache'

2. Adding extension `pizpalue_distribution`

   #. Add autoload section to `composer.json`

      This is needed since the extension `user_pizpalue` is added manually to the site.

      .. code-block:: json

         "autoload": {
            "psr-4": {
               "Buepro\\UserPizpalue\\": "public/typo3conf/ext/user_pizpalue/Classes"
            }
         }

   #. Get package `buepro/typo3-pizpalue-distribution`

      .. code-block:: bash

         composer req buepro/typo3-pizpalue-distribution

3. Setup extensions

   .. code-block:: bash

      vendor/bin/typo3cms extension:deactivate pizpalue_distribution
      vendor/bin/typo3cms extension:deactivate pizpalue
      vendor/bin/typo3cms extension:setupactive
      vendor/bin/typo3cms extension:activate pizpalue
      vendor/bin/typo3cms extension:activate pizpalue_distribution
      vendor/bin/typo3cms cache:flush

Customization
=============

The suggested way to customize the distribution for customer projects is to create an extension (e.g. user_pizpalue)
and define the customer theme and functions in it (`see TYPO3 documentation
<https://docs.typo3.org/typo3cms/ExtbaseFluidBook/4-FirstExtension/Index.html>`__).

An example extension for that purpose is delivered and activated with the distribution. You might use it as your
starting point.

.. figure:: ../Images/Administration/Customize.jpg
   :alt: Customize the distribution for customer projects

   Customize the distribution for customer projects

The extension might be deactivated by removing its static template or by uninstalling it. To prevent the extension
`user_pizpalue` from being installed the checkbox `Install customer extension` in the `Extension
Configuration` from the settings module might be deactivated.
