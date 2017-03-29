Simple YII Framework based project.

There is simulation of acceptance of payments from user and saving the card data in database.
Also there is admin interface for watching list of all payments, and managing of them. 

You should be authorized user for making payments. You can create new account in sign-up form.
You should push the button "pay" on main page and fill the form in for that.
You have to write correct credit card data and existing order number.

You can log in as admin if you want add new orders, currencies and watch list of payments or edit them.
In default there is one user. 
login: admin
password: admin

User data is storing in database, in table user. You can add new admin, if you really want, but you will have to get md5 hash for new password. Sorry, I didn't make special interface for that deal.

I made dump of my database. It is file payment.sql. It can be work for MariaDB, I hope it works.
You should deploy this database and change file config\db.php as you need.

I tested my project with XAMPP. I am not sure about other deploy packages, but i don't know hich problem can exist.

That's all. If you have some questions, you can ask me by e-mail: twin1080@gmail.com
