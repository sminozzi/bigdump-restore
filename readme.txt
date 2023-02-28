=== bigdump-restore ===
Contributors: sminozzi
Tags: bigdump Import, restore large database, restore big database, restore database
Requires at least: 5.2
Tested up to: 6.1
Stable tag: 1.00
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Install the free Bigdump (PHP script GUI Web Based Tool) to restore large and very large SQL database. No php Code edit and no linux command.

== Description ==
**BigDump Restore Plugin**
★★★★★<br>
>Bigdump script is a highly reputed MySQL Dump Importer for large and very large database.
.
>BigDump restore plugin Let you install safe and quickly and run the free bigdump script without any code changes or linux command line, just in friendly GUI (Graphical User Interface).
.
>Works even with files GZip compressed dumps.

<a href="https://bigdumprestore.com/">Site with help page and more info</a>

If you need to create the database backup file or a mysqldump 
<a href="https://wordpress.org/plugins/database-backup">just install this free plugin.</a>
The database-backup plugin will create the backup with no extended inserts*.
(*) Extended inserts means the dump file is created with multiple-row syntax that includes several (sometimes hundreds) VALUES list  per insert statement. 
Note 1: BigDump will fail processing large tables containing extended inserts.
The database-backup plugin will also copy your large database files to bigdump restore folder, then you don't need run a FTP app to restore it with Bigdump.
 

== Important: ==
When you restore, your current database will be erased and it is not possible undo that. Then, run a backup and download it to your local computer before proceed.


== Installation ==
1) Install via wordpress.org

2) Activate the plugin through the 'Plugins' menu in WordPress

or

Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page.

== Frequently Asked Questions ==

= What are dumps in SQL? =

A database dump contains a record of the table structure and/or the data from a database and is usually in the form of a list of SQL statements ("SQL dump"). A database dump is most often used for backing up a database so that its contents can be restored in the event of data loss.

= How do I create a SQL dump? =

Install our free plugin <a href="https://wordpress.org/plugins/database-backup">Database Backup.</a>

= How do I download SQL dump? =

Install our free plugin database backup. Link above.

== Tags ==
 How to import large and very large MySQL files
 How do you use big dump?
 How do I run a SQL dump?
 How to dump a large database in MySQL?
 What are dumps in SQL?
 How to import dump in SQL Server?
 mysqldump — A Database Backup Program
 Backing Up MySQL Databases Using mysqldump
 Big Dump


== Credits ==
Credit for bigdump script to Alexey Ozerov.



== Changelog ==
2023-02-28   - Version 1.00 - Initial Release.


