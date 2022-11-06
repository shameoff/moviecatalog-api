mysql -u root -p"$MYSQL_ROOT_PASSWORD" <<EOF

  ALTER USER '$MYSQL_USER'@'%' IDENTIFIED WITH mysql_native_password BY '$MYSQL_PASSWORD';

EOF