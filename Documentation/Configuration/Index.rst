.. include:: /Includes.rst.txt


.. _configuration:

=============
Configuration
=============

.. tip::

   You must configure the extensions service_bw2 and maps2 to run this extension correctly.

   `Service BW2 Documentation <https://docs.typo3.org/p/jweiland/service-bw2/master/en-us/>`_
   `Maps2 Documentation <https://docs.typo3.org/p/jweiland/maps2/master/en-us/>`_

Extension configuration
=======================

rootCategory
------------

In each project record you have the possibility to add one or more areas of activity.
In huge installations it's better to define a root category here to NOT show all categories.

TypoScript configuration
========================

Use the constant editor and select tx_pfprojects to set those settings.

Configure page ids for pfprojects plugin
----------------------------------------

You can configure the maps2 detail view target page, project detail page and service_bw2 detail page using the constants.

Default storage pid
-------------------

Don't want to store all records at the plugin page? No problem, you can configure a custom storage page id (or storage folder)
using the storagePid setting.

Page browser
------------

You can configure itemsPerPage, if the page browser should be inserted above and/or below and the maximum number of pages.
