Installation
1. Download the project from github
2. Create database according to the projects .env database name and connect the database
3. Migrate all the tables
4. Seed the database (AdminSeeder) as a result you can login using email: admin@localhost.local and password: admin
5. Now run npm install && npm run dev in cmd
6. Now start the project using php artisan serve

After Installation
1. Register valid user email, otherwise you will fail to verify using two step verification.
2. After login using registered credential, wait a while to recieve two factor code in your registered email.
3. If you are having trouble in two factor verification then replce the url "/login" to "/logout" then try to login again. 
