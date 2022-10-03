.. include:: /Includes.rst.txt


.. _administration:

==============
Administration
==============

Installation
============

The distribution can be installed from within the distribution list, by uploading
the extension and through composer. Refer to TYPO3 `getting started documentation
<https://docs.typo3.org/m/typo3/tutorial-getting-started/main/en-us/Index.html>`__
for further details.

Required extensions
-------------------

The following extensions will be installed with the distribution:

================================ ================
Extension                        Version
================================ ================
container_elements               4.0.0-4.99.99
eventnews                        5.0.0
news                             9.1.0-9.99.99
pizpalue                         14.0.0-14.99.99
timelog                          1.7.0-1.99.99
tt_address                       6.0.1-6.99.99
user_pizpalue                    4.0.0-4.99.99
================================ ================

Supported extensions
--------------------

The distribution supports the same extensions as the extension `pizpalue`. Head
over to its `administration chapter <https://docs.typo3.org/p/buepro/typo3-
pizpalue/main/en-us/Administration/Index.html#supported-extensions>`__
to see the details.

.. note::

   In case one of the supported extensions is being used it **should be installed
   prior** installing this distribution. This ensures that already predefined
   records for supported extensions are being imported during installing the
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

See `buepro/typo3-pizpalue-distribution-base <https://packagist.org/packages/
buepro/typo3-pizpalue-distribution-base>`__.


Customization
=============

The suggested way to customize the distribution for customer projects is to
create an extension (e.g. user_pizpalue) and define the customer theme and
functions in it (`see TYPO3 documentation <https://docs.typo3.org/typo3cms/
ExtbaseFluidBook/4-FirstExtension/Index.html>`__).

An example extension for that purpose is delivered and activated with the
distribution. You might use it as your starting point.

.. figure:: ../Images/Administration/Customize.jpg
   :alt: Customize the distribution for customer projects

   Customize the distribution for customer projects

The extension might be deactivated by removing its static template or by
uninstalling it. To prevent the extension `user_pizpalue` from being installed
the checkbox `Install customer extension` in the `Extension Configuration`
from the settings module might be deactivated.
