.. include:: ../Includes.txt


.. _configuration:

=============
Configuration
=============

.. _config_installtool:

Install tool
============

Consider to review the below mentioned entries in the installtool.

.. code-block:: php

   $GLOBALS['TYPO3_CONF_VARS']['SYS']['ddmmyy'] = 'd.m.y';
   $GLOBALS['TYPO3_CONF_VARS']['SYS']['hhmm'] = 'H:i';
   $GLOBALS['TYPO3_CONF_VARS']['SYS']['phpTimeZone'] = 'Europe/Zurich';
   $GLOBALS['TYPO3_CONF_VARS']['SYS']['systemLocale'] = 'de_CH.utf8';
   $GLOBALS['TYPO3_CONF_VARS']['BE']['lockSSL'] = true;

Per default TYPO3 writes log entries as well in production context (location `typo3temp/var/log/`). To disable it
the following code might be used in `typo3conf/AdditionalConfiguration.php`:

.. code-block:: php

   if (in_array(\TYPO3\CMS\Core\Utility\GeneralUtility::getApplicationContext(), ['Production','Production/Staging'])) {
       // Removes the default writer configurations
       $GLOBALS['TYPO3_CONF_VARS']['LOG']['writerConfiguration'] = [];
       // Removes the writer configuration for depreciation log
       $GLOBALS['TYPO3_CONF_VARS']['LOG']['TYPO3']['CMS']['deprecations']['writerConfiguration'][\TYPO3\CMS\Core\Log\LogLevel::NOTICE] = [];
   }

.. tip::
   The above mentioned configurations might be part from the file `typo3conf/AdditionalConfiguration.php`.
   A sample file is provided in the directory `typo3conf/ext/pizpalue_distribution/Resources/Private/FolderStructureTemplateFiles/`.


.. _config_siteConfiguration:

Site configuration
==================

A default site configuration is delivered with the extension user_customer and can be found under
`typo3conf/ext/pizpalue_distribution/Initialisation/Extensions/user_customer/Initialisation/Site/default/config.yaml`.

