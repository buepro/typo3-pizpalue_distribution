.. include:: ../Includes.txt


.. _faq:

==========================
Frequently asked questions
==========================

.. _faq_administration:

Administration
==============

Installation
------------

**Q**: The following error message shows up in the front end: **Oops, an error occurred!
Error handler could not fetch error page "/pages", reason: Couldn't get URL: /pages**

**A**: The error might be related to the site configuration. You might try the following:

#. Change to the "Sites" module
#. Delete the entry point
#. Save
#. Clear cache
#. Redefine the entry point
#. In the register "Error handling" delete all, save and create new entry
