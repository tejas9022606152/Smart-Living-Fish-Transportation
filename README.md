# LFTMS - Smart Living Fish Transportation

## How to run (Windows XAMPP)
1. Install XAMPP and start Apache + MySQL
2. Copy the `lftms_full` folder to `C:/xampp/htdocs/` so path becomes `C:/xampp/htdocs/lftms_full`
3. Import `db.sql` using phpMyAdmin (http://localhost/phpmyadmin) -> Import
4. Open http://localhost/lftms_full/ in your browser
5. Register as Farmer or Transporter. Create Admin by registering and then manually changing role in DB to 'admin' or create admin user via SQL.

## Simulated tracking
To simulate movement for active trips, open the browser to:
http://localhost/lftms_full/api/simulate_tracking.php
Call it repeatedly (or set a cron) to advance positions.

## Notes
- This is a college project scaffold. You can expand forms, validations and styling.
- For production, secure config.php credentials and use prepared statements (already used PDO).
