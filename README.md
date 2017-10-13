# FundDB_Project
#### NOW
ตอน INSERT ข้อมูล ไม่ต้องใส่ id เพราะใช้ AUTO_INCREMENT (ทดลอง)
#### INSTALL
##### 1. import table
```
  php artisan migrate:refresh
```
##### 2.in php_lumen directory
```
  php composer.phar
```
```
  php -S localhost:8000 -t public
```
#### OPTIONS
##### สร้างตาราง
```
  php artisan migrate:refresh
```
##### สร้างตารางพร้อมข้อมูลสุ่มๆ
```
  php artisan migrate:refresh --seed
```
#### >หากเจอปัญหาไม่สามารถรัน seed ได้ ให้ลง composer<
```
  https://getcomposer.org/Composer-Setup.exe
```
#### >แล้วใช้คำสั่งนี้ใน directory php_lumen<
```
  composer dump-autoload
```
