# midnet-linux

For Linux setup:

(1) Install Lamp server in your system.

(2) Place your folder in /var/www/html/.

(3) In browser run localhost/index.php or (localhost/midnet-linux/index.php)

For API testing:

Example:

Go to "http://localhost/midnet/api/-45.14/Celsius/Kelvin/227.51"

API documentation:

(1) GET method in API is used for this midnet project which allows 4 parameters in query string like above given url ( Input Temperature, Input Temperature Unit, Target Temperature Unit and Student Calculated Temperature ) respectively. For example: http://localhost/midnet/api/[Input Temperature]/[Input Temperature Unit]/[Target Temperature Unit]/[Student Calculated Temperature]

(2) Made API using php url and .htaccess.

(3) Use php curl to get API data.

(4) Created functions named as "calculate_temperature" and "grade_response". "calculate_temperature" function calculates the value of the given temperature and returns the resultant temperature. "grade_response" function return json-encode data which display on the screen.
