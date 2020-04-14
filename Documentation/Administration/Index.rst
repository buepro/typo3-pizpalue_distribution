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
pizpalue                         11.0.2-11.99.99
pp_gridelements                  1.0.0-1.99.99
slickcarousel                    3.0.3-3.99.99
ws_flexslider                    1.5.12-1.99.99
================================ ================

Supported extensions
--------------------

The following extensions are supported and related content is shipped with the distribution:

================================ ================
Extension                        Version
================================ ================
flux_elements                    1.0.2
indexed_search                   9.5.14-9.5.99
news                             7.3.1-7.99.99
tt_address                       5.0.0-5.99.99
timelog                          1.5.3-1.99.99
================================ ================

.. note::

   In case one of the supported extensions is being used it **should be installed prior** installing this distribution.
   This ensures that already predefined records for supported extensions are being imported during installing the
   distribution.

Extension manager
-----------------

Follow these steps to install the distribution through the extension manager:

#. Go to the extension manager
#. Install ``supported extensions`` as needed
#. Select ``Get preconfigured distribution``
#. Search for ``Piz Palü Distribution`` and install it

Composer
--------

Adding the extension to a composer based installation:

.. highlight:: bash

::

   composer require buepro/typo3-pizpalue-distribution

Installing TYPO3 with pizpalue-distribution:

.. highlight:: json

::

   {
       "name": "buepro/typo3-cms-pizpalue-distribution",
       "description": "TYPO3 with pizpalue distribution",
       "type": "project",
       "repositories": [
           {
               "type": "composer",
               "url": "https://composer.typo3.org/"
           }
       ],
       "require": {
           "buepro/typo3-pizpalue-distribution": "~11.0"
       },
       "extra": {
           "typo3/cms": {
               "web-dir": "web"
           }
       },
       "license": "MIT",
       "authors": [
           {
               "name": "Name",
               "email": "info@domain.com"
           }
       ],
       "minimum-stability": "stable"
   }

After the distribution has been added install it in the extension manager.

Customization
=============

The suggested way to customize the distribution for customer projects is to create an extension (e.g. user_customer)
and define the customer theme and functions in it (`see TYPO3 documentation
<https://docs.typo3.org/typo3cms/ExtbaseFluidBook/4-FirstExtension/Index.html>`__).

An example extension for that purpose is delivered and activated with the distribution. You might use it as your
starting point.

.. figure:: ../Images/Administration/Customize.jpg
   :alt: Customize the distribution for customer projects

   Customize the distribution for customer projects

The extension might be deactivated by removing its static template or by uninstalling it. To prevent the extension
``user_customer`` from being installed the checkbox ``Install customer extension`` in the ``Extension
Configuration`` from the settings module might be deactivated.
