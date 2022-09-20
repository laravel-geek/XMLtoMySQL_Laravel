# XML to MySQL // Laravel
// This is PHP developer test assignment. Time: 1-3 hours.


Stack: PHP 7.4+, MySQL 5.7+
Frameworks: Native PHP or Laravel


An XML file with data is uploaded to the ftp server of the project once a day. With each new
upload, the data changes - some data may be updated, others added, and others deleted (they will not
be in the new XML file). It is necessary to develop a database architecture based on XML upload and write
an XML file parser.

The parser should:
- add records to the database that are not in it yet;
- update records that came in XML and are already in the database;
- delete records from the database that are not in XML (you cannot clean the table before parsing).

The parser should be run via a console command. When calling the console command, it should be
possible to specify the path to the local upload file, while if the path to the file is not specified, then
the default file is taken.

When designing the database architecture, it must be taken into account that for all fields data filtering will occur except id and
generation_id.

Evaluation criteria:

1. Fulfill all the requirements in the task;
2. Compliance with PSR standards and code purity;
3. Naming classes, methods and variables;
4. A set of programming principles used to implement the task;
5. Table structure, column data types and naming in the database.
