#Pathology Lab Reporting System

###Can be used to publish medical test result reports to patients.
####Functional Specifications

Create a pathology lab reporting web application where medical test result reports can be published to the
patients:
#####Operator users should be able to log in to the system to perform following privileged tasks. Patients cannot access these pages.
* Reports CRUD (Multiple tests and results in each report)
* Patients CRUD (including pass code)
* Lab sends a text message to the patient with a pass code to log in (out of scope).

#####Patient user could log in using his name (auto complete field) and pass code sent to him. And then can do the following :
* Display list of his reports
* Display a report details as a page
* Export a report as PDF
* Mail a report as PDF
 
####Initializing Application
1. Create MySQL database (example : aldo_pathology)
2. Configure config file on application/config/database.php with your database configuration
3. Configure again config file on boostrap.php with your database configuration
4. Execute script "php install.php" to instantiate database schema and fixture
5. Execute script "composer install" to download necessary library for application
6. When composer has been successfully download all dependencies, copy the application folder to your web server folder
7. Then, the application is ready to use

####Assumptions
1. Mailing system will not working because there is no available SMTP server, however the feature already implemented.